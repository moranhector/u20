@extends('layouts.app')

@section('content')

    <div class="panel panel-default">

        <div class="panel-heading clearfix">
            
            <span class="pull-left">
                <h4 class="mt-5 mb-5 ">Nueva Factura {{ $tipofactura }} </h4>
            </span>




            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('facturas.factura.index') }}" class="btn btn-primary" title="Mostrar Factura">
                    <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                </a>
            </div>

        </div>

        <div class="panel-body">
        
            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif


            <!-- BARRA DE HERRAMIENTAS -->
            @if(Session::has('success_message'))
                <div class="alert alert-success">
                    <span class="glyphicon glyphicon-ok"></span>
                    {!! session('success_message') !!}


                    <div class="btn-group btn-group-sm pull-right" role="group">

                    <button type="button">
       
                        <a href="{!! session('link_impresion') !!}" class="btn btn-success" title="Imprimir Factura">
                            <span class="glyphicon glyphicon-print" aria-hidden="true"></span>
                        </a>

                    </button>
                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>                    

                    </div>

                </div>
            @else    
                <div class="alert alert-success">
                    <span class="glyphicon glyphicon-th btn-lg" ></span>
                    <span class="glyphicon glyphicon-print btn-lg" ></span>     






                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>                    



                </div>                


            @endif



            <form method="POST" action="{{ route('facturas.factura.store') }}" accept-charset="UTF-8" id="create_factura_form" name="create_factura_form" class="form-horizontal">
            {{ csrf_field() }}
            @include ('facturas.form', [
                                        'factura' => null,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input id="guardarfactura"  class="btn btn-primary" type="submit" value="Grabar Factura">
                    </div>
                </div>

            </form>

        </div>
    </div>








@endsection


