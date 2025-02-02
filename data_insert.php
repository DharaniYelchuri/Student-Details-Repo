<?php
    
    session_start();
    
    $host="localhost:3307";
    $user="root";
    $password="";
    $db="student_management_sys";

    $data=mysqli_connect($host,$user,$password,$db);

    if ($data==false){
        die("connection failed");
    }

    if (isset($_POST['apply']))
    {

        $data_Rollno=$_POST['Rollno'];
        $data_Regno=$_POST['Regno'];
        $data_Name=$_POST['Name'];
        $data_Age=$_POST['Age'];
        $data_Gender=$_POST['Gender'];
        $data_Course=$_POST['Course'];
        $data_Branch=$_POST['Branch'];
        $data_CGPA=$_POST['CGPA'];
        $data_phone=$_POST['phone'];
        $data_EMail=$_POST['EMail'];
        $data_GuideName=$_POST['GuideName'];
        $data_GuideContact=$_POST['GuideContact'];

        $sql="INSERT INTO students (RegNo,RollNo, Name, Age, Gender, Course,Branch, CGPA, Mobile, email, GuideName, GuideContact) 
                VALUES   ('$data_Regno','$data_Rollno','$data_Name','$data_Age','$data_Gender', '$data_Course','$data_Branch','$data_CGPA', 
                  '$data_phone','$data_EMail','$data_GuideName','$data_GuideContact')";
        
        $result = mysqli_query($data, $sql);

       if ($result) {
           $_SESSION['message']="student data is saved successfully";
           header("location:add_student.php");
       } else {
           echo "Apply failed: " . mysqli_error($data);
       }
    }
?>
