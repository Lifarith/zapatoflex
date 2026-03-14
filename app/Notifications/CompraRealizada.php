<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class CompraRealizada extends Notification
{
    use Queueable;

    private $pedido;

    /**
     * Create a new notification instance.
     */
    public function __construct($pedido)
    {
        $this->pedido = $pedido;
    }

    /**
     * Get the notification's delivery channels.
     */
    public function via(object $notifiable): array
    {
        return ['database']; // Guardar en la base de datos
    }

    /**
     * Representación de la notificación en la base de datos
     */
    public function toArray(object $notifiable): array
    {
        return [
            'mensaje' => 'Tu compra fue realizada correctamente',
            'pedido_id' => $this->pedido->id,
            'total' => $this->pedido->total
        ];
    }
}
