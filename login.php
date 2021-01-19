<?php require 'header.inc.php';
      $error = '';
      $success = '';
?>
<?php
    if(isset($_POST["submit"])) {
            require 'config.php';
            session_start();
            ob_start();

            //Login user from login page

            $username = mysqli_real_escape_string($db, $_POST['username']);
            $password = mysqli_real_escape_string($db, $_POST['password']);

            $password = md5($password);

            $result = mysqli_query($db, "SELECT * FROM user WHERE username='$username' AND password = '$password'");
            if (mysqli_num_rows($result) == 1) {
               $row = mysqli_fetch_assoc($result);
               $_SESSION['user_id'] = $row['id'];
               $_SESSION['user_username'] = $row['username'];
               $_SESSION['user_name'] = $row['name'];
               $_SESSION['user_email'] = $row['email'];
               $_SESSION['user_mobile'] = $row['mobile'];
               $success = 'Login Successfull!';
               header("Location: index.php");
            } else {
               $error = "*Invalid Username/Password";
            }
          }
  ?>
<html>
<head>
<title>Admin Log In</title>
<link rel="stylesheet" href="style.css">
</head>
<body class="bodybg">
<div class="loginbox">
<img src="user.png" class="avatar">
<h1>User Login</h1>
<form name="login" method="post">
<p>Username</p>
<input type="text" name="username" placeholder="Enter Username" required>
<p>Password</p>
<input type="password" name="password"  placeholder="Enter Password" required>
<input type="submit" name="submit" value="Login"/>
<a href="#">Forgot Your Password?</a></br>
<a href="register.php">Don't have an Account?</a>
</form><br>
<h3 style="color:#ff0033;"><?php echo $error;?></h3>
<h3 style="color:#4BB543;"><?php echo $success ?></h3>
</body>
</html>
