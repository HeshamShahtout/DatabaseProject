<?php session_start(); ?>
<?php

$userName = $_POST['username'];
$pass = $_POST['password'];
$hash = password_hash($pass, PASSWORD_BCRYPT);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Website";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$check = "select * from user_data where user_name='$userName'";
$result = mysqli_query($conn, $check);
echo mysqli_num_rows($result);
if(mysqli_num_rows($result) == 0)
{
    echo "<script>alert('Wrong Username Please Check Your Username And Try Again');
            document.location='registration.php'</script>";
}
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $pwdcheck = $row['user_password'];
    $deptcheck = $row['dept_id'];
    if (password_verify($pass, $pwdcheck)) {
        echo $userName;
        echo "<br>";
        echo $row['user_name'];
        $_SESSION["user_name"] = $userName;
        $_SESSION["user_id"] = $row["user_id"];
        if($row['dept_id']!=null)
        {
          $_SESSION['redirected'] = 1;
          $_SESSION['deptid'] = $row['dept_id'];
          header("Location:courses.php");   
        }
        else
        {
            $_SESSION['redirected'] = 0;
        header("Location:chooseDepartment.php");
        }
    } else {
        echo "<script>alert('Wrong Password Please Check Your Password And Try Again');
            document.location='registration.php'</script>";
    }
}
$conn->close();
?>
   
    