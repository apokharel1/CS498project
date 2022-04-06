<?php 
error_reporting(E_PARSE | E_ERROR);
session_start();

function loggedin(){
if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){

return true;


} else{


return false;

}
}
if(loggedin()){
$my_id=$_SESSION['user_id']; 
$user_query = mysqli_query($mysqli,"SELECT `username`, `user_level`, `fullname`, `image` FROM `users` WHERE id='$my_id'");
$run_user = mysqli_fetch_array($user_query);
$username = $run_user['username'];
$user_level = $run_user['user_level'];
$fullname =$run_user['fullname'];
$image =$run_user['image'];

}



?>