<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RepairDetail extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'repair_details';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'type_id',
    ];

    /**Each repair details can have a single repair type
     * Return this details type
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type()
    {
        return $this->belongsTo('App\RepairType');
    }

    /**
     * Repair details can have different prices depending on brand and company
     * Get all prices for this detail
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function price()
    {
        return $this->hasMany('App\Price');
    }
}
