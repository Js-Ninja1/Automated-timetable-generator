<?php
session_start();

 require_once __DIR__ . '../../vendor/autoload.php';



$c = $_SESSION['myname'];
 $mpdf = new \Mpdf\Mpdf();

 $data = '';

 $data .= $_SESSION['timetable'];
 $data .= 'Course name:';
 $data .= $_SESSION['courseName'];
 $data .= 'Semester stage:';
 $data .= $_SESSION['semester_stage'];
 $data .= '<table style="overflow: auto | hidden | visible | wrap">';
 $data .= '<tr><th>Day/Time</th><th>'. $_SESSION['time0'] .'</th><th>'. $_SESSION['time1'].'</th><th>'.$_SESSION['time2'].'</th><th>'.$_SESSION['time3'].'</th><th>'.$_SESSION['time4'].'</th><th>'.$_SESSION['time5']. '</th></tr>';
 $data .= '<tr><td>'.$_SESSION['lessons0'].'<br><p>'. $_SESSION['select_lec0'].'</p><br><p>'.$_SESSION['check_room0'].'</p></td><td>'.$_SESSION['lessons1'].'<br><p>'. $_SESSION['select_lec1'].'</p><br><p>'.$_SESSION['check_room1'].'</p></td><td>'.$_SESSION['lessons2'].'<br><p>'. $_SESSION['select_lec2'].'</p><br><p>'.$_SESSION['check_room2'].'</p></td><td>'.$_SESSION['lessons3'].'<br><p>'. $_SESSION['select_lec3'].'</p><br><p>'.$_SESSION['check_room3'].'</p></td><td>'.$_SESSION['lessons4'].'<br><p>'. $_SESSION['select_lec4'].'</p><br><p>'.$_SESSION['check_room4'].'</p></td><td>'.$_SESSION['lessons5'].'<br><p>'. $_SESSION['select_lec5'].'</p><br><p>'.$_SESSION['check_room5'].'</p></td></tr>';
 $data .= '<tr><td>'.$_SESSION['lessons10'].'<br><p>'. $_SESSION['select_lec10'].'</p><br><p>'.$_SESSION['check_room10'].'</p></td><td>'.$_SESSION['lessons11'].'<br><p>'. $_SESSION['select_lec11'].'</p><br><p>'.$_SESSION['check_room11'].'</p></td><td>'.$_SESSION['lessons12'].'<br><p>'. $_SESSION['select_lec12'].'</p><br><p>'.$_SESSION['check_room12'].'</p></td><td>'.$_SESSION['lessons13'].'<br><p>'. $_SESSION['select_lec13'].'</p><br><p>'.$_SESSION['check_room13'].'</p></td><td>'.$_SESSION['lessons14'].'<br><p>'. $_SESSION['select_lec14'].'</p><br><p>'.$_SESSION['check_room14'].'</p></td><td>'.$_SESSION['lessons15'].'<br><p>'. $_SESSION['select_lec15'].'</p><br><p>'.$_SESSION['check_room15'].'</p></td></tr>';
 $data .= '<tr><td>'.$_SESSION['lessons20'].'<br><p>'. $_SESSION['select_lec20'].'</p><br><p>'.$_SESSION['check_room20'].'</p></td><td>'.$_SESSION['lessons21'].'<br><p>'. $_SESSION['select_lec21'].'</p><br><p>'.$_SESSION['check_room21'].'</p></td><td>'.$_SESSION['lessons22'].'<br><p>'. $_SESSION['select_lec22'].'</p><br><p>'.$_SESSION['check_room22'].'</p></td><td>'.$_SESSION['lessons23'].'<br><p>'. $_SESSION['select_lec23'].'</p><br><p>'.$_SESSION['check_room23'].'</p></td><td>'.$_SESSION['lessons24'].'<br><p>'. $_SESSION['select_lec24'].'</p><br><p>'.$_SESSION['check_room24'].'</p></td><td>'.$_SESSION['lessons25'].'<br><p>'. $_SESSION['select_lec25'].'</p><br><p>'.$_SESSION['check_room25'].'</p></td></tr>';
 $data .= '<tr><td>'.$_SESSION['lessons30'].'<br><p>'. $_SESSION['select_lec30'].'</p><br><p>'.$_SESSION['check_room30'].'</p></td><td>'.$_SESSION['lessons31'].'<br><p>'. $_SESSION['select_lec31'].'</p><br><p>'.$_SESSION['check_room31'].'</p></td><td>'.$_SESSION['lessons32'].'<br><p>'. $_SESSION['select_lec32'].'</p><br><p>'.$_SESSION['check_room32'].'</p></td><td>'.$_SESSION['lessons33'].'<br><p>'. $_SESSION['select_lec33'].'</p><br><p>'.$_SESSION['check_room33'].'</p></td><td>'.$_SESSION['lessons34'].'<br><p>'. $_SESSION['select_lec34'].'</p><br><p>'.$_SESSION['check_room34'].'</p></td><td>'.$_SESSION['lessons35'].'<br><p>'. $_SESSION['select_lec35'].'</p><br><p>'.$_SESSION['check_room35'].'</p></td></tr>';
 $data .= '<tr><td>'.$_SESSION['lessons40'].'<br><p>'. $_SESSION['select_lec40'].'</p><br><p>'.$_SESSION['check_room40'].'</p></td><td>'.$_SESSION['lessons41'].'<br><p>'. $_SESSION['select_lec41'].'</p><br><p>'.$_SESSION['check_room41'].'</p></td><td>'.$_SESSION['lessons42'].'<br><p>'. $_SESSION['select_lec42'].'</p><br><p>'.$_SESSION['check_room42'].'</p></td><td>'.$_SESSION['lessons43'].'<br><p>'. $_SESSION['select_lec43'].'</p><br><p>'.$_SESSION['check_room43'].'</p></td><td>'.$_SESSION['lessons44'].'<br><p>'. $_SESSION['select_lec44'].'</p><br><p>'.$_SESSION['check_room44'].'</p></td><td>'.$_SESSION['lessons45'].'<br><p>'. $_SESSION['select_lec45'].'</p><br><p>'.$_SESSION['check_room45'].'</p></td></tr>';
 $data .= '</table>';

 $mpdf->WriteHTML($data);
 $mpdf->Output('myfile.pdf', 'D');

?>



 