<?php

namespace App\Models;

use App\Services\PhotoService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use TCG\Voyager\Traits\Resizable;

class BulkPhoto extends BaseModel
{
    use Resizable;

    protected $perPage = 24;

    protected $table = 'bulk_photos';

    protected $fillable = [
        'id',
        'event_id',
        'category_id',
        'photographer_id',
        'image',
    ];

    protected static function booted(): void
    {
        $service = new PhotoService();
        
        /**
         * DB after_insert
         */
        static::created(function (BulkPhoto $bulkPhoto) use ($service) {            
            if ($bulkPhoto->isDirty('image') && !blank($bulkPhoto->image)) {
                // Create new Photo record for each BulkPhoto created
                foreach (json_decode($bulkPhoto->image, true) as $image) {
                    // Will trigger Photo::created() in the boot() method -> upload to s3 bucket
                    $photo = Photo::create([
                        'image' => $image,
                        'event_id' => $bulkPhoto->event_id,
                        'category_id' => $bulkPhoto->category_id,
                        'photographer_id' => $bulkPhoto->photographer_id,
                    ]);
                    // $service->addWatermark($photo);
                    
                    // Delete $bulkPhoto
                    $bulkPhoto->delete();                
                }
            }                  
        });
    }
}
