<?php
session_start();
$userName = $_SESSION['user_name'];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "Website";
        $userName = $_SESSION['user_name'];
        $userId = $_SESSION['user_id'];
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
            $check = "select * from Department"; 
            $result = mysqli_query($conn, $check);
    
        ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel ="stylesheet" href="styleee.css">
        <title>Student Registeration</title>
    <body>

        <div class="title"><h1>Welcome <?php echo"$userName" ?></h1>
        </div>
        <div class ="center">
        </div>   
        <div class ="container">
            <div class ="left"></div>
            <div class="right">
                <p class="Welcome">Choose Your Department</p>
                <form method="Post" action="check.php">
                    <select name="Dept" class="deptvalue">
                        <?php
                        while ($row = $result->fetch_assoc()) {
                            $name = $row['name'];
                            echo '<option  value=" ' . $row['dept_id'] . ' "> ' . $row['name'] . ' </option>';
                        }
                        ?>
                    </select>
                    <input type="Submit" value="Select" class="select" >
                </form>
            </div>
        </div>

    </body>
</html>

