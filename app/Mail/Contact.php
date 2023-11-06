<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use App\Models\Config;
use Illuminate\Queue\SerializesModels;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $name, $email, $subject, $contact_message, $mail_to;
    public Config $config;

    public function __construct($name,$email,$subject,$contact_message,$mail_to,$config)
    {
        $this->name = $name;
        $this->email = $email;
        $this->subject = $subject;
        $this->contact_message = $contact_message;
        $this->mail_to = $mail_to;
        $this->config = $config;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.contactmessage');
    }
}
