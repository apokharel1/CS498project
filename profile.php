
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Learning Management System - Admin Panel</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/metisMenu.min.css" rel="stylesheet">

    <link href="css/timeline.css" rel="stylesheet">

    <link href="css/sb-admin-2.css" rel="stylesheet">

    <link href="css/morris.css" rel="stylesheet">

    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

<?php include 'connect.php'; ?>


<?php include 'functions.php'; ?>



<?php 
if ($user_level != 1 and $user_level != 2) {
    header ('location: index.php');
}?>


    <div id="wrapper">

        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="profile.php">SIS - You are logged in as <?php echo  $username ?> </a>
               
            </div>

            

            <ul class="nav navbar-top-links navbar-right">
                <li><a class="btn btn-primary" href="profile.php">Profile</a></li>
                <li><a class="btn btn-primary" href="logout.php">Logout</a></li>
            </ul>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                       
						<li>
                            <a href="take_attendance.php"><i class="fa fa-dashboard fa-fw"></i> TAKE ATTENDANCE</a>
                        </li>
                        
<?php if($user_level==1){?>

                           <li>
                            <a href="view_attendance.php"><i class="fa fa-dashboard fa-fw"></i> VIEW ATTENDANCE</a>
                        </li> 

                        <li>
                            <a href="add_student.php"><i class="fa fa-dashboard fa-fw"></i> ADD STUDENT</a>
                        </li>
                       
							<li>

                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Admin Panel<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="add_teachers.php">Add teachers </a>
                                </li>
                                <li>
                                    <a href="view_teachers.php">View Teachers</a>
                                </li>
                                <li>
                                    <a href="lecturerassign.php">Lecturer Assign</a>
                                </li>
                                
                            </ul>
                        </li>
                       <?php }?>
                        
                    </ul>
                </div>
            </div>
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
            </div>

           <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Teacher Details
                            
                        </div>

<form  align = "center">
                <table align="center">
                    <tr>
                        <td>
                        </br>
                        </td>

                    </tr>
                    <tr>
                        <td colspan = 2>
            
                 <div class="col-lg-12">
                            <img border = '5' src="teacher/<?= $image;?>" alt="<?= $username;?>" width="500" height="400" />
                        </div>
                    
                    </td>
                    
                

                    </tr>
                    <tr>
                        <td align= "left">
                            <h3>Full Name : </h3>
                        </td>
                        <td>
                            <h3><?php echo $fullname?></h3>
                        </td>
                    </tr>
                     

                     </tr>
                    <tr>
                        <td align= "left">
                        
                           <h3>User Name : </h3>
                        </td>
                        <td>
                           <h3> <?php echo $username?>
                            </h3>
                        </td>
                    </tr>
                     

                </table>
            
             
                </form>
                            
               </div>
            
           
                </div>
            </div>
        </div>

    </div>

</body>

</html>
