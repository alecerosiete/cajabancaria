

<?php
require_once("dompdf_config.inc.php");

$html = 'print_prestamos.php';
  /*"<html><body>".
  "<p><img src='1.jpg'>Put your html here, or generate it with your favourite ".
  'templating system.</p>'.
  '</body></html>';
*/

$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->render();
$dompdf->stream("sample.pdf");

?>
