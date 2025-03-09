<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendEventCreatedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $evento;

    public function __construct($evento)
    {
        $this->evento = $evento;
    }

    public function via($notifiable)
    {
        return ['mail']; // Puedes agregar más canales (como 'database' o 'sms')
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Nuevo evento creado: ' . $this->evento->title)
                    ->line('Se ha creado un nuevo evento:')
                    ->line('Título: ' . $this->evento->title)
                    ->line('Fecha de inicio: ' . $this->evento->start)
                    ->line('Fecha de fin: ' . $this->evento->end)
                    ->action('Ver evento', url('/eventos/' . $this->evento->id))
                    ->line('¡Gracias por usar nuestra aplicación!');
    }
}