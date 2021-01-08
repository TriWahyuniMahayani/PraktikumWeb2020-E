<?php
    session_start();
    include_once 'conn.php';

    if (isset($_POST['submit'])) {
        $email = addslashes(trim($_POST['email']));
        $password = md5(trim($_POST['password']));

        $query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND password='$password'");
        if (mysqli_num_rows($query) != 0) {
            $row = mysqli_fetch_assoc($query);
            $query = mysqli_query($conn, "SELECT * FROM langganan WHERE id_users='".$row['id_users']."'");
            if (mysqli_num_rows($query) == 0) {
                $_SESSION['user_kelas'] = 'free';
            }else {
                $a = mysqli_fetch_assoc($query);
                if (strval($a['end_date']) > strval(date("Y-m-d"))) {
                    $_SESSION['user_kelas'] = 'premium';
                }
                else {
                    $_SESSION['user_kelas'] = 'free';
                }
            }
            $_SESSION['id_users'] = $row['id_users'];
            $_SESSION['first_name'] = $row['first_name'];
            $_SESSION['last_name'] = $row['last_name'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['phone_number'] = $row['phone_number'];
            
            header("Location: dashboard");
        } else {
            echo "<script>alert('Email atau Password salah!');document.location.href='login.php'</script>/n";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
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
                        <li><a href="contact.phpl">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="btn-login-register">
                <a class="btn-login" href="login.php">Login</a>
                <a href="register.php"><button class="btn-register">Register</button></a>
            </div>
        </header>
        <div class="login">
            <img src="img/login.png" alt="">
            <form class="form-login" action="login.php" method="post">
                <div class="login-heading">
                    <h1>LOGIN</h1>
                </div>
                <div class="login-grup">
                    <img src="img/2.png" alt="">
                    <div class="input">
                        <input type="email" id="email" placeholder="E-mail" name="email" required>
                    </div>
                </div>
                <div class="login-grup">
                    <img src="img/3.png" alt="">
                    <div class="input">
                        <input type="password" id="password" placeholder="Password" name="password" required> 
                    </div>
                </div>
                <div class="text-login">
                    <p>Don't have account? <br> Register now</p>
                    <p>Forgot Password?</p>
                </div>
                <div class="submit">
                    <button type="submit" name="submit">Submit</button>
                </div>
            </form>
        </div>
        
        
     
    </div>
</body>
</html>