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

    <!-- MetisMenu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
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
            <!-- /.navbar-header -->

           

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Teacher's Informations</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
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

               //isset($_GET['type']) && !empty($_GET['typ$e'])

              ?>


<?php 
if ($user_level != 1 and $user_level != 2) {
    header ('location: index.php');
}?>

                
								<?php
// define variables and set to empty values
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
   /*if (empty($_POST["reg"])) {
     $regErr = "Reg no  is required";
   } else {
     $reg = test_input($_POST["reg"]);
   }
   
     $dep = test_input($_POST["dep"]);
   
   if (empty($_POST["sem"])) {
     $semErr = "sem  is required";
   } else {
     $sem = test_input($_POST["sem"]);
   }
   $slc_school = test_input($_POST["slc_school"]);
   $slc_board = test_input($_POST["slc_board"]);
   $slc_percent = test_input($_POST["slc_percent"]);
   */

   include 'connect.php';

	$sql="INSERT INTO `users`(`username`, `password`, `user_level`, `type`, `fullname`,`email`,`secret_key`) VALUES ('$uname','$pwd','$ulevel','$actype','$fullname','$email','$secretkey')";

   //$sql="INSERT INTO `student`(`fname`,`mname`,`lname`,`crn`,`reg`,`dep`,`sem`,`slc_school`,`slc_board`,`slc_percent`) 
   //VALUES ('$fname','$mname','$lname','$crn','$reg','$dep','$sem','$slc_school','$slc_board','$slc_percent')";
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
 


								
								


                                    
                                <!-- /.col-lg-6 (nested) -->
                                
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
