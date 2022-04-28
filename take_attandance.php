<?php include 'common.php';?>
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
                    <h1 class="page-header">Take Student's Attendance</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Please select informations.
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                
                                <?php


// define variables and set to empty values
$departmentErr = $semester = "";
$department = $semester = "";

include 'connect.php';
include 'functions.php';


?>



<h2>Select fields and Take Attendance:</h2>
<p><span class="error">All field are required.</span></p>

    <form method="post" action=""> 
                
                <?php
if(isset($_POST['submit'])){
    $dept_id = $_POST['department'];
    $sem_id = $_POST['semester'];
    $course = $_POST['course'];
    $username= $_POST['username'];

                
                $_SESSION['department'] = $dept_id;
                header('location: take.php/?data[dept_id]='.$dept_id.'&data[sem_id]='.$sem_id.'&data[course]='.$course.'&data[username]='.$username);
    
                
           
    
}
?>
<input type="hidden" name="username" value="<?= $username;?>">

                <table style="width:100%">
                
                 
                <tr>
                                    <td align="right">Department   : </td>
                                    <td><select name="department">
                                    <option value="1">Architecture</option>
                                    <option value="2">Civil</option>
                                    <option value="3">Computer</option>
                                    <option value="4">Electronics</option>
                                    </select>
                                    
                    </td>
                </tr>
                 <tr>
                                    <td align="right">Semester </td>
                                    <td><select name="semester">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    </select>
                                    
                    </td>
                </tr>
        <?php
               
              echo "<h3>You are logged in as $username </h3>";
              
                
        ?>
        <?php
                $list_query = mysqli_query($mysqli,"SELECT course FROM lecturerassign where username='$username'");
                
              ?>



                <tr>
                                    <td align="right">subject </td>
                                    <td><select name="course">
                                    <?php 
                        while($run_list = mysqli_fetch_array($list_query)){
                  
                  $course = $run_list['course'];?>
                  <option value="<?= $run_list['course'];?>"><?= $run_list['course'];?></option>
                  <?php 
                  
              }?>
                                    
                                    </select>
                                    
                    </td>
                </tr>
              
                <tr>
                 <td align="right"><input type='submit' name='submit' id="submit" value='Proceed' /></td>
                </tr>
              
    
    </table>
  </form>
 
    <script src="../javascript/jquery.min.js"></script>

    <script src="../javascript/bootstrap.min.js"></script>

    <script src="../javascript/metisMenu.min.js"></script>

    <script src="../javascript/sb-admin-2.js"></script>

</body>

</html>
