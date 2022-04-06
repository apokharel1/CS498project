<?php

$mysqli= mysqli_connect("localhost", "root",'', "student_db");
////mysqli_connect('localhost','root','');
//mysqli_select_db('student_db');

mysqli_select_db($mysqli, 'student_db');
 ?>