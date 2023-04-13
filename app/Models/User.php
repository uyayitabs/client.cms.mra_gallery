<?php

namespace App\Models;

use Arr;
use Auth;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Collection;
use OwenIt\Auditing\Auditable as AuditingAuditable;
use OwenIt\Auditing\Contracts\Auditable;
use TCG\Voyager\Contracts\User as UserContract;
use TCG\Voyager\Models\User as VoyagerUserModel;
use TCG\Voyager\Traits\Resizable;
use TCG\Voyager\Traits\VoyagerUser;

class User extends Authenticatable implements UserContract, Auditable
{
    use AuditingAuditable;
    use VoyagerUser;
    use Resizable;

    protected $fillable = [
        'name',
        'email',
        'avatar',
        'email_verified_at',
        'password',
        'remember_token',
        'settings',
        'phone',
        'website',
        'facebook',
        'instagram',

    ];

    public $additional_attributes = [
        'locale'
    ];

    /**
     * Get avatar attribute function
     *
     * @param mix $value
     * @return void
     */
    public function getAvatarAttribute($value)
    {
        return $value ?? config('voyager.user.default_avatar', 'users/default.png');
    }

    /**
     * Set created_at attribute function
     *
     * @param mix $value
     * @return void
     */
    public function setCreatedAtAttribute($value)
    {
        $this->attributes['created_at'] = Carbon::parse($value)->format('Y-m-d H:i:s');
    }

    /**
     * Set settings attribute function
     *
     * @param mix $value
     * @return void
     */
    public function setSettingsAttribute($value)
    {
        $this->attributes['settings'] = $value ? $value->toJson() : json_encode([]);
    }

    /**
     * Get settings attribute function
     *
     * @param string $value
     * @return void
     */
    public function getSettingsAttribute($value)
    {
        return collect(json_decode($value));
    }

    /**
     * Set 
     *
     * @param [type] $value
     * @return void
     */
    public function setLocaleAttribute($value)
    {
        $this->settings = $this->settings->merge(['locale' => $value]);
    }

    /**
     * Get locale attribute function
     *
     * @return void
     */
    public function getLocaleAttribute()
    {
        return $this->settings->get('locale');
    }

    /**
     * Transform audit data
     *
     * @param array $data
     * @return array
     */
    public function transformAudit(array $data): array
    {
        if (Arr::has($data, 'auditable_type')) {
            $modelPath = explode("\\", $data['auditable_type']);
            $data['auditable_type'] = last($modelPath);
        }
        if (Arr::has($data, 'user_id')) {
            $data['user_id'] = Auth::user()->id;
        }
        if (Arr::has($data, 'user_type')) {
            $data['user_type'] = Auth::user()->role->name;
        }
        if (Arr::has($data, 'event')) {
            $data['event'] = ucfirst($data['event']);
        }
        return $data;
    }

    /**
     * Related categories function
     *
     * @return BelongsToMany
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'user_categories', 'user_id', 'category_id');
    }
}
