<?php

$host = "localhost:3307";
$user = "root";
$password = "";
$db = "student_management_sys";

$data = mysqli_connect($host, $user, $password, $db);

if (!$data) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" href="search_student.css">
    <link rel="stylesheet" href="sidebar.css">
     <style>

        h1{
            display: block;
            text-align: center;
            font-size: xxx-large;
            color: #1b6eb7;
            margin-bottom:20px;
        }

        .btn-btn{
            height: 33px;
            width: 100px;
            background: #383838;
            border: 2px solid white;
            color: white;
            margin: 0px 14px;
        }

        .btn2{
            height: 33px;
            width: 100px;
            font-size: large;
            background: #ee2525;
            border: 2px solid white;
            color: white;
        }

        input{
            width: 230px;
            height: 30px;
            border: 2px solid black;
        }
        
        form{
            display:inline;
            float:left;
            margin-bottom:30px;
        }

        td{
            padding: 23px;
            text-align: center;
            font-size: large;
        }

        table tr th{
            padding: 25px;
            font-size: 25px;
            font-weight: bold;
        }

        table{
            margin-right:20px;
        }
     </style>
</head>
<body>
   
    <?php
        include 'sidebar.php';
    ?>
    
    <div class="content">
        <h1>Search Results</h1>
        <form action="" method="post">
              <input type="text" placeholder="Search Data" name="search">
              <button class="btn-btn" name="submit">Search</button>
              <button class="btn2" id="resetButton">Reset</button>

        </form>
        
        <div class="table-div">
            <table border="1px" class="table">
                <?php
                    
                if (isset($_POST['submit'])){
                    $search=$_POST['search'];
                    $sql="SELECT * FROM students WHERE 
                    RegNo like'%$search%' or 
                    RollNo like'%$search%' 	or
                    Name  like'%$search%' or
                    Age	like'%$search%' or
                    Gender	like'%$search%' or
                    Course	like'%$search%' or
                    Branch like'%$search%' or
                    CGPA	like'%$search%' or
                    Mobile	like'%$search%' or
                    email	like'%$search%' or
                    GuideName	like'%$search%' or
                    GuideContact	like'%$search%'" ;
    
                    $result = mysqli_query($data, $sql);
                    if ($result){
                        if(mysqli_num_rows($result)>0){
                           echo '<thead>
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
                            </tr>  
                            </thead>';
                            while($info=mysqli_fetch_assoc($result)){
                            echo '<tbody>
                            <tr>
                                <td>'.$info['RegNo'].'</td>
                                <td> '.$info['RollNo'].' </td>
                                <td> '.$info['Name'].'</td>
                                <td> '.$info['Age'].' </td>
                                <td> '.$info['Gender'].' </td>
                                <td> '.$info['Course'].' </td>
                                <td> '.$info['Branch'].' </td>
                                <td> '.$info['CGPA'].'</td>
                                <td> '.$info['Mobile'].' </td>
                                <td> '.$info['email'].' </td>
                                <td> '.$info['GuideName'].' </td>
                                <td> '.$info['GuideContact'].'</td>
                            </tr>
                            </tbody>';
                            }
                        }
                        else{
                            echo '<h2 > Data not found</h2>';
                        }        

                    }
                }

?>
            </table> 
        </div>
    </div>
    <script>
    document.getElementById('resetButton').addEventListener('click', function() {
        document.querySelector('input[name="search"]').value = ''; 
        var tableBody = document.querySelector('.table-div tbody'); 
        if (tableBody) {
            tableBody.innerHTML = ''; 
        }
    });
</script>

</body>
</html>