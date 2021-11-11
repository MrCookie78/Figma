<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class demandeAccepteMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.demandeAccepte')
            ->from('admin@test.com')
            ->with([
                'firstname' => $this->data['firstname'],
                'lastname' => $this->data['lastname'],
                'email' => $this->data['email'],
                'password' => $this->data['password']
            ]);
    }
}
