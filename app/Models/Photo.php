<?php

namespace App\Models;

use App\Services\PhotoService;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use TCG\Voyager\Traits\Resizable;

/**
 * @property mixed $photographer
 */
class Photo extends BaseModel
{
    use Resizable;

    public mixed $image;
    protected $perPage = 24;

    protected $fillable = [
        'id',
        'title',
        'description',
        'image',
        'event_id',
        'category_id',
        'photographer_id',
    ];

    public $additional_attributes = [
        'count_by_category',
        'count_by_event',
        'count_by_user',
        'category_count_by_event',
    ];

    protected static function booted(): void
    {
        $service = new PhotoService();

        /**
         * DB after_insert
         */
        static::created(static function (self $photo) use ($service) {
            if (isProduction()) {
                if ($photo->isDirty('image') && !blank($photo->image)) {
                    // $service->addWatermark($photo);

                    // Upload to S3 Bucket
                    // -> image (RAW size)
                    $image = $photo->image;
                    $imgFile = Storage::disk(config('voyager.storage.disk'))->path("/$image");
                    $service->uploadToS3Bucket($imgFile, $photo->s3_key_name_directory . '/' . File::basename($image));
                    File::delete($imgFile);

                    // -> image thumbnail
                    $thumbnail = $photo->thumbnail('small');
                    $imgThumbnailFile = Storage::disk(config('voyager.storage.disk'))->path("/$thumbnail");
                    $service->uploadToS3Bucket($imgThumbnailFile, $photo->s3_key_name_directory . '/' . File::basename($thumbnail));
                    File::delete($imgThumbnailFile);
                }
            }
        });

        /**
         * DB before_deleting
         */
        static::deleting(function (Photo $photo) use ($service) {
            if (isProduction()) {
                // Delete S3 bucket images (RAW + thumbnail)
                $service->deleteS3Object($photo->s3_key_name_directory . '/' . File::basename($photo->image));
                $service->deleteS3Object($photo->s3_key_name_directory . '/' . File::basename($photo->thumbnail('small')));
            }
        });

        /**
         * DB after_update
         */
        static::updated(function (Photo $photo) use ($service) {
            if (isProduction()) {
                if ($photo->isDirty('image') && !blank($photo->image)) {
                    $image = $photo->image;
                    $thumbnail = $photo->thumbnail('small');

                    // Delete S3 bucket images (RAW + thumbnail)
                    $service->deleteS3Object($photo->s3_key_name_directory . '/' . File::basename($image));
                    $service->deleteS3Object($photo->s3_key_name_directory . '/' . File::basename($thumbnail));

                    // Add watermark
                    // $service->addWatermark($photo);

                    // Upload to S3 Bucket
                    // -> image (RAW size)
                    $imgFile = Storage::disk(config('voyager.storage.disk'))->path("/$image");
                    $service->uploadToS3Bucket($imgFile, $photo->s3_key_name_directory . '/' . File::basename($image));
                    File::delete($imgFile);

                    // -> image thumbnail
                    $imgThumbnailFile = Storage::disk(config('voyager.storage.disk'))->path("/$thumbnail");
                    $service->uploadToS3Bucket($imgThumbnailFile, $photo->s3_key_name_directory . '/' . File::basename($thumbnail));
                    File::delete($imgThumbnailFile);
                }
            }
        });
    }

    /**
     * Get count by category attribute function
     *
     * @return mixed
     */
    public function getCountByCategoryAttribute(): mixed
    {
        $query = Photo::query();
        if (Auth::user()->role->name === "photographer") {
            $query->where('photographer_id', Auth::user()->id);
        }
        $query = $query->where('category_id', $this->category_id);

        return $query->count() > 0 ? $query->count() : '';
    }

    /**
     * Get count by event attribute function
     *
     * @return mixed
     */
    public function getCountByEventAttribute(): mixed
    {
        $query = Photo::query();
        if (Auth::user()->role->name === "photographer") {
            $query->where('photographer_id', Auth::user()->id);
        }
        if (Auth::user()->role->name === "category") {
            $query->whereIn('category_id', Auth::user()->categories()->pluck('category_id')->toArray());
        }
        $query = $query->where('event_id', $this->event_id);
        return $query->count() > 0 ? $query->count() : '';
    }

    /**
     * Get count by user attribute function
     *
     * @return mixed
     */
    public function getCountByUserAttribute(): mixed
    {
        $query = Photo::where('photographer_id', $this->photographer_id);
        return $query->count() > 0 ? $query->count() : '';
    }

    /**
     * Get category count by event attribute function
     *
     * @return mixed
     */
    public function getCategoryCountByEventAttribute(): mixed
    {
        $query = Photo::query();
        if (Auth::user()->role->name === "photographer") {
            $query->where('photographer_id', Auth::user()->id);
        }
        $query->where('event_id', $this->event_id)->selectRaw('count(distinct category_id) as count');
        return $query->count() ? $query->first()->count : '';
    }

    /**
     * Get related user function
     *
     * @return BelongsTo
     */
    public function photographer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'photographer_id', 'id');
    }

    /**
     * Get related event function
     *
     * @return BelongsTo
     */
    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class, 'event_id', 'id');
    }

    /**
     * Get related category function
     *
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    /**
     * Get AWS S3 key name directory function
     *
     * @return string
     */
    public function getS3KeyNameDirectoryAttribute(): string
    {
        $eventDate = Carbon::parse($this->event->date)->format('Ymd');
        $category = Str::pascalCase($this->category->name);
        $photographer = Str::pascalCase($this->photographer->name);
        return "$eventDate/$category/$photographer";
    }
}
