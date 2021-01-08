<?php 
    session_start();
    if (!isset($_SESSION['id_users'])) {
        header("Location: ../login.php");
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Subscribe</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
        integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
        integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ"
        crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
        integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY"
        crossorigin="anonymous"></script>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>E-Learning</h3>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <a href="index.php">Dashboard</a>
                </li>
                <li>
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle">Course</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="list-course.php?course=free">All Course Free</a>
                        </li>
                        <li>
                            <a href="list-course.php?course=premium">All Course Premium</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="sertif.php">My Certificate</a>
                </li>
                <li>
                    <a href="about.php">About E-Learning</a>
                </li>
            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                    <a href="subscribe.php" class="download">Subcribe</a>
                </li>
                <li>
                    <a href="logout.php" class="article">Logout</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Toggle Sidebar</span>
                    </button>
                    <div class="dropdown">
                        <button class="btn btn-secondary" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user mr-1"></i>
                            My Profile
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="my-profile.php">Your Profile</a>
                            <a class="dropdown-item" href="logout.php">Logout</a>
                        </div>
                    </div>
                </div>
            </nav>

            <div class="row">
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="card border-info mb-3" style="max-width: 18rem;">
                        <div class="card-header bg-info font-weight-bold text-white text-center">30 HARI</div>
                        <div class="card-body">
                            <h5 class="card-title text-center font-weight-bold">Rp. 250.000</h5>
                            <ul>
                                <li>Akses Belajar Selama 30 hari</li>
                                <li>Klaim Sertifikat Digital</li>
                                <li>Akses Semua Kelas Online PREMIUM</li>
                            </ul>
                            <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#exampleModalLong">SAYA MAU PAKET INI</button>
                        </div>
                        
                    </div>
                </div>
                 <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="card border-info mb-3" style="max-width: 18rem;">
                        <div class="card-header bg-info font-weight-bold text-white text-center">60 HARI</div>
                        <div class="card-body">
                            <h5 class="card-title text-center font-weight-bold">Rp. 400.000</h5>
                            <ul>
                                <li>Akses Belajar Selama 60 hari</li>
                                <li>Klaim Sertifikat Digital</li>
                                <li>Akses Semua Kelas Online PREMIUM</li>
                            </ul>
                            <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#exampleModalLong2">SAYA MAU PAKET INI</button>
                        </div>
                        
                    </div>
                </div>
            </div>


        </div>
        <div class="modal fade" id="exampleModalLong2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Checkout Berlanganan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="text-dark font-weight-bold">Informasi Pengguna</p>
                        <div class="d-flex justify-content-between">
                            <p class="text-dark">Nama Lengkap</p>
                            <p><?=strval($_SESSION['first_name']).' '.strval($_SESSION['last_name']);?></p>
                        </div>
                        <p class="text-dark font-weight-bold">Informasi Paket</p>
                        <div class="d-flex justify-content-between">
                            <p class="text-dark">Lama Waktu</p>
                            <p>60 Hari</p>
                        </div>
                        <p class="text-dark font-weight-bold">Informasi Pembayaran</p>
                        <div class="d-flex justify-content-between">
                            <p class="text-dark">Harga Langanan</p>
                            <p>Rp. 400.000</p>
                        </div>
                        <p class="text-dark font-weight-bold">Transfer Pembayaran</p>
                        <div class="d-flex justify-content-between">
                            <p class="text-dark">Bank</p>
                            <p>BNI</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="text-dark">No. Rekening</p>
                            <p>99128190</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="text-dark">Penerima</p>
                            <p>I Pt asdhh</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Konfirmasi Pembayaran</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Checkout Berlanganan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="text-dark font-weight-bold">Informasi Pengguna</p>
                        <div class="d-flex justify-content-between">
                            <p class="text-dark">Nama Lengkap</p>
                            <p><?=strval($_SESSION['first_name']).' '.strval($_SESSION['last_name']);?></p>
                        </div>
                        <p class="text-dark font-weight-bold">Informasi Paket</p>
                        <div class="d-flex justify-content-between">
                            <p class="text-dark">Lama Waktu</p>
                            <p>30 Hari</p>
                        </div>
                        <p class="text-dark font-weight-bold">Informasi Pembayaran</p>
                        <div class="d-flex justify-content-between">
                            <p class="text-dark">Harga Langanan</p>
                            <p>Rp. 250.000</p>
                        </div>
                        <p class="text-dark font-weight-bold">Transfer Pembayaran</p>
                        <div class="d-flex justify-content-between">
                            <p class="text-dark">Bank</p>
                            <p>BNI</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="text-dark">No. Rekening</p>
                            <p>99128190</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="text-dark">Penerima</p>
                            <p>I Pt asdhh</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Konfirmasi Pembayaran</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
        crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
        integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
        crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
</body>

</html>