<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    /**
     * Specify the primary key
     *
     * @var string
     */
    protected $primaryKey = 'state_id';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'state';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'state',
    ];

    /**
     * A state can have different cities.
     * Get this states cities
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function city()
    {
        return $this->hasMany('App\City');
    }

    /**
     * Get all of the zones for this state.
     */
    public function zone()
    {
        return $this->hasManyThrough('App\Zone', 'App\City');
    }
}
