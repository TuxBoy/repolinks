@extends('application')

@section('content')

    <div class="container">
        <h1>Editer votre lien</h1>
        <fieldset>
            <form action="{{ route('link.update', $link) }}" class="form" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="put">
                <div class="form-group">
                    <input type="text" placeholder="Votre URL" class="form-control" name="url" value="{{ old('url', $link->url) }}">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="La description" name="description" value="{{ old('description', $link->description) }}">
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
                        <input type="checkbox" name="favory" {{ $link->favory ? 'checked' : '' }} class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description">Favoris ?</span>
                    </label>
                    <label class="custom-control custom-checkbox">
                        <input type="checkbox" name="private" {{ $link->private ? 'checked' : '' }} class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description">Privé ?</span>
                    </label>
                </div>
                <p>
                    <button class="btn btn-primary" type="submit">Envoyer</button>
                </p>
            </form>
        </fieldset>
    </div>

@endsection