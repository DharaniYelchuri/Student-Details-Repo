<?php

error_reporting(0);
session_start();

$host = "localhost:3307";
$user = "root";
$password = "";
$db = "student_management_sys";

$data = mysqli_connect($host, $user, $password, $db);

if (!$data) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM students ORDER BY RegNo";

$result = mysqli_query($data, $sql);

if (!$result) {
    die("Error executing the query: " . mysqli_error($data));
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    
    <link rel="stylesheet" href="sidebar.css">
    <link rel="stylesheet" href="view_student.css">
    <style>

    h1{
        color:#ee4ecd;
        font-size:40px;
    }
    table tr th{
        padding: 30px;
        font-size: 25px;
        font-weight: bold;
    }

   td{
        padding: 20px;
        font-size: 20px;
    }

    #del{
        border-radius: 5px;
        background: #f42a2a;
        font-family: "Montserrat", sans-serif;
        box-shadow: 0px 6px 24px 0px rgba(0, 0, 0, 0.2);
        overflow: hidden;
        cursor: pointer;
        border: 1px solid black;
       font-weight: bold;
        height: 23px;


    }

    #upd{
        border-radius: 5px;
        background: #7dd954;
        font-family: "Montserrat", sans-serif;
        box-shadow: 0px 6px 24px 0px rgba(0, 0, 0, 0.2);
        overflow: hidden;
        cursor: pointer;
        border: 1px solid black;
        font-weight: bold;
        height: 23px;

    }
    </style>
</head>
<body>
  <?php
      
      include 'sidebar.php';

  ?>

    <div class="content">
        <center>
        <h1>Students Details</h1>
        <?php
            
            if($_SESSION['message']){
                echo $_SESSION['message'];
            }
            unset($_SESSION['message']);
        
    ?>
        <table border="1px">
            <tr>
                <th>RegNo</th>
                <th>RollNo</th>
                <th>Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Course</th>
                <th>Branch</th>
                <th>CGPA</th>
                <th>Mobile</th>
                <th>email</th>
                <th>GuideName</th>
                <th>GuideContact</th>
                <th>Delete</th>
                <th>Update</th>
            </tr>
            
            <?php
              
                while($info=$result->fetch_assoc()){

            ?>

            <tr>
                <td> <?php echo"{$info['RegNo']}"; ?> </td>
                <td> <?php echo"{$info['RollNo']}"; ?> </td>
                <td> <?php echo"{$info['Name']}"; ?> </td>
                <td> <?php echo"{$info['Age']}"; ?> </td>
                <td> <?php echo"{$info['Gender']}"; ?> </td>
                <td> <?php echo"{$info['Course']}"; ?> </td>
                <td> <?php echo"{$info['Branch']}"; ?> </td>
                <td> <?php echo"{$info['CGPA']}"; ?> </td>
                <td> <?php echo htmlspecialchars($info['Mobile']); ?> </td>
                <td> <?php echo"{$info['email']}"; ?> </td>
                <td> <?php echo"{$info['GuideName']}"; ?> </td>
                <td> <?php echo"{$info['GuideContact']}"; ?> </td>
                <td id="del"> <?php echo "<a onClick=\"javascript:return confirm('Are you sure to DELETE this');\" href='delete.php?RegNo={$info['RegNo']}'>Delete</a>"; ?> </td>
                <td id="upd"> <?php echo "<a onClick=\"javascript:return confirm('Are you sure to UPDATE this');\" href='update.php?RegNo={$info['RegNo']}'s>Update</a>"; ?> </td>
            </tr>

            <?php

                }
            ?>
        </table>
        </center>
    </div>
</body>
</html>