@extends('admin.layouts.private')

@section('content')
<div class="container">
    <h1>Enviar newsletter</h1>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('newsletters.send') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="subject">Asunto:</label>
            <input type="text" name="subject" id="subject" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="body">Contenido:</label>
            <textarea name="body" id="body" class="form-control" rows="10" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Enviar newsletter</button>
    </form>
</div>
@endsection
