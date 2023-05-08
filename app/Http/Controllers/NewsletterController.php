<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;
use App\Mail\NewsletterEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class NewsletterController extends Controller
{
    // Muestra la vista de la página principal del newsletter.
    public function index()
    {
        return view('admin.newsletters.index');
    }


    // Guarda un nuevo suscriptor a la newsletter y redirige con un mensaje de éxito.
    public function store(Request $request)
    {
        // Validar el campo de correo electrónico
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:newsletters,email'
        ]);

        // Si la validación falla, redirigir con errores
        if ($validator->fails()) {
            return redirect('/')
                ->withErrors($validator)
                ->withInput();
        }

        // Crear un nuevo objeto Newsletter y guardar el correo electrónico
        $newsletter = new Newsletter;
        $newsletter->email = $request->email;
        $newsletter->save();

        return redirect('/')
            ->with('success', 'Gracias por suscribirte a nuestra newsletter!');
    }

    // Envía una newsletter a todos los suscriptores y redirige con un mensaje de éxito.
    public function send(Request $request)
    {
        // Validar los campos del formulario
        $request->validate([
            'subject' => 'required',
            'body' => 'required',
        ]);

        // Recopilar datos del formulario
        $subject = $request->input('subject');
        $body = $request->input('body');

        // Obtener todos los suscriptores
        $subscribers = Newsletter::all();

        // Enviar la newsletter a cada suscriptor
        foreach ($subscribers as $subscriber) {
            Mail::to($subscriber->email)->send(new NewsletterEmail($subject, $body));
        }

        return redirect()->route('newsletters.index')->with('success', 'Newsletter enviada con éxito');
    }
}
