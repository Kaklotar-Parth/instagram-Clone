<?php

include('connection.php');
session_start();
if(isset($_SESSION['login']) || (isset($_SESSION['uname']) && $_SESSION['uname'] == true)){
    header("location:home.php");
}
$login = false;
$result = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $uname = $_POST["uname"];
    $password = $_POST["newpassword"];
   
    $s = "SELECT `uname` FROM `data` WHERE `uname` = '$uname'"; 
    $r = mysqli_query($conn, $s);
    
    if($r) {
        if (mysqli_num_rows($r) > 0) {
                    $row = mysqli_fetch_assoc($r);
                    $db_uname = $row['uname'];
                    if($db_uname == $uname){
                    $hashedPassword = md5($password); 
                    $sql1 = "UPDATE `data` SET `password`= '$hashedPassword' WHERE `uname` = '$uname'";
                    $result1 = mysqli_query($conn, $sql1);
                    if ($result1) 
                    {
                        echo "<script>alert('Password successfully changed');</script>";
                        header("Location: login.php");
                    } 
                }
        } 
            else 
            {
            echo "<script>alert('Username not found. Please try again.');</script>";
            }
    } 
    
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paaword Reset-instagram</title>
    <link rel="stylesheet" href="./css/forgot.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <form action="./forgot.php" method="post">
        <div class="container2">
        <div class="inst">
            <img src="./forgot .png" alt="" style="height: 110px; padding-bottom: 0px; padding-left: 34px;">   
        </div>

        <div class="text">
                <p class="sing">Trouble logging in?</p>
                <p class="p1">Enter your email, phone, or username and we'll <br> send you a link to get back into your account.</p>
        </div>
        <div class="input">
            <div class="form-group">
                <input type="text" placeholder="Phone number, username, or email" name="uname">
            </div> 
            <div class="form-group">
                 <input type="password" placeholder="Password" name="newpassword">
            </div>
            <div class="login">
            <button align="center"> Reset</button>
            </div>
            
            <div class="x1hmvnq2 x1m39q7l x91k8ka x540dpk">
                <div class="x78zum5 x1q0g3np">
                    <div class="x1iyjqo2 xs83m0k xjm9jq1 x1n2onr6 xwtuau4 x11mr3az">
                    </div>
                    <div class="x1qjc9v5 x972fbf xcfux6l x1qhh985 xm0m39n x9f619 x1roi4f4 x78zum5 xdt5ytf x1c4vz4f x2lah0s x1nxh6w3 x1s688f x1ly1vsg xdj266r xpdqn1h xat24cr x1sliqq xexx8yu x4uap5 x18d9i69 xkhd6sd x1n2onr6 xtvhhri x11njtxf">
                        or
                    </div>
                    <div class="x1iyjqo2 xs83m0k xjm9jq1 x1n2onr6 xwtuau4 x11mr3az">
                    </div>
                </div>
            </div>

            <div class="log">
                <a href="./login.php">Back to login</a>
            </div>

            <div class="acc">
                <a href="./signup.php">Create new account</a>
            </div>


    </form>
    
</body>
</html>