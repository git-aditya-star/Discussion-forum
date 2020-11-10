<?php
session_start();
include('db.php');

if(( !$_POST['answer_content'])){
    header("Location: reply.html");
    exit;
}

$username=$_SESSION['username'];
$topic_id=$_SESSION['topic_id'];
$answer=$_POST['answer_content'];

$add_answer="INSERT INTO `posts`( `topic_id`, `post_text`, `post_owner`) VALUES ('$topic_id','$answer','$username')";
$run=mysqli_query($con,$add_answer);

header("Location: home1.php");
?>