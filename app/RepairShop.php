<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RepairShop extends Model
{

    /**
     * Specify the primary key
     *
     * @var string
     */
    protected $primaryKey = 'repairshop_id';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'repairshop';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'repairshop', 'address_id', 'email', 'zone_id', 'phone_number',
    ];

    /**A repairshop can be located in a zone
     * Return this companys zone
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function zone()
    {
        return $this->belongsTo('App\Zone');
    }

    /**
     * Repairshops can have different prices depending on repair details and company
     * Get all prices for this repairshop
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rate()
    {
        return $this->hasMany('App\Rate');
    }
}
