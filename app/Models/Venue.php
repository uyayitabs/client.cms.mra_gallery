<?php

namespace App\Models;

class Venue extends BaseModel
{
    protected $perPage = 25;

    protected $fillable = [
        'name'
    ];
}
