@extends('application')

@section('content')

<div class="jumbotron">
    <div class="container">
        <h1>Partager vos découvertes</h1>
        <p>Vous avez trouvé un site sympa ? Vous voulez garder le lien ? Ou même paratger votre découverte ?</p>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if (auth()->user())
                <p><a href="{{ route('link.index') }}" class="btn btn-outline-primary">Ajouter un lien</a></p>
            @endif
            <h2>Tous les liens :</h2>
            <div class="list-group links">
                @foreach($links as $link)
                    <div class="row">
                        <div class="info-user" data-toggle="tooltip" data-placement="left" title="Ajouté par {{ $link->user->name }}">
                            <a href="{{ route('link.user', $link->user) }}"><img src="http://lorempicsum.com/simpsons/350/200/1" class="rounded-circle avatar" alt=""></a>
                        </div>
                        <a class="col-md-10 list-group-item list-group-item-{{ $link->showPriority() }}" href="{{ $link->url }}">{{ $link->url }}</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection