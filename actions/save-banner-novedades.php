<?php
require '../inc/session.inc';
assertUser();
require '../inc/conexion-functions.php';
require '../inc/sql-functions.php';

$titulo = $_POST["titulo"];
$texto = $_POST["texto"];
$nombre_imagen = $_POST["nombre_imagen"];

 $db = conect();
    $sql = "INSERT INTO news (news_banner_name,news_banner_title,news_banner_text,registered) VALUES ('$nombre_imagen','$titulo','$texto',now())";
    $statement = $db->prepare($sql);
    $statement->execute();
    
    //print_r($rowInfo);
    $db = null;
    setSuccess("Los datos se guardaron con exito!");
    
?>