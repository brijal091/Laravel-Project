<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifyMail extends Mailable
{
    use Queueable, SerializesModels;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($pass)
    {
        $this->password=$pass;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('agriculturehub97@gmail.com', 'Agriculture')
        ->subject('Your agriculture hub forgot password.')
        ->markdown('fgmail')
        ->with([
            'password' => $this->password,
        ]);
        //return $this->view('fgmail');
    }
}
