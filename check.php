<?php session_start(); ?>
<?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "Website";
        $userName = $_SESSION['user_name'];
        $userId = $_SESSION['user_id'];
        $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
            $check = "select * from Department";
            $getid = "select * from user_data where user_name='$userName'";
            $result2 = mysqli_query($conn, $getid);
            if (mysqli_num_rows($result2) > 0) {
                $row = mysqli_fetch_assoc($result2);
                $userID = $row['user_id'];
            }
          $result = mysqli_query($conn, $check);
        if (isset($_POST["Dept"])) {
                $det = $_POST['Dept'];
                $sql3 = "UPDATE user_data set dept_id =$det WHERE user_id=$userID";
                $_SESSION["department"] = $det;
                $update = mysqli_query($conn, $sql3);
                echo "here";
                echo $userID;
                $_SESSION['redirected'] = 0;
                header("Location:courses.php");
            } 
        ?>