<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use App\Models\Order;
use App\Models\Config;
use App\Models\User;
use Illuminate\Queue\SerializesModels;

class OrderConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public Order $order;
    public Config $config;
    public User $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order, $config, $user)
    {
        $this->order = $order;
        $this->config = $config;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Order Confirmation')->view('mails.orderconfirmation');
    }
}
