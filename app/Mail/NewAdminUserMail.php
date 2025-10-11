<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewAdminUserMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $defaultPassword;

    public function __construct($name, $email, $defaultPassword)
    {
        $this->name = $name;
        $this->email = $email;
        $this->defaultPassword = $defaultPassword;
    }

    public function build()
    {
        return $this->subject('Your Admin Account Credentials')
                    ->view('emails.new_admin_user');
    }
}
