<?php


function getUserInfo(){

    $db = conect();
    $user = getUser();
    $ci = $user['CI'];

    /* Obtiene datos del usuario */
    $sql = "SELECT pw.*, pb.`NOMBRE DEL BANCO` AS NOMBREBANCO FROM pddirweb pw INNER JOIN prparban pb ON pw.BANCO = pb.BANCO AND `CEDULA DE IDENTIDAD` = '$ci'";
    $statement = $db->prepare($sql);
    $statement->execute();
    $rowInfo = $statement->fetchAll();
    //print_r($rowInfo);
    $db = null;
    return $rowInfo;
}

function getCiudad($key){
    $db = conect();
    $sql = "SELECT * FROM pdparciud WHERE CIUDAD = '$key';";
    $statement = $db->prepare($sql);
    $statement->execute();
    $ciudad = $statement->fetch(PDO::FETCH_ASSOC);
    //print_r($rowInfo);
    $db = null;
    return $ciudad['DESCRIPCION'];
}

function getLocalidad($key){
    $db = conect();
    $sql = "SELECT * FROM pdparloca WHERE LOCALIDAD = '$key';";
    $statement = $db->prepare($sql);
    $statement->execute();
    $localidad = $statement->fetch(PDO::FETCH_ASSOC);
    //print_r($rowInfo);
    $db = null;
    return $localidad['DESCRIPCION'];
}

function getBarrio($key){
    $db = conect();
    $sql = "SELECT * FROM pdparbarr WHERE BARRIO = '$key';";
    $statement = $db->prepare($sql);
    $statement->execute();
    $barrio = $statement->fetch(PDO::FETCH_ASSOC);
    //print_r($rowInfo);
    $db = null;
    return $barrio['DESCRIPCION'];
}


function getBarrios(){
    $db = conect();
    $sql = "SELECT * FROM pdparbarr;";
    $statement = $db->prepare($sql);
    $statement->execute();
    $barrios = $statement->fetchAll();
    //print_r($rowInfo);
    $db = null;
    return $barrios;
   
}


function getCiudades(){
    $db = conect();
    $sql = "SELECT * FROM pdparciud";
    $statement = $db->prepare($sql);
    $statement->execute();
    $ciudades = $statement->fetchAll();
    //print_r($rowInfo);
    $db = null;
    return $ciudades;
   
}



function getLocalidades(){
    $db = conect();
    $sql = "SELECT * FROM pdparloca";
    $statement = $db->prepare($sql);
    $statement->execute();
    $localidades = $statement->fetchAll();
    //print_r($rowInfo);
    $db = null;
    return $localidades;
   
}

function getPrestamos($ci){
    $db = conect();
    $sql = "SELECT * FROM prw805web WHERE `CEDULA DE IDENTIDAD` = $ci";
    $statement = $db->prepare($sql);
    $statement->execute();
    $prestamos = $statement->fetchAll();
    //print_r($rowInfo);
    $db = null;
    return $prestamos;
   
}


function getTipoDePrestamo($id){
    $db = conect();
    
    $sql = "SELECT * FROM prw_clase_de_prestamo WHERE id = $id";
    $statement = $db->prepare($sql);
    $statement->execute();
    $tipoPrestamo = $statement->fetch(PDO::FETCH_ASSOC);
    //print_r($rowInfo);
    $db = null;
    return $tipoPrestamo['DESCRIPCION'];
   
}

function getTarjetas($ci){
    $db = conect();

    $sql = "SELECT * FROM tctarweb WHERE `NUMERO DE DOCUMENTO` = $ci";
    $statement = $db->prepare($sql);
    $statement->execute();
    $tarjetas = $statement->fetchAll();
    //print_r($rowInfo);
    $db = null;
    return $tarjetas;
   
}
function getAportes($ci){
    $db = conect();

    $sql = "SELECT * FROM apw117web WHERE `CEDULA DE IDENTIDAD` = $ci";
    $statement = $db->prepare($sql);
    $statement->execute();
    $aportes = $statement->fetchAll();
    //print_r($rowInfo);
    $db = null;
    return $aportes;
   
}



function getJubilados($ci){
    $db = conect();
    $sql = "SELECT * FROM jubliqweb WHERE `CEDULA DE IDENTIDAD` = $ci";
    $statement = $db->prepare($sql);
    $statement->execute();
    $jubilados = $statement->fetchAll();
    //print_r($rowInfo);
    $db = null;
    return $jubilados;
   
}

function getCodigoOperacion($codigo){
    $db = conect();
    $sql = "SELECT * FROM maetabcod WHERE `CODIGO OPERACION` = $codigo";
    $statement = $db->prepare($sql);
    $statement->execute();
    $codigos = $statement->fetch(PDO::FETCH_ASSOC);
    //print_r($rowInfo);
    $db = null;
    return $codigos['DESCRIPCION'];
   
}
/*
function getUserMenu(){
    $userInfo = getRo
    $db = conect();
    $sql = "SELECT * FROM maetabcod WHERE `CODIGO OPERACION` = $codigo";
    $statement = $db->prepare($sql);
    $statement->execute();
    $codigos = $statement->fetch(PDO::FETCH_ASSOC);
    //print_r($rowInfo);
    $db = null;
    return $codigos['DESCRIPCION'];
   
}
 * 
 */