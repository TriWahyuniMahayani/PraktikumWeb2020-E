<?php
error_reporting(0);
session_start();
if($_SESSION['role']=="admin") {
    header("Location: admin");
}

elseif ($_SESSION['role']=="pegawai") {
    header("Location: pegawai");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/home.css">
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
        <div class="content-home">
            <div class="text-home">
                <p class="heading-home">Learn Code<br>Start Here</p>
                <p class="text-content">Mempelajari coding dan mengembangkan sebuah aplikasi sangatlah mudah. Jadilah developer dengan masa depan
                    yang cerah</p>
            </div>
            <img class="home-ilustrasi" src="img/ilustrasi-home.png" alt="">
        </div>
        
     
    </div>

</body>
</html>