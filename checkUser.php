<?php session_start();?>
<?php
$userName = $_GET['user_name']; 
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
if (mysqli_num_rows($result) > 0) {
    echo '<span class = "text-danger" id="unavail">Username unavailable</span>';
}
else
{
   echo '<span class = "text-success">Username available</span>'; 
}
$conn->close();
?>