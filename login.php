 <!DOCTYPE html>
<html lang="eng">

<head>
	<title>Learning Management System</title> 
	<meta charset="utf-8"/>
	
	<link rel="stylesheet" href="style_login.css" type="text/css"/>
	<meta name="veiwport" content="width=device-width, initial-scale=1.0">
</head>

<body class="body">

<?php include 'connect.php'; ?>


<?php include 'functions.php'; ?>

	<?php
	include 'header.php';
	
	?>
	<br />
	<br />
	
	<div class="mainform">
	
	
	
	<form align="center" method='post'>
<?php
if(isset($_POST['submit'])){
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	if(empty($username) or empty($password))	{
		echo "<p>Fields empty!!!</p>";
	} else {
			$check_login = mysqli_query($mysqli,"SELECT id, type FROM users WHERE username='$username' AND password='$password'");
			if(mysqli_num_rows($check_login) == 1){
				$run = mysqli_fetch_array($check_login);
				$user_id = $run['id'];
				$type = $run['type'];
				if($type == 'd'){

					echo "<p> <h3>Your account is devactivated. Please, let the admin activate your account first.</h3></p>";
				}
				else {
				$_SESSION['user_id'] = $user_id;
				header('location: profile.php');
	
				}
				
			}
			else {
			echo "<p><h3>Sorry!! Please Enter Correct Username and Password.</h3></p>";
			}
	}
}
?>

User Name : <br/>
<input type='text' name='username' />
<br/><br/>
Password : </br>
<input type='password' name='password' />
<br/><br/>
<input type='submit' name='submit' value='login' /></br></br>
Not a member?? <a href = "signup.php" >Sign up here </a>

</form>
	
	
	
	
	
	
	</div>
	
	
	<?php
	//include 'footer.php';
	
	?>	
	
	</body>
