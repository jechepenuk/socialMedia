<?php

include_once "access-db.php";

$result = mysqli_query($conn,"SELECT * FROM messages WHERE user1='" . $_GET['user_id'] . "' or user2='" .$_GET['user_id'] . "'");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content ="width=device-width,initial-scale=1,user-scalable=yes" />
    <link rel="stylesheet" type="text/css" href="css.css" />
    <script type="text/javascript" src="js/modernizr.custom.86080.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>CF</title>
</head>
<body class="main-container">
<div class="innerwrapper">

    <div class="header">

        <div class="menu_welcomePage">
            <ul>

                <li><a class="navlink" href="./feed.php?user_id=<?php echo $_GET['user_id']; ?>">feed</a> </li>
                <li><a class="navlink" href="./profile.php?user_id=<?php echo $_GET['user_id']; ?>">profile</a> </li>
                <li><a class="navlink" href="./index.php">logout</a> </li>
                <li><form method="post"><input type="text" name="search" placeholder="find a user"></form></li>


            </ul>
        </div>

        <div class="logo">
            <h2 class="logo"> <a href="./index.php">Community Foods</a> </h2>
        </div>

    </div>
    <hr class="hr-navbar">

    <h1 class="welcome-page-title">Your Chats</h1>
    <br> 
    <br>
    <?php 
    while ($row=mysqli_fetch_array($result)){
        if ($row['user1']==$_GET['user_id']){
            $result2=mysqli_query($conn,"SELECT * FROM users WHERE user_id='" . $row['user2'] . "'");
            $user=mysqli_fetch_array($result2);
            $linkname=$user['username'];
            $link="chat.php?user_id=".$_GET['user_id']."&friend=".$row['user2'];
            echo "<a class='proflink' href=".$link.">$linkname</a><br><br>";
        }else{
            $result2=mysqli_query($conn,"SELECT * FROM users WHERE user_id='" . $row['user1'] . "'");
            $user=mysqli_fetch_array($result2);
            $linkname=$user['username'];
            $link="chat.php?user_id=".$_GET['user_id']."&friend=".$row['user1'];
            echo "<a class='proflink' href=".$link.">$linkname</a><br><br>";
        }
    }
    ?>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


</body>

</html>