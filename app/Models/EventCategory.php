<?php

namespace App\Models;

class EventCategory extends BaseModel
{
    protected $table = 'event_categories';

    protected $fillable = [
        'event_id',
        'category_id',
    ];
}
