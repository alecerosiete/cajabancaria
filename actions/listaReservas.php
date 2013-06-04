<?php
include '../inc/session.inc';
include '../inc/conexion-functions.php';
$db = conect();

$start = $_POST['start'];
$end = $_POST['end'];
$rows = $_POST['tipo'];
    print "<table class='table table-bordered'>
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Tipo de Local</th>
                    <th>Hora/Min de Incio</th>
                    <th>Hora/Min de Fin</th>
                    <th>Ultimo Estado </th>
                    <th>Numero de Solicitud</th>
                    <th>Dia de la Semana</th>
                    
                </tr>
            </thead>
            <tbody>";
    
      
            $query = "";
            /*-- OBTIENE LOS REGISTROS --*/
            $query = "SELECT * FROM aqw018web WHERE (`HORA-MINUTO INICIO EVENTO` > DATE_FORMAT('$start', '%T') AND `HORA-MINUTO FIN EVENTO` < DATE_FORMAT('$end', '%T')) AND `FECHA RESERVA` BETWEEN DATE('$start') AND DATE('$end')";
            
            $conn = $db->prepare($query);
            $conn->execute();
            
            $i = 0;
            $html = "";
            while( $r= $conn->fetch(PDO::FETCH_ASSOC)){

                if($i < $rows){
                   $html.= "<tr>";
                   $html.= "<td style='text-align: center;'> ".$r['FECHA RESERVA']."</td>";
                   $html.= "<td style='text-align: center;'> ".$r['TIPO DE LOCAL']."</td>";
                   $html.= "<td style='text-align: center;'> ".$r['HORA-MINUTO INICIO EVENTO']."</td>";
                   $html.= "<td style='text-align: center;'> ".$r['HORA-MINUTO FIN EVENTO']."</td>";
                   $html.= "<td style='text-align: center;'> ".$r['ULTIMO ESTADO']."</td>";
                   $html.= "<td style='text-align: center;'> ".$r['NUMERO DE SOLICITUD']."</td>";
                   $html.= "<td style='text-align: center;'> ".$r['DIA DE LA SEMANA']."</td>";
                   $html.= "</td></tr>";
                }
                $i++;
             }

             $html.= "</tbody>";
         $html.= "</table>";
         $db = null;
         
echo $html;
