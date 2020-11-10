<?php
session_start();
$_SESSION['success']="";



include('db.php');
if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $password=$_POST['password'];

    $query="SELECT * FROM `user_data` WHERE `username` ='$username' AND `password` = '$password'";
    $run=mysqli_query($con,$query);
    $rows=mysqli_num_rows($run);
    if($rows==1){
        $_SESSION['username']=$username;
        $_SESSION['success']="You have logged in!";
        header("Location: home1.php");
    }
    else{
        echo "Invalid login";
    }
}
?>