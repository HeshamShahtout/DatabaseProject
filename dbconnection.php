<?php session_start();?>
<?php

$email = $_POST['email'];
$userName = $_POST['username'];
$pass = $_POST['password'];
$hash = password_hash($pass, PASSWORD_BCRYPT);
$servername = "localhost";
$username = "root";
$password = "";
$dbname= "Website";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$check = "select * from user_data where user_name='$userName'";
$checkemail = "select * from user_data where email='$email'";
$result = mysqli_query($conn, $check);
$resultemail = mysqli_query($conn, $checkemail);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    if ($userName == $row['user_name']) 
    {
        echo "<script>alert('Username Already exists');document.location='registration.php'</script>";
        //sleep(1);
        //header("location:javascript://history.go(-1)");
    }
}
if (mysqli_num_rows($resultemail) > 0)
{
    $rowemail = mysqli_fetch_assoc($resultemail);
    if ($email == $rowemail['email'])
    {
        echo "<script>alert('Email Already exists');document.location='registration.php'</script>";
        //sleep(1);
        //header("location:javascript://history.go(-1)");
    }
}

else {

    $sql = "INSERT into user_data(email,user_name,user_password,registeration_date) values ('$email','$userName','$hash',now())";

    if ($conn->query($sql) === TRUE) {
            $_SESSION['redirected'] = true;
            echo "<script>alert('Account Registered Successfuly Please Login');
            document.location='registration.php'</script>";
            
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    
    
}
$conn->close();
?>
