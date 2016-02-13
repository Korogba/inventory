<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    /**
     * Specify the primary key
     *
     * @var string
     */
    protected $primaryKey = 'rate_id';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rate';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subcomponent_id', 'repairshop_id', 'carmodel_id', 'amount', 'min_amount', 'max_amount'
    ];

    /**Each rate has one subcomponent related to it
     * Return the subcomponent for this rate
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subcomponent()
    {
        return $this->belongsTo('App\SubComponent');
    }

    /**Each rate has one repairshop related to it
     * Return the relationship for this rate
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function repairshop()
    {
        return $this->belongsTo('App\RepairShop');
    }

    /**Each rate has one carmodel related to it
     * Return the model for this rate
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function carmodel()
    {
        return $this->belongsTo('App\CarModel');
    }
}
