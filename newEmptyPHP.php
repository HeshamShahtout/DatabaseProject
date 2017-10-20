<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel ="stylesheet" href="style.css">
        <title>Student Registeration</title>
    <body>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "project";
        $userName = $_SESSION['user_name'];
        $userId = $_SESSION['user_id'];
        $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $check = "select * from Department";

        $result = mysqli_query($conn, $check);
        if (isset($_POST["Dept"])) {
            $det = $_POST['Dept'];
            $sql2 = "UPDATE user_data set dept_id =$det WHERE user_id=$userId";
            $update = mysqli_query($conn, $sql2);
        }
        ?>
        <div class="title"><h1>Welcome <?php echo"$userName"?></h1>
        </div>
        <div class ="center">
        </div>   
        <div class ="container">
            <div class ="left"></div>
            <div class="right">
               <p class="Welcome">Choose Your Department</p>
                <form method="Post" >
                    <select name="Dept" class="deptvalue">
                        <?php
                        while ($row = $result->fetch_assoc()) {
                            $name = $row['name'];
                            echo '<option  value=" ' . $row['dept_id'] . ' "> ' . $row['name'] . ' </option>';
                        }
                        ?>
                    </select>
                   <input type="Submit" value="Select" class="select">
                </form>
            </div>
        </div>

    </body>
</html>

