<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    /**
     * Specify the primary key
     *
     * @var string
     */
    protected $primaryKey = 'component_id';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'component';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'component',
    ];

    /**
     * Each Component can have different subcomponents.
     * Get this types details
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function component()
    {
        return $this->hasMany('App\SubComponent');
    }
}
