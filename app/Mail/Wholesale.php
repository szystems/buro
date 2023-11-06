<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use App\Models\Config;
use Illuminate\Queue\SerializesModels;

class Wholesale extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $name, $job, $email, $business, $years, $locations, $level, $volume, $about, $mail_to;
    public Config $config;

    public function __construct($name, $job, $email, $business, $years, $locations, $level, $volume, $about, $mail_to, $config)
    {
        $this->name = $name;
        $this->job = $job;
        $this->email = $email;
        $this->business = $business;
        $this->years = $years;
        $this->locations = $locations;
        $this->level = $level;
        $this->volume = $volume;
        $this->about = $about;
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
        return $this->view('mails.wholesalemessage');
    }
}
