@extends('application')

@section('content')

    <div class="container">
        <h1>Tous les liens de {{ $user->name }}</h1>

        <div class="row">
            <div class="col-md-12">
                <div class="list-group links">
                    @if (count($links) < 1)
                        <p class="alert alert-danger">Vous n'avez pas encore de liens.</p>
                    @endif
                    @foreach($links as $link)
                        <a href="{{ $link->url }}" class="list-group-item list-group-item-{{ $link->showPriority() }}">
                            {{ $link->url }}
                            <div class="right">
                                @if($link->favory)
                                    <div class="badge badge-info mr-sm-2">Favoris</div>
                                @endif
                                <form action="{{ route('link.destroy', $link) }}" class="link__delete" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="delete">
                                    @if (auth()->user()->id == $user->id)
                                        <button type="submit" class="close" data-toggle="tooltip" data-placement="right" title="Supprimer le lien">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    @endif
                                </form>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection