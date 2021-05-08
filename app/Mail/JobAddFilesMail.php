<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class JobAddFilesMail extends Mailable
{
    use Queueable, SerializesModels;

    public $job;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($job)
    {
        $this->job = $job;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = $this->markdown('emails.job.add_files');

        foreach ($this->job->job_files as $file) {
            $email->attach(public_path('storage/' . $file->file));
        }
        return $email;
    }
}