<?php
    error_reporting(0);
    session_start();
    session_destroy();

    if($_SESSION['message']){
        $message = $_SESSION['message'];

        echo "<script type='text/javascript'>

        alert('$message');
        </script>";
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
    /* top: -50px; */
    /* left: 50%; */
    transform: translateX(-50%);
    width: 55%;
    background-color: rgba(255, 255, 255, 0.5);
    /* padding: 20px; */
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
            Enter Details
        </div>

       <form action="data_insert.php" method="POST">
            

            <div>
                <label class="label_text">Reg.no</label>
                <input type="text" name="Regno">
            </div>

            <div>
                <label class="label_text">Roll.no</label>
                <input type="text" name="Rollno">
            </div>

            <div>
                <label class="label_text">Name</label>
                <input type="text" name="Name">
            </div>

            <div>
                <label class="label_text">Age</label>
                <input type="number" name="Age">
            </div>
            
            <div>
                <label class="label_text">Gender</label>
                <select name="Gender" placeholder="   ">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            
            <div>
                <label class="label_text">Course</label>
                <select name="Course" placeholder="    ">
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
                <input type="text" name="CGPA">
            </div>

            <div>
                <label class="label_text">Mobile</label>
                <input type="tel" id="phone" name="phone" >
            </div>

            <div>
                <label class="label_text">EMail</label>
                <input type="text" name="EMail">
            </div>

            <div>
                <label class="label_text">Guide's Name</label>
                <input type="text" name="GuideName">
            </div>

            <div>
                <label class="label_text">Guide's Contact Number</label>
                <input type="tel" name="GuideContact" >
            </div>

            <button  class="beautiful-button" type="submit" name="apply">Submit</button>
    </form>
    </div>
    </div>
</body>
</html>
