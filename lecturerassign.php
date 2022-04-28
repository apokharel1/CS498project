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
                    <h1 class="page-header">Assign Course to Lecturer.</h1>
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

              include 'connect.php';

              include 'functions.php';


              ?>


<?php 
if ($user_level != 1 and $user_level != 2) {
    header ('location: index.php');
}?>


<h2>Assign Course:</h2>


    <form method="post" action=""> 
          
         <?php
        if(isset($_POST['submit'])){
            $username=$_POST['lecturer'];
            $course=$_POST['subject'];
            
            mysqli_query($mysqli,"INSERT INTO lecturerassign VALUES ('','$username','1','$course')");
            echo "<p> Lecture Assigned Sucessfully!!";
        
    }

        ?>

    
           
                <table style="width:100%">
                
                 <?php
                $list_query = mysqli_query($mysqli,"SELECT username FROM users where user_level=2 and type='a'");
                
              ?>

                <tr>
                    <td align="right">Lecturer   : </td>
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
                                    <td align="right">Subject : </td>
                                    <td><select name="subject">
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
                 <td align="right"><input type='submit' name='submit' id="submit" value='Assign' /></td>
                </tr>
              
    
    </table>
  </form>

    <script src="../javascript/jquery.min.js"></script>

    <script src="../javascript/bootstrap.min.js"></script>

    <script src="../javascript/metisMenu.min.js"></script>

    <script src="../javascript/sb-admin-2.js"></script>

</body>

</html>
