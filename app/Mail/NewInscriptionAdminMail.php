<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewInscriptionAdminMail extends Mailable
{
    use Queueable, SerializesModels;

    public $souscription;

    public function __construct($souscription)
    {
        $this->souscription = $souscription;
    }

    public function build()
    {
        return $this->subject('Nouvelle inscription reçue')
            ->view('emails.admin-new-inscription');
    }
}