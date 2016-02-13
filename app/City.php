<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /**
     * Specify the primary key
     *
     * @var string
     */
    protected $primaryKey = 'city_id';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'city';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'city', 'state_id',
    ];

    /**A city can be located in a particular state
     * Return this citys state
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function state()
    {
        return $this->belongsTo('App\State');
    }

    /**
     * A city can have different zones.
     * Get this citys zones
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function zone()
    {
        return $this->hasMany('App\Zone');
    }
}
