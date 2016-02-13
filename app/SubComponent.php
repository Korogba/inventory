<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubComponent extends Model
{
    /**
     * Specify the primary key
     *
     * @var string
     */
    protected $primaryKey = 'subcomponent_id';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'subcomponent';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subcomponent', 'component_id',
    ];

    /**Each subcomponent can have a single component
     * Return this subcomponent's component
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function component()
    {
        return $this->belongsTo('App\Component');
    }

    /**
     * SubComponent can have different prices depending on carmodel and repairshop
     * Get all prices for this detail
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rate()
    {
        return $this->hasMany('App\Rate');
    }
}
