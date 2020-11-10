<?php
session_start();
include('db.php');

if(!$_GET['topic_id']){
    header("Location: home1.php");
    exit;
}
$topic_id= $_GET['topic_id'];
$_SESSION['topic_id']=$topic_id;
$verify_topic="SELECT `topic_title` FROM `topics` WHERE `topic_id` = '$topic_id'";
$query=mysqli_query($con,$verify_topic);

if(mysqli_num_rows($query) <1){
    $display_block="<p><em>You have selected an Invalid topic
    Please <a href=\"home1.php\">try again</a>.</em><p>";


}
else{
    $topic_Arr=mysqli_fetch_array($query);
    $topic_title=$topic_Arr['topic_title'];

    $get_answers="SELECT `post_id`, `post_text`, `post_owner` FROM `posts` WHERE `topic_id`='$topic_id'";

    $answer_query=mysqli_query($con,$get_answers);

    $display_block="
    <p class=\"title\">Showing the Answers for the <strong>$topic_title</strong> question:</p>
    <table width=80% cellpadding=3 cellspacing=1 border=1>
    <tr>
    <th>USER</th>
    <th>ANSWERS</th>
    </tr>";
    while($answers=mysqli_fetch_array($answer_query)){
        $post_id=$answers['post_id'];
        $post_text= nl2br(stripslashes($answers['post_text']));
        $post_user=stripslashes($answers['post_owner']);

        $display_block .="
        <tr>
        <td width=25% >$post_user</td>
        <td width=75% >$post_text</td>
        
        </tr>";

    }
    $display_block .= "</td>
    </table>";


}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Answers for the Question</title>
        <link rel="stylesheet" href="css/show.css">
    </head>
    <body>
        <h1>Answers for the Question</h1>
        <div class ="na">
            <ul>
            <li><a href="prof.php" >PROFILE</a></li>
            <li><a href="home1.php">HOME</a></li>
            <li><a href="ask question.html">ASK QUESTION</a></li>
            <li><a href="View All.php">VIEW QUESTIONS</a></li>
            <li><a class="logout" href="login.html?logout='1'" >Logout</a></li>
            </ul>
        </div>
        <?php echo $display_block; ?>
        
        <a class="add" href="reply.html"><strong> ADD ANSWER </strong></a>
    </body>

</html>


