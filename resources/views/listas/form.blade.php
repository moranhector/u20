
<div class="form-group {{ $errors->has('idarticulo') ? 'has-error' : '' }}">
    <label for="idarticulo" class="col-md-2 control-label">Idarticulo</label>
    <div class="col-md-10">
        <input class="form-control" name="idarticulo" type="text" id="idarticulo" value="{{ old('idarticulo', optional($lista)->idarticulo) }}" minlength="1" placeholder="Registre idarticulo aquí...">
        {!! $errors->first('idarticulo', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('Descripcion') ? 'has-error' : '' }}">
    <label for="Descripcion" class="col-md-2 control-label">Descripcion</label>
    <div class="col-md-10">
        <input class="form-control" name="Descripcion" type="text" id="Descripcion" value="{{ old('Descripcion', optional($lista)->Descripcion) }}" minlength="1" placeholder="Registre descripcion aquí...">
        {!! $errors->first('Descripcion', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('rubro') ? 'has-error' : '' }}">
    <label for="rubro" class="col-md-2 control-label">Rubro</label>
    <div class="col-md-10">
        <input class="form-control" name="rubro" type="text" id="rubro" value="{{ old('rubro', optional($lista)->rubro) }}" minlength="1" placeholder="Registre rubro aquí...">
        {!! $errors->first('rubro', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('precio2') ? 'has-error' : '' }}">
    <label for="precio2" class="col-md-2 control-label">Precio2</label>
    <div class="col-md-10">
        <input class="form-control" name="precio2" type="text" id="precio2" value="{{ old('precio2', optional($lista)->precio2) }}" minlength="1" min="-9" max="9" placeholder="Registre precio2 aquí...">
        {!! $errors->first('precio2', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('precio3') ? 'has-error' : '' }}">
    <label for="precio3" class="col-md-2 control-label">Precio3</label>
    <div class="col-md-10">
        <input class="form-control" name="precio3" type="text" id="precio3" value="{{ old('precio3', optional($lista)->precio3) }}" minlength="1" min="-9" max="9" placeholder="Registre precio3 aquí...">
        {!! $errors->first('precio3', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('precio4') ? 'has-error' : '' }}">
    <label for="precio4" class="col-md-2 control-label">Precio4</label>
    <div class="col-md-10">
        <input class="form-control" name="precio4" type="text" id="precio4" value="{{ old('precio4', optional($lista)->precio4) }}" minlength="1" min="-9" max="9" placeholder="Registre precio4 aquí...">
        {!! $errors->first('precio4', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('precio5') ? 'has-error' : '' }}">
    <label for="precio5" class="col-md-2 control-label">Precio5</label>
    <div class="col-md-10">
        <input class="form-control" name="precio5" type="text" id="precio5" value="{{ old('precio5', optional($lista)->precio5) }}" minlength="1" placeholder="Registre precio5 aquí...">
        {!! $errors->first('precio5', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('costo_ult_comp') ? 'has-error' : '' }}">
    <label for="costo_ult_comp" class="col-md-2 control-label">Costo Ult Comp</label>
    <div class="col-md-10">
        <input class="form-control" name="costo_ult_comp" type="text" id="costo_ult_comp" value="{{ old('costo_ult_comp', optional($lista)->costo_ult_comp) }}" minlength="1" placeholder="Registre costo ult comp aquí...">
        {!! $errors->first('costo_ult_comp', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('gasto') ? 'has-error' : '' }}">
    <label for="gasto" class="col-md-2 control-label">Gasto</label>
    <div class="col-md-10">
        <input class="form-control" name="gasto" type="text" id="gasto" value="{{ old('gasto', optional($lista)->gasto) }}" minlength="1" placeholder="Registre gasto aquí...">
        {!! $errors->first('gasto', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('item1') ? 'has-error' : '' }}">
    <label for="item1" class="col-md-2 control-label">Item1</label>
    <div class="col-md-10">
        <input class="form-control" name="item1" type="text" id="item1" value="{{ old('item1', optional($lista)->item1) }}" minlength="1" placeholder="Registre item1 aquí...">
        {!! $errors->first('item1', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('item2') ? 'has-error' : '' }}">
    <label for="item2" class="col-md-2 control-label">Item2</label>
    <div class="col-md-10">
        <input class="form-control" name="item2" type="text" id="item2" value="{{ old('item2', optional($lista)->item2) }}" minlength="1" placeholder="Registre item2 aquí...">
        {!! $errors->first('item2', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('item3') ? 'has-error' : '' }}">
    <label for="item3" class="col-md-2 control-label">Item3</label>
    <div class="col-md-10">
        <input class="form-control" name="item3" type="text" id="item3" value="{{ old('item3', optional($lista)->item3) }}" minlength="1" placeholder="Registre item3 aquí...">
        {!! $errors->first('item3', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('item4') ? 'has-error' : '' }}">
    <label for="item4" class="col-md-2 control-label">Item4</label>
    <div class="col-md-10">
        <input class="form-control" name="item4" type="text" id="item4" value="{{ old('item4', optional($lista)->item4) }}" minlength="1" placeholder="Registre item4 aquí...">
        {!! $errors->first('item4', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('set1') ? 'has-error' : '' }}">
    <label for="set1" class="col-md-2 control-label">Set1</label>
    <div class="col-md-10">
        <input class="form-control" name="set1" type="text" id="set1" value="{{ old('set1', optional($lista)->set1) }}" minlength="1" placeholder="Registre set1 aquí...">
        {!! $errors->first('set1', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('set2') ? 'has-error' : '' }}">
    <label for="set2" class="col-md-2 control-label">Set2</label>
    <div class="col-md-10">
        <input class="form-control" name="set2" type="text" id="set2" value="{{ old('set2', optional($lista)->set2) }}" minlength="1" placeholder="Registre set2 aquí...">
        {!! $errors->first('set2', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('set3') ? 'has-error' : '' }}">
    <label for="set3" class="col-md-2 control-label">Set3</label>
    <div class="col-md-10">
        <input class="form-control" name="set3" type="text" id="set3" value="{{ old('set3', optional($lista)->set3) }}" minlength="1" placeholder="Registre set3 aquí...">
        {!! $errors->first('set3', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('set4') ? 'has-error' : '' }}">
    <label for="set4" class="col-md-2 control-label">Set4</label>
    <div class="col-md-10">
        <input class="form-control" name="set4" type="text" id="set4" value="{{ old('set4', optional($lista)->set4) }}" minlength="1" placeholder="Registre set4 aquí...">
        {!! $errors->first('set4', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('proveedor') ? 'has-error' : '' }}">
    <label for="proveedor" class="col-md-2 control-label">Proveedor</label>
    <div class="col-md-10">
        <input class="form-control" name="proveedor" type="text" id="proveedor" value="{{ old('proveedor', optional($lista)->proveedor) }}" minlength="1" placeholder="Registre proveedor aquí...">
        {!! $errors->first('proveedor', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('artprov') ? 'has-error' : '' }}">
    <label for="artprov" class="col-md-2 control-label">Artprov</label>
    <div class="col-md-10">
        <input class="form-control" name="artprov" type="text" id="artprov" value="{{ old('artprov', optional($lista)->artprov) }}" minlength="1" placeholder="Registre artprov aquí...">
        {!! $errors->first('artprov', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('stockable') ? 'has-error' : '' }}">
    <label for="stockable" class="col-md-2 control-label">Stockable</label>
    <div class="col-md-10">
        <input class="form-control" name="stockable" type="text" id="stockable" value="{{ old('stockable', optional($lista)->stockable) }}" minlength="1" placeholder="Registre stockable aquí...">
        {!! $errors->first('stockable', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('marca') ? 'has-error' : '' }}">
    <label for="marca" class="col-md-2 control-label">Marca</label>
    <div class="col-md-10">
        <input class="form-control" name="marca" type="text" id="marca" value="{{ old('marca', optional($lista)->marca) }}" minlength="1" placeholder="Registre marca aquí...">
        {!! $errors->first('marca', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('empresa') ? 'has-error' : '' }}">
    <label for="empresa" class="col-md-2 control-label">Empresa</label>
    <div class="col-md-10">
        <input class="form-control" name="empresa" type="text" id="empresa" value="{{ old('empresa', optional($lista)->empresa) }}" minlength="1" placeholder="Registre empresa aquí...">
        {!! $errors->first('empresa', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('dtUltCambioPrecio') ? 'has-error' : '' }}">
    <label for="dtUltCambioPrecio" class="col-md-2 control-label">Dt Ult Cambio Precio</label>
    <div class="col-md-10">
        <input class="form-control" name="dtUltCambioPrecio" type="text" id="dtUltCambioPrecio" value="{{ old('dtUltCambioPrecio', optional($lista)->dtUltCambioPrecio) }}" minlength="1" placeholder="Registre dt ult cambio precio aquí...">
        {!! $errors->first('dtUltCambioPrecio', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('importado') ? 'has-error' : '' }}">
    <label for="importado" class="col-md-2 control-label">Importado</label>
    <div class="col-md-10">
        <input class="form-control" name="importado" type="text" id="importado" value="{{ old('importado', optional($lista)->importado) }}" minlength="1" placeholder="Registre importado aquí...">
        {!! $errors->first('importado', '<p class="help-block">:message</p>') !!}
    </div>
</div>

