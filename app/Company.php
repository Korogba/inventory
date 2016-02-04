<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'companys';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'address', 'email', 'zone', 'phone_number',
    ];

    /**A company can be located in a zone
     * Return this companys zone
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function zone()
    {
        return $this->belongsTo('App\Zone');
    }

    /**
     * Companies can have different prices depending on repair details and company
     * Get all prices for this detail
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function price()
    {
        return $this->hasMany('App\Price');
    }
}
