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
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
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
                    <h1 class="page-header">Student Informations</h1>
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
// define variables and set to empty values
$fnameErr = $mname= $lnameErr = $crnErr = $regErr = $semErr = "";
$fname = $mname= $lname = $crn = $reg  = $dep = $sem  = $batch_bs = $Gender = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["fname"])) {
     $fnameErr = "FirstName is required";
   } else {
     $fname = test_input($_POST["fname"]);
   }
   $mname = test_input($_POST["mname"]);
   if (empty($_POST["lname"])) {
     $lnameErr = "LastName  is required";
   } else {
     $lname = test_input($_POST["lname"]);
   }
     if (empty($_POST["crn"])) {
     $crnErr = "college roll number is required";
   } else {
     $crn = test_input($_POST["crn"]);
   }
   
   if (empty($_POST["reg"])) {
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
   $reg = test_input($_POST["reg"]);
   $batch_bs = test_input($_POST["batch_bs"]);
   $Gender = test_input($_POST["Gender"]);
   include 'connect.php';
   $sql="INSERT INTO `student`(`fname`, `mname`, `lname`, `dept_id`, `sem_id`, `crn`, `reg`, `batch_bs`, `gender`) 
   VALUES ('$fname','$mname','$lname','$dep','$sem','$crn','$reg','$batch_bs','$Gender')";
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

<h2>Details of Students:</h2>
<p><span class="error">All field are required.</span></p>

    <form method="post" action=""> 
    								<table style="width:100%">
                <tr>

                <td align="right">First Name : </td>
                <td><input type='text' name='fname' />
                 <span class="error"> <?php echo $fnameErr;?></span>
                 
               </td>
                 
                </tr>
              <tr>

                <td align="right">Middle Name : </td>
                <td><input type='text' name='mname' /></td>
                 
              </tr>
                              
              <tr>
                <td align="right">Last Name : </td>
                <td><input type='text' name='lname' />
                 <span class="error"> <?php echo $lnameErr;?></span>
                 
                </td>
              </tr>   

    						<tr>	
       
    	
    								<td align="right">College Roll No : </td>
    								<td><input type='number' name='crn' />
    								<span class="error"> <?php echo $crnErr;?></span>
    								</td>
                </tr>
                <tr>
                    <td align="right">Registration number: </td>
    								<td><input type='number' name='reg' /> 
    								<span class="error"> <?php echo $regErr;?></span>
    								
                    </td>
                <tr>
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
    								<td align="right">Batch - BS : </td>
    								<td><input type='number' name='batch_bs' />
    								
                    </td>
                </tr>
                <tr>
    								<td align="right">Gender : </td>
                                   <td><select name="Gender">
                                    <option value="M">Male</option>
                                    <option value="F">Female</option>
    								 </tr>
    						</tr>
    								
    								<tr>
                      <td><center><input type='submit' name='submit' value='submit' /></center></td>
                    </tr>
    
    </table>
  </form>
 


								
								


                                    
                                

    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
