<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * A state can have different cities.
     * Get this states cities
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function city()
    {
        return $this->hasMany('App\City');
    }

    /**
     * Get all of the zones for this state.
     */
    public function zone()
    {
        return $this->hasManyThrough('App\Zone', 'App\City');
    }
}
