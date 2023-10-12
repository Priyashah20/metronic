<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Model\SignUp;

class WelcomeEmail extends Mailable
{
    use Queueable, SerializesModels;
    private $mail;
    public function __construct($mail,$url)
    {
       $this->mail = $mail;
       $this->url = $url;
    }

    public function build()
    {
        return $this->subject('Password Confirmation')
        ->with(['mail'=>$this->mail,'msg'=>"",'url'=>$this->url])->markdown('emails.welcomemail');
    }
}
