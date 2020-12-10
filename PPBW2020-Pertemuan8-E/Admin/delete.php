<?php
include_once("../koneksi.php");

$id = $_GET['id'];

$result = mysqli_query($conn, "DELETE FROM mahasiswa WHERE NIM='$id'");

header("Location:index.php");
?>
