<?php error_reporting(0); 
?><!DOCTYPE html>
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
    
}

#student th {
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
    background-color: #9933cc;
    color: #ffffff;
    padding: 15px;
}
.menu ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
}
.menu li {
    padding: 10px;
    margin-bottom: 7px;
    background-color :#33b5e5;
    color: #ffffff;
    box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
    text-align: center;
}
.menu li:hover {
    background-color: #0099cc;
}
</style>
</head>
<body>

<div class="header">
<h1>ABC High School</h1>
</div>

<div class="row">

<div class="col-3 menu">
<ul>
<a href="../view_info.php"><li><h1>Home</h1></li></a>
<a href="../aboutus.php"><li><h1>About</h1></li></a>

</ul>
</div>

<div class="col-9">
<h1>Details of Student:</h1>


              <?php

              include 'connect.php';

              include 'functions.php';


              ?>


              <form method="post" action=""> 




                    <table id = "student" style="width:100%">
                <tr>
                    
                
                
                 
                </tr>
            <?php
            $mydata = @$_GET['data'];
            $dept_id = $mydata['dept_id'];
            $sem_id = $mydata['sem_id'];
            $course = $mydata['course'];
            $crn = $mydata['crn'];
            $month = $mydata['month'];
            

                $list_query = mysqli_query($mysqli,"SELECT `crn`,`fname`,`mname`,`lname`, `dept_id`, `sem_id`, `reg`, `batch_ad`, `gender`, `image`, `status` FROM student WHERE dept_id='$dept_id' and sem_id='$sem_id' and crn='$crn';");
                while($run_list = mysqli_fetch_array($list_query)){
                  
                  $crn = $run_list['crn'];
                  $fname = $run_list['fname'];
                  $lname = $run_list['lname'];
                  $dept_id = $run_list['dept_id'];
                  $sem_id = $run_list['sem_id'];
                  $mname = $run_list['mname'];
                  $batch_ad = $run_list['batch_ad'];
                  $gender = $run_list['gender'];
                  $status = $run_list['status'];
                  $image = $run_list['image'];
                  $reg = $run_list['reg'];
                  ?>
                  <tr> 
                    
                    
                    </tr>   
                  <tr> 
                    <th> <?php echo 'Full Name:' ?> </th>
                    <td> <?php echo $fname;echo ' '; echo  $mname; echo ' '; echo $lname;  ?> </td>
                    <td align = "center" rowspan = 6> <img border = 5 src="../student/<?= $image;?>" alt="<?= $s_crn;?>" width="150" height="150" /> </td>

                    </tr>
                   
                   <tr> 
                    <th> <?php echo 'Student Id no:' ?> </th>
                    <td> <?php echo $crn;   ?> </td>
                    </tr>   
                    
                    <tr> 
                    <th> <?php echo 'Department :' ?> </th>
                    <td> <?php 
                    if ($dept_id == '1'){
                        echo "Architecture";
                    }
                    if ($dept_id == '2'){
                        echo "Civil";
                    }
                    if ($dept_id == '3'){
                        echo "Computer";
                    }
                    if ($dept_id == '4'){
                        echo "Electronics";
                    }


                       ?> </td>
                    </tr>

                    <tr> 
                    <th> <?php echo 'Semester :' ?> </th>
                    <td> <?php 
                    if ($sem_id == '1'){
                        echo "First Semester";
                    }
                    if ($sem_id == '2'){
                        echo "Second Semester";
                    }
                    if ($sem_id == '3'){
                        echo "Third Semester";
                    }
                    if ($sem_id == '4'){
                        echo "Fourth Semester";
                    }
                    if ($sem_id == '5'){
                        echo "Fifth Semester";
                    }
                    if ($sem_id == '6'){
                        echo "Sixth Semester ";
                    }
                    if ($sem_id == '7'){
                        echo "Seventh Semester";
                    }
                    if ($sem_id == '8'){
                        echo "Eight Semester";
                    }
                    if ($sem_id == '9'){
                        echo "Ninth Semester";
                    }
                    if ($sem_id == '10'){
                        echo "Tenth Semester";
                    }



                       ?> </td>
                    </tr>
                    
                    <tr> 
                    <th> <?php echo 'Gender:' ?> </th>
                    <td> <?php echo $gender;   ?> </td>
                    </tr>   
                    <?php 
                  }
                  ?>
                  
                </table>

            </br>
        </bt>
         </br>
        </bt>
         </br>
        </bt>
        <h1>Attendance of course: <?php $mydata = @$_GET['data'];
            $dept_id = $mydata['dept_id'];
            $sem_id = $mydata['sem_id'];
            $course = $mydata['course'];
            $crn = $mydata['crn'];
            $month = $mydata['month'];
            echo $course; 
            echo '  of ';
            if( $month == '2015-01%'){
                echo ' January';
            }
            if( $month == '2015-02%'){
                echo ' Feburary';
            }
            if( $month == '2015-03%'){
                echo ' March';
            }
            if( $month == '2015-04%'){
                echo ' April';
            }
            if( $month == '2015-05%'){
                echo ' May';
            }
            if( $month == '2015-06%'){
                echo ' June';
            }
            if( $month == '2015-07%'){
                echo ' July';
            }
            if( $month == '2015-08%'){
                echo ' August';
            }
            if( $month == '2015-09%'){
                echo ' September';
            }
            if( $month == '2015-10%'){
                echo ' October';
            }
            if( $month == '2015-11%'){
                echo ' November';
            }
            if( $month == '2015-12%'){
                echo ' December';
            }
            ?></h1>

             <table id = "student" style="width:100%">

             	<?php
            $mydata = @$_GET['data'];
            $dept_id = $mydata['dept_id'];
            $sem_id = $mydata['sem_id'];
            $course = $mydata['course'];
            $crn = $mydata['crn'];
            $month = $mydata['month'];
            

                $list_query = mysqli_query($mysqli,"SELECT `crn`,`fname`,`mname`,`lname`, `dept_id`, `sem_id`, `reg`, `batch_ad`, `gender`, `image`, `status` FROM student WHERE dept_id='$dept_id' and sem_id='$sem_id' and crn='$crn';");
                while($run_list = mysqli_fetch_array($list_query)){
                  
                  $crn = $run_list['crn'];
                  $fname = $run_list['fname'];
                  $lname = $run_list['lname'];
                  $dept_id = $run_list['dept_id'];
                  $sem_id = $run_list['sem_id'];
                  $mname = $run_list['mname'];
                  $batch_ad = $run_list['batch_ad'];
                  $gender = $run_list['gender'];
                  $status = $run_list['status'];
                  $image = $run_list['image'];
                  $reg = $run_list['reg'];
                  ?>
                  <tr> 
                    
                    
                    </tr>   
                  <tr> 
                    <th> <?php echo 'Full Name:' ?> </th>
                    <td> <?php echo $fname;echo ' '; echo  $mname; echo ' '; echo $lname;  ?> </td>
                    
                    </tr>
                    <tr> 
                    <th> <?php echo 'Number Of Days Present' ?> </th>
                    <td>  <?php 
                    $sql="SELECT count(id) as no_of_days FROM  `attendance` WHERE `crn`='$crn' AND `dept_id` ='$dept_id' AND `sem_id`='$sem_id' AND `course` =  '$course' AND `status` = 1 AND `date_time` LIKE  '$month' order by `id` desc LIMIT 0,1";
                    $result = mysqli_query($mysqli,$sql);
                    $days = mysqli_fetch_assoc($result);
                    $day = $days['no_of_days'];
                    
                    echo $day;
                    
                    ?>   </td>
                    
                    </tr>
                    <tr> 
                    <th> <?php echo 'Attendance Percentage:' ?> </th>
                    <td>  <?php 
                    $sql="SELECT count(id) as no_of_days FROM  `attendance` WHERE `crn`='$crn' AND `dept_id` ='$dept_id' AND `sem_id`='$sem_id' AND `course` =  '$course' AND `status` = 1 AND `date_time` LIKE  '$month' order by `id` desc LIMIT 0,1";
                    $result = mysqli_query($mysqli,$sql);
                    $days = mysqli_fetch_assoc($result);
                    $per = 100*$days['no_of_days']/26;
                    
                    echo $per; echo '%' ;
                    
                    ?>   </td>
                    
                    </tr>
            <?php 
        		}
        	?>
             </table>

         	</br>
     		</br>
               
             

                </div> 


                <?php 
                
          ?>

        </form>



</div>

</div>
</body>
</html>
