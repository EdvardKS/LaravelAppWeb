@extends('admin.layouts.private')

@section('content')
<div class="container">
    <h1>Ajustes</h1>

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <form method="POST" action="/panel/home-settings">
        @csrf
        <div class="container mb-5">
            <div class="col-6">
                <h3>Menús</h3>
                <div class="form-group">
                    <div class="col-10">
                        <label for="home_uno_uno">Primer menú</label>
                        <select name="home_uno_uno" class="form-select">
                            @foreach($menus as $menu)
                            <option value="{{ $menu->image }}" @if($menu->image == $settings->where('lugar',
                                'home_uno_uno')->first()->image) selected @endif>{{ $menu->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-10">
                        <label for="home_uno_dos">Segundo menú</label>
                        <select name="home_uno_dos" class="form-select">
                            @foreach($menus as $menu)
                            <option value="{{ $menu->image }}" @if($menu->image == $settings->where('lugar',
                                'home_uno_dos')->first()->image) selected @endif>{{ $menu->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-10">
                        <label for="home_uno_tres">Tercer menú</label>
                        <select name="home_uno_tres" class="form-select">
                            @foreach($menus as $menu)
                            <option value="{{ $menu->image }}" @if($menu->image == $settings->where('lugar',
                                'home_uno_tres')->first()->image) selected @endif>{{ $menu->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <h3 class="mt-5">Categorías</h3>
                <div class="form-group">

                    <div class="col-10">
                        <label for="home_dos_uno">Primera categoría</label>
                        <select name="home_dos_uno" class="form-select">
                            @foreach($categories as $category)

                            <option value="{{ $category->image }}" @if($category->image == $settings->where('lugar',
                                'home_dos_uno')->first()->image) selected @endif>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-10">
                        <label for="home_dos_dos">Segunda categoría</label>
                        <select name="home_dos_dos" class="form-select">
                            @foreach($categories as $category)
                            <option value="{{ $category->image }}" @if($category->image == $settings->where('lugar',
                                'home_dos_dos')->first()->image) selected @endif>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-10">
                        <label for="home_dos_tres">Tercera categría</label>
                        <select name="home_dos_tres" class="form-select">
                            @foreach($categories as $category)
                            <option value="{{ $category->image }}" @if($category->image == $settings->where('lugar',
                                'home_dos_tres')->first()->image) selected @endif>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-10">
                        <label for="home_dos_cuatro">Cuarta categría</label>
                        <select name="home_dos_cuatro" class="form-select">
                            @foreach($categories as $category)
                            <option value="{{ $category->image }}" @if($category->image == $settings->where('lugar',
                                'home_dos_cuatro')->first()->image) selected @endif>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-5">Guardar</button>
        </div>



    </form>
</div>

@endsection