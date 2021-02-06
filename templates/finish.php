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
 $data .= '<tr><td>'.$_SESSION['lessons0'].'<br><p>'. $_SESSION['select_lec0'].'</p><br><p>'.$_SESSION['check_room0'].'</p></td><td>'.$_SESSION['lessons1'].'<br><p>'. $_SESSION['select_lec1'].'</p><br><p>'.$_SESSION['check_room1'].'</p></td><td>'.$_SESSION['lessons2'].'<br><p>'. $_SESSION['select_lec2'].'</p><br><p>'.$_SESSION['check_room2'].'</p></td><td>'.$_SESSION['lessons3'].'<br><p>'. $_SESSION['select_lec3'].'</p><br><p>'.$_SESSION['check_room3'].'</p></td><td>'.$_SESSION['lessons4'].'<br><p>'. $_SESSION['select_lec4'].'</p><br><p>'.$_SESSION['check_room4'].'</p></td><td>'.$_SESSION['lessons5'].'<br><p>'. $_SESSION['select_lec5'].'</p><br><p>'.$_SESSION['check_room5'].'</p></td></tr>';
 $data .= '<tr><td>'.$_SESSION['lessons10'].'<br><p>'. $_SESSION['select_lec10'].'</p><br><p>'.$_SESSION['check_room10'].'</p></td><td>'.$_SESSION['lessons11'].'<br><p>'. $_SESSION['select_lec11'].'</p><br><p>'.$_SESSION['check_room11'].'</p></td><td>'.$_SESSION['lessons12'].'<br><p>'. $_SESSION['select_lec12'].'</p><br><p>'.$_SESSION['check_room12'].'</p></td><td>'.$_SESSION['lessons13'].'<br><p>'. $_SESSION['select_lec13'].'</p><br><p>'.$_SESSION['check_room13'].'</p></td><td>'.$_SESSION['lessons14'].'<br><p>'. $_SESSION['select_lec14'].'</p><br><p>'.$_SESSION['check_room14'].'</p></td><td>'.$_SESSION['lessons15'].'<br><p>'. $_SESSION['select_lec15'].'</p><br><p>'.$_SESSION['check_room15'].'</p></td></tr>';

 $data .= '</table>';

 $mpdf->WriteHTML($data);
 $mpdf->Output('myfile.pdf', 'D');

?>



 