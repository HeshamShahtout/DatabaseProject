<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel ="stylesheet" href="styleee.css">
        <title>Student Registeration</title>
    <body>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "Website";
        if($_SESSION['redirected'] = 1)
        {
                     $department = $_SESSION['department'];
        }
        else
        {
                    $department = $_POST['Dept'];
        }

        $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
            $getid = "select * from Course where dept_id='$department'";
            $result2 = mysqli_query($conn, $getid);
  
        ?>
        <div class ="center">
        </div>   
        <div class ="container">
                <form method="Post" >
                    <table>
  <tr>
    <th>Course ID</th>
    <th>Course Name</th>
    <th>Instructor's Name</th> 
    <th>Credit Hours</th>
      
  </tr>
            <?php
           while ($row = $result2->fetch_assoc()) {
               echo "<tr>";
               echo "<td>".$row['course_id']."</td>";
               echo "<td>".$row['course_name']."</td>";
               echo "<td>".$row['instructor_name']."</td>";
               echo "<td>".$row['credit_hours']."</td>";
               echo "</tr>";
           }    
                        ?>
</table>
                </form>
     
        </div>

    </body>
</html>

