<?php
    include '../koneksi.php';
    $query= mysqli_query($conn, "SELECT * FROM mahasiswa");
    $data = mysqli_fetch_all($query, MYSQLI_ASSOC);
?>

<html>
<head>
    <title>PPBW2020-Pertemuan8-E</title>
</head>

<body>
<h2>Selamat Datang di Halaman Pegawai</h2>
<a href="create.php">+Tambah Data</a><br/><br/>

    <table width='80%' border=1>
        <thead>
            <th>NIM</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th colspan="2">Opsi</th>
        </thead>
        <tbody>
            <?php
            foreach ($data as $mhs) {
            ?>
            <tr>
                <td><?= $mhs['NIM'];?></td>
                <td><?= $mhs['Nama'];?></td>
                <td><?= $mhs['Alamat'];?></td>
                <td><a href="edit.php?id=<?=$mhs['NIM']?>">Edit</a></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
<br>
<button type="logout" class="logout" name="logout"><a href="logout.php">Logout</a>
</body>
</html>
