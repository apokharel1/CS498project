<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>

#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    width: 100%;
    border-collapse: collapse;
}

#customers td, #customers th {
    font-size: 1em;
    border: 1px solid #98bf21;
    padding: 3px 7px 2px 7px;
}

#customers th {
    font-size: 1.1em;
    text-align: left;
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
<a href="../profile.php"><h1>Home</h1></a>     
<h1>View Attendance</h1>


</div>


 <?php

              include 'connect.php';

              include 'functions.php';

              ini_set('max_execution_time', 300);


              ?>

<?php 
if ($user_level != 1 and $user_level !=2) {
    header ('location: ../index.php');
}?>

<div class="col-9">
<h1>Attendance of course: <?php $mydata = @$_GET['data'];
            $dept_id = $mydata['dept_id'];
            $sem_id = $mydata['sem_id'];
            $course = $mydata['course'];
            $lecturer = $mydata['lecturer'];
            $month = $mydata['month'];
            echo $course; 
            echo '  and  Month:';
            if( $month == '2016-01%'){
                echo ' January';
            }
            if( $month == '2016-02%'){
                echo ' Feburary';
            }
            if( $month == '2016-03%'){
                echo ' March';
            }
            if( $month == '2016-04%'){
                echo ' April';
            }
            if( $month == '2016-05%'){
                echo ' May';
            }
            if( $month == '2016-06%'){
                echo ' June';
            }
            if( $month == '2016-07%'){
                echo ' July';
            }
            if( $month == '2016-08%'){
                echo ' August';
            }
            if( $month == '2016-09%'){
                echo ' September';
            }
            if( $month == '2016-10%'){
                echo ' October';
            }
            if( $month == '2016-11%'){
                echo ' November';
            }
            if( $month == '2016-12%'){
                echo ' December';
            }
            ?></h1>

             </div> 
             


              <form method="post" action=""> 


                    <table id = "customers" style="width:40%">
                <tr>
                    
                <th>First Name</th>
                <th>Last Name </th>
                <th>Roll No.</th>
                <th>Attd.</th>

                <?php for($i=1;$i<=32;$i++){?>
                <th><?= $i;?></th>
                <?php }?>
                
                 
                </tr>
            <?php
            $mydata = @$_GET['data'];
            $dept_id = $mydata['dept_id'];
            $sem_id = $mydata['sem_id'];
            $course = $mydata['course'];
            $lecturer = $mydata['lecturer'];
            $month = $mydata['month'];


                $list_query = mysqli_query($mysqli,"SELECT crn,fname,lname FROM student WHERE dept_id='$dept_id' and sem_id='$sem_id';");

                while($run_list = mysqli_fetch_array($list_query)){
                  
                  $crn = $run_list['crn'];
                  $fname = $run_list['fname'];
                  $lname = $run_list['lname'];
                  
                  ?>
                  <tr> 
                    <td> <?php echo $fname ?> </td>
                    <td> <?php echo $lname ?> </td>
                    <td> <?php echo $crn ?> </td>

                    <?php 
                    $sql="SELECT count(id) as no_of_days FROM  `attendance` WHERE `lecturer`= '$lecturer' AND `crn`='$crn' AND `dept_id` ='$dept_id' AND `sem_id`='$sem_id' AND `course` =  '$course' AND `status` = 1 AND `date_time` LIKE  '$month' order by `id` desc LIMIT 0,1";
                    $result = mysqli_query($mysqli,$sql);
                    $days = mysqli_fetch_assoc($result);
                    $per = $days['no_of_days'];

                    ?>
                    <td><?= sprintf($per,'.2f');?>/26</td>
                    <?php for($i=1;$i<=32;$i++){?>
                    <td><?php 
                    $day = $i;
                    if($i<10){
                        $day = "0".$i;
                    }
                    $sql="SELECT * FROM  `attendance` WHERE `lecturer`= '$lecturer' AND `crn`='$crn' AND `dept_id` ='$dept_id' AND `sem_id`='$sem_id' AND `course` =  '$course' AND `status` = 1 AND `date_time` LIKE  '$month".$day."%' order by `id` desc LIMIT 0,1";

                    $result = mysqli_query($mysqli,$sql);
                    $c = mysqli_num_rows($result);

                    if($c>0) {
                        echo 'P';
                    }
                    else {
                        echo '.';
                    }
                    ?></td>
                    <?php }?>
                      

                  </tr>

                    <?php 
                  }
                  ?>
                  
                </table>
                <?php 
                
          ?>

        </form>



</div>

</div>
</body>
</html>
