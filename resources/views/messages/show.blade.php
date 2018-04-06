@extends('layouts.app')

@section('content')
	<h1 class="h3">Mensaje id: {{ $message->id }}</h1>
    <img src="{{ $message->image }}" class="img-thumbnail">
    <p class="card-text">
    	{{ $message->content }}
    	<small class="tex-view">{{ $message->created_at }}</small>
    </p>
@endsection