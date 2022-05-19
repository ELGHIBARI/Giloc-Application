<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Demande ;
use App\Models\User ;
use App\Models\Annonce ;

use Illuminate\Database\Eloquent\Builder;

class DemandeNotification extends Notification
{
    use Queueable;
    private $a;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Annonce $a)
    {
        $this->a=$a;

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
             'titre_annonce' => $this->a->titre,
             'client' => $this->u->nom_complet,
             'prix_total' => $this->d->prix_total,
             'date_debut' => $this->d->date_debut,
             'date_fin' => $this->d->date_fin,
             'date_demande' => date('Y-m-d H:i:s'),
             'id_demande' => $this->d->id,
             'id_client' => $this->u->id
             

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
