<?php 
error_reporting(E_PARSE | E_ERROR);
if(isset($_SESSION)){
	$_SESSION['username'] = ' ';
}else{session_start();}

$username = $_SESSION['username'];
if($username == "" or $username == " "){
	header('localtion: index.php');
}