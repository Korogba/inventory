<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarMake extends Model
{
    /**
     * Specify the primary key
     *
     * @var string
     */
    protected $primaryKey = 'carmake_id';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'carmake';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'carmake',
    ];

    /**
     * A car can have different brands.
     * Get this cars brands
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function carmodel()
    {
        return $this->hasMany('App\CarModel');
    }
}
