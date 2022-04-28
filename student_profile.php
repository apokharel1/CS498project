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
    background-color: #FEFEFE;
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
    <a href="index.php"></a><img src="../img/abclogo.png"></a>
</div>

<div class="row">

<div class="col-3 menu">
<ul>
<a href="../index.php" style="text-decoration:none"><li><h1>Home</h1></li></a>

</ul>
</div>

<div class="col-9">
<h1>Details of Student:</h1>


              <?php

              include 'connect.php';

              include 'functions.php';


              ?>


              <form method="post" action=""> 

<?php

            $mydata = @$_GET['data'];
            $fname = $mydata['fname'];
            $lname = $mydata['lname'];
            $crn = $mydata['crn'];
            
$list_query = mysqli_query($mysqli,"SELECT `crn`,`fname`,`mname`,`lname`, `dept_id`, `sem_id`, `reg`, `batch_ad`, `gender`, `image`, `status` FROM student WHERE fname='$fname' and lname='$lname' and crn='$crn';");
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

if(isset($_POST['submit'])){
    
    $course = $_POST['course'];
    
    $month = $_POST['month'];

    
           
                $_SESSION['department'] = $dept_id;
                //echo $dept_id.' '.$sem_id;exit;
header('location: ../viewforparents.php/?data[dept_id]='.$dept_id.'&data[sem_id]='.$sem_id.'&data[course]='.$course.'&data[month]='.$month.'&data[crn]='.$crn);
    

           
    
}
?>
 <?php    
                 }
                 ?>


                    <table id = "student" style="width:100%">
                <tr>
                    
                
                
                 
                </tr>
            <?php
            $mydata = @$_GET['data'];
            $fname = $mydata['fname'];
            $lname = $mydata['lname'];
            $crn = $mydata['crn'];
            

                $list_query = mysqli_query($mysqli,"SELECT `crn`,`fname`,`mname`,`lname`, `dept_id`, `sem_id`, `reg`, `batch_ad`, `gender`, `image`, `status` FROM student WHERE fname='$fname' and lname='$lname' and crn='$crn';");
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
                    <th> <?php echo 'Student id:' ?> </th>
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
        <h2>Please Select Subject And Month:</h2>
                 <table style="width:40%">
                
                 <?php
                $list_query = mysqli_query($mysqli,"SELECT username FROM users where user_level=2 and type='a'");
                
              ?> 

                
                <tr>
                                    <td align="left">Subject : </td>
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
                    <td><br></td>
                </tr>
             
                <tr>
                                    <td align="left">Month : </td>
                                    <td><select name="month">
                                    <option value="2015-01%">January</option>
                                    <option value="2015-02%">Feburary</option>
                                    <option value="2015-03%">March</option>
                                    <option value="2015-04%">April</option>
                                    <option value="2015-05%">May</option>
                                    <option value="2015-06%">June</option>
                                     <option value="2015-07%">July</option>
                                    <option value="2015-08%">August</option>
                                    <option value="2015-09%">September</option>
                                    <option value="2015-10%">October</option>
                                    <option value="2015-11%">November</option>
                                    <option value="2015-12%">December</option>
                                    
                                    </select>
                                    
                    </td>
                </tr>

                <tr>
                    <td><br></td>
                </tr>

                <tr>
                 <td colspan = 2 align="center"><input type='submit' name='submit' id="submit" value='VIEW' /></td>
                </tr>
              
    
    </table>






                <?php 
                
          ?>

        </form>



</div>

</div>
</body>
</html>
