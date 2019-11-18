
<div class="form-group {{ $errors->has('descrip') ? 'has-error' : '' }}">
    <label for="descrip" class="col-md-2 control-label">Detalle</label>
    <div class="col-md-10">
        <input class="form-control" name="descrip" type="text" id="descrip" value="{{ old('descrip', optional($detalle)->descrip) }}" minlength="1" placeholder="Registre descrip aquí...">
        {!! $errors->first('descrip', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('id_articulo') ? 'has-error' : '' }}">
    <label for="id_articulo" class="col-md-2 control-label">Id Articulo</label>
    <div class="col-md-10">
        <input class="form-control" name="id_articulo" type="text" id="id_articulo" value="{{ old('id_articulo', optional($detalle)->id_articulo) }}" min="1" max="2147483647" placeholder="Registre id articulo aquí...">
        {!! $errors->first('id_articulo', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('cantidad') ? 'has-error' : '' }}">
    <label for="cantidad" class="col-md-2 control-label">Cantidad</label>
    <div class="col-md-10">
        <input class="form-control" name="cantidad" type="text" id="cantidad" value="{{ old('cantidad', optional($detalle)->cantidad) }}" min="1" max="999999999" placeholder="Registre cantidad aquí..." step="any">
        {!! $errors->first('cantidad', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('precio') ? 'has-error' : '' }}">
    <label for="precio" class="col-md-2 control-label">Precio</label>
    <div class="col-md-10">
        <input class="form-control" name="precio" type="text" id="precio" value="{{ old('precio', optional($detalle)->precio) }}" min="1" max="999999999" placeholder="Registre precio aquí..." step="any">
        {!! $errors->first('precio', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('importe') ? 'has-error' : '' }}">
    <label for="importe" class="col-md-2 control-label">Importe</label>
    <div class="col-md-10">
        <input class="form-control" name="importe" type="text" id="importe" value="{{ old('importe', optional($detalle)->importe) }}" min="1" max="999999999" placeholder="Registre imptot aquí..." step="any">
        {!! $errors->first('importe', '<p class="help-block">:message</p>') !!}
    </div>
</div>

