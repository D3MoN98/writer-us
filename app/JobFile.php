<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobFile extends Model
{
    protected $fillable = ['added_by', 'job_id', 'file'];
}