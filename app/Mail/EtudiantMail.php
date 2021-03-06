<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EtudiantMail extends Mailable
{
    use Queueable, SerializesModels;

    public $dataEtudiant = [];
    public $dataDate = [];


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('sylvaintagnabou@gmail.com')
                    ->subject('Inscription a l\'ESI')
                    ->view('emails.etudiantMail')
                    ->attach(public_path('img/ESI.png'));
    }
}
