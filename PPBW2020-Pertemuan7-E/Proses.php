<?php
?>

<html>

<head>
    <title>Hasil</title>
    <style>
    body {
        background-image: url(aurora.jpg);
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

    .black_box {
        height: 360px;
        width: 400px;
        background: rgba(88, 88, 88, 0.5);
        border: rgb(243, 237, 237) 1px solid;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translateX(-50%) translateY(-50%);
    }

    b {
        font-family: 'Arial';
        color: white;
    }

    h2 {
        font-family: 'Arial';
        color: white;
        text-shadow: 5px 3px 3px black;
    }

    a:link,
    a:visited {
        background-color: red;
        color: white;
        padding: 11px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
    }

    footer {
        font-size: 12px;
        font-family: 'Courier New', Courier, monospace;
        color: black;
        position: relative;
        top: 520px;
    }
    </style>
</head>

<body>
    <center>
        <div class="black_box">
            <h2>Hasil</h2>
            <table>
                <tr>
                    <td>
                        <?php
                $nim = $_POST['nim'];
                $nama = $_POST['nama'];
                $tgs = $_POST['tugas'];
                $uts = $_POST['uts'];
                $uas = $_POST['uas'];

                $h = (0.4 * $tgs) + (0.3 * $uts) + (0.3 * $uas);

                if ($h >= 80)
                    $rank = ("A") and $y = ("LULUS");

                else if ($h >= 70)
                    $rank = ("B") and $y = ("LULUS");

                else if ($h >= 60)
                    $rank = ("C") and $y = ("LULUS");

                else
                    $rank = ("E") and $y = ("TIDAK LULUS");

                echo "<b> NIM : $nim </b> <br>";
                echo "<b> Nama Mahasiswa : $nama </b> <br>";
                echo "<br>";
                echo "<b> Nilai Tugas : $tgs </b> <br>";
                echo "<b> Nilai UTS : $uts </b> <br>";
                echo "<b> Nilai UAS : $uas </b> <br>";
                echo "<br>";
                echo "<b> Nilai Akhir : $h </b> <br>";
                echo "<b> Anda Dinyatakan $y Dengan Grade : $rank </b>";
                ?>
                    </td>
                </tr>
            </table><br>
            <br> <a href="index.html">Uji Kembali</a>
        </div>
        <footer>&copy; Copyright 2020 Tri Wahyuni Mahayani | Tugas PPBW2020-Pertemuan7-E</footer>
    </center>
</body>

</html>