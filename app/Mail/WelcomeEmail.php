<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;

/**
 * MAILABLE
 *
 * Class WelcomeEmail
 * @package App\Mail
 */
class WelcomeEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        Auth::loginUsingId(1);
        return $this->view('emails.welcome')->with('username',Auth::user()->name);
    }

    public function subject($subject)
    {
        return 'Welcome';
    }


}
