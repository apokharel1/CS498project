<!DOCTYPE html>
<html lang="eng">

<head>
	<title>Learning Management System</title> 
	<meta charset="utf-8"/>
	
	<link rel="stylesheet" href="style.css" type="text/css"/>
	<meta name="veiwport" content="width=device-width, initial-scale=1.0">
</head>

<body class="body">


<div>

<?php 

$username = $_SESSION['username'];
if($username == "" or $username == " "){
	header('localtion: index.php');
}
if(loggedin()){
?>

<header class="mainheader">
		<img src="img/logo.gif">
	
		<nav><center><ul >
			<li><a href="index.php">Home</a></li>
			<li><a href="login.php">Log in</a></li>
			<li><a href="view_info.php">View Information</a></li>
			<li><a href="signup.php">Sign Up</a></li>
		</ul></center></nav>
	</header>
<?php
} else{
 ?>

<header class="mainheader">
		<img src="img/logo.gif">
	
		<nav><center><ul >
			<li><a href="index.php">Home</a></li>
			<li><a href="login.php">Log in</a></li>
			<li><a href="view_info.php">View Information</a></li>
			<li><a href="signup.php">Sign Up</a></li>
		</ul></center></nav>
	</header>

<?php
}

?>


</div>
		
	
	</body>
	</html>
