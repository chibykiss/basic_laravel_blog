<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SingleMail extends Mailable
{
    use Queueable, SerializesModels;

    public $details;
    public $subject;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($content,$subject)
    {
        $this->details = $content;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)->view('emails.SingleMail');
    }
}
