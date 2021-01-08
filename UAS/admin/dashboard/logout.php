<?php
	session_start();
	if (!isset($_SESSION['username'])) {
		header("Location: ../index.php");
	} else {
		session_destroy();
		echo "<script>alert('Terima Kasih, Anda Telah Logout!');document.location.href='../index.php'</script>/n";	
	}
?>
