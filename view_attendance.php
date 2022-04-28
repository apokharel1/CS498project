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
                    <h1 class="page-header">View Student's Attendance</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
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



$departmentErr = $semesterErr = "";
$department = $semester = $course = $lecturer = "";

include 'connect.php';

include 'functions.php';


    include 'header.php';
    
?>

<?php 
if ($user_level != 1 and $user_level != 2) {
    header ('location: index.php');
}?>

<h2>View Attendance:</h2>


    <form method="post" action=""> 
          
          <?php
if(isset($_POST['submit'])){
    $dept_id = $_POST['department'];
    $sem_id = $_POST['semester'];
    $course = $_POST['course'];
    $lecturer = $_POST['lecturer'];
    $month = $_POST['month'];

    
            /*$check_login = mysql_query("SELECT department, semester FROM student WHERE department='$department' AND semester='$semester'");
            
                $run = mysql_fetch_array($check_login);
                $s_department = $run['department'];
                $s_semester = $run['semester'];*/
                
                $_SESSION['department'] = $dept_id;
                //echo $dept_id.' '.$sem_id;exit;
                header('location: view.php/?data[dept_id]='.$dept_id.'&data[sem_id]='.$sem_id.'&data[course]='.$course.'&data[lecturer]='.$lecturer.'&data[month]='.$month);
    
                
           
    
}
?>
    
            
                <table style="width:100%">
                
                 <?php
                $list_query = mysqli_query($mysqli,"SELECT username FROM users where user_level=2 and type='a'");
                
              ?> 

                <tr>
                    <td align="right">Department   : </td>
                    <td><select name="department">
                    
                    <option value="3">Computer</option>
                    <option value="1">Architecture</option>
                    <option value="2">Civil</option>
                    <option value="4">Electronics</option>
                    </select>
                    
                    </td>
                </tr>
                 <tr>
                    <td align="right">Semester : </td>
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

                <tr>
                                    <td align="right">Subject : </td>
                                    <td><select name="course">
                                    <option value="ISD">ISD</option>
                                    <option value="DSA">DSA</option>
                                    <option value="MATHS">MATHS</option>
                                    <option value="EDC">EDC</option>
                                    <option value="COD">COD</option>
                                    <option value="PROJECT">PROJECT</option>
                                    
                                    </select>
                                    
                    </td>
                </tr>

             
             <tr>
                    <td align="right">Lecturer : </td>
                    <td><select name="lecturer">
                    <?php 
                        while($run_list = mysqli_fetch_array($list_query)){
                  
                  $u_username = $run_list['username'];?>
                  <option value="<?= $run_list['username'];?>"><?= $run_list['username'];?></option>
                  <?php 
                  
              }?>
                    </select>
                    
                    </td>
                </tr>

                <tr>
                                    <td align="right">Month : </td>
                                    <td><select name="month">
                                    <option value="2016-01%">January</option>
                                    <option value="2016-02%">Feburary</option>
                                    <option value="2016-03%">March</option>
                                    <option value="2016-04%">April</option>
                                    <option value="2016-05%">May</option>
                                    <option value="2016-06%">June</option>
                                     <option value="2016-07%">July</option>
                                    <option value="2016-08%">August</option>
                                    <option value="2016-09%">September</option>
                                    <option value="2016-10%">October</option>
                                    <option value="2016-11%">November</option>
                                    <option value="2016-12%">December</option>
                                    
                                    </select>
                                    
                    </td>
                </tr>


                <tr>
                 <td align="right"><input type='submit' name='submit' id="submit" value='VIEW' /></td>
                </tr>
              
    
    </table>
  </form>
    <script src="../javascript/jquery.min.js"></script>

    <script src="../javascript/bootstrap.min.js"></script>

    <script src="../javascript/metisMenu.min.js"></script>

    <script src="../javascript/sb-admin-2.js"></script>

</body>

</html>
