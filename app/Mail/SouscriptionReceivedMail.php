<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SouscriptionReceivedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $souscription;

    public function __construct($souscription)
    {
        $this->souscription = $souscription;
    }

    public function build()
    {
        return $this->subject('Dossier reçu')
            ->view('emails.souscription-received');
    }
}