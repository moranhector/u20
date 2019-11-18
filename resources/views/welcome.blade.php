<!--A Design by W3layouts
   Author: W3layout
   Author URL: http://w3layouts.com
   License: Creative Commons Attribution 3.0 Unported
   License URL: http://creativecommons.org/licenses/by/3.0/
   -->
   <!DOCTYPE html>
<html lang="zxx">
   <head>
      <title>Factura Electrónica alineada a su empresa</title>
      <!--meta tags -->
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="keywords" content="Economy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
         Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
      <script>
         addEventListener("load", function () {
         	setTimeout(hideURLbar, 0);
         }, false);
         
         function hideURLbar() {
         	window.scrollTo(0, 1);
         }
      </script>
      <!--//meta tags ends here-->
      <!--booststrap-->
      <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
      <!--//booststrap end-->
      <!-- font-awesome icons -->
      <link href="css/font-awesome.min.css" rel="stylesheet">
      <!-- //font-awesome icons -->
      <!--stylesheets-->
      <link href="css/w3style.css" rel='stylesheet' type='text/css' media="all">
      <!--//stylesheets-->
      <link href="//fonts.googleapis.com/css?family=Titillium+Web:400,600,700" rel="stylesheet">
      <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600" rel="stylesheet">
   </head>
   <body>
      <div class="main-top" id="home">
         <!-- header -->
         <div class="headder-top">
            <div class="container-fluid">
               <!-- nav -->
               <nav >
                  <div id="logo">
                     <h1><a class="" href="index.html"><span class="fa mr-2" aria-hidden="true"></span>Ubik</a></h1>
                  </div>
                  <label for="drop" class="toggle">Menu</label>
                  <input type="checkbox" id="drop">
                  <ul class="menu mt-2">
                     <li><a class="active" href="index.html">Inicio</a></li>
                     <li class="mx-lg-3 mx-md-2 my-md-0 my-1"><a href="about.html">Acerca de</a></li>
                     <li><a href="service.html">Servicios</a></li>
                     <li class="mx-lg-3 mx-md-2 my-md-0 my-1">
                        <!-- First Tier Drop Down -->
                        <label for="drop-2" class="toggle toogle-2">Precios <span class="fa fa-angle-down" aria-hidden="true"></span>
                        </label>
                        <a href="#">Precios<span class="fa fa-angle-down" aria-hidden="true"></span></a>
                        <input type="checkbox" id="drop-2">
                        <ul>
                           <li><a href="gallery.html" class="drop-text">Galería</a></li>
                           <li><a href="#prices" class="drop-text">Precios y planes</a></li>
                        </ul>
                     </li>
                     <li><a href="contact.html">Contacto</a></li>


                        @if (Route::has('login'))
  
                              @auth
                                    <li><a href="{{ url('/home') }}">Facturacion</a></li>
                              @else
                             
                                    <li><a href="{{ route('login') }}">Login</a></li>                                    

                                    @if (Route::has('register'))
                                       <li><a href="{{ route('register') }}">Home</a></li>                                           
                                    @endif
                              @endauth

                        @endif




                  </ul>
               </nav>
               <!-- //nav -->
            </div>
         </div>
         <!-- //header -->
         <!-- banner -->
         <div class="main-banner">
            <div class="container">
         
               <div class="style-banner text-right"  >
                  <h4 class="mb-2" style="background-color: rgba(0,0,0,.5)" >U2 Facturación Electrónica</h4>
                  <h2 class="text-right" style="color:white;background-color: rgba(0,0,0,.5)"  >Alineada a los datos de su empresa, sus clientes y sus productos </h2>
               </div>

            </div>
         </div>
      </div>
      <!-- //banner -->
      <!-- about -->
      <section class="about py-lg-4 py-md-3 py-sm-3 py-3" id="about">
         <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
            <h3 class="title text-center mb-md-4 mb-sm-3 mb-3 mb-2">Quienes somos</h3>
            <div class="title-wls-text text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3">
               <p>Desarrollamos sistemas que mejoren las oportunidades de crecimiento de los negocios 
               </p>
            </div>
            <div class="row pt-lg-5 pt-md-4 pt-3">
               <div class="col-lg-3 col-md-6 text-center col-sm-6 corpo-about ">
                  <div class="position-relative about-top-grid">
                     <div class="about-icon-position">
                        <img src="images/icon1.png" alt="" class="img-fluid">
                     </div>
                     <div class="about-img-top">
                        <img src="images/a1.jpg" alt="" class="img-fluid">
                     </div>
                     <div class="about-wthree-about text-center mt-lg-4 mt-3">
                        <h5>Entrevistas gratuitas</h5>
                        <p class="mt-2">Nos interesamos en las reales necesidades de nuestros clientes</p>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6 col-sm-6 text-center corpo-about ">
                  <div class="position-relative about-top-grid">
                     <div class="about-icon-position">
                        <img src="images/icon2.png" alt="" class="img-fluid">
                     </div>
                     <div class="about-img-top">
                        <img src="images/a2.jpg" alt="" class="img-fluid">
                     </div>
                     <div class="about-wthree-about text-center mt-lg-4 mt-3">
                        <h5>Desarrollo Colaborativo</h5>
                        <p class="mt-2">Desarollamos los sistema en colaboración con tu gente</p>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6 col-sm-6 text-center corpo-about ">
                  <div class="position-relative about-top-grid">
                     <div class="about-icon-position">
                        <img src="images/icon3.png" alt="" class="img-fluid">
                     </div>
                     <div class="about-img-top">
                        <img src="images/a3.jpg" alt="" class="img-fluid">
                     </div>
                     <div class="about-wthree-about text-center mt-lg-4 mt-3">
                        <h5>Soporte Técnico
                        </h5>
                        <p class="mt-2">Capacitamos a tu personal y le resolvemos las dudas</p>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6 col-sm-6 text-center corpo-about ">
                  <div class="position-relative about-top-grid">
                     <div class="about-icon-position">
                        <img src="images/icon4.png" alt="" class="img-fluid">
                     </div>
                     <div class="about-img-top">
                        <img src="images/a4.jpg" alt="" class="img-fluid">
                     </div>
                     <div class="about-wthree-about text-center mt-lg-4 mt-3">
                        <h5>Crecimiento Contínuo</h5>
                        <p class="mt-2">El Sistema va creciendo con las necesidades de tu empresas</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- about  -->
      <!-- service -->
      <section class="service py-lg-4 py-md-3 py-sm-3 py-3" id="service">
         <div class="container py-lg-5 py-md-5 py-sm-4 py-3">
            <h3 class="title text-center mb-md-4 mb-sm-3 mb-3 mb-2 clr">Nuestros Servicios</h3>
            <div class="title-wls-text title-white text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3">
               <p >Somos expertos en integrar las bases de datos actuales de tu empresa
               </p>
            </div>
            <div class="row">
               <div class="col-lg-4 ser-blog-grid">
                  <div class="ser-sevice-grid">
                     <div class="sevice-w3layouts-inner">
                        <span class="fa fa-hand-peace-o" aria-hidden="true"></span>
                     </div>
                     <div class="sevice-ser-txt">
                        <h4 class="py-3">Migraciones de Bases de Datos</h4>
                        <p>Ya sea que los datos de tus clientes estén en planillas Excel, o en servidores Sql Server, nosotros podemos integrarlos</p>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 ser-blog-grid">
                  <div class="ser-sevice-grid">
                     <div class="sevice-w3layouts-inner">
                        <span class="fa fa-search" aria-hidden="true"></span>
                     </div>
                     <div class="sevice-ser-txt">
                        <h4 class="py-3">Diseño inteligente</h4>
                        <p>Las funciones más utilizadas de un sistema de facturación moderno a tu alcance</p>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 ser-blog-grid">
                  <div class="ser-sevice-grid">
                     <div class="sevice-w3layouts-inner">
                        <span class="fa fa-bar-chart" aria-hidden="true"></span>
                     </div>
                     <div class="sevice-ser-txt">
                        <h4 class="py-3">Gráficos y Tableros de Comandos</h4>
                        <p>Revisá el desempeño de tus ventas y la evolución de tu inventario en gráficos dinámicos todos los días</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!--// service -->
      <!-- price -->
      <section class="price py-lg-4 py-md-3 py-sm-3 py-3" id="prices">
         <div class="container py-lg-5 py-md-5 py-sm-4 py-3">
            <h3 class="title text-center mb-md-4 mb-sm-3 mb-3 mb-2">Nuestros Precios</h3>
            <div class="title-wls-text text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3">
               <p >Llamanos, podemos darte el mejor plan para acceder al mejor sistema </p>
            </div>
            <div class="row">
               <div class="col-lg-3 col-md-6 col-sm-6 pricing-grid">
                  <div class="w3ls-bottom grid-two">
                     <div class="price-images">
                        <div class="table-txt-grid">
                           <h4>Monotributista</h4>
                        </div>
                        <div class="my-lg-4 my-3 price-w3layouts-table">
                           <h4> <span class="sup">$</span><span class="number-price">1900</span> / mes </h4>
                        </div>
                        <div class="price-list-txt">
                           <ul class="count">
                              <li>Para profesionales </li>
                              <li>Artesanos</li>
                              <li>Cuentapropistas</li>
                              <li>Contratados</li>
                              <li>Con ambiciones </li>
                           </ul>
                        </div>
                        <div class="view-price mt-3">
                           <a href="contact.html" class=" scroll">Solicitar</a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6 col-sm-6 pricing-grid">
                  <div class="w3ls-bottom grid-two">
                     <div class="price-images">
                        <div class="table-txt-grid">
                           <h4>Responsables Inscriptos</h4>
                        </div>
                        <div class="my-lg-4 my-3 price-w3layouts-table">
                           <h4> <span class="sup">$</span><span class="number-price">6000</span> / mes </h4>
                        </div>
                        <div class="price-list-txt">
                           <ul class="count">
                              <li>Comercios </li>
                              <li>Pymes </li>
                              <li>Estudios</li>
                              <li>Profesionales</li>
                              <li>Servicios </li>
                           </ul>
                        </div>
                        <div class="view-price mt-3">
                           <a href="contact.html" class=" scroll">Solicitar</a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6 col-sm-6 pricing-grid">
                  <div class="w3ls-bottom grid-one">
                     <div class="price-images">
                        <div class="table-txt-grid color-white">
                           <h4>Industria</h4>
                        </div>
                        <div class="my-lg-4 my-3 price-w3layouts-table">
                           <h4> <span class="sup">$</span><span class="number-price">12000</span> / mes </h4>
                        </div>
                        <div class="price-list-txt price-grid-one">
                           <ul class="count">
                              <li>Inventarios </li>
                              <li>Remitos </li>
                              <li>Clientes</li>
                              <li>Cheques</li>
                              <li>Producción </li>
                           </ul>
                        </div>
                        <div class="view-price color-black mt-3 ">
                           <a href="contact.html" class=" scroll">Solicitar</a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6 col-sm-6 pricing-grid">
                  <div class="w3ls-bottom grid-two">
                     <div class="price-images">
                        <div class="table-txt-grid">
                           <h4>FULL</h4>
                        </div>
                        <div class="my-lg-4 my-3 price-w3layouts-table">
                           <h4> <span class="sup">$</span><span class="number-price">Desde 20000</span> / mes </h4>
                        </div>
                        <div class="price-list-txt">
                           <ul class="count">
                              <li>Servidor Propio </li>
                              <li>Funciones a medida </li>
                              <li>Soporte preferencial</li>
                              <li>Interfaces</li>
                              <li>Grandes volúmenes </li>
                           </ul>
                        </div>
                        <div class="view-price mt-3">
                           <a href="contact.html" class=" scroll">Book Now</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- //price -->
      <!-- bussiness-tip -->
      <section class="busness-tip" id="busness-tip">
         <div class="container-fluid">
            <div class="row">
               <div class="col-lg-3 col-md-6 col-sm-6 busness-tip-one pl-sm-0">
               </div>
               <div class="col-lg-3 col-md-6 col-sm-6 mid-text-info">
                  <h4 class="mb-lg-4 mb-3">Facturación</h4>
                  <p>Para Responsables Inscriptos y Monotributistas. Integrado a su base de clientes y Códigos de productos y servicios
                  </p>
               </div>
               <div class="col-lg-3 col-md-6 col-sm-6 busness-tip-two pr-sm-0">
               </div>
               <div class="col-lg-3 col-md-6 col-sm-6 mid-text-info">
                  <h4 class="mb-lg-4 mb-3">Clientes</h4>
                  <p>Gestión de Clientes con validación de CUIT, y envío de facturas por e-mail
                  </p>
               </div>
            </div>
            <div class="row">
               <div class="col-lg-3 col-md-6 col-sm-6 mid-text-info">
                  <h4 class="mb-lg-4 mb-3">Inventarios</h4>
                  <p>Actualización integrada de los inventarios, rankings de artículos más vendidos, puntos de stock mínimo con alertas.
                  </p>
               </div>
               <div class="col-lg-3 col-md-6 col-sm-6 busness-tip-two pr-sm-0">
               </div>
               <div class="col-lg-3 col-md-6 col-sm-6 mid-text-info">
                  <h4 class="mb-lg-4 mb-3">Reportes</h4>
                  <p>Cheques vencidos por cobrar, Informe de IVA Ventas y Compras para AFIP, ranking de clientes, etc.
                  </p>
               </div>
               <div class="col-lg-3 col-md-6 col-sm-6 busness-tip-one pl-sm-0">
               </div>
            </div>
         </div>
      </section>
      <!--//bussiness-tip -->
      <!-- clients  
      <section class="clients py-lg-4 py-md-3 py-sm-3 py-3" id="clients">
         <div class="container py-lg-5 py-md-5 py-sm-4 py-3">
            <h3 class="title text-center mb-md-4 mb-sm-3 mb-3 mb-2">Nuestros Clientes</h3>
            <div class="title-wls-text text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3">
               <p >Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et Lorem ipsum </p>
            </div>
            <div class="row">
               <div class="col-lg-6 col-md-6 col-sm-6 clients-row-grid">
                  <div class="client-txt-color txt-center">
                     <p class="mb-md-4 mb-sm-3 mb-2"><span class="fa fa-quote-left" aria-hidden="true"></span> Lorem ipsum dolor sit amet, eiusmod tempor incididunt ut labore et consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore <span class="fa fa-quote-right" aria-hidden="true"></span></p>
                     <img src="images/c1.jpg" class="img-fluid" alt="">
                     <div class="client-txt-info mt-2">
                        <h4> Ted Willson</h4>
                     </div>
                  </div>
               </div>
               <div class="col-lg-6 col-md-6 col-sm-6 clients-row-grid">
                  <div class="client-txt-color txt-center">
                     <p class="mb-md-4 mb-sm-3 mb-2"><span class="fa fa-quote-left" aria-hidden="true"></span> Lorem ipsum dolor sit amet, eiusmod tempor incididunt ut labore et consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore <span class="fa fa-quote-right" aria-hidden="true"></span></p>
                     <img src="images/c2.jpg" class="img-fluid" alt="">
                     <div class="client-txt-info mt-2">
                        <h4> Ted Willson</h4>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      //clients -->
      <!-- footer -->
      <footer class="py-lg-4 py-md-3 py-sm-3 py-3">
         <div class="container py-lg-5 py-md-5 py-sm-4 py-3">
            <div class="row ">
               <div class="footer-info-bottom col-lg-4 col-md-3">
                  <h4 class="pb-lg-4 pb-md-3 pb-3">Dirección</h4>
                  <div class="bottom-para ">
                     <div class="footer-office-hour">
                        <ul>
                           <li class="mb-2">
                              <h6>Dirección</h6>
                           </li>
                           <li>
                              <p>Villa Nueva, Guaymallén<br>Godoy 5125, La Floresta.</p>
                           </li>
                        </ul>
                        <ul>
                           <li class="mb-2 mt-3">
                              <h6>Teléfonos</h6>
                           </li>
                           <li>
                              <p>2615 187 472</p>
                           </li>
                           <li class="mb-2 mt-3">
                              <h6>Email</h6>
                           </li>
                           <li>
                              <p><a href="mailto:hector@ubik.com.ar">hector@ubik.com.ar</a></p>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="footer-info-bottom col-lg-4 col-md-4">
                  <h4 class="pb-lg-4 pb-md-3 pb-3">Facebook</h4>
                  <div class="footer-office-hour">
                     <ul>
                        <li>
                           <p>Siganos en Redes Sociales</p>
                        </li>
                        <li class="my-1">
                           <p><a href="mailto:hector@ubik.com.ar"> </a></p>
                        </li>
                        <li class="mb-3"><span>Hace 3 días.</span></li>
                        <li>
                           <p>   </p>
                        </li>
                        <li class="my-1">
                           <p><a href="mailto:info@example.com">  </a></p>
                        </li>
                        <li><span> .</span></li>
                     </ul>
                  </div>
               </div>
               <div class="footer-info-bottom col-lg-4 col-md-5">
                  <h4 class="pb-lg-4 pb-md-3 pb-3">Redes Sociales</h4>
                  <div class="newsletter">
                     <form action="#" method="post" class="d-flex">
                        <input type="email" name="Your Email" class="form-control" placeholder="Your Email" required="">
                        <button class="btn1">
                        <span class="fa fa-envelope" aria-hidden="true"></span>
                        </button>
                     </form>
                  </div>
                  <div class="footer-office-hour mt-3">
                     <p>   </p>
                  </div>
                  <div class="icons mt-3 ">
                     <ul>
                        <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                        <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                        <li><a href="#"><span class="fa fa-rss"></span></a></li>
                        <li><a href="#"><span class="fa fa-vk"></span></a></li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="footer-main-grid txt-center my-3">
               <h2><a class="" href="#home"><span class="fa fa-ravelry mr-2" aria-hidden="true"></span>U2</a></h2>
            </div>
            <div class="footer-main txt-center ">
               <p> 
                  © 2019 Ubik
                  . Todos los derechos reservados | Design by <a href="http://www.W3Layouts.com" target="_blank">W3Layouts</a>
               </p>
            </div>
            <!-- move icon -->
            <div class="txt-center">
               <a href="#home" class="move-top txt-center mt-3"></a>
            </div>
            <!--//move icon -->
         </div>
      </footer>
      <!--//footer -->
	  </body>
	  </html>