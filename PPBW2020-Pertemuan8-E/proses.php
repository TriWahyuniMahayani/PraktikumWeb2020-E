<?php
session_start();
include 'koneksi.php';

if (isset($_POST['submit']))
{
	$username = addslashes(trim($_POST['username']));
	$password	= $_POST['password'];

	$query= mysqli_query($conn, "SELECT * FROM user WHERE username='$username' AND password='$password' ");
	if (mysqli_num_rows($query) == 0)
	{
		echo "<script>alert('Username atau Password yang Anda masukan salah !!!');document.location.href='index.php'</script>/n";
	}else{
		$row = mysqli_fetch_assoc($query);
		$_SESSION['username']	= $row['username'];
		$_SESSION['level']  = $row['level'];

		if($row['level'] == "admin")
		{
			echo "<script>alert('Welcome To Administrator!');document.location.href='Admin/'</script>/n";
		}
		else if($row['level'] =="pegawai")
		{
			echo "<script>alert('Welcome To Pegawai !');document.location.href='Pegawai/'</script>/n";
		}
		else
		{
			echo "<script>alert('Login Gagal !!!');document.location.href='index'</script>/n";
		}
	}
}else{
	echo "<script>alert('Anda belum mengisi Form !!!');document.location.href='index'</script>/n";
}
?>
