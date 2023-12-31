<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserMail extends Mailable
{
    use Queueable, SerializesModels;

    public $mailData;
    public function __construct($mailData)
    {
         $this->mailData = $mailData;
    }

    public function build()
    {
        return $this->subject('Password Confirmation')
        ->with(['mailData'=>$this->mailData,'msg'=>""])->markdown('emails.usermail');
    }
}
