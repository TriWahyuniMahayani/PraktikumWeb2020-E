<?php
    session_start();
    include_once 'conn.php';

    if (isset($_POST['submit'])) {
        $first_name = trim($_POST['first_name']);
        $last_name = trim($_POST['last_name']);
        $phone_number = trim($_POST['phone_number']);
        $email = trim($_POST['email']);
        $password = md5(trim($_POST['password']));

        $query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
        if (mysqli_num_rows($query) == 0) {
            $result = mysqli_query($conn, "INSERT INTO users(first_name,last_name,phone_number,email,password) VALUES('$first_name','$last_name','$phone_number','$email','$password')");
            if ($result) {
                echo "<script>alert('Data berhasil ditambahkan');document.location.href='login.php'</script>/n";
            } else {
                echo "<script>alert('Data gagal ditambahkan !!!');document.location.href='login.php'</script>/n";
            }
        }
    }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Register</title>
    <link rel="stylesheet" href="css/register.css">
  </head>
  <body>
    <div class="card-content">
      <header>
        <div class="logo-nav">
          <img class="logo" src="img/logo.png" alt="">
          <nav>
            <ul>
              <li><a href="index.php">Home</a></li>
              <li><a href="about.php">About</a></li>
              <li><a href="contact.php">Contact</a></li>
            </ul>
          </nav>
        </div>
        <div class="btn-login-register">
          <a class="btn-login" href="login.php">Login</a>
          <a href="register.php"><button class="btn-register">Register</button></a>
        </div>
      </header>
      <div class="container">
          <div class="row">
            <div class="text-center">
              <h1 class="register">Register</h1><br>
            </div>
            <form action="register.php" method="post" class="user">
              <div class="login-container">
                <input type="text" class="first-name" id="FirstName" placeholder=" First Name" name="first_name" required>
                <input type="text" class="last-name" id="LastName" placeholder=" Last Name" name="last_name" required>
                <input type="text" class="phone-number" id="UserName" placeholder=" Phone Number" name="phone_number" required>
                <input type="email" class="email" id="Email" placeholder=" Email" name="email" required>
                <input type="password" class="password" id="Password" placeholder=" Password" name="password" required>
                <input type="password" class="confirm-password" id="ConfirmPassword" placeholder=" Confirm Password" required>
              </div>
              <input type="submit" class="submit" name="submit" value="Create Account">
              <div class="text-center">
                <p>Already have account? <a href="login.php" class="login">Log in</a></p>
              </div>
            </form>
          </div>
        <img class="gambar2" src="img/regis.png" align="right" height="363px">
      </div>
    
    </div>

    <script>
      document.addEventListener('DOMContentLoaded', (event) => {
          //the event occurred
        var password = document.getElementById("Password")
            , confirm_password = document.getElementById("ConfirmPassword");

          function validatePassword() {
            if (password.value != confirm_password.value) {
              confirm_password.setCustomValidity("Passwords Don't Match");
            } else {
              confirm_password.setCustomValidity('');
            }
          }

          password.onchange = validatePassword;
          confirm_password.onkeyup = validatePassword;
        })
    </script>
  </body>
</html>
