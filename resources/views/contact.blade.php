@extends('layouts.public')
@section('title', 'Contacta con Asador la Morenica')
@section('description', 'Contacta con el Asador la Morenica para cualquier consulta o duda que tengas. 
Nuestro equipo de atención al cliente está a tu disposición para ayudarte en todo lo que necesites. 
Completa el formulario de contacto o utiliza los medios de contacto que encontrarás en esta página.')
@section('content')
<a href="https://www.google.com/maps/place/Asador+La+Morenica/@38.6418875,-0.8675394,15z/data=!4m6!3m5!1s0xd63df787f80d8db:0xed55f40214e65573!8m2!3d38.6418875!4d-0.8675394!16s%2Fg%2F11b7cjsx_8"
    Class="">
    <img src="/img/corporativa/sliders/contact_slider.png" class="sideImage"
        alt="Logo baner principal es el mapa de donde se situa el asador de pollos extraido de google maps" /></a>

<main class="container contact-blade my-5">
    <h1 class="text-center">Contacta con tu asador de pollos favorito</h1>
    <div class="my-5 border-bottom">
        <h2>CONTACTA CON NOSOTROS</h2>
    </div>
    <div class="row">
        <div class="col-12 col-md-6 border-end">
            <div class="card border-0 bg-light">
                <div class="card-body text-center">
                    <img src="/img/corporativa/svg/email-b.svg" width="60" alt="Logo email for send email" />
                    <a href="mailto:info@asadorlamorenica.com"
                        class="fs-3 ms-2 text-dark unstyle-contact">info@asadorlamrenica.com</a>
                </div>
            </div>

            <div class="card border-0 bg-light">
                <div class="card-body text-center">
                    <img src="/img/corporativa/svg/telephone-b.svg" width="45" alt="Logo telephone for call" />
                    <a href="tel:+34965813907" class="ms-2 text-dark unstyle-contact fs-3">965813907</a>
                    <a href="tel:+34686536975" class="ms-2 text-dark unstyle-contact fs-3">686536975</a>
                    <br />
                    <a href="https://wa.me/34686536975?text=Hola! Me gustaría encargar..."
                        class="ms-5 text-dark unstyle-contact fs-4">Escribenos por whatsapp</a>
                </div>
            </div>

            <div class="card border-0 bg-light">
                <div class="card-body text-center">
                    <img src="/img/corporativa/svg/localization-b.svg" width="65"
                        alt="Logo localization for see the ubication" />
                    <a href="https://www.google.com/maps/place/Asador+La+Morenica/@38.6418875,-0.8675394,15z/data=!4m6!3m5!1s0xd63df787f80d8db:0xed55f40214e65573!8m2!3d38.6418875!4d-0.8675394!16s%2Fg%2F11b7cjsx_8"
                        Class="mx-2 fs-3 text-dark unstyle-contact">C/ Celada 72</a>
                    <h5 class="ms-5">Villena (03400) Alicante</h5>
                </div>
            </div>
            <hr>
            <div class="card border-0 bg-light">
                <h2 class="text-center">Horario</h2>
                <div class="card-body text-center table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                @foreach($horarios as $dia)
                                <th scope="col">{{$dia->nombre_dia}} </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach($horarios as $horario)
                                @if($horario->estado == "Cerrado")
                                <td scope="col">{{$horario->estado}} </td>
                                @else
                                <td scope="col">{{ \Carbon\Carbon::parse($horario->h_abierto)->format('H:i')
                                    }}<br>a<br>{{ \Carbon\Carbon::parse($horario->h_cerrado)->format('H:i') }}</td>
                                @endif
                                @endforeach
                            </tr>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 my-5 my-md-0">
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            <h3 class="text-center">No te quemes con la duda ¡Consúltanos!</h3>
            <!-- FORMULARIO --- ETIQUETA -->
            <form action="{{ route('enviarCorreo') }}" method="POST" class="d-flex flex-column">
                @csrf
                <div class="d-flex flex-row align-items-center">
                    <input class="form-control m-2 w-100 p-3" type="text" name="nombre-usuario" id="nombre-usuario"
                        placeholder="Nombre" pattern="[A-Za-z]+" required />
                    <input class="form-control m-2 w-100 p-3" type="text" name="apellidos-usuario"
                        id="apellidos-usuario" placeholder="Apellidos" pattern="[A-Za-z]+" required />
                </div>
                <input class="form-control m-2 p-3" type="email" name="email-usuario" id="email-usuario"
                    placeholder="Email" required />
                <input class="form-control m-2 p-3" type="text" name="telefono-usuario" id="telefono-usuario"
                    placeholder="Teléfono (665456875)" pattern="[0-9]+" required />
                <textarea class="form-control m-2 p-3" name="comentario-usuario" id="comentario-usuario" cols="50"
                    rows="10" placeholder="Escribe aquí..." required></textarea>
                <label for="politicas-privacidad-usuario">
                    <input class="form-check-input mx-2" type="checkbox" name="politicas-privacidad-usuario"
                        id="politicas-privacidad-usuario" required />
                    He leído y acepto la <a href="{{ route('privacyPolices') }}">política de privacidad</a>
                </label>
                <button class="form-control btn btn-outline-dark w-25 m-2">
                    Enviar
                </button>
            </form>
        </div>
    </div>
</main>

@endsection