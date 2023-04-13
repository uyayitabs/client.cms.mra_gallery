<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Event extends BaseModel
{
    protected $fillable = [
        'name',
        'date',
        'venue_id',
    ];

    public $additional_attributes = [
        'category_count',
    ];

    /**
     * Get related venue function
     *
     * @return BelongsTo
     */
    public function venue(): BelongsTo
    {
        return $this->belongsTo(Venue::class, 'venue_id', 'id');
    }

    /**
     * Get related categories function
     *
     * @return HasManyThrough
     */
    public function categories(): HasManyThrough
    {
        return $this->hasManyThrough(
            Category::class,
            EventCategory::class,
            'event_id', //event_categories.event_id
            'id', // category.id
            'id', // event.id
            'category_id' // event_categories.category_id
        );
    }

    /**
     * Get category count attribute function
     *
     * @return mixed
     */
    public function getCategoryCountAttribute(): mixed
    {
        return $this->categories()->count() > 0 ? $this->categories()->count() : '';
    }

    public function getDateAttribute($value)
    {
        return Carbon::parse($value)->format('F d, Y');   
    }
}
