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
            @include('links.show')
        </div>
    </div>
</div>

@endsection