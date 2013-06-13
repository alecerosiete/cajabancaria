<?php
require_once '../inc/session.inc';
require_once '../inc/conexion-functions.php';
$db = conect();
$user = getUser();
//$ci = $user['data']['CEDULA DE IDENTIDAD'];
//$pin = $user['data']['PINWEB'];
$ci = $_POST['ci'];
$nombre = $_POST['nombre'];
$tipo_de_usuario = $_POST['tipo_de_usuario'];
$perfil_de_usuario = $_POST['perfil'];


$sql = "";

$sql .= "UPDATE sys_user SET ";

$sql .= "nombre = '$nombre',tipo_de_usuario = '$tipo_de_usuario',perfil_de_usuario = '$perfil_de_usuario'";

$sql .= " WHERE ci = $ci";

if($db->query($sql)){
    setSuccess("Modificado con exito");
    
    /* actualiza datos de session */
    $sql = "SELECT *,u.ci as ci FROM sys_user AS u, sys_group AS g, sys_profile AS p WHERE u.active = 1 AND u.tipo_de_usuario = g.nombre_de_grupo AND u.perfil_de_usuario = p.perfil AND u.ci = ? ";
    $statement = $db->prepare($sql);
    $statement->execute(array($ci));
    $item = $statement->fetch(PDO::FETCH_ASSOC);
    setUser($item['ci'], $item);
    
    echo "ok";
}else{
    addError("Hubo un error al actualizar los datos");
    error_log($sql);
}