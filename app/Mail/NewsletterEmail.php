<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

// Clase NewsletterEmail que hereda de Mailable, la cual permite enviar correos electrónicos.
class NewsletterEmail extends Mailable
{
    use Queueable, SerializesModels;

   
    public $subject;
    public $body;

    // Constructor que recibe el asunto y el contenido del correo electrónico y los asigna a las propiedades correspondientes.
    public function __construct($subject, $body)
    {
        $this->subject = $subject;
        $this->body = $body;
    }

    // Método build que configura el correo electrónico y define la vista a utilizar.
    public function build()
    {
        // Establece la vista, el asunto y pasa el contenido del correo electrónico a la vista utilizando el método 'with'.
        return $this->view('emails.newsletter')
                    ->subject($this->subject)
                    ->with(['body' => $this->body]);
    }
}
