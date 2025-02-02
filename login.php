<?php
session_start();
$admin = "admin";
$password = 12345;

if(isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $enteredPassword = $_POST['password'];

    if($username == $admin && $enteredPassword == $password) {
        $_SESSION['username'] = $admin; 
        header("location: homepage.php");
        exit(); 
    } else {
        echo "<script>
            window.onload = function() {
                document.getElementById('alert').style.display = 'block';
            };
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <link rel="stylesheet" href="login.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <style>
    #alert {
    display: block;
    text-align: center;
    margin-top: 14px;
    color: #ffa2f3;
  }

   .wrapper h1{
    color:yellow;
  }
  </style>
</head>
<body>
  <div class="wrapper">
  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <h1 >Login Form</h1>
      <div id="alert">Invalid Username or Password</div>
      <div class="input-box">
        <input type="text" placeholder="Username"  name="username" required>
        <i class='bx bxs-user'></i>
      </div>
      <div class="input-box">
        <input type="password" placeholder="Password" name="password"  required>
        <i class='bx bxs-lock-alt' ></i>
      </div>
      
      <button type="submit" class="btn">Login</button>
     
    </form>
  </div>
  <script>
    setTimeout(function(){
        document.getElementById('alert').style.display = 'none';
    }); 
  </script>
</body>
</html>