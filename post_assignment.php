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
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/metisMenu.min.css" rel="stylesheet">

    <link href="css/sb-admin-2.css" rel="stylesheet">

    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
                    <h1 class="page-header">Post Assignment </h1>
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
$semErr = "";
$dep = $sem  = $subject = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
   
   
   
     $dep = test_input($_POST["dep"]);
   
   if (empty($_POST["sem"])) {
     $semErr = "sem  is required";
   } else {
     $sem = test_input($_POST["sem"]);
   }
   
   include 'connect.php';
   $sql="INSERT INTO `assignment`(`dept_id`, `sem_id`, `subject`,`upload_data`) 
   VALUES ('$dep','$sem','$subject','upload_data')";
   if(mysqli_query($mysqli,$sql)){

   echo "Data inserted successfully.";exit;
   }
   
   }

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>

<h2>Select class to post assignment:</h2>
<p><span class="error">All field are required.</span></p>

    <form method="post" action=""> 
    								<table style="width:100%">

    								<td align="right">Department   : </td>
    								<td><select name="dep">
                                    <option value="2">Civil</option>
    								<option value="1">Architecture</option>
    								<option value="3">Computer</option>
    								<option value="4">Electronics</option>
    								</select>
    								
                    </td>
                </tr>
                <tr>
    								<td align="right">Semester: </td>
    								<td>
                    <input type='number' name='sem' />
    								<span class="error"> <?php echo $semErr;?></span>
    								
                    
                    </td>
    						</tr>
                
                <tr>
    								<td align="right">Subject: </td>
    								<td>
    								<select name="subject">
                                    <option value="2">Project</option>
                    <option value="1">CS315</option>
                    <option value="3">CS270</option>
                    
                    </select>
                    </td>
                </tr>
    						</tr>
                <tr>
                <td align="right">Upload Assignment: </td>
  <td><input type="file" name="fileToUpload" id="fileToUpload"></td>
    						</tr>		
    								<tr>
                      <td><center><input type='submit' name='submit' value='Post Assignment'/></center></td>
                    </tr>
    
    </table>
  </form>
 
    <script src="../javascript/jquery.min.js"></script>

    <script src="../javascript/bootstrap.min.js"></script>

    <script src="../javascript/metisMenu.min.js"></script>

    <script src="../javascript/sb-admin-2.js"></script>

</body>

</html>
