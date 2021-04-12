<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Writer extends Model
{
    use  SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'finished_papers', 'customer_reviews', 'global_rating_rank', 'rating_score', 'success_rate', 'cost', 'image'
    ];
}