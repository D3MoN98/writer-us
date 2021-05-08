<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MessageToAdminMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $message;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $message)
    {
        $this->message = $message;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.message');
    }
}