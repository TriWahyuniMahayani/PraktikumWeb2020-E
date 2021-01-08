<?php
	session_start();
	if (!isset($_SESSION['id_users'])) {
		header("Location: ../login.php");
	} else {
		session_destroy();
		echo "<script>alert('Terima Kasih, Anda Telah Logout!');document.location.href='../login.php'</script>/n";
	}
?>
