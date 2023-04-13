<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends BaseModel
{
    protected $fillable = [
        'name'
    ];

    /**
     * Get related events function
     *
     * @return BelongsToMany
     */
    public function events(): BelongsToMany
    {
        return $this->belongsToMany(Event::class, 'event_categories', 'category_id', 'event_id');
    }
}
