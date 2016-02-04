<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'city_id',
    ];

    /**
     * A zone can have different companies.
     * Get this zones companies
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function company()
    {
        return $this->hasMany('App\Company');
    }

    /**A zone can be located in a particular city
     * Return this zones city
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city()
    {
        return $this->belongsTo('App\City');
    }
}
