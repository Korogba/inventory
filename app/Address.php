<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    /**
     * Specify the primary key
     *
     * @var string
     */
    protected $primaryKey = 'address_id';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'address';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'repairshop_id',
        'persontitle',
        'firstname',
        'lastname',
        'address1',
        'address2',
        'zone_id',
        'country',
        'po_box',
        'phone',
        'mobilephone',
        'fax',
        'email',
    ];

    /**An address can be located in a particular zone
     * Return this addresses' zone
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function zone()
    {
        return $this->belongsTo('App\Zone');
    }

    /**An address can belong to a particular repairshop
     * Return this zones city
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function repairshop()
    {
        return $this->belongsTo('App\RepairShop');
    }
}
