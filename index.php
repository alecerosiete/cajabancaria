<?php
require './inc/session.inc';
assertUser();
$user = getUser();
require './inc/conexion-functions.php';
$db = conect();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Template &middot; Bootstrap</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php require './inc/header.php'; ?>
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
            Conectado como: Usuario <?=$user['data']['NOMBRE']?> <a href="./login.php" class="btn btn-warning">Salir</a>
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
      <!-- Tipo de cliente 
      B = Beneficiario
      P = Particular
      -->
          
      <!-- Formulario de Datos Personales -->         
      <div class="hero-unit">
        <h3>Datos personales</h3>
        <table id="personal-data" class="table table-bordered">
            <tbody>
              <tr>
                <th>Tipo de Cliente: </th><td><?= $user['data']['TIPO DE CLIENTE'] == "B" ? "Beneficiario" : "Particular" ?> </td>
                <th>Padron: </th><td><?= $user['PADRON'] ?></td>
                <th>Banco: </th><td colspan="2"><?= $user['data']['NOMBREBANCO'] ?></td>
                
              </tr>
              <tr>
               <th>Cedula de Id: </th><td><?= $user['data']['CEDULA DE IDENTIDAD'] ?></td>
                <th>Nombre: </th><td><?= $user['data']['NOMBRE'] ?></td>
                <th>Apellido: </th><td colspan="2"><?= $user['data']['APELLIDO'] ?></td>
                
              </tr>
              <tr>
                <th>Direccion: </th><td><?= $user['data']['NOMBRE DE LA CALLE'] ?></td>
                <th>Numero: </th><td ><?= $user['data']['NUMERO DE LA CASA'] ?></td> 
                <th>Barrio: </th><td><?= $user['data']['BARRIO'] ?></td>
                
              </tr>
              <tr>
                <th>Ciudad: </th><td><?= $user['data']['CIUDAD'] ?></td>
                <th>Localidad: </th><td ><?= $user['data']['LOCALIDAD'] ?></td>
                <th>Perfil: </th><td><?= $user['data']['PERFILWEB'] ?></td>
                
              </tr>
              <tr>
                  <th>Celular 1: </th><td ><?= $user['data']['CELULAR 1'] ?></td>
                  <th>Celular 2: </th><td ><?= $user['data']['CELULAR 2'] ?></td>
                  <th>Linea Baja 1: </th><td><?= $user['data']['TELEFONO 1'] ?></td>
                  
              </tr>
              
              <tr>
                  <th>Linea Baja 2: </th><td><?= $user['data']['TELEFONO 2'] ?></td>
                  <th>Email: </th><td colspan="3"><?= $user['data']['CORREO ELECTRONICOWEB'] ?></td>
                  
              </tr>
             
            </tbody>
          </table>
        <input type="hidden" value='<?=$user['PADRON']?>' id='padron-info'>
        <p>
            <a id="modal-edit-user-data"  data-toggle="modal" href="#modalUserData" class="btn btn-large btn-primary">Editar</a>
      </div>
      
      <!-- Modal Agregar Clientes-->
       
        <div id="modalUserData" class="modal hide fade in" style="display: none;">
          <div class="modal-header">
              <a data-dismiss="modal" class="close">×</a>
              <h3>Edicion de datos de usuario</h3>
           </div>
           <div class="modal-body">
               <table class="table-edit-data">
                  <tr>
                      <td><label>Direccion: </label></td>
                      <td><input type="text" id="nombre-de-la-calle" value="<?= $user['data']['NOMBRE DE LA CALLE'] ?>"></td>
                      <td><label>Numero: </label></td>
                      <td><input type="text" id="numero-de-la-casa" value="<?= $user['data']['NUMERO DE LA CASA'] ?>"> </td>
                                         
                  </tr>
                  
                    <tr>
                      <td><label>Barrio: </label></td>
                      <td><input type="text" id="nombre-del-barrio" value="<?= $user['data']['BARRIO'] ?>"></td>
                      <td><label>Ciudad: </label></td>
                      <td><input type="text" id="nombre-de-la-ciudad" value="<?= $user['data']['CIUDAD'] ?>"></td>
                    
                    </tr>
                     
                    <tr>
                        <td><label>Localidad: </label></td>
                        <td><input type="text" id="nombre-de-localidad" value="<?= $user['data']['LOCALIDAD'] ?>"></td>
                        <td><label>Celular 1: </label></td>
                        <td><input type="text" id="celular-1" value="<?= $user['data']['CELULAR 1'] ?>"></td>
                   
                    </tr>
                    <tr>
                        <td><label>Celular 2: </label></td>
                        <td><input type="text" id="celular-2" value="<?= $user['data']['CELULAR 2'] ?>"></td>
                        <td><label>Linea Baja 1: </label></td>
                        <td><input type="text" id='linea-baja-1' value="<?= $user['data']['TELEFONO 1'] ?>"></td>
                    </tr>
                        
                     <tr> 
                        <td><label>Linea Baja 2: </label></td>
                        <td><input type="text" id='linea-baja-2' value="<?= $user['data']['TELEFONO 2'] ?>"></td>
                        <td><label>Email: </label></td>
                        <td><input type="text" id="e-mail" value="<?= $user['data']['CORREO ELECTRONICOWEB'] ?>"></td>
               
                    </tr>
               </table>
           <div class="modal-footer">
              <button href="#" id="btn-edit-user-data" class="btn btn-success">Guardar</button>
              <button href="#" id="user-data-edit-close" data-dismiss="modal" class="btn">Cerrar</button>
          </div>
          </div>
        </div>
        <!-- Fin Modal-->
                        
                        
      <!-- Fin formulario -->
      
      
      <!-- Example row of columns -->
      <!--
      <div class="row-fluid ">
        <div class="span4">
          <h2>Heading</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn" href="#">View details &raquo;</a></p>
        </div>
        <div class="span4">
          <h2>Heading</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn" href="#">View details &raquo;</a></p>
       </div>
        <div class="span4">
          <h2>Heading</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa.</p>
          <p><a class="btn" href="#">View details &raquo;</a></p>
        </div>
      </div>
      -->
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
      <hr>
     
    </div> <!-- /container -->
    
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
  </body>
</html>