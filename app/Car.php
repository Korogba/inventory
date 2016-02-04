<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
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
     * A car can have different brands.
     * Get this cars brands
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function brand()
    {
        return $this->hasMany('App\Brand');
    }
}
