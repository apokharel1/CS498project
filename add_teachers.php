<!DOCTYPE html>
<html lang="en">

<head>

<style>
table, th, td {
    border: 5px solid white;
    border-collapse: collapse;
}
th, td {
    padding: 10px;
}
</style>

<style>
.error {color: #FF0000;}
</style>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Learning Management System - Admin Panel</title>

    <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">


</head>

<body>

    <div id="wrapper">

      
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="profile.php">LMS</a>
            </div>
            

           

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Teacher's Informations</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Please enter the following informations.
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
		<?php

              include 'connect.php';

              include 'functions.php';


              ?>


<?php 
if ($user_level != 1 and $user_level != 2) {
    header ('location: index.php');
}?>

                
								<?php
$unameErr = $pwdErr = $ulevelErr = $actypeErr = $fullnameErr = $emailErr = $secretkeyErr = "";
$uname = $pwd = $ulevel = $actype = $fullname = $email = $secretkey = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

 

   if (empty($_POST["uname"])) {
     $unameErr = "Username is required";
   } else {
     $uname = test_input($_POST["uname"]);
   }
   
   if (empty($_POST["pwd"])) {
     $pwdErr = "Password  is required";
   } else {
     $pwd = test_input(md5($_POST["pwd"]));
   }

   

     if (empty($_POST["ulevel"])) {
     $ulevelErr = "User level number is required";
   } else {
     $ulevel = test_input($_POST["ulevel"]);
   }
   
   if (empty($_POST["actype"])) {
     $actypeErr = "Account type  is required";
   } else {
     $actype = test_input($_POST["actype"]);
   }


    if (empty($_POST["fullname"])) {
     $fullnameErr = "Full Name is required";
   } else {
     $fullname = test_input($_POST["fullname"]);
   }

   if (empty($_POST["email"])) {
     $emailErr = "Email is required";
   } else {
     $email = test_input($_POST["email"]);
   }

   if (empty($_POST["secretkey"])) {
     $secretkeyErr = "Secretkey is required";
   } else {
     $secretkey = test_input($_POST["secretkey"]);
   }


   include 'connect.php';

	$sql="INSERT INTO `users`(`username`, `password`, `user_level`, `type`, `fullname`,`email`,`secret_key`) VALUES ('$uname','$pwd','$ulevel','$actype','$fullname','$email','$secretkey')";

    if(mysqli_query($mysqli,$sql)){
   echo "Data inserted successfully.";
   
   exit;
   }
   
   }

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>

<h2>Details of Teachers:</h2>
<p><span class="error">All field are required.</span></p>

    <form method="post" action=""> 
    								<table style="width:100%">

                    <tr>

                <td align="right">Full Name : </td>
                <td><input type='text' name='fullname' />
                 <span class="error"> <?php echo $fullnameErr;?></span>
                 
               </td>
                 
                </tr>


                <tr>

                <td align="right">USERNAME : </td>
                <td><input type='text' name='uname' />
                 <span class="error"> <?php echo $unameErr;?></span>
                 
               </td>
                 
                </tr>
             

    			<tr>

                <td align="right">PASSWORD : </td>
                <td><input type='password' name='pwd' />
                 <span class="error"> <?php echo $pwdErr;?></span>
                 
               </td>
                 
                </tr>
             <tr>

                <td align="right">Email : </td>
                <td><input type='text' name='email' />
                 <span class="error"> <?php echo $emailErr;?></span>
                 
               </td>
                 
                </tr>

                <tr>

                <td align="right">Secret Key : </td>
                <td><input type='text' name='secretkey' />
                 <span class="error"> <?php echo $secretkeyErr;?></span>
                 
               </td>
                 
                </tr>

    			<tr>	
    	
    			<td align="right">User Level(1/2) : </td>
    			<td><input type='number' name='ulevel' />
    			<span class="error"> <?php echo $ulevelErr;?></span>

    			</td>

                </tr>

                <tr>	
       
    	
    			<td align="right">Type(a/d) : </td>
    			<td><input type='text' name='actype' />
    			<span class="error"> <?php echo $actypeErr;?></span>

    			</td>

                </tr>

    			<tr>
                <td><center><input type='submit' name='submit' value='submit' /></center></td>
                </tr>
    
    </table>
  </form>
 


								
	

</body>

</html>
