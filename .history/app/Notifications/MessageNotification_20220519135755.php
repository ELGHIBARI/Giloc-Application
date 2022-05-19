<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\User ;

class MessageNotification extends Notification
{
    use Queueable;
    private $msg;
    private $sender;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($message,User $sender)
    {
        $this->msg=$message;
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
        return [
            'sender' => $this->sender->nom_complet,
            'contenu' => $this->msg,
            'date_envoi' => date('Y-m-d H:i:s'),
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
