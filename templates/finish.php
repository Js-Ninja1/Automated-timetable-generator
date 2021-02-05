<?php
session_start();

 require_once __DIR__ . '../../vendor/autoload.php';

 //$a = isset($_POST['pdf'])?$_POST['pdf']:'not yet';
$a = 'Hello world';
$b = '<table><tr><td>1</td><td>2</td><td>3</td></tr><tr><td>4</td><td>5</td><td>6</td></tr></table>';
$c = $_SESSION['myname'];
 $mpdf = new \Mpdf\Mpdf();

 $data = '';
 $data .= '<p></p>' . $a . '<p></p>';
 $data .= $b;
 $data .= $c;
 $data .= $_SESSION['timetable'];
 $data .= 'Course name:';
 $data .= $_SESSION['courseName'];
 $data .= 'Semester stage:';
 $data .= $_SESSION['semester_stage'];
 $data .= '<table>';
 $data .= '<tr><th>Day/Time</th><th>'. $_SESSION['time0'] .'</th><th>'. $_SESSION['time1'].'</th><th>'.$_SESSION['time2'].'</th><th>'.$_SESSION['time3'].'</th><th>'.$_SESSION['time4'].'</th><th>'.$_SESSION['time5']. '</th></tr>';
 $data .= '<tr><td>'.$_SESSION.'</td></tr>';
 $data .= '</table>';

 $mpdf->WriteHTML($data);
 $mpdf->Output('myfile.pdf', 'D');

?>



 