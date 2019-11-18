@extends('layouts.app')

@section('content')

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->

<!-- Split button -->
<div class="btn-group">
  <button class="btn btn-primary btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
   Mes analizado: periodo  Seleccionar Mes <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
    <li><a href={{ url('/home') }}>Mes Actual</a></li>
    <li><a href={{ url('/home') }}>Mes Anterior</a></li>
    <li role="separator" class="divider"></li>
    <li><a href={{ url('/home') }}>Octubre</a></li>

  </ul>
</div>





      <!-- primera fila -->

      <div class="row">


          <div class="col-md-8">

          

              <div class="panel panel-default" style="box-shadow: 6px 20px 10px black; margin-top: 5px; margin-bottom: 5px " >
                  <div class="panel-heading">
                      <div>
                         <img src="/images/logo-small.png" alt="Ubik ">
                      </div>
                  

                  </div>
                  <div class="panel-body">
                  <b>Panel de Control </b>  <br>              
                  MES:  <br>
                  Cantidad de Facturas: 1240                
                  <br> 
                  Monto de Facturación:                              
                  </div>
              </div>
          </div>       



      </div>






      <div class="row">


          <div class="col-md-4">
              <div class="panel panel-default" style="box-shadow: 6px 20px 10px black; margin-top: 5px; margin-bottom: 5px " >
                  <div class="panel-heading"><b>Facturación</b>
                  </div>
                  <div class="panel-body">
                          <canvas id="canvas3" height="280" width="400"></canvas>
                  </div>
              </div>
          </div>       

          <div class="col-md-4">
            <div class="panel panel-default" style="box-shadow: 6px 20px 10px black; margin-top: 5px; margin-bottom: 5px " >
                <div class="panel-heading"><b>Clientes</b>
                </div>
                <div class="panel-body">
                        <canvas id="canvasAnios" height="280" width="400"></canvas>
                </div>
            </div>
          </div>  

      </div>

      <!-- segunda fila -->


      <div class="row">

       


            <div class="col-md-4">
              <div class="panel panel-default" style="box-shadow: 6px 20px 10px black; margin-top: 5px; margin-bottom: 5px " >            


                <div class="panel-heading"><b>Artículos</b></div>
                
                <div>
                  <div class="inner" align="center" >
                    <h1>   </h1>

                    <p>Artículos más vendidos</p>
                  </div>

                </div>

      
                </div>
            </div>  



            <div class="col-md-4">
              <div class="panel panel-default" style="box-shadow: 6px 20px 10px black; margin-top: 5px; margin-bottom: 5px " >            


                <div class="panel-heading"><b>Vendedores</b></div>
                
                <div>
                <div class="inner" align="center" >
                    <h1>    </h1>

                    <p>Vendedores</p>
                  </div>

                </div>

      
                </div>
            </div>  

      </div>      

 



</section>



 



</body>


@endsection












</html>