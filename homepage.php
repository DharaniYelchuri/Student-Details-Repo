<?php
$host = "localhost:3307";
$user = "root";
$password = "";
$db = "student_management_sys";

$data = mysqli_connect($host, $user, $password, $db);

if (!$data) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT COUNT(*) FROM students ";

$result = mysqli_query($data, $sql);

if (!$result) {
    die("Error executing the query: " . mysqli_error($data));
}
$row = mysqli_fetch_row($result);
$count = $row[0];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <style>
        .content {
            margin-left: 20%;
            margin-top: 10%;
        }

        h1{
            text-align:center;
            font-size:40px;
            margin:20px;
            color:#058712;
        }
        .card {
            width: 307px;
            background: rgb(90 252 255 / 58%);
            height: 260px;
            border: 1px solid white;
            box-shadow: 12px 17px 51px rgba(0, 0, 0, 0.22);
            border-radius: 17px;
            cursor: pointer;
            transition: all 0.5s;
            user-select: none;
            font-weight: bolder;
            color: black;
        }

        .card:hover {
          border: 1px solid black;
          transform: scale(1.05);
        }


         #no{
            height: 55px;
             width: 59px;
             font-size: 108px;
             margin: 0px 59px;
         }

        #stu{
            height: 50px;
           width: 59px;
           font-size: 59px;
           display: flex;
           position: absolute;
           margin: 58px 37px;
           color: #ff129a;
        }

        #img{
            display: flex;
            float: right;
            margin-top: -44px;
            margin-right: 6px;
            height: 110px;
            float: right;
            width: 132px;
            background: url(bg.jpg) no-repeat;
            background-size: cover;
        }

        #mi{
           display: inline-flex;
          margin-top: 108px;
          margin-left: 100px;
          font-size: large;
          font-weight: bold;
          text-decoration:none;
          color:black;
        }
    </style>
    <link rel="stylesheet" href="sidebar.css">
</head>
<body>
    <?php
        include "sidebar.php";
    ?>

    <div class="content">
        <h1>WELCOME</h1>
        <h1>STUDENT MANAGEMENT SYSTEM</h1>
        <div class="card">
           <div id="no"><?php echo $count; ?></div>
           <div id="stu">Students</div>
           <div id='img'></div>
           <a  href="view_student.php"id="mi">More Info -></a>
        </div>
    </div>
</body>
</html>