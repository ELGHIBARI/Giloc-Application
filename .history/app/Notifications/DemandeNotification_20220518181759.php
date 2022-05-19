<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Demande ;
use Illuminate\Database\Eloquent\Builder;

class DemandeNotification extends Notification
{
    use Queueable;
    private $demande;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Builder $demande)
    {
        $this->demande=$demande;
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
   /* public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }*/
    public function toDatabase($notifiable)
    {
        return [
             'titre_annonce' => $this->demande->userAnnonce->id,
             'client' => $this->demande->userDemande->nom_complet,
             'prix_total' => $this->demande->prix_total,
             'date_debut' => $this->demande->date_debut,
             'date_fin' => $this->demande->date_fin,
             'date_demande' => date('Y-m-d H:i:s')
             ,

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
