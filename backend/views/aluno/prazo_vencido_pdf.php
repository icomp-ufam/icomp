<?php
ob_start();
$html= ob_get_clean();
$html= utf8_encode($html);
$html.= '';
include("vendor/mpdf/mpdf.php");
$mpdf= new mPDF();
$mpdf->allow_charset_conversion= true;
$mpdf->charset_in= 'UTF-8';
$mpdf->writeHTML($html);
$mpdf->Output('meu-pdf','I');
exit();
?>
