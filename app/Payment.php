<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'charge_id',
        'amount',
        'status',
    ];

    /**
     * Get the owning paymentable model.
     */
    public function paymentable()
    {
        return $this->morphTo();
    }
}