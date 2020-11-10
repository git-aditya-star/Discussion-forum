
<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Homepage</title>
        <link rel="stylesheet" href="css/homepage.css">

    </head>
    <body>
        <?php if (isset($_SESSION['username'])): ?>
        <div class="header">
            
            <h2>Welcome <strong><?php echo $_SESSION['username']; ?></strong></h2>
        </div>
        
        <?php endif ?>
        <div class ="na">
        <ul>
        <li><a href="prof.php" >PROFILE</a></li>
        <li><a href="home1.php">HOME</a></li>
        <li><a href="ask question.html">ASK QUESTION</a></li>
        <li><a href="View All.php">VIEW QUESTIONS</a></li>
        <li><a class="logout" href="login.html?logout='1'" >Logout</a></li>
        </ul>
        </div>

    </body>

</html>


<?php

include('db.php');


if(!isset($_SESSION['username'])){
    $_SESSION['msg']="You have to log in first";
    header("Location: login.html");
}

if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['username']);
    header("Location: login.html");
}
$username=$_SESSION['username'];

$get_topics="SELECT `topic_id`, `topic_title` FROM `topics` WHERE `topic_owner` = '$username'";
$get_topics_res = mysqli_query($con,$get_topics);
$get_posts="SELECT `post_id`, `post_text` FROM `posts` WHERE `post_owner` = '$username'";
$get_posts_res = mysqli_query($con,$get_posts);

if(mysqli_num_rows($get_topics_res)<1){
    $display_block="<p><em>No Questions exist.</em></p>";

}
else{
    $display_block="
    <table cellpadding=3 border=1>
    <tr>
    <th>Question title</th>
    <th>Question content</th>
    </tr>";
    while($topic_info=mysqli_fetch_array($get_topics_res)  ){
        $post_info=mysqli_fetch_array($get_posts_res);
        $topic_id=$topic_info['topic_id'];
        $topic_title=stripslashes($topic_info['topic_title']);
        $post_id=$post_info['post_id'];
        $post_text=stripslashes($post_info['post_text']);
        


        $display_block .= "
        <tr>
        <td><a href=\"showtopic.php?topic_id=$topic_id\">
        <strong>$topic_title</strong></a></td>
        <td>$post_text</td>
        </tr>";
    }
    $display_block .= "</table>";
}
?>
<html>
    <body>
        <h1>My Questions</h1>
        <div class="table">
        <?php echo $display_block;?>
        </div>
    </body>
</html>






