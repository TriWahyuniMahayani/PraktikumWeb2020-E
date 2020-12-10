<?php
error_reporting(0);
session_start();
if($_SESSION['level']=="admin") {
    header("Location: admin/index.php");
}

elseif ($_SESSION['level']=="pegawai") {
    header("Location: pegawai/index.php");
}


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPBW2020-Pertemuan8-E</title>
    <style type="text/css">
      .container{
        width: 400px;
        min-height: 200px;
        padding-bottom: 20px;
        position: fixed;
	      top: 50%;
	      left: 50%;
        margin: auto;
        background-color: #5F9EA0;
        margin-top: -120px;
        margin-left: -220px;
        color: black;
        border-radius: 20px;
        box-shadow: 4px 4px 4px 4px rgb(29, 139, 139);
      }
      .main {
        text-align: center;
        font-family: Arial;
        font-weight: bold;
        padding-top:30px;
      }
      .table {
        margin: auto;
      }
      .table td{
        padding-top: 12px;
      }
      .input {
        border-radius: 7px;
      }
      .submit {
        padding: 5px 30px;
        font-family: Arial;
        font-weight: bold;
        border-radius: 7px;
      }
      body {
      background-position: center;
      background-size: 150%;
      }

    </style>

  </head>
  <body background="Image/Sea.jpg">
      <div class="container">
          <h1 class="main">Form Login</h1>
          <hr>
          <!-- Tag <hr> adalah singkatan dari Horizontal Rule, digunakan untuk membuat garis horizontal dan membagi atau memisahkan bagian dokumen -->
        <form action="proses.php" method="post">
        <!-- tag <form> digunakan untuk menampung macam-macam element yang berkaitan dengan sebuah form
        Tag ini memiliki beberapa atribut yang harus diberikan, seperti:
        1. action untuk menentukan akasi yang akan dilakukan saat data dikirim;
        2. method metode pengiriman data -->
          <table class="table">
          <!-- Tag <table> digunakan untuk memulai tabel -->
            <tr>
              <td><label for="username">Username</label></td>
              <td><input type="text" class="input" name="username" required></td>
              <!-- <input type="text"> textbox yang bisa menerima inputan text misalkan username atau berupa inputan text yang pendek -->
            </tr>
            <tr>
              <td><label for="password">Password</label></td>
              <td><input type="password" class="input" name="password" required></td>
              <!-- <input type="password"> textbox yang menerima inputan text, akan tetapi text diinput akan ditampilkan sebagai tanda bintang
              atau titik, textbox ini biasanya digunakan untuk inputan password -->
            </tr>
            <tr>
              <td><button type="submit" class="submit" name="submit">Sign In</button></td>
            </tr>
          </table>
        </form>
      </div>
  </body>
</html>
