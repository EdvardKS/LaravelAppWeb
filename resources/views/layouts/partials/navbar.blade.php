<div class="d-flex justify-content-between align-items-center px-2 py-3 my-0 bg-grisSuave">
  <div class="">
    <div class="d-flex align-items-center">
      <a href="tel:+34686536975" class="text-dark elHover" style="text-decoration:none"><h6>Llámanos 686536975</h6></a>
    </div>
  </div>
  <div>
    <a href="https://wa.me/34686536975?text=Hola! Me gustaría encargar..." class="ms-3 text-light">
      <img src="/img/corporativa/svg/whatsapp.svg" width="22" class="bgHover" alt="Logo whatsapp for wirte text in whatsapp">
    </a>
    <a href="https://es-es.facebook.com/people/Asador-la-morenica/100064982920008/" class="ms-2 text-light">
      <img src="/img/corporativa/svg/facebook.svg" width="25" class="bgHover" alt="Logo facebook for see the facebook page">
    </a>
    <a href="https://www.instagram.com/asadolamorenica/?hl=es" class="ms-2 text-light">
      <img src="/img/corporativa/svg/instagram.svg" width="25" class="bgHover" alt="Logo instagram for see the instagram page">
    </a>

  </div>

</div>

<nav id="navbar-general" class="navbar navbar-light bg-light d-flex justify-content-center align-items-center">
  {{-- fixed-top barra-navegacion  clases para hacerlo fijo arriba y que el contenido se respete debajo del nav. No va bien en modo movil--}}
  <div class="container-fluid justify-content-center justify-content-md-around flex-column flex-md-row">


    <a class="navbar-brand" href="/">
      <div class="d-flex align-items-center flex-column flex-md-row">
        <img src="/img/corporativa/logo-negro-web.png" alt="Asador la Morenica" width="130" class="">
      </div>
    </a>


    <a class="navbar-brand" href="/">
      <div class="d-flex flex-column">
        <span class="fuente-libre fs-1">Asador la Morenica</span>
        <span class="fuente-dancing text-center fs-2">En horno de leña</span>
      </div>
    </a>

    <button class="navbar-toggler d-flex flex-column justify-content-around collapsed" style="margin: 0 28px;" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="toggler-icon  top-bar"></span>
      <span class="toggler-icon middle-bar"></span>
      <span class="toggler-icon bottom-bar"></span>
    </button>

  </div>


  <div class="collapse w-75" id="navbarToggleExternalContent">
    <div class="bg-light p-4">
      <ul class="navbar-nav text-center me-auto mb-2 ms-0 ms-md-5">
        <li class="nav-item nav-hover">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item nav-hover">
          <a class="nav-link" href="{{ route('makeOrder') }}">Encarganos</a>
        </li>
        <li class="nav-item nav-hover">
          <a class="nav-link" href="{{ route('categories') }}">Productos</a>
        </li>
        <li class="nav-item nav-hover">
          <a class="nav-link" href="{{ route('whoWeAre') }}">Quienes Somos</a>
        </li>
        <!-- <li class="nav-item nav-hover">
          <a class="nav-link" href="/opinions">Opiniones</a>
        </li> -->
        <li class="nav-item nav-hover">
          <a class="nav-link" href="{{ route('contact') }}">Contacto</a>
        </li>
      </ul>
    </div>
  </div>
</nav>