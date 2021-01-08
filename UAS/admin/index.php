<?php
    session_start();
    include_once '../conn.php';

    if (isset($_POST['submit'])) {
        $username = addslashes(trim($_POST['username']));
        $password = md5(trim($_POST['password']));
        $query= mysqli_query($conn, "SELECT * FROM admin WHERE username='$username' AND password='$password' ");
        if (mysqli_num_rows($query) == 0) {
            echo "<script>alert('Username atau Password yang Anda masukan salah !!!');document.location.href='index.php'</script>/n";
        } else {
            $row = mysqli_fetch_assoc($query);
            $_SESSION['username']	= $row['username'];
            header("Location: dashboard");
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="card">    
        <h3>ADMIN LOGIN</h3>
        <form action="index.php" method="post">
            <div class="input">
                <input type="text" name="username" placeholder="username" required="required">
            </div>
            <div class="input">
                <input type="password" name="password" placeholder="password" required="required">
            </div>
            <input type="submit" name="submit" value="Login" class="submit">
        </form>
    </div>
</body>
</html>