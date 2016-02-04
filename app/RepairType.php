<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RepairType extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'repair_type';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Each RepairType can have different details.
     * Get this types details
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detail()
    {
        return $this->hasMany('App\RepairDetail');
    }
}
