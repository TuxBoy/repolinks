<fieldset>
    <form action="{{ route('link.store') }}" class="form" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <input type="text" placeholder="Votre URL" class="form-control" name="url" value="{{ old('url') }}">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="La description" name="description" value="{{ old('description') }}">
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