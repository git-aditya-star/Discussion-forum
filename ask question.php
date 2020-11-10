<?php
session_start();
include('db.php');

if((!$_POST['topic_title'] || !$_POST['topic_content'])){
    header("Location: ask question.html");
    exit;
}
$topic_title=$_POST['topic_title'];
$username=$_SESSION['username'];
$content=$_POST['topic_content'];

$add_topic="INSERT INTO `topics`( `topic_title`, `topic_owner`) VALUES ('$topic_title','$username')";
$run=mysqli_query($con,$add_topic);
$topic_id=mysqli_insert_id($con);

$add_content="INSERT INTO `posts`( `topic_id`, `post_text`, `post_owner`) VALUES ('$topic_id','$content','$username')";
$run=mysqli_query($con,$add_content);

header("Location: home1.php");
?>