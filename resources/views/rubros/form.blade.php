
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">Name</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($rubro)->name) }}" minlength="1" maxlength="255" placeholder="Registre name aquí...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

