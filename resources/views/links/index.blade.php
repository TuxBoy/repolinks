@extends('application')

@section('content')

   <div class="container">
       <h1>Mes liens</h1>

       <div class="row">
           <div class="col-md-12">
               @if (count($links) < 1)
                   <p class="alert alert-danger">Vous n'avez pas encore de liens.</p>
               @endif
               @include('links.show')
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