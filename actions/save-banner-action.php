<?php
require '../inc/session.inc';
assertUser();
require '../inc/conexion-functions.php';
require '../inc/sql-functions.php';

$uploaddir = '../resources/images/banner/'; 
//exec("rm ../audio/introduction.*");
$file = $uploaddir.basename($_FILES['archivo']['name']); 
echo("nombre: ".$file);
if (move_uploaded_file($_FILES['archivo']['tmp_name'], $file)) { 
    exec("chmod 777 -R ".$uploaddir);	
    echo "success"; 
    /*
    switch ($_FILES['archivo']['type']) {
        case 'audio/wav':
            exec("sox ../audio/introduction -r 8000 -c1 ../audio/introduction.gsm");
            exec("mv ../audio/introduction ../audio/introduction.wav");
            echo "Es wav, convertido a gsm";
            break;
        case 'audio/mp3':
             exec("mpg123 -w ../audio/introduction.wav ../audio/introduction ");
             echo "Es mp3, convertido a wav";
             exec("sox ../audio/introduction.wav -r 8000 -c1 ../audio/introduction.gsm");
             //exec("mv ../audio/introduction ../audio/introduction.wav");
             echo "y convertido a gsm";
            break;
        default:
            exec("mpg123 -w ../audio/introduction.wav ../audio/introduction ");
             echo "no se convertido a wav";
             exec("sox ../audio/introduction.wav -r 8000 -c1 ../audio/introduction.gsm");
             //exec("mv ../audio/introduction ../audio/introduction.wav");
             echo "y convertido a gsm";
            break;
    }
    
    */
    
} else {
	echo "error al subir audio";
}
//exec("chmod 777 ../audio/*");

exit();
?>