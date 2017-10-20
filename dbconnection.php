<?php session_start();?>
<?php

$email = $_POST['email'];
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
    if ($userName == $row['user_name']) {
        echo "<script>alert('Username Already exists');document.location='registration.html'</script>";
        //sleep(1);
        //header("location:javascript://history.go(-1)");
    }
} else {

    $sql = "INSERT into user_data(email,user_name,user_password,registeration_date) values ('$email','$userName','$hash',now())";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>
