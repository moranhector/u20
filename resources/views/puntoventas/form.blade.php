
<div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
    <label for="nombre" class="col-md-2 control-label">Nombre de Fantasía</label>
    <div class="col-md-10">
        <input class="form-control" name="nombre" type="text" id="nombre" value="{{ old('nombre', optional($puntoventa)->nombre) }}" minlength="1" placeholder="Registre nombre aquí...">
        {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('numero') ? 'has-error' : '' }}">
    <label for="numero" class="col-md-2 control-label">Número</label>
    <div class="col-md-10">
        <input class="form-control" name="numero" type="text" id="numero" value="{{ old('numero', optional($puntoventa)->numero) }}" min="4" placeholder="Registre número aquí...">
        {!! $errors->first('numero', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('sistema') ? 'has-error' : '' }}">
    <label for="sistema" class="col-md-2 control-label">Sistema</label>
    <div class="col-md-10">
        <select class="form-control" id="sistema" name="sistema">
        	    <option value="" style="display: none;" {{ old('sistema', optional($puntoventa)->sistema ?: '') == '' ? 'selected' : '' }} disabled selected>Registre sistema aquí...</option>
        	@foreach (['Factura Electrónica' => 'Factura Electrónica',
            'Factura Manual' => 'Factura Manual',
            'Controlador Fiscal' => 'Controlador Fiscal'] as $key => $text)
			    <option value="{{ $key }}" {{ old('sistema', optional($puntoventa)->sistema) == $key ? 'selected' : '' }}>
			    	{{ $text }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('sistema', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('domicilio') ? 'has-error' : '' }}">
    <label for="domicilio" class="col-md-2 control-label">Domicilio</label>
    <div class="col-md-10">
        <input class="form-control" name="domicilio" type="text" id="domicilio" value="{{ old('domicilio', optional($puntoventa)->domicilio) }}" minlength="1" placeholder="Registre domicilio aquí...">
        {!! $errors->first('domicilio', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('fechadesde') ? 'has-error' : '' }}">
    <label for="fechadesde" class="col-md-2 control-label">Fecha Desde</label>
    <div class="col-md-10">
        <input class="form-control" name="fechadesde" type="date" id="fechadesde" value="{{ old('fechadesde', optional($puntoventa)->fechadesde) }}" placeholder="Registre fechadesde aquí...">
        {!! $errors->first('fechadesde', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('habilitado') ? 'has-error' : '' }}">
    <label for="habilitado" class="col-md-2 control-label">Habilitado</label>
    <div class="col-md-10">
        <input class="checkbox" name="habilitado" type="checkbox" id="habilitado" value="{{ old('habilitado', optional($puntoventa)->habilitado) }}"  >
        {!! $errors->first('habilitado', '<p class="help-block">:message</p>') !!}
    </div>
</div>

