<?php
$servername = "localhost";
$username = "root";
$password  ="";
$dbname = "instagram";

$conn = new mysqli($servername,$username,$password,$dbname);
if($conn)
{
    // echo"connetecd";
}else{
    echo "not connete";
}

?>