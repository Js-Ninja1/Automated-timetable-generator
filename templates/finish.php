<?php

require_once __DIR__ . '../../vendor/autoload.php';

$a = isset($_POST['pdf'])?$_POST['pdf']:'not yet';

$mpdf = new \Mpdf\Mpdf();

$data = '';
$data .= '<p></p>' . $a . '<p></p>';
$mpdf->WriteHTML($data);
$mpdf->Output('myfile.pdf', 'D');

?>



 