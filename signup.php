<?php
session_start();
if(isset($_SESSION['login']) || (isset($_SESSION['uname']) && $_SESSION['uname'] == true)){
    header("location:home.php");
}

include('connection.php');

$showAlert = false;
$error = false;
$showError = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $number = $_POST["number"];
    $password = $_POST["password"];
    $name = $_POST["fname"];
    $uname = $_POST["uname"];

    if (empty($number)){
                 $error = true;
            } 
            else 
            {
                $hashedPassword = md5($password); 

                $sql = "INSERT INTO data VALUES ('', '$number', '$hashedPassword', '$name', '$uname')";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    $showAlert = true;
                    echo "<script>alert('Signup successfully..!');</script>";
                    header("location:login.php");
                }
             }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up-instagram</title>
    <link rel="icon" href="title.png" type="image/icon type">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    
<?php
    if ($showAlert) {
        echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your account is now created and you can login
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div> ';
    }

    if ($error) {
        echo "<script>alert('Error..! All fields are required. Please fill them out.');</script>";
    }

    if ($showError) {
        echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> '. $showError.'
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div> ';
    }
?>
    <form action="./signup.php" method="post">
        <div class="container">
            
            <div class="inst">
                <i data-visualcompletion="css-img" aria-label="Instagram" class="" role="img" style="background-image: url(&quot;./logo.png&quot;); background-position: 0px -52px; background-size: auto; width: 175px; height: 51px; background-repeat: no-repeat; display: inline-block;"></i>
            </div>
            
            <div class="text">
                <p class="sing">Sign up to see photos and videos <br> </p>
                    <p class="p1">from your friends.</p>
            </div>

            <button> <img src="./flogo1.png" alt="" id="lo1">Log in with Facebook </button>
            
            <div class="_aai0">
                <div class="line">
                    <div class="x1iyjqo2 xs83m0k xjm9jq1 x1n2onr6 xwtuau4 x11mr3az"></div>
                    <div class="x1qjc9v5 x972fbf xcfux6l x1qhh985 xm0m39n x9f619 x1roi4f4 x78zum5 xdt5ytf x1c4vz4f x2lah0s x1nxh6w3 x1s688f x1ly1vsg xdj266r xpdqn1h xat24cr x1sliqq xexx8yu x4uap5 x18d9i69 xkhd6sd x1n2onr6 xtvhhri x11njtxf">or</div>
                    <div class="x1iyjqo2 xs83m0k xjm9jq1 x1n2onr6 xwtuau4 x11mr3az"></div>
                </div>
            </div>
            
            <div class="box">
                <div class="form-group">
                    <input type="text" placeholder="Mobile Number or Email" name="number">
                </div>
                <div class="form-group">
                     <input type="password" placeholder="Password" name="password">
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Full Name" name="fname">
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Username" name="uname">
                </div> 
            </div>

            <div class="txt">
                <p class="ttt">People who use our service may have uploaded<br></p> 
                <p class="tt1">your contact information to Instagram. <a href="">Learn More</a></p> 
            </div>

            <div class="txt1">
                <p class="t">By signing up, you agree to our <a href=""> Terms</a> , <a href="">Privacy</a> <br></p>  
                <p class="tt2"> <a href="">Policy </a> and  <a href="">Cookies Policy . </a></p> 
            </div>

            <div class="sing _btn _btn1">
            <button align="center" onclick="myFunction()">Sign up</button>
            </div>

        </div> 

        <div class="container1">
            <p> Have an account? <a href="./login.php">Log in</a> </p> 
        </div>

        <div class="text">
            <p>Get the app.</p>
        </div>
    </form>
    
</body>
</html>
