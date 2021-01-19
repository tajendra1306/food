<?php require 'header.inc.php';

   $errors = array('user'=>'','mob'=>'','pass'=>'','em'=>'','em1'=>'');
   $success = '';

     if(isset($_POST["submit"])) {
             require 'config.php';
             session_start();
             ob_start();

             //register a visitor

             $username = mysqli_real_escape_string($db, $_POST['username']);
             $name = mysqli_real_escape_string($db, $_POST['name']);
             $email = mysqli_real_escape_string($db, $_POST['email']);
             $mobile = mysqli_real_escape_string($db, $_POST['mobile']);
             $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
             $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

      // check email and username already exist or not

      $u = "SELECT * FROM user WHERE username = '$username'";
      $e = "SELECT * FROM user WHERE email = '$email'";

      $ru = mysqli_query($db, $u) or die(mysqli_error($db));
      $re = mysqli_query($db, $e) or die(mysqli_error($db));

      $err = 0;

      if (mysqli_num_rows($ru) > 0) {
         $errors['user'] = '*Username Taken';
         $err++;
      }

      if (mysqli_num_rows($re) > 0) {
         $errors['em'] = '*Email Taken';
         $err++;
      }

      //other validations

      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
         $errors['em1'] = '*Invalid Email';
         $err++;
      }

      if (strlen($mobile) < 10 || strlen($mobile) > 10) {
         $errors['mob'] = '*Mobile Number not valid';
         $err++;
      }

      if ($password_1 != $password_2) {
         $errors['pass'] = "*Password doesn't match";
         $err++;
      }

      //storing information of user in database

      if ($err == 0) {
         $password = md5($password_1);
         $token = bin2hex(random_bytes(50));
         $sql = "INSERT INTO user(username, email, password, name, mobile)
                  VALUES('$username', '$email', '$password', '$name', '$mobile')";
         mysqli_query($db, $sql);
         $success = 'Sign Up Successfull!';
         header("Location: login.php");
      }
    }
 ?>
<html>
<head>
<title>User Registration</title>
<link rel="stylesheet" href="style.css">
</head>
<body class="reg">
  <div class="sign-up-form">
  <img src="user.png" class="avatar">
    <h1>Register Now</h1>
    <h2 style="color:#4BB543;"><?php echo $success ?></h2>
    <form name="reg" method="post">
      <p>Username</p>
      <input type="text" name="username" class="input-box" placeholder="Enter Username" required>
      <div class="error"><?php echo $errors['user'] ?></div>
      <p>Full Name</p>
      <input type="text" name="name" class="input-box" placeholder="Enter Name" required>
      <p>Email</p>
      <input type="email" name="email" class="input-box" placeholder="Enter Email" required>
      <div class="error"><?php echo $errors['em'] ?><?php echo $errors['em1']?></div>
      <p>Mobile Number</p>
      <input type="mobile" name="mobile" class="input-box" placeholder="Enter Mobile Number" required>
      <div class="error"><?php echo $errors['mob'] ?></div>
      <p>Password</p>
      <input type="password" name="password_1" class="input-box" placeholder="Enter Password" required>
      <div class="error"><?php echo $errors['pass'] ?></div>
      <p>Re-Enter Password</p>
      <input type="password" name="password_2" class="input-box" placeholder="Re-Enter Password" required>
      <input type="submit" name="submit" class="sign-btn" value="Sign Up"></input>
      <p>Already have an account? <a href="login.php">Login</a></p>
      </form>
  </div>
</body>
</html>
