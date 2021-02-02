<?php

require_once __DIR__ . '../../vendor/autoload.php';

$a =isset($_POST['pdf1'])?$_POST['pdf1']:'not yet';

$mpdf = new \Mpdf\Mpdf();

$data = '';
$data .= '<p></p>' . $a . '<p></p>';
$mpdf->WriteHTML($data);
$mpdf->Output('myfile.pdf', 'D');

?>



 