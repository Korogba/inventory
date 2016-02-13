<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    /**
     * Specify the primary key
     *
     * @var string
     */
    protected $primaryKey = 'zone_id';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'zone';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'zone', 'city_id',
    ];

    /**
     * A zone can have different repairshops.
     * Get this zones companies
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function repairshop()
    {
        return $this->hasMany('App\RepairShop');
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
