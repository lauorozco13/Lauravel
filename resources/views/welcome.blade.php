@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <h1>Lauravel</h1>
        <nav >
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="row">
        <form action="/messages/create" method="post">
            <div class="form-group @if($errors->has('message')) has-danger @endif">
                {{ csrf_field() }}
                <input type="text" name="message" placeholder="¿Qué estás pensando?" class="form-control">
                @if ($errors->any())
                    @foreach ($errors->get('message') as $error)
                        <div class="form-control-feedback">{{ $error }}</div>
                    @endforeach
                @endif
            </div>
        </form>
    </div>
    <div class="row">
        @forelse ($messages as $message)
            <div class="col-6">
                <img src="{{ $message->image }}" class="img-thumbnail">
                <p class="card-text">
                    {{ $message->content }}
                    <a href="/messages/{{ $message->id }}">Leer más</a>
                </p>
            </div>
        @empty
            <div class="col-12">
                <h2>
                    No hay mensajes destacados
                </h2>
            </div>
        @endforelse

        @if (count($messages))
        <div class="mt-4 mx-auto">
            {{ $messages->links() }}
        </div>
        @endif
    </div>
@endsection