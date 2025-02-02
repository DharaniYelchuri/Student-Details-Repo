<?php
   
   session_start();
   
   $host="localhost:3307";
   $user="root";
   $password="";
   $db="student_management_sys";

   $data=mysqli_connect($host,$user,$password,$db);

   if($_GET['RegNo']){
      $user_regno=$_GET['RegNo'];

      $sql="DELETE FROM students WHERE RegNo='$user_regno' ";
      
      $result = mysqli_query($data, $sql);

      if($result){
        $_SESSION['message']='Delete Student is Successful';
        header("location:view_Student.php");
      }
   }

?>