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

    protected $document_types = ['Essay', 'Tem Paper', 'Research Paper', 'Research Report', 'Coursework', 'Book Report', 'Book Review', 'Movie Review', 'Research Summary', 'Dissertation', 'Thesis', 'Thesis Proposal', 'Project Proposal', 'Dissertation Chapter-Abstract', 'Dissertation Chapter-Abstract'];

    protected $urgencies = [
        ['value' => '30 Days', 'cost' => 0],
        ['value' => '14 Days', 'cost' => 0],
        ['value' => '10 Days', 'cost' => 0],
        ['value' => '7 Days', 'cost' => 10],
        ['value' => '5 Days', 'cost' => 10],
        ['value' => '3 Days', 'cost' => 20],
        ['value' => '2 Days', 'cost' => 20],
        ['value' => '24 Hours', 'cost' => 30],
        ['value' => '16 Hours', 'cost' => 30],
        ['value' => '12 Hours', 'cost' => 30],
        ['value' => '5 Hours', 'cost' => 30]
    ];

    protected $subjects = ['Accounting', 'Anthropology', 'Architecture', 'Theatre and Film', 'Biology', 'Entrepreneurship', 'Computer Science', 'Criminology', 'Economics', 'Education', 'Engineering', 'Ethics', 'Finance', 'Geography', 'Healthcare', 'History', 'Legal Issues', 'Linguistics', 'Literature', 'Management', 'Marketing', 'Mathematics', 'Music', 'Nursing', 'Psychology', 'Sociology', 'Sport', 'Technology', 'Tourism'];

    protected $academic_levels = ['High School', 'College', 'University', 'Masters', 'PhD'];


    public function document_types()
    {
        return $this->document_types;
    }


    public function subjects()
    {
        return $this->subjects;
    }

    public function academic_levels()
    {
        return $this->academic_levels;
    }

    public function urgencies()
    {
        return $this->urgencies;
    }


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