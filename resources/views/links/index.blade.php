@extends('application')

@section('content')

   <div class="container">
       <h1>Mes liens</h1>

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
                               {!! $link->favory ? '<div class="badge badge-info mr-sm-2">Favoris</div>' : '' !!}
                               {!! $link->private ? '<div class="badge badge-danger mr-sm-2">Privé</div>' : '' !!}
                               <form action="{{ route('link.destroy', $link) }}" class="link__delete" method="post">
                                   {{ csrf_field() }}
                                   <input type="hidden" name="_method" value="delete">
                                   <button type="submit" class="close" data-toggle="tooltip" data-placement="right" title="Supprimer le lien">
                                       <span aria-hidden="true">&times;</span>
                                   </button>
                               </form>
                           </div>
                       </a>
                   @endforeach
               </div>
           </div>
       </div>
       <br><br>
       {{ $links->links() }}
       <hr><br><br><br>
       <div class="row">
           <div class="col-md-12">
               <h2>Ajouter un lien</h2>
               @include('links.form')
           </div>
       </div>
   </div>

@endsection