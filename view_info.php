 <!DOCTYPE html>
<html lang="eng">

<head>
    <title>Learning Management System</title> 
    <meta charset="utf-8"/>
    
    <link rel="stylesheet" href="style_login.css" type="text/css"/>
    <meta name="veiwport" content="width=device-width, initial-scale=1.0">
</head>

<body class="body">

<?php include 'connect.php'; ?>


<?php include 'functions.php'; ?>

    <?php
    include 'header.php';
    
    ?>
    <br />
    <br />
    
    <div class="mainform">
    
    
    
    <form align="center" method='post'>
<?php
if(isset($_POST['submit'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $crn = $_POST['crn'];
    if(empty($fname) or empty($lname) or empty($crn))    {
        echo "<p>Fields empty!!!</p>";
    } else {
            
            $check_login = mysqli_query($mysqli,"SELECT id,status FROM student WHERE fname='$fname' AND lname='$lname' AND crn='$crn'");
            if(mysqli_num_rows($check_login) == 1){
                $run = mysqli_fetch_array($check_login);
                $user_id = $run['id'];
                $status = $run['status'];
                if($status == '0'){

                    echo "<p> <h3>The Student you are trying to search is unavailable</h3></p>";
                }
                else {
                $_SESSION['fname'] = $fname;
                header('location: student_profile.php/?data[fname]='.$fname.'&data[lname]='.$lname.'&data[crn]='.$crn);
    
                }
                
            }
            else {
            echo "<p><h3>Sorry!! Please Enter Correct Name and Student id.</h3></p>";
            }
    
    }
}
?>

Student's First Name : <br/>
<input type='text' name='fname' />

<br/><br/>
Student's Last Name : <br/>
<input type='text' name='lname' />

<br/><br/>
Student's Id No. : <br/>
<input type='number' name='crn' />
<br/><br/>
<input type='submit' name='submit' value='Show' /></br></br>


</form>
    
    
    
    
    
    
    </div>
    

    </body>