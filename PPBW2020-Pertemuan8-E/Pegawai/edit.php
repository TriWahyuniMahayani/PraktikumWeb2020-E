<?php
include_once("../koneksi.php");

if(isset($_POST['update']))
{
    $id = $_POST['id'];
    $nim=$_POST['nim'];
    $nama=$_POST['nama'];
    $alamat=$_POST['alamat'];

    $result = mysqli_query($conn, "UPDATE mahasiswa SET Nama='$nama',Alamat='$alamat' WHERE NIM='$id'");

    header("Location: index.php");
}
?>
<?php

$id = $_GET['id'];

$query = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE NIM='$id'");
$row = mysqli_fetch_assoc($query);
$nim = $row['NIM'];
$nama = $row['Nama'];
$alamat = $row['Alamat'];

?>
<html>
<head>
    <title>Edit User Data</title>
</head>

<body>
    <a href="index.php">Back to Home</a>
    <br/><br/>

    <form name="update_user" method="post" action="edit.php">
        <table border="0">
            <tr>
                <td>NIM</td>
                <td><input type="text" name="nim" value="<?php echo $nim;?>
                "></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" value="<?php echo $nama;?>"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat" value="<?php echo $alamat;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
