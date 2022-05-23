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

class RefusDemandeNotification extends Notification
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
 
    public function toDatabase($notifiable)
    {
        return [
             'titre_annonce' => $this->a->titre,
             'date' => date('Y-m-d H:i:s'),

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
