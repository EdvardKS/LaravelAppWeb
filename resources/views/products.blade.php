@extends('layouts.public')

@section('title', 'Nuestros productos - Asador la Morenica')
@section('description', '
Explora nuestra carta online, dónde encontrarás, menús, paellas, rustideras, croquetas, aperitivos, ensaladillas... 
Un rico manjar, con una gastronomía innovadora y casera. Disfruta la fusión de platos Españoles, Villeneros y Armenios.
¡No te pierdas nuestra comida asada y a la brasa a leña!
')
@section('content')
<img src="/img/corporativa/sliders/slider_prods.jpg" class="sideImage" alt="Logo email for send email" />

<div class="container">
    <h1 class="text-center fs-10 py-5 my-5 fuente-dancing border-bottom border-3">{{ $titulo }}
        <br>
        <i class="fuente-libre fs-4 ">Platos caseros con origen español y armenio</i>
    </h1>
    <section class="my-5 py-5">
        @php
        $categorPos = 0;
        @endphp

        @foreach ($productos as $producto)

        @php
        $categorPos++;
        @endphp 

        @if($producto->name != "Sin categoría")
        @php
        $imagen ='image-not-found.svg';
        if ($producto->image && file_exists(public_path('img/products/' . $producto->image))) {
            $imagen = $producto->image;
        }
        @endphp
        @if($categorPos % 2 == 0 )
        <article class="hov-bg my-5mt-5 bg-detail">
            @if( $titulo == "Asador la Morenica a la carta")
            <a class="row hrefOut" href="{{ route('categories') }}?categoria={{ $categorPos }}">
                @else
                <div class="row hrefOut">
                    @endif
                    <div class="col-12 col-md-6 order-1 order-md-1 ">
                        <img src="/img/products/{{ $imagen }}"
                            class="sideImage roounded-top rounded-md-end rounded-4" style="object-fit: cover;"
                            alt="{{ $producto->name }} de entre nuestra cómida casera innovadora" />
                    </div>

                    <div class="col-12 col-md-6 p-0 order-2 order-md-2 py-5">
                        <div class="d-flex flex-column">
                            <h3 class="mb-5 text-center fuente-dancing fs-7">
                                {{ $producto->name }}
                            </h3>
                            <p class="m-5 fuente-libre fs-4 text-center">
                                {{ $producto->description }}
                            </p>
                        </div>
                    </div>
                    @if($titulo == "Asador la Morenica a la carta")
            </a>
            @else
</div>
@endif
</article>

@else
<article class="hov-bg my-5 mt-5 bg-detail">
    @if( $titulo == "Asador la Morenica a la carta")
    <a class="row hrefOut" href="{{ route('categories') }}?categoria={{ $categorPos }}">
        @else
        <div class="row hrefOut">
            @endif
            <div class="col-12 col-md-6 p-0 order-2 order-md-1 py-5">
                <div class="d-flex flex-column">
                    <h3 class="mb-5 text-center fuente-dancing fs-7">
                        {{ $producto->name }}
                    </h3>
                    <p class="m-5 fuente-libre fs-4 text-center">
                        {{ $producto->description }}
                    </p>
                </div>
            </div>
            <div class="col-12 col-md-6 order-1 order-md-2">
                <img src="/img/products/{{ $imagen }}" class="sideImage rounded-top rounded-md-start rounded-4"
                    style="object-fit: cover;" alt="{{ $producto->name }} frito y al gusto" />
            </div>
            @if($titulo == "Asador la Morenica a la carta")
    </a>
    @else
    </div>
    @endif
</article>
@endif
@endif




@endforeach
</section>
</div>

@endsection