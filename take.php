<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>

#student {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    width: 100%;
    border-collapse: collapse;
}

#student td, #student th {
    font-size: 1em;
    border: 1px solid #98bf21;
    padding: 3px 7px 2px 7px;
    text-align: center;
}

#student th {
    font-size: 1.1em;
    text-align: center;
    padding-top: 5px;
    padding-bottom: 4px;
    background-color: #A7C942;
    color: #ffffff;
}



* {
    box-sizing: border-box;
}
.row:after {
    content: "";
    clear: both;
    display: block;
}
[class*="col-"] {
    float: left;
    padding: 15px;
}
.col-1 {width: 8.33%;}
.col-2 {width: 16.66%;}
.col-3 {width: 25%;}
.col-4 {width: 33.33%;}
.col-5 {width: 41.66%;}
.col-6 {width: 50%;}
.col-7 {width: 58.33%;}
.col-8 {width: 66.66%;}
.col-9 {width: 75%;}
.col-10 {width: 83.33%;}
.col-11 {width: 91.66%;}
.col-12 {width: 100%;}
html {
    font-family: "Lucida Sans", sans-serif;
}
.header {
    background-color: #A7C942;
    color: #ffffff;
    padding: 15px;
}

</style>
</head>
<body>

<div class="header">
<a href="../profile.php" style="text-decoration:none"><h1>Home</h1></a>     
<h1>Take Attendance</h1>
</div>

<?php

              include 'connect.php';

              include 'functions.php';


              ?>



<div class="col-9">
<h1>Take Attendance of course: <?php 
$mydata = @$_GET['data'];
            $dept_id = $mydata['dept_id'];
            $sem_id = $mydata['sem_id']; 
            $course = $mydata['course'];
            $username = $mydata['username'];

            echo $course;


?> </h1>

</div>

              <form method="post" action=""> 

<?php
$mydata = @$_GET['data'];
            $dept_id = $mydata['dept_id'];
            $sem_id = $mydata['sem_id']; 
            $course = $mydata['course'];
            $username = $mydata['username'];

if(isset($_POST['attendance'])){
    $students = $_POST['Attendance'];
  
    
 
     
echo '<h1>attendance taken successfully</h1>';

header('location: ../profile.php');

foreach ($students as $key) {
  $sql="INSERT INTO `attendance`(`crn`,`lecturer`,`dept_id`, `sem_id`, `course`) VALUES (".$key.",'$username',$dept_id,$sem_id,'$course')";
  mysqli_query($mysqli,$sql);
  
  

}
exit;
}

?>
<input type="hidden" name="dept_id" value="<?= $dept_id;?>"> 
<input type="hidden" name="sem_id" value="<?= $sem_id;?>">
<input type="hidden" name="course" value="<?= $course;?>">
<input type="hidden" name="username" value="<?= $username;?>">
                    <table id="student" style="width:100%">

                       <?php
            $mydata = @$_GET['data'];
            $dept_id = $mydata['dept_id'];
            $sem_id = $mydata['sem_id']; 
            $course = $mydata['course'];
            $username = $mydata['username'];
             ?>
    
                <tr>
                    <th>Photo:</th>
                <th>First Name :</th>
                <th>Last Name :</th>
                <th>College roll no:</th>
                <th>Do Attendance</th>
                 
                </tr>
            <?php
            $mydata = @$_GET['data'];
            $dept_id = $mydata['dept_id'];
            $sem_id = $mydata['sem_id']; 
            $course = $mydata['course'];
            $username = $mydata['username'];

                $list_query = mysqli_query($mysqli,"SELECT fname,lname,crn,image FROM student WHERE dept_id='$dept_id' and sem_id='$sem_id';");
                while($run_list = mysqli_fetch_array($list_query)){
                  $s_fname = $run_list['fname'];
                  $s_lname = $run_list['lname'];
                  $s_crn = $run_list['crn'];
                  $img = $run_list['image'];
                  ?>
                  <tr> 
                    <td><img src="../student/<?= $img;?>" alt="<?= $s_crn;?>" width="50" height="50" /></td>
                    <td> <?php echo $s_fname ?> </td>
                      <td> <?php echo $s_lname ?> </td>
                      <td> <?php echo $s_crn ?> </td>
                      <td align = "center"><input type='checkbox' name='Attendance[<?= $s_crn;?>]' value='<?= $s_crn;?>' checked />

                  </tr>

                    <?php 
                  }
                  ?>
                  <tr><td align="center" colspan="5"><input type="submit" name="attendance" value="Do Attendance"></td></tr>
                </table>
                <?php 
                
          ?>

        </form>



</div>

</div>
</body>
</html>
