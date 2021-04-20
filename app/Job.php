<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'writer_id', 'document_type', 'academic_level', 'subject', 'pages', 'topic', 'paper_instructions', 'deadline', 'urgency', 'price', 'status'
    ];


    /**
     * Get the writer that owns the Job
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function writer()
    {
        return $this->belongsTo('App\Writer');
    }


    public function payment()
    {
        return $this->morphOne('App\Payment', 'paymentable');
    }
}