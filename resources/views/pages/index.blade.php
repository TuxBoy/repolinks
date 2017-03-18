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
                    @if ((!$link->private) || ($link->allowAccess()))
                    <div class="row">
                        <div class="info-user" data-toggle="tooltip" data-placement="left" title="Ajouté par {{ $link->user->name }}">
                            <a href="{{ route('link.user', $link->user) }}"><img src="http://lorempicsum.com/simpsons/350/200/1" class="rounded-circle avatar" alt=""></a>
                        </div>
                        <div class="col-md-10 list-group-item list-group-item-{{ $link->showPriority() }}" data-toggle="tooltip" title="{{ $link->description }}">
                            <a href="{{ $link->url }}" title="Accéder directement au site">{{ $link->url }}</a>
                            <div class="right">
                                {!! $link->favory ? '<div class="badge badge-info mr-sm-2">Favoris</div>' : '' !!}
                                {!! $link->private ? '<div class="badge badge-danger mr-sm-2">Privé</div>' : '' !!}

                                @if ($link->allowAccess())
                                    <form action="{{ route('link.destroy', $link) }}" class="link__delete" method="post">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="delete">
                                        <button type="submit" class="close" data-toggle="tooltip" data-placement="right" title="Supprimer le lien">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </form>
                                    <a href="{{ route('link.edit', $link) }}">Editer</a>
                                 @endif
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection