<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

// Clase ContactanosMailpit que hereda de Mailable, la cual permite enviar correos electrónicos.
class ContactanosMailpit extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    // Constructor que recibe los datos del correo electrónico y los asigna a la propiedad $data.
    public function __construct($data)
    {
        $this->data = $data;
    }

    // Método build que configura el correo electrónico y define la vista a utilizar.
    public function build()
    {
        // Establece el remitente, el asunto y la vista del correo electrónico.
        // También pasa el mensaje a la vista utilizando el método 'with'.
        $data = $this->data;
        return $this->from($data['email'], $data['nombre'])
            ->subject('Contacto: ' . $data['nombre'])
            ->view('emails.contactanos')
            ->with([
                'mensaje' => $data['mensaje'],
            ]);
    }
}
