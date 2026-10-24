<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeUser extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The registered user's display name.
     *
     * @var string
     */
    public $userName;

    /**
     * Create a new message instance.
     *
     * @param  string  $userName
     * @return void
     */
    public function __construct($userName)
    {
        $this->userName = $userName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Bienvenido')
            ->view('emails.welcome');
    }
}
