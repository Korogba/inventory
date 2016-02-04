<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'repair_details', 'company_id', 'brand_id', 'amount',
    ];

    /**Different prices can be set for a particular repair depending on brand and company
     * Return all prices for this repair details
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function repair_detail()
    {
        return $this->belongsToMany('App\RepairDetail');
    }

    /**Different companies can be set different prices depending on repair details and brand
     * Return all prices for this repair details
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsToMany('App\Company');
    }

    /**Different brand can have different prices depending on repair details and company
     * Return all prices for this repair details
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function brand()
    {
        return $this->belongsToMany('App\Brand');
    }
}
