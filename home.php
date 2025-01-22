<?php
session_start();

if(!isset($_SESSION['login']) || $_SESSION['login']!=true){
    header("location:login.php");
    exit;
}

?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instagram-HOME</title>
</head>
<body>

    <h1>HELLO WELCOME</h1>
    <h2> WELCOME - <?php echo $_SESSION['uname'];?></h2>
    
    <br><br>

<button type="submit" ><a href="logout.php">LOGOUT</a></button> 

</body>
</html>