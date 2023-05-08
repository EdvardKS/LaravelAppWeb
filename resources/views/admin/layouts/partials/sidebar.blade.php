<div class="list-group">

    <a href="{{ route('panel') }}"
        class="text-light text-center text-decoration-none fs-2 fuente-libre rounded my-4 bg-pollos">
        Asador la Morenica
    </a>

    <a href="{{ route('panel') }}" class="list-group-item list-group-item-action rounded my-2 ">
        Escritorio
    </a>
    <a href="{{ route('days.index') }}" class="list-group-item list-group-item-action rounded my-2 ">
        Horarios
    </a>
    <a href="{{ route('encargos.index') }}"
        class="list-group-item list-group-item-action rounded my-2 position-relative">
        Encargos
        <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
            <span class="visually-hidden">New alerts</span>
        </span>
    </a>
    <a href="{{ route('products.index') }}" class="list-group-item list-group-item-action rounded my-2 ">
        Productos
    </a>
    <a href="{{ route('categories.indexCrud') }}" class="list-group-item list-group-item-action rounded my-2 ">
        Categorías
    </a>
    <a href="{{ route('newsletters.index') }}" class="list-group-item list-group-item-action rounded my-2 ">
        Newsletter
    </a>
    <a href="{{ route('settings.index') }}" class="list-group-item list-group-item-action rounded my-2 ">
        Ajustes
    </a>
</div>