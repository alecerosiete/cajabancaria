<?php
include 'inc/session.inc';
session_destroy();
?> 

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Sign in &middot; Twitter Bootstrap</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="./resources/bootstrap/assets/css/bootstrap.css" rel="stylesheet">
    <link href="./resources/bootstrap/assets/css/bootstrap-responsive.css" rel="stylesheet">
    <style type="text/css">
      body {
          margin-top: 50px;

        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>
     </head>

  <body>

    <div class="container">

      <form class="form-signin" action="./actions/login.do.php" method="post">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="text" class="input-block-level" placeholder="Cedula de Identidad" name="ci">
        <input type="password" class="input-block-level" placeholder="Pin" name="pin">
        <button class="btn btn-large btn-primary" type="submit">Sign in</button>
        
        
      </form>
        <div  style="width: 500px;margin-left: auto;margin-right: auto;">
            <?php include("./tmpl/error_panel.inc")?>
            <?php include("./tmpl/success_panel.inc")?>
        </div>
    </div> <!-- /container -->
        
        <?php require './inc/footer.php'; ?>
        <script src="./resources/ajax/ajaxFunctions.js"></script>
  </body>
</html>
