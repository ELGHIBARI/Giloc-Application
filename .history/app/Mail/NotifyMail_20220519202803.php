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
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        $nom = $_GET['client->nom_complet'];
        $email = $_GET['client->email'];
        $tel = "0659656660";
        $site = "http://localhost:8000/home";
        $confirmation = "Nom: " . $nom . " vous pouvez le contacter a travers son adresse e-mail: " . $email . " ou par son telephone: " . $tel . " veulliez visiter notre sitre pour nous donner votre feedback " . $site;

        return $this->view('emails.demoMail', compact('confirmation'));
    }
}
