<?php
include('db.php');
if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $query="INSERT INTO `user_data`( `username`, `password` ,`name` ,`email`) VALUES ('$username','$password','$name','$email')";
    $run=mysqli_query($con,$query);
    if($run){
        header("Location: login.html");

    }
    else{
        echo "Registration failed";
        echo mysqli_error($con);
    }
}
?>