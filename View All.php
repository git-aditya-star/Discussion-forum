<?php
session_start();
$username=$_SESSION['username'];

include('db.php');
$get_topics="SELECT `topic_id`, `topic_title`, `topic_owner` FROM `topics` WHERE `topic_owner` != '$username'";
$get_topics_res = mysqli_query($con,$get_topics);

if(mysqli_num_rows($get_topics_res)<1){
    $display_block="<p><em>No Questions exist.</em></p>";

}
else{
    $display_block="
    <table cellpadding=3 border=1>
    <tr>
    <th>Question title</th>
    </tr>";
    while($topic_info=mysqli_fetch_array($get_topics_res)){
        $topic_id=$topic_info['topic_id'];
        $topic_title=stripslashes($topic_info['topic_title']);
        $topic_owner=stripslashes($topic_info['topic_owner']);


        $display_block .= "
        <tr>
        <td><a href=\"showtopic.php?topic_id=$topic_id\">
        <strong>$topic_title</strong></a>
        <div class=\"user\" >Proposed By $topic_owner</div></td>
        </tr>";
    }
    $display_block .= "</table>";
}
?>
<html>
    <head>
        <title>View All</title>
        <link rel="stylesheet" href="css/view all.css">

    </head>
    <body>
        <h1>All Questions</h1>
        <div class ="na">
        <ul>
        <li><a href="prof.php" >PROFILE</a></li>
        <li><a href="home1.php">HOME</a></li>
        <li><a href="ask question.html">ASK QUESTION</a></li>
        <li><a href="View All.php">VIEW QUESTIONS</a></li>
        <li><a class="logout" href="login.html?logout='1'" >Logout</a></li>
        </ul>
        </div>
        <?php echo $display_block;?>
    </body>
</html>


    

