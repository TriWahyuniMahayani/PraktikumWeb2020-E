<?php 
    session_start();
    if (!isset($_SESSION['id_users'])) {
        header("Location: ../login.php");
    } else {
        include_once '../conn.php';
    
        $id = $_GET['id'];
        
        $query = mysqli_query($conn, "SELECT * FROM question WHERE id_course='$id'");
        $data = mysqli_fetch_all($query, MYSQLI_ASSOC);
        $jml_benar = 0;
        $jml_soal = 0;
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Result</title>

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
                <li class="active">
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

            <h2>Yours Answer</h2>

            <form>
                <?php 
                foreach ($data as $question) {
                    $jml_soal++;
                ?>
                    <div class="border-top border-bottom mb-4">
                        <div><?=$question['question'];?></div>
                        <div class="col-md-3"><input class="radios" type="radio" id="ChoiceA" name="<?=$question['id_question'];?>" value="<?=$question['choiceA'];?>" disabled <?php echo ($_POST[$question['id_question']] == $question['choiceA']) ? "checked" : "" ;?>> A. <?=$question['choiceA'];?></div>
                        <div class="col-md-3"><input class="radios" type="radio" id="ChoiceB" name="<?=$question['id_question'];?>" value="<?=$question['choiceB'];?>" disabled <?php echo ($_POST[$question['id_question']] == $question['choiceB']) ? "checked" : "" ;?>> B. <?=$question['choiceB'];?></div>
                        <div class="col-md-3"><input class="radios" type="radio" id="ChoiceC" name="<?=$question['id_question'];?>" value="<?=$question['choiceC'];?>" disabled <?php echo ($_POST[$question['id_question']] == $question['choiceC']) ? "checked" : "" ;?>> C. <?=$question['choiceC'];?></div>
                        <div class="col-md-3"><input class="radios" type="radio" id="ChoiceD" name="<?=$question['id_question'];?>" value="<?=$question['choiceD'];?>" disabled <?php echo ($_POST[$question['id_question']] == $question['choiceD']) ? "checked" : "" ;?>> D. <?=$question['choiceD'];?></div>
                        <?php
                        if ($_POST[$question['id_question']] == $question['answer']) {
                        ?>
                            <div class="alert alert-success mt-2" role="alert">
                                Mantap, jawaban anda bener!
                            </div>
                        <?php
                            $jml_benar++;
                        } else {
                        ?>
                            <div class="alert alert-danger mt-2" role="alert">
                                Waduh, jawaban anda salah!
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                <?php
                }
                ?>
            </form>

            <?php 
                $nilai = $jml_benar/$jml_soal * 100;
                if ($nilai >= 75) {
                    mysqli_query($conn, "UPDATE course_user SET lulus='1' WHERE id_course='$id' AND id_users='".$_SESSION['id_users']."'");

                    $query = mysqli_query($conn, "SELECT a.id_course_user, b.topik FROM course_user AS a INNER JOIN course AS b ON a.id_course = b.id_course WHERE id_users='".$_SESSION['id_users']."' AND b.id_course='$id'");
                    $row = mysqli_fetch_assoc($query);
                    
                    // Membuat sertif
                    $nama = strval($_SESSION['first_name']).' '.strval($_SESSION['last_name']);
                    $course = $row['topik'];
                    $gambar = "./sertifikat.jpg";
                    $image = imagecreatefromjpeg($gambar);
                    $white = imageColorAllocate($image, 255, 255, 255);
                    $black = imageColorAllocate($image, 0, 0, 0);
                    $font = __DIR__ . "/Poppins-Medium.ttf";
                    $sizeA = 30;
                    $sizeB = 20;
                    //definisikan lebar gambar agar posisi teks selalu ditengah berapapun jumlah hurufnya
                    $image_width = imagesx($image);  
                    //membuat textbox agar text centered
                    $text_box = imagettfbbox($sizeA,0,$font,$nama);
                    $text_width = $text_box[2]-$text_box[0]; // lower right corner - lower left corner
                    $text_height = $text_box[3]-$text_box[1];
                    $x = ($image_width/2) - ($text_width/2);
                    //generate sertifikat beserta namanya
                    imagettftext($image, $sizeA, 0, $x, 420, $black, $font, $nama);
                    $text_box = imagettfbbox($sizeB,0,$font,$course);
                    $text_width = $text_box[2]-$text_box[0]; // lower right corner - lower left corner
                    $text_height = $text_box[3]-$text_box[1];
                    $x = ($image_width/2) - ($text_width/2);
                    imagettftext($image, $sizeB, 0, $x, 510, $black, $font, $course);
                    //tampilkan di browser
                    imagejpeg($image, 'img-sertif/'.strval($row['id_course_user']).'.jpg');
                    imagedestroy($image);
            ?>
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">Selamat Anda lulus!</h4>
                        <p>Selamat atas kelulusan anda. Tetap semangat belajar!</p>
                        <hr>
                        <a class="btn btn-primary" href="img-sertif/<?=$row['id_course_user'];?>.jpg" download role="button">Download Sertif</a>
                    </div>
            <?php
                } else {
            ?>
                    <div class="alert alert-danger" role="alert">
                        <h4 class="alert-heading">Maaf Anda belum lulus!</h4>
                        <p>Anda belum lulus, tetap semangat!</p>
                        <hr>
                        <a class="btn btn-danger" href="exam.php?id=<?=$id?>" role="button">Ulang Kerjakan</a>
                    </div>
            <?php
                }
            ?>


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