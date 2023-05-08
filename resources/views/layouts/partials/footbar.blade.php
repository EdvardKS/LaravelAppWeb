<a id="gotop" class="d-none"  javascript:void(0)>
  <img src="/img/corporativa/svg/black-arrow.svg" id="blackarrow" width="50" alt="Logo email for send email">
  <img src="/img/corporativa/svg/red-arrow.svg" id="redarrow" width="50" alt="Logo email for send email">   

</a>

<div class="bg-dark">

  <div style="height: 50px;" aria-label="Secondary nav">
  </div>


 <div class="container mb-3">
    <div class="row">
      <div class="col-lg-4 col-12 my-5 my-lg-0">
        <div class="d-flex align-items-center justify-content-center">
          <img src="/img/corporativa/logo-blanco.png" alt="Logo Asador la morenica" width="130" class="">
        </div>
        <div class="m-2">
          <div class="d-flex flex-row justify-content-evenly align-items-center">
            <a href="https://wa.me/34686536975?text=Hola! Me gustaría encargar..." class="ms-2 text-light">
              <img src="/img/corporativa/svg/whatsapp-b.svg" width="30" alt="Logo whatsapp for wirte text in whatsapp">
           
            </a>
            <a href="https://es-es.facebook.com/people/Asador-la-morenica/100064982920008/" class="ms-2 text-light">
              <img src="/img/corporativa/svg/facebook-b.svg" width="40" alt="Logo facebook for see the facebook page">
            </a>
            <a href="https://www.instagram.com/asadolamorenica/?hl=es" class="ms-2 text-light">
              <img src="/img/corporativa/svg/instagram-b.svg" width="30" alt="Logo instagram for see the instagram page">
            </a>
          </div>
        </div> 
      </div>

      <div class="col-lg-4 col-12 text-light ">
        <h5 class="text-start">Encuéntranos en...</h5> 
          <div class="d-flex align-items-start">
            <img src="/img/corporativa/svg/email.svg" width="20" alt="Logo email for send email">
            <a href="mailto:info@asadorlamorenica.com" class="footEl ms-2 text-light">info@asadorlamorenica.com</a>
          </div>
          <div class="d-flex align-items-center">
            <img src="/img/corporativa/svg/telephone.svg" width="20" alt="Logo telephone for call">
            <a href="tel:+34965813907" class="ms-2 text-light footEl">965813907</a>
            <a href="tel:+34686536975" class="ms-2 text-light footEl">686536975</a>
            {{-- <a href="https://wa.me/34657396036?text=Hola! Me gustaría encargar..." class="ms-2 text-light">Escribenos por whatsapp</a> --}}
          </div>
          <div class="d-flex align-items-center">
            <img src="/img/corporativa/svg/localization.svg" width="20" alt="Logo localization for see the ubication">
            <a href="https://www.google.com/maps/place/Asador+La+Morenica/@38.6418875,-0.8675394,15z/data=!4m6!3m5!1s0xd63df787f80d8db:0xed55f40214e65573!8m2!3d38.6418875!4d-0.8675394!16s%2Fg%2F11b7cjsx_8" Class="mx-2 footEl text-light">C/ Celada 72</a>
            <small >Villena (03400) Alicante</small>
          </div>
          <div class="d-flex align-items-center">
            <img src="/img/corporativa/svg/map.svg" width="20" alt="Logo localization for see the ubication">
            <a href="{{route('sitemap')}}" class="text-light ms-2 footEl">Mapa Web</a>
          </div>
      </div>



      <div class="col-lg-4 col-12  my-5 my-lg-0">
        <h5 class="text-start text-light">Suscribete a nuestra NewsLetter</h5>
          <form id="formNewsLetter"  action="{{ route('newsletter.store') }}" method="POST">
            @csrf
            <div class="input-group flex-nowrap my-2"> 
              <input type="email" class="form-control text-light bg-dark" placeholder="E-mail" aria-label="E-mail" aria-describedby="addon-wrapping" name="email" required>
              <span class="input-group-text" id="addon-wrapping"><img src="/img/corporativa/svg/mail.svg"  width="30" alt="Logo email"></span>
            </div>
            <div class="d-flex">
              <div class="input-group my-3 text-light">
                  <input class="form-check-input mx-2 mt-0 p-2 rounded-circle" type="checkbox" value="" aria-label="Checkbox for following text input" required>
               <small> Acepto las <a href="{{ route('privacyPolices') }}">política de privacidad</a></small>
              </div>
              <button type="submit" class="btn btn-light my-2">Suscribirse</button>
          </form>
        </div> 
        
        
      </div>
    </div>
 </div>



  <nav class="navbar navbar-expand-lg bg-dark footer" aria-label="Legal texts nav">
      <div class="container-fluid ">
        <div class="collapse navbar-collapse d-flex justify-content-center align-items-center" id="navbarNav">
          <ul class="navbar-nav">
              <li class="nav-item mx-3">
                  <a class="nav-link" href="{{ route('privacyPolices') }}"><small>Políticas de Privacidad</small></a>
                </li>
                <li class="nav-item mx-3">
                  <a class="nav-link" href="{{ route('privacyCookies') }}"><small>Políticas de Cookies</small></a> 
                </li>  
                <li class="nav-item mx-3">
                  <a class="nav-link" href="{{ route('legalWarning') }}"><small>Aviso Legal</small></a>
                </li>
                <li class="nav-item mx-3">
                  <a class="nav-link" href="{{ route('faqs') }}"><small>Faq's</small></a>
                </li>
          </ul>
        </div>
      </div>
  </nav>

</div>