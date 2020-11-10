
<?php
session_start();
include('db.php');?>
<!DOCTYPE html>
<html>
    <head>
        <title>profile</title>
        <link rel="stylesheet" href="css/prof.css">

    </head>
    <body >
    <?php if (isset($_SESSION['username'])): ?>
        <div class="header">
            <h2>Welcome <strong><?php echo $_SESSION['username']; ?></strong></h2>
        </div>
        <div class ="na">
            <ul>
            <li><a href="prof.php" >PROFILE</a></li>
            <li><a href="home1.php">HOME</a></li>
            <li><a href="ask question.html">ASK QUESTION</a></li>
            <li><a href="View All.php">VIEW QUESTIONS</a></li>
            <li><a class="logout" href="login.html?logout='1'" >Logout</a></li>
            </ul>
            </div>
        <?php endif ?>
        </body>
        </html>
        <?php
        if(isset($_GET['logout'])){
            session_destroy();
            unset($_SESSION['username']);
            header("Location: login.html");
        }
        $username=$_SESSION['username'];
        $query="SELECT  `username`,  `name`, `email` FROM `user_data` WHERE `username`='$username' ";
    $run=mysqli_query($con,$query);
    $row=mysqli_num_rows($run);
    if($row==1)
    {
        $stud_row=mysqli_fetch_assoc($run);
        foreach ($stud_row as $k => $v)
        {
            echo "<div class=\"profile\">$k = $v</div>";
            
        }
        echo "<br>";
    }



?>
