<?php session_start();?>
<?php

$userName = $_POST['username'];
$pass = $_POST['password'];
$hash = password_hash($pass, PASSWORD_BCRYPT);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$check = "select * from user_data where user_name='$userName'";
$result = mysqli_query($conn, $check);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $pwdcheck = $row['user_password'];
    if(password_verify($pass, $pwdcheck)){
        $_SESSION["user_name"] = $userName;
        $_SESSION["user_id"] = $row["user_id"];
        header("Location:newEmptyPHP.php");
    }else{
        echo "Wrong";
    }
} 
$conn->close();
?>
