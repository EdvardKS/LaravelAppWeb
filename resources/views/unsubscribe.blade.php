@extends('layouts.public')

@section('title', 'Desuscribirse - Asador la Morenica')
@section('content')
<a href="https://www.google.com/maps/place/Asador+La+Morenica/@38.6418875,-0.8675394,15z/data=!4m6!3m5!1s0xd63df787f80d8db:0xed55f40214e65573!8m2!3d38.6418875!4d-0.8675394!16s%2Fg%2F11b7cjsx_8"
    Class="">
    <img src="/img/corporativa/sliders/contact_slider.png" class="sideImage"
        alt="Logo baner principal es el mapa de donde se situa el asador" /></a>

<main class="container my-5">

    </div>

    <h1 class="text-center">Te has borrado de nuestra newsletter ;(</h1>
    <div class="my-5 border-bottom text-center">
        <h2>Hemos eliminado tu suscripción de nuestra newsletter.</h2>
        <h2>Ya no recibiras más correo de www.asadorlamorenica.com</h2>
    </div>

	<script type="text/javascript">
		// Espera 10 segundos antes de redirigir
		setTimeout(function() {
			// Redirige a la página Home
			window.location.href = "{{ route('home') }}";
		}, 10000); // 10000 milisegundos = 10 segundos
	</script>

</main>
<div class="py-5"></div>

@endsection