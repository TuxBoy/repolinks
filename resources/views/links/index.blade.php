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
                               @if($link->favory)
                                   <div class="badge badge-info mr-sm-2">Favoris</div>
                               @endif
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
               <fieldset>
                   <form action="{{ route('link.store') }}" class="form" method="post">
                       {{ csrf_field() }}
                       <div class="form-group">
                           <input type="text" class="form-control" name="url" value="{{ old('url') }}">
                       </div>
                       <div class="form-group">
                           <select name="priority" id="" class="form-control">
                               <option value="normal">Normal</option>
                               <option value="hight">Haute</option>
                               <option value="low">Bas</option>
                           </select>
                       </div>
                       <div class="form-control">
                           <label class="custom-control custom-checkbox">
                               <input type="checkbox" name="favory" class="custom-control-input">
                               <span class="custom-control-indicator"></span>
                               <span class="custom-control-description">Favoris ?</span>
                           </label>
                       </div>
                       <p>
                           <button class="btn btn-primary" type="submit">Envoyer</button>
                       </p>
                   </form>
               </fieldset>
           </div>
       </div>
   </div>

@endsection