@extends('layouts.public')

@section('title', 'Mapa Web - Asador la Morenica')

@section('description', '
Explora nuestro mapa web para encontrar todos los enlaces a las diferentes 
secciones en Asador de pollos la Morenica. Encuentra nuestros menús, promociones, ubicación 
y mucho más. En nuestro mapa web podrás navegar de manera fácil y encontrar lo que 
estás buscando en pocos clicks. 
¡Descubre todo lo que tenemos para ofrecer!
')

@section('content')
<img src="/img/corporativa/sliders/Fotor_AI.png" class="sideImage" alt="Logo email for send email" />

<div class="container">
    <h1 class="text-center my-5 py-5">
        <b class="fuente-dancing fs-10">Asador de pollos la Morenica</b><br>
        <i>para que no te pierdas ninguna de nuestras secciones</i><br></h1>
 
    <div class="row py-5 my-5">
        <div class="col-4">
            <h4>General</h4>
            <ul class="list-unstyled">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('makeOrder') }}">Encarganos</a></li>
                {{-- <li><a href="{{ route('products') }}">Productos</a></li> --}}
                <li><a href="{{ route('whoWeAre') }}">Quiénes somos</a></li>
                <li><a href="{{ route('contact') }}">Contacto</a></li>
            </ul>
        </div>
        <div class="col-4">
            <h4>Categorías</h4>
            <ul class="list-unstyled">
                <li><a href="{{ route('categories') }}">Categorías de productos</a></li>
                @foreach ($categories as $category)
                    @if ($category->name != 'Sin categoría')
                        <li><a href="{{ route('categories', ['categoria' => $category->id]) }}">{{ $category->name }}</a></li>
                    @endif
                @endforeach
            </ul>
        </div>
        <div class="col-4">
            <h4>Información legal</h4>
            <ul class="list-unstyled">
                <li><a href="{{ route('faqs') }}">Preguntas frecuentes</a></li>
                <li><a href="{{ route('privacyPolices') }}">Política de privacidad</a></li>
                <li><a href="{{ route('privacyCookies') }}">Política de cookies</a></li>
                <li><a href="{{ route('legalWarning') }}">Aviso legal</a></li>
                <li><a href="{{ route('unsubscribe') }}">Darse de baja</a></li>
            </ul>
        </div>
    </div>
</div>

@endsection