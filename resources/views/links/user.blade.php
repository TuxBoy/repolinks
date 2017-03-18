@extends('application')

@section('content')

    <div class="container">
        <h1>Tous les liens de {{ $user->name }}</h1>

        <div class="row">
            <div class="col-md-12">
                @if (count($links) < 1)
                    <p class="alert alert-danger">Vous n'avez pas encore de liens.</p>
                @endif
                @include('links.show')
            </div>
        </div>
    </div>

@endsection