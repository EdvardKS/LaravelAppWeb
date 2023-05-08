@extends('layouts.public')

@section('title', 'Quienes son Asador la Morenica')
@section('description', '
Asador La Morenica, somos un asador de pollos a leña en Villena, 
comprometidos con la comunidad local y con la calidad de nuestros productos. 
Desde hace 20 años, ofrecemos la mejor comida y servicio a nuestros clientes, 
trabajando con proveedores españoles y asumiendo retos culinarios para crear nuevas 
experiencias gastronómicas. En nuestro asador creemos en el respeto hacia nuestros clientes, 
la comunidad y el medio ambiente. Ven a conocernos y disfruta de nuestra hospitalidad y deliciosos platos caseros.
')

@section('content')
<img src="/img/corporativa/maxtor/nosotros/el_equipo.jpg" class="sideImage" style="position: -20% 0 !important" alt="Foto del equipo Armenios que llevan el asador de pollos"
    style="object-position: top;">

<main class="quienes-somos">
    <h1 class="text-center my-5 py-5 fs-10 fuente-dancing">Ven a conocernos!<br>
        <i class="fuente-libre fs-4">Tu asador de pollos en Villena <br>con tus Armenios favoritos</i>
    </h1>
    <section class="my-5 py-5 container">
        <article>
            <div class="row">
                <div class="col-12 col-md-6">
                    <h2>Del fuego a tu mesa</h2>
                    <p>Nuestra historia comienza hace 20 años, cuando decidimos abrir nuestro propio asador de pollos a
                        leña en
                        Villena.
                        Aunque somos de una generación de Armenios, hemos vivido toda la vida aquí y siempre hemos
                        estado comprometidos con la comunidad local.</p>
                    <p>Desde el primer día, nuestro objetivo ha sido ofrecer la mejor comida y el mejor servicio a
                        nuestros clientes. Para lograrlo, trabajamos con proveedores 100% españoles que nos proporcionan
                        los mejores ingredientes y productos de la zona. Además, nos gusta asumir retos culinarios para
                        crear nuevos platos y ofrecer una experiencia gastronómica única.</p>
                    <p>Pero lo más importante para nosotros son nuestros clientes, quienes son como nuestra familia. Nos
                        encanta recibir a nuevos comensales y ver cómo regresan una y otra vez, ya que nos enorgullece
                        saber que disfrutan de nuestra comida y de nuestra hospitalidad. Es por eso que siempre nos
                        esforzamos por ofrecer un trato cercano y amable, respetando sus gustos y preferencias.</p>
                    <p>En "Asador la Morenica" creemos en el respeto, tanto hacia nuestros clientes como hacia la
                        comunidad y el medio ambiente. Por eso, trabajamos de manera sostenible y cuidamos cada detalle
                        para ofrecer una experiencia gastronómica de calidad.</p>
                </div>
                <div class="col-12 col-md-6 text-center text-danger">
                    <img src="/img/corporativa/maxtor/nosotros/la_fachada.jpg" class="rounded-4 img-fluid "
                        alt="La facahda del asador la morenica de pollos asados a la brasa en villena">
                </div>
            </div>
        </article>
    </section>


    <section class="my-5 py-5 bg-light3 container-fluid row">
        <div class="col-12 col-lg-4 text-light text-center">
            <img src="/img/corporativa/maxtor/nosotros/el_equipo.jpg" class="rounded-4 img-fluid "
                alt="El equipo que lleva y dirige el asador de pollos la morenica con leña">
        </div>
        <div class="py-5 col-12  col-lg-4 text-center esto">
            <p class="mx-5 fs-3 fst-italic">¿Quieres saber cuál es nuestro secreto para hacer el mejor pollo asado? <br>
                Ven a "Asador la Morenica" y te lo contamos entre risas y buen humor!</p>
        </div>
        <div class="col-12  col-lg-4 text-light text-center">
            <img src="/img/corporativa/maxtor/nosotros/los_duenyos.jpg" class="rounded-4 img-fluid "
                alt="Los dueños que llevan el asador 20 años e innovadores de la gastronomía villenera">
        </div>
    </section>


    <section class="my-2 container-fluid"> 
        <article class="my-2 py-5 row">
            <img src="/img/corporativa/maxtor/nosotros/la_fachada.jpg" class="rounded-5 img-fluid col-6 imagenLG d-none d-lg-block"
                alt="La facahda del asador la morenica de pollos asados a la brasa en villena">

            <div class="col-12 col-lg-6 esto text-center  my-2 margenLG1" >
                <h3 class="m-5 fs-3 fst-italic">Tenemos un salón para tus eventos!</h3>
                <p class="m-5 fs-4 fst-italic">Tienes una fiesta, amigos y familia, ¿pero no un lugar dónde reuniros? No te preocupes, justo al lado de nuestro asador
                    tenémos un Salón dónde podrás celebrar tu evento.
                </p>
                <p class="m-5 fs-4 fst-italic">
                    Y si nos encargas a nosotros la comida, te hacemos un descuento!
                </p>
                <a class="btn btn-outline-dark my-5 px-5">Próximamente</a>
            </div>
        </article>

        <article class="my-2 py-5 row">
            <div class="col-12 col-lg-6 esto text-center  my-2 margenLG2">
                <h3 class="m-5 fs-3 fst-italic">Nos gusta servirte todo lo que nos pides</h3>
                <p class="m-5 fs-4 fst-italic">
                    Nos encantan los retos culinarios. Si quiers algún plato, pizza, rustidera... y no lo ves en nuestra carta, preguntanos, a lo mejor te sorprendemos 
                </p>
                <p class="m-5 fs-4 fst-italic">
                    La mejor comida casera y original de la zona!
                </p>
                <a  class="btn btn-outline-dark my-5 px-5" href="{{route('contact')}}">Preguntanos</a>
            </div>
            <img src="/img/corporativa/maxtor/nosotros/nuestro_asador.jpg" class="img-fluid col-6 rounded-5 d-none d-lg-block"
                alt="El asador por dentro en vista panoramica y todos los platos servidor y el equipo esperando a sus clientes">

        </article>

    </section>



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
</main>

@endsection