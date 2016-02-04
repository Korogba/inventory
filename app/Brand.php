<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'car_id',
    ];

    /**A brand can have a single car type
     * Return this brands make
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function car()
    {
        return $this->belongsTo('App\Car');
    }

    /**
     * Brand can have different prices depending on repair detail and company
     * Get all prices for this detail
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function price()
    {
        return $this->hasMany('App\Price');
    }
}
