<?php

namespace App\Notifications;

use App\Models\Chirp;
use Illuminate\Support\Str;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewChirp extends Notification {
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(
        public Chirp $chirp
    ) {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage {
        return (new MailMessage)
            ->subject("Nouveau commentaire de {$this->chirp->user->name}")
            ->greeting("Nouveau commentaire de {$this->chirp->user->name}")
            ->line(Str::limit($this->chirp->message, 50))
            ->action("Allez vers le commentaier", url("/"))
            ->line("Merci d'utiliser notre application ! 😎");
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array {
        return [
            //
        ];
    }
}
