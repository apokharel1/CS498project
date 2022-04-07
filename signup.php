 <!DOCTYPE html>
<html lang="eng">

<head>
	<title>Learning Management System</title> 
	<meta charset="utf-8"/>
	
	<link rel="stylesheet" href="style_login.css" typ$e="text/css"/>
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
			$fullname=$_POST['fullname'];
			$username=$_POST['username'];
			$password=md5($_POST['password']);
			$email=$_POST['email'];
			$secretkey=$_POST['secretkey'];
			if(empty($username) or empty($password) or empty($fullname) or empty($email))
		{
			echo "<p>Fields Empty ! </p>";
		} 	else {
			mysqli_query($mysqli,"INSERT INTO `users`(`username`, `password`, `user_level`, `fullname`, `email`, `secret_key`, `type`) VALUES ('$username','$password','2','$fullname','$email','$secretkey','d')");
			echo "<p> Data Inserted Sucessfully!!";
		}

	}

		?>
<h1> Sign up!!!</h1>
<table style="width:100%">

	<tr>

                <td align="right">Full Name : </td>
                <td><input type='text' placeholder="Enter Full Name" name='fullname' />
                 
                 
               </td>
                 
                </tr>
                <tr>

                <td align="right">UserName : </td>
                <td><input type='text' placeholder= "Enter Username" name='username' />
                 
                 
               </td>
                 
                </tr>
              <tr>

                <td align="right">Password : </td>
                <td><input type='password' placeholder="Enter Password" name='password' /></td>
                 
              </tr>
              <tr>

                <td align="right">Email : </td>
                <td><input type='text' placeholder="Enter Email" name='email' />
                 
                 
               </td>
                 
                </tr>
                              
             <tr>

                <td align="right">Secret Key : </td>
                <td><input type='text' placeholder="Enter Secret Key" name='secretkey' />
                 
                 
               </td>
                 
                </tr>

    						
    								
    								<tr>
                      <td><center><input type='submit' name='submit' value='Sign Up' /></center></td>
                    </tr>
    
    </table>
	
	
	
	
	
	
	</div>
	
	
	<?php
	//include 'footer.php';
	
	?>	
	
	</body>
