<?php
include("mpdf60/mpdf.php");

$html = "
<fieldset>
	<h1>Alunos com prazo vencido</h1>
	
</fieldset>";

$mpdf=new mPDF(); 
$mpdf->SetDisplayMode('fullpage');
$mpdf->WriteHTML($html);
$mpdf->Output();

exit;
?>
<!--
<html>
<head>
	<title></title>
</head>
<table style="width: 647px;" cellspacing="1" cellpadding="5">
<tbody>
<tr>
<td style="width: 104px;" valign="top" height="89">
<p><span style="font-family: \'Arial Narrow\', sans-serif;"><span style="font-size: large;"><strong><img src='.getcwd().'/img/ufam.jpg alt="" width="82" height="106" /></strong></span></span></p>
</td>
<td style="width: 542px;" valign="top" height="89">
<p><span style="font-family: \'Arial Narrow\', sans-serif;"><span style="font-size: large;"><strong>UNIVERSIDADE FEDERAL DO AMAZONAS</strong></span></span></p>
<p><span style="font-size: small;"><span style="font-family: \'Arial Narrow\', sans-serif;"><span style="font-size: large;">Instituto de Computa&ccedil;&atilde;o</span></span></span></p>
<p><span style="font-family: \'Arial Narrow\', sans-serif;"><span style="font-size: large;">Programa de P&oacute;s-Gradua&ccedil;&atilde;o em Inform&aacute;tica</span></span></p>
</td>
</tr>
</tbody>
</table>
</html>
-->