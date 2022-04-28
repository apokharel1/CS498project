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

           

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Select Teacher</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Choose to activate or to deactivate teacher's account.
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


<h2>USERNAME of Teachers:</h2>


              
              <?php

               isset($_GET['type']) && !empty($_GET['type'])

              ?>
    								<table style="width:100%">
                <tr>

                <td>Teacher Name :</td>
                <td>Options :</td>
                 
                </tr>
            <?php
                $list_query = mysqli_query($mysqli,"SELECT id,username,type FROM users");
                while($run_list = mysqli_fetch_array($list_query)){
                  $u_id = $run_list['id'];
                  $u_username = $run_list['username'];
                  $u_type = $run_list['type'];
                  ?>
                  <tr> <td> <?php echo $u_username ?> </td>
                    <td>
                      <?php 
                      if($u_type == 'a') {
                        echo "<a href ='options.php?u_id=$u_id&type=$u_type'> Deactivate </a> ";

                      }
                      else
                      {
                        echo "<a href ='options.php?u_id=$u_id&type=$u_type'> Activate </a> ";
                      }
                      ?>
                    </td></tr>
                    <?php 
                  }
                  ?>
                </table>
                <?php 
                
          ?>

    			
    <script src="../javascript/jquery.min.js"></script>

    <script src="../javascript/bootstrap.min.js"></script>

    <script src="../javascript/metisMenu.min.js"></script>

    <script src="../javascript/sb-admin-2.js"></script>

</body>

</html>
