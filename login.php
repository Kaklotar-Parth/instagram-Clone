<?php
session_start();
if (isset($_SESSION['login']) || (isset($_SESSION['uname']) && $_SESSION['uname'] == true)) {
    header("location:home.php");
}

include('connection.php');

$login = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uname = $_POST["uname"];
    $password = $_POST["password"];

    $hashedPassword = md5($password);

    $sql = "SELECT * FROM data WHERE uname='$uname' AND password='$hashedPassword'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);

    if ($num == 1) {
        $login = true;
        $_SESSION['login'] = true;
        $_SESSION['uname'] = $uname;

        header("location:home.php");
    } else {
        echo "<script>alert('Invalid Credentials..!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in-instagram</title>
    <link rel="stylesheet" href="./css/style1.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

<?php
    if ($login) {
        echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> You are logged in
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div> ';
    }
?>

<form action="./login.php" method="post">
    <div class="container2">
        <div class="inst">
            <i data-visualcompletion="css-img" aria-label="Instagram" class="" role="img" style="background-image: url(&quot;./logo.png&quot;); background-position: 0px -52px; background-size: auto; width: 175px; height: 51px; background-repeat: no-repeat; display: inline-block;"></i>
        </div>
        <div class="input">
            <div class="form-group">
                <input type="text" placeholder="Phone number, username, or email" name="uname">
            </div>
            <div class="form-group">
                <input type="password" placeholder="Password" name="password">
            </div>
            <div class="login">
                <button align="center">Log in</button>
            </div>
            <div class="x1hmvnq2 x1m39q7l x91k8ka x540dpk">
                <div class="x78zum5 x1q0g3np">
                    <div class="x1iyjqo2 xs83m0k xjm9jq1 x1n2onr6 xwtuau4 x11mr3az"></div>
                    <div class="x1qjc9v5 x972fbf xcfux6l x1qhh985 xm0m39n x9f619 x1roi4f4 x78zum5 xdt5ytf x1c4vz4f x2lah0s x1nxh6w3 x1s688f x1ly1vsg xdj266r xpdqn1h xat24cr x1sliqq xexx8yu x4uap5 x18d9i69 xkhd6sd x1n2onr6 xtvhhri x11njtxf">or</div>
                    <div class="x1iyjqo2 xs83m0k xjm9jq1 x1n2onr6 xwtuau4 x11mr3az"></div>
                </div>
            </div>
            <div class="icon" align="center">
                <img src="./sing.png" alt="" id="logo2">
                <a href="" id="logotxt">Log in with Facebook</a>
            </div>
        </div>
        <div class="txt">
            <p class="tx1"><a href="./forgot.php">Forgot password?</a></p>
        </div>
    </div>

    <div class="container3">
        <p> Don't have an account? <a href="./signup.php">Sign up</a> </p>
    </div>

    <div class="txtq">
        <p>Get the app.</p>
    </div>
</form>

</body>
</html>


ccccccccccccccc