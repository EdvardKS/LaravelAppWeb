@extends('layouts.public')
@section('title', 'Preguntas Frecuentes')

@section('description', '
Encuentra respuestas a las preguntas más frecuentes sobre nuestros productos y comidas a la brasa caseras. 
En nuestra sección de preguntas frecuentes (FAQ) encontrarás información útil y detallada la gastronomía más buscada en Villena. Si no encuentras lo que buscas, no dudes en contactarnos y estaremos encantados de ayudarte.
')
@section('content')
<a href="https://www.google.com/maps/place/Asador+La+Morenica/@38.6418875,-0.8675394,15z/data=!4m6!3m5!1s0xd63df787f80d8db:0xed55f40214e65573!8m2!3d38.6418875!4d-0.8675394!16s%2Fg%2F11b7cjsx_8"
    Class="">
    <img src="/img/corporativa/sliders/contact_slider.png" class="sideImage"
        alt="Logo baner principal es el mapa de donde se situa el asador" /></a>

<div class="container">
    <h1 class="text-center my-5 py-5 fw-bolder fuente-libre ">Preguntas Frecuentes</h1>

    <h2 class="text-center">¿Alguna duda? Es posible que aquí encuentres una solución...</h2>
    <hr>
    <div class="row ">
        <div class="col-12 col-md-6">
            <div class="accordion accordion-flush py-5" id="accordionFlushExample">
                <div class="accordion-item py-3">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseOne1" aria-expanded="false"
                            aria-controls="flush-collapseOne1">
                            ¿Haceís paellas y las llevaís a domicilio?
                        </button>
                    </h2>
                    <div id="flush-collapseOne1" class="accordion-collapse collapse"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            Hacemos Paellas de Cualquier tamaño, y las llevamos a domicilio dependiendo del tamaño de la paella, y la ubicación de destino. Según lo que acordemos a la hora de hacer el encargo.
                        </div>
                    </div>
                </div>
                <div class="accordion-item py-3">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseOne2" aria-expanded="false"
                            aria-controls="flush-collapseOne2">
                            Gluten
                        </button>
                    </h2>
                    <div id="flush-collapseOne2" class="accordion-collapse collapse"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            Muchos de nuestros productos no contienen gluten, incluso nuestra mayonesa no contiene, por ello puedes probar todas nuestras ensaladillas.
                            Así que acercate y preguntanos que alimentos están libres de gluten, te sorprenderas.
                        </div>
                    </div>
                </div>
                <div class="accordion-item py-3">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseOne3" aria-expanded="false"
                            aria-controls="flush-collapseOne3">
                            Vegetariano
                        </button>
                    </h2>
                    <div id="flush-collapseOne3" class="accordion-collapse collapse"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            Sómos muy fan de la comida vegetariana, incluso bajo encargo podemos hacer lo que nos pidas, desde paellas, tortillas o lo que tu corazón quiera.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="accordion accordion-flush py-5" id="accordionFlushExample2">
                <div class="accordion-item py-3">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseOne11" aria-expanded="false"
                            aria-controls="flush-collapseOne11">
                            Accordion Item #1
                        </button>
                    </h2>
                    <div id="flush-collapseOne11" class="accordion-collapse collapse"
                        data-bs-parent="#accordionFlushExample2">
                        <div class="accordion-body">Placeholder content for this accordion, which is intended to
                            demonstrate the
                            <code>.accordion-flush</code> class. This is the first item's accordion body.
                        </div>
                    </div>
                </div>
                <div class="accordion-item py-3">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseOne21" aria-expanded="false"
                            aria-controls="flush-collapseOne21">
                            Accordion Item #1
                        </button>
                    </h2>
                    <div id="flush-collapseOne21" class="accordion-collapse collapse"
                        data-bs-parent="#accordionFlushExample2">
                        <div class="accordion-body">Placeholder content for this accordion, which is intended to
                            demonstrate the
                            <code>.accordion-flush</code> class. This is the first item's accordion body.
                        </div>
                    </div>
                </div>
                <div class="accordion-item py-3">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseOne31" aria-expanded="false"
                            aria-controls="flush-collapseOne31">
                            Accordion Item #1
                        </button>
                    </h2>
                    <div id="flush-collapseOne31" class="accordion-collapse collapse"
                        data-bs-parent="#accordionFlushExample2">
                        <div class="accordion-body">Placeholder content for this accordion, which is intended to
                            demonstrate the
                            <code>.accordion-flush</code> class. This is the first item's accordion body.
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <section class="my-2 my-md-5 py-5">
        <div class="container">
            <div class="row py-5">
                <h3 class="text-center pb-5 mb-5">Tomamos nota de tu pedido</h3>

                <div class="col-12 col-md-6 d-flex align-content-center flex-column mb-5 mb-md-0">
                    <h4 class="text-center"> Te atendemos por correo, whatsapp o llamada</h4>
                        <a class="btn btn-outline-dark text-decoration-none" href="{{ route('contact') }}">Contactar</a>

                </div>
                <div class="col-12 col-md-6 d-flex align-content-center flex-column">
                    <h4 class="text-center">Nos puedes encargar desde nuestra propia página web</h4>
                    <a class="text-decoration-none btn btn-outline-dark" href="{{ route('makeOrder') }}">
                            Encargar
                    </a>

                </div>
            </div>
        </div>
    </section>


</div>

@endsection