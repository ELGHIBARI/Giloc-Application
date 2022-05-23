<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\User ;
use App\Models\Annonce ;

class MessageNotification extends Notification
{
    use Queueable;
    private $msg;
    private $sender;
    private $a;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($message,User $sender,Annonce $a)
    {
        $this->msg=$message;
        $this->a=$a;
        $this->sender=$sender;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function ToDatabase($notifiable)
    {
        if($this->sender->role=="partenaire"){
            if($this->a->type_vehicule=="voiture")
            $url='annonces/voiture_details/'.$this->a->id;
            if($this->a->type_vehicule=="moto")
            $url='annonces/moto_details/'.$this->a->id;
            if($this->a->type_vehicule=="moto")
            $url='annonces/velo_details/'.$this->a->id;
        }
        return [
            'titre_annonce' => $this->a->titre,
            'sender' => $this->sender->nom_complet,
            'contenu' => $this->msg,
            'date_envoi' => date('Y-m-d H:i:s'),
            'url' =>
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
