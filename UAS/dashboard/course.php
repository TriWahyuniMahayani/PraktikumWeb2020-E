<?php
    session_start();
    
    if (!isset($_SESSION['id_users'])) {
        header("Location: ../login.php");
    } else {
        include_once '../conn.php';
        
        if (!isset($_GET['id'])) {
            header("Location: error.php");
        } else {
            $id = $_GET['id'];
            $query = mysqli_query($conn, "SELECT * FROM course WHERE id_course='$id'");
            $data_course = mysqli_fetch_assoc($query);
    
            if ($data_course['kelas_level'] == $_SESSION['user_kelas'] || $_SESSION['user_kelas'] == 'premium') {
                $query = mysqli_query($conn, "SELECT * FROM course_user WHERE id_users='".$_SESSION['id_users']."' AND id_course='$id'");
                if (mysqli_num_rows($query) == 0) {
                    $result = mysqli_query($conn, "INSERT INTO course_user (id_users, id_course) VALUES('".$_SESSION['id_users']."', '$id')");
                    if ($result) {
                        $query = mysqli_query($conn, "SELECT * FROM course_user WHERE id_users='".$_SESSION['id_users']."' AND id_course='$id'");
                        $row = mysqli_fetch_assoc($query);
                        $query = mysqli_query($conn, "SELECT * FROM chapter_course WHERE id_course='$id'");
                        $data = mysqli_fetch_all($query, MYSQLI_ASSOC);
                        foreach ($data as $chapter) {
                            mysqli_query($conn, "INSERT INTO progress_user (status, id_course_user, id_chapter) VALUES('0', '".$row['id_course_user']."', '".$chapter['id_chapter']."')");
                        }
                    }
                }
                $query = mysqli_query($conn, "SELECT * FROM course WHERE id_course='$id'");
                $data_course = mysqli_fetch_assoc($query); 
            }else {
                echo "<script>alert('Anda Belum Berlangganan! Silahkan berlangganan terlebih dahulu :)');document.location.href='subscribe.php'</script>/n";
            }
        
            
        
            $query= mysqli_query($conn, "SELECT * FROM chapter_course WHERE id_course='$id'");
            $data = mysqli_fetch_all($query, MYSQLI_ASSOC);
            
        }
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Course</title>

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

            <h2><?=$data_course['topik'];?></h2>
            <p><?=$data_course['deskripsi'];?></p>
            <?php 
            foreach ($data as $chapter) {
            ?>
                <div class="d-flex align-items-center mb-2">
                    <h4 class="p-0 m-0">Chapter <?=$chapter['no_chapter'];?></h4>
                    <form action="checkbox.php?idCourse=<?=$id?>&idChapter=<?=$chapter['id_chapter'];?>" method="post">
                        <?php 
                            $query = mysqli_query($conn, "SELECT * FROM course_user WHERE id_users='".$_SESSION['id_users']."' AND id_course='$id'");
                            $data = mysqli_fetch_assoc($query);
                            $query = mysqli_query($conn, "SELECT * FROM progress_user WHERE id_course_user='".$data['id_course_user']."' AND id_chapter='".$chapter['id_chapter']."'");
                            $course_chapter = mysqli_fetch_assoc($query);
                            if ($course_chapter['status'] == 0) {
                            ?>
                                <input onClick=(this.form.submit()) type="checkbox" class="ml-2" aria-label="Checkbox for following text input" style="width: 20px; height: 20px;">
                            <?php
                            } else {
                            ?>
                                <input onClick=(this.form.submit()) type="checkbox" class="ml-2" aria-label="Checkbox for following text input" style="width: 20px; height: 20px;" checked="true">
                            <?php
                            }
                        ?>
                        
                    </form>
                </div>
                <div class="table-responsive">
                    <table id="example" class="table table-bordered">
                        <thead>
                            <th width="2%">Type</th>
                            <th>Deskripsi</th>
                            <th width="2%">Action</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>PDF</td>
                                <td rowspan="2"><?=$chapter['deskripsi'];?></td>
                                <td><a href="view-pdf.php?id=<?=$chapter['id_chapter'];?>" class="btn btn-xs btn-info" style="width:100%;">View File</a></td>
                            </tr>
                            <tr>
                                <td>VIDEO</td>
                                <td><a href="play-video.php?id=<?=$chapter['id_chapter'];?>" class="btn btn-xs btn-info" style="width:100%;">Play Video</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            <?php
            }
            ?>

            <?php 
            if ($data_course['kelas_level'] == 'premium') {
                
                $qry = mysqli_query($conn, "SELECT * FROM course_user WHERE id_users='".$_SESSION['id_users']."' AND id_course='$id'");
                $course_user = mysqli_fetch_assoc($qry  );
                if ($course_user['lulus'] == 0) {
                ?>
                    <h4>Exam</h4>
                    <div class="table-responsive">
                        <table id="example" class="table table-bordered">
                            <thead>
                                <th>Deskripsi</th>
                                <th width="2%">Action</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td rowspan="2">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Praesentium, eligendi?</td>
                                    <td><a href="exam.php?id=<?=$id?>" class="btn btn-xs btn-info">Kerjakan</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                <?php
                } else {
                    $query = mysqli_query($conn, "SELECT * FROM course_user WHERE id_users='".$_SESSION['id_users']."' AND id_course='$id'");
                    $row = mysqli_fetch_assoc($query);
                ?>
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">Anda Sudah lulus!</h4>
                        <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
                        <hr>
                        <a class="btn btn-primary" href="img-sertif/<?=$row['id_course_user'];?>.jpg" download role="button">Download Sertif</a>
                    </div>
                <?php
                }
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