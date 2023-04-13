<?php

namespace App\Models;

use TCG\Voyager\Facades\Voyager;

class Role extends BaseModel
{
    protected $fillable = [
        'name'
    ];

    /**
     * Get related user function
     *
     * @return void
     */
    public function users()
    {
        $userModel = User::class;
        return $this->belongsToMany($userModel, 'user_roles')
                    ->select(app($userModel)->getTable() . '.*')
                    ->union($this->hasMany($userModel))->getQuery();
    }

    /**
     * Get Voyager permissions
     *
     * @return void
     */
    public function permissions()
    {
        return $this->belongsToMany(Voyager::modelClass('Permission'));
    }
}
