<?php
require './inc/session.inc';
assertUser();
$user = getUser();
//print_r($user);
require './inc/conexion-functions.php';
require './inc/sql-functions.php';


$role = getRole(ROLE_PENSIONADO);

//print_r($role);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Caja Bancaria - Caja de Jubilaciones y Pensiones de Empleados de Bancos y Afines</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php require './inc/header.php'; ?>
    <link rel="stylesheet" type="text/css" href="./resources/bootstrap/assets/css/bootstrap-fileupload.css" media="all" />
    <style type="text/css">
        
      .carousel {
        margin-left: 0px;
        margin-right: 0px;
      }
      .carousel .container {

      }
      .carousel .item {
        height: 300px;
      }
      .carousel img {
        height: 300px;
      }
      .carousel-caption {
        width: 100%;
        padding: 10px;
        margin-top: 70px;
        color:#DDD;
      }
      .carousel-caption h1 {
        font-size: 20px;
      }
      .carousel-caption .lead,
      .carousel-caption .btn {
        font-size: 14px;
      }
      .table-edit-data th, .table-edit-data td {
        padding: 8px;
        line-height: 20px;
        text-align: right;
        }
        
        .banner-preview .fileupload{
            width: auto;
            margin-left: 0px;
            margin-right: 20px;
            float:left;
            
        }
        .text-novedades-preview{
            width: autopx;
            margin-left: 50px;
            float:left;
        }
        .preview-novedades{
            width:600px;
            display: block;
        }
      </style>
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->
        
</head>
  <body>
    <div class="container">
      <div class="header-caja-bancaria">
          <div class="btn-logout">
            Conectado como: <?=$user['data']['nombre']?> <a href="./login.php" class="btn btn-warning">Salir</a>
          </div>
          <div class="alert-msg-show">
            <?php include("./tmpl/success_panel.inc")?>
          </div>
      </div>
      <div class="masthead">
        <!--Menu -->
        <?php require './inc/menu.php'; ?>
        <!-- end menu -->
      </div>
        
        <div class="hero-unit">
             <?php if(getPerfil(ROLE_SYSTEM)) { ?>
            
            <H3 style="text-align:right;color:#E35300;margin-bottom:50px">Administracion de Novedades</H3>
            <hr style="border: 1px solid #E35300">
        <!-- Edicion de banner -->
        <div class="span9">
            <h3>Agregar nuevo contenido</h3>
            <div class="banner-preview">
                <?include("./inc/upload-file-functions.php");?>
                 <div class="fileupload fileupload-new" data-provides="fileupload" id="box-banner">
                     <div class="fileupload-preview thumbnail" style="width: 350px; height: 250px;"><img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" /></div>
                     <div>
                       <span class="btn btn-file">
                           <span class="fileupload-new">Seleccione una imagen</span>
                           <span class="fileupload-exists">Cambiar
                       </span>
                         <input type="file" id="banner" name="banner" onchange="uploadFile('banner','archivo')"/>
                     </span>
                       <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remover</a>
                       <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Guardar</a>
                     </div>
                   </div>                
            </div>
            <div class="text-novedades-preview">
                <label>Titulo</label><input type="text" style="width:300px" placeholder="Text input">
                <label>Descripcion</label><textarea style="width:300px" rows="6"></textarea>
            </div>
            
        </div>
            <!-- /Fin edicion de banner -->
             <div style="clear: both"></div>
        </div> <!-- /End Hero-unit-->
      
      <!-- SECCION BANNER DE NOVEDADES Y NOTICIAS -->
      <div class="row-fluid ">
        <div class="span4">
          <h2>Novedades</h2>
          <p>Aqui puede ir las novedades sobre la Caja Bancaria, asi como noticias o promociones. Estara asociada a varias imagenes que iran rotando. Este banner tendra un panel de administracion para la Alta y Baja de imagenes y texto. </p>
         
        </div>
        <div class="span8">
                    
        <!-- Carousel
           ================================================== -->
           <div id="myCarousel" class="carousel slide">
             <div class="carousel-inner">
               <div class="item active">
                 <img src="./resources/images/1.jpg" alt="">
                 <div class="container">
                   <div class="carousel-caption">
                     <h1>Ejemplo de Banner.</h1>
                     <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>

                   </div>
                 </div>
               </div>
               <div class="item">
                 <img src="./resources/images/2.jpg" alt="">
                 <div class="container">
                   <div class="carousel-caption">
                     <h1>Otro ejemplo de banner.</h1>
                     <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>

                   </div>
                 </div>
               </div>
               <div class="item">
                 <img src="./resources/images/3.jpg" alt="">
                 <div class="container">
                   <div class="carousel-caption">
                     <h1>Una imagen mas para presentar mejor.</h1>
                     <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>

                   </div>
                 </div>
               </div>
             </div>
             <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
             <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
           </div>
           <!-- /.carousel -->
           </div>
      </div>
      <!-- Fin Novedades -->
      
       <?php }else{
                echo "<div class='hero-unit'>";
                $msj = getAccesDenied();
                echo $msj;
                echo "</div>";
          }
          ?>    
      
      <hr>
    <footer>
        <div class="footer">
             Caja de Jubilaciones y Pensiones de Empleados de Bancos y Afines del Paraguay &copy; 2012 - Todos los Derechos Reservados
     www.cajabancaria.gov.py <br> Humaita 357 e/Chile y Alberdi |(595 21) 492 051 / 052 / 053 / 054
        </div> 


    </footer>
            <hr>
    </div> <!-- /container -->
    
    <!-- Modal -->
    <div style="z-index: 100000" id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Upload de archivos</h3>
      </div>
      <div class="modal-body">
          <p>
          <span>Aguarde, convirtiendo audio...</span>
          </p>
       <progress id="progressBar" value="0" max="100" class="progress" > </progress> 
        <div id="percentageCalc" style="display:inline; float: right"></div>
      </div>
      <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
      </div>

    </div>

    
    
    <?php require './inc/footer.php'; ?>
    <script>
      !function ($) {
        $(function(){
          // carousel demo
          $('#myCarousel').carousel()
        })
      }(window.jQuery)
    </script>
    <script type="text/javascript">
            // Executes the function when DOM will be loaded fully
            $(document).ready(function () {	
                    // hover property will help us set the events for mouse enter and mouse leave
                    $('.navigation li').hover(
                            // When mouse enters the .navigation element
                            function () {
                                    //Fade in the navigation submenu
                                    $('ul', this).fadeIn(); 	// fadeIn will show the sub cat menu
                            }, 
                            // When mouse leaves the .navigation element
                            function () {
                                    //Fade out the navigation submenu
                                    $('ul', this).fadeOut();	 // fadeOut will hide the sub cat menu		
                            }
                    );
            });
        </script>
        <script src="./resources/ajax/ajaxFunctions.js"></script>
        <script src="./resources/bootstrap/assets/js/bootstrap-fileupload.js"></script>
  </body>
</html>

