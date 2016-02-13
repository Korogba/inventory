<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    /**
     * Specify the primary key
     *
     * @var string
     */
    protected $primaryKey = 'carmodel_id';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'carmodel';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'carmodel', 'carmake_id',
    ];

    /**A car model can have a single car type
     * Return this brands make
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function carmake()
    {
        return $this->belongsTo('App\CarMake');
    }

    /**
     * Brand can have different prices depending on repair detail and company
     * Get all prices for this detail
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rate()
    {
        return $this->hasMany('App\Rate');
    }
}
