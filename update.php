<?php
$host = "localhost:3307";
$user = "root";
$password = "";
$db = "student_management_sys";

$data = mysqli_connect($host, $user, $password, $db);

if($_GET['RegNo']){
    $data_regno=$_GET['RegNo'];
    $sql="SELECT * FROM students WHERE RegNo='$data_regno' ";
    $result = mysqli_query($data, $sql);
    $info=$result->fetch_assoc();
}

if(isset($_POST['update'])){
    
    $data_Regno = mysqli_real_escape_string($data, $_POST['Regno']);
    $data_Rollno = mysqli_real_escape_string($data, $_POST['Rollno']);
    $data_Name = mysqli_real_escape_string($data, $_POST['Name']);
    $data_Age = mysqli_real_escape_string($data, $_POST['Age']);
    $data_Gender = mysqli_real_escape_string($data, $_POST['Gender']);
    $data_Course = mysqli_real_escape_string($data, $_POST['Course']);
    $data_Branch = mysqli_real_escape_string($data, $_POST['Branch']);
    $data_CGPA = mysqli_real_escape_string($data, $_POST['CGPA']);
    $data_phone = mysqli_real_escape_string($data, $_POST['phone']);
    $data_EMail = mysqli_real_escape_string($data, $_POST['EMail']);
    $data_GuideName = mysqli_real_escape_string($data, $_POST['GuideName']);
    $data_GuideContact = mysqli_real_escape_string($data, $_POST['GuideContact']);

    $sql = "UPDATE students 
    SET RegNo='$data_Regno', 
        RollNo='$data_Rollno', 
        Name='$data_Name', 
        Age='$data_Age', 
        Gender='$data_Gender',
        Course='$data_Course',
        Branch='$data_Branch',
        CGPA='$data_CGPA', 
        Mobile='$data_phone', 
        email='$data_EMail',
        GuideName='$data_GuideName', 
        GuideContact='$data_GuideContact'
    WHERE RegNo='" . mysqli_real_escape_string($data, $_GET['RegNo']) . "'";

    $result = mysqli_query($data, $sql);

    if ($result) {
        header('location:view_student.php');
    } else {
        echo "Update failed: " . mysqli_error($data);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" href="add_student.css">
    <link rel="stylesheet" href="sidebar.css">

    <style>
 
    .beautiful-button{
    position: relative;
    padding: 10px 20px;
    border-radius: 7px;
    border: 2px solid rgb(0 56 241);
    font-size: 14px;
    text-transform: uppercase;
    font-weight: 600;
    letter-spacing: 2px;
    background: rgb(255 142 245);
    color: #0045ff;
    overflow: hidden;
    box-shadow: 0 0 0 0 transparent;
    -webkit-transition: all 0.2s ease-in;
    -moz-transition: all 0.2s ease-in;
    transition: all 0.2s ease-in;
    }
  
   .beautiful-button:hover {
    background: rgb(255 142 245);
    box-shadow: 0 0 30px 5px rgb(255 142 245);
    -webkit-transition: all 0.2s ease-out;
    -moz-transition: all 0.2s ease-out;
    transition: all 0.2s ease-out;
    }
  
  
  
    .beautiful-button::before {
    content: '';
    display: block;
    width: 0px;
    height: 86%;
    position: absolute;
    top: 7%;
    left: 0%;
    opacity: 0;
    background: blue;
    box-shadow: 0 0 50px 30px #fff;
    -webkit-transform: skewX(-20deg);
    -moz-transform: skewX(-20deg);
    -ms-transform: skewX(-20deg);
    -o-transform: skewX(-20deg);
    transform: skewX(-20deg);
    }
  
    @keyframes sh02 {
    from {
      opacity: 0;
      left: 0%;
    }
  
    50% {
      opacity: 1;
    }
  
    to {
      opacity: 0;
      left: 100%;
    }
    }
  
    .beautiful-button:active {
    box-shadow: 0 0 0 0 transparent;
    -webkit-transition: box-shadow 0.2s ease-in;
    -moz-transition: box-shadow 0.2s ease-in;
    transition: box-shadow 0.2s ease-in;
    }
 
    .wrap {
        position: absolute;
    transform: translateX(-50%);
    width: 55%;
    background-color: rgba(255, 255, 255, 0.5);
    border-radius: 12px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    display: inline-block;
    margin: auto;
}
 
    </style>

</head>
<body>
   
    <?php
      
        include 'sidebar.php';

    ?>
    
    <div class="content">
    <div class="wrap">
        
        <div class="head">
            Update Details
        </div>

       <form action="#" method="POST">
            

            <div>
                <label class="label_text">Reg.no</label>
                <input type="text" name="Regno" value="<?php echo"{$info['RegNo']}"  ?>">
            </div>

            <div>
                <label class="label_text">Roll.no</label>
                <input type="text" name="Rollno" value="<?php echo"{$info['RollNo']}"  ?>">
            </div>

            <div>
                <label class="label_text">Name</label>
                <input type="text" name="Name" value="<?php echo"{$info['Name']}"  ?>">
            </div>

            <div>
                <label class="label_text">Age</label>
                <input type="number" name="Age" value="<?php echo"{$info['Age']}"  ?>">
            </div>
            
            <div>
                <label class="label_text">Gender</label>
                <select name="Gender" placeholder="   " value="<?php echo"{$info['Gender']}"  ?>">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            
            <div>
                <label class="label_text">Course</label>
                <select name="Course" placeholder="    " value="<?php echo"{$info['Course']}"  ?>">
                    <option value="BTech">B.Tech</option>
                    <option value="MTech">M.Tech</option>
                </select>
            </div>

            <div>
                <label class="label_text">Branch</label>
                <select name="Branch" placeholder="    " value="<?php echo"{$info['Branch']}"  ?>">
                    <option value="CSE">CSE</option>
                    <option value="ECE">ECE</option>
                    <option value="EEE">EEE</option>
                    <option value="Mechanical">Mechanical</option>
                    <option value="Chemical">Chemical</option>
                    <option value="Biotechnology">Biotechnology</option>
                    <option value="Civil">Civil</option>
                    <option value="Metallurgy">Metallurgy</option>
                </select>
            </div>

            <div>
                <label class="label_text">CGPA</label>
                <input type="text" name="CGPA" value="<?php echo"{$info['CGPA']}"  ?>">
            </div>

            <div>
                <label class="label_text">Mobile</label>
                <input type="tel"  name="phone" value="<?php echo"{$info['Mobile']}"  ?>" >
            </div>

            <div>
                <label class="label_text">EMail</label>
                <input type="text" name="EMail" value="<?php echo"{$info['email']}"  ?>">
            </div>

            <div>
                <label class="label_text">Guide's Name</label>
                <input type="text" name="GuideName" value="<?php echo"{$info['GuideName']}"  ?>">
            </div>

            <div>
                <label class="label_text">Guide's Contact Number</label>
                <input type="tel" name="GuideContact" value="<?php echo"{$info['GuideContact']}"  ?>" >
            </div>

            <button class="beautiful-button" type="submit" name="update">Update</button>
    </form>
    </div>
    </div>
</body>
</html>
