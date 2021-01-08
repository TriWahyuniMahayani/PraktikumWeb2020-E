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
            $query = mysqli_query($conn, "SELECT * FROM question WHERE id_course='$id'");
            if (mysqli_num_rows($query) == 0) {
                header("Location: error.php");
            } else  {
                $data = mysqli_fetch_all($query, MYSQLI_ASSOC);
                if (!($_SESSION['user_kelas'] == 'premium')) {
                    header("Location: error.php");
                }
            }
            
        }
        
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Exam</title>

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

            <h2>Question</h2>
            <h5>Choose the correct answer.</h5>
            <form action="result.php?id=<?=$id?>" method="post">
                <?php 
                foreach ($data as $question) {
                ?>
                    <div class="border-top border-bottom mb-4">
                        <div><?=$question['question'];?></div>
                        <div class="col-md-3"><input class="radios" type="radio" id="ChoiceA" name="<?=$question['id_question'];?>" value="<?=$question['choiceA'];?>"> A. <?=$question['choiceA'];?></div>
                        <div class="col-md-3"><input class="radios" type="radio" id="ChoiceB" name="<?=$question['id_question'];?>" value="<?=$question['choiceB'];?>"> B. <?=$question['choiceB'];?></div>
                        <div class="col-md-3"><input class="radios" type="radio" id="ChoiceC" name="<?=$question['id_question'];?>" value="<?=$question['choiceC'];?>"> C. <?=$question['choiceC'];?></div>
                        <div class="col-md-3"><input class="radios" type="radio" id="ChoiceD" name="<?=$question['id_question'];?>" value="<?=$question['choiceD'];?>"> D. <?=$question['choiceD'];?></div>
                    </div>
                <?php
                }
                ?>
                <div class="text-right mt-4">
                    <input class="btn btn-danger" type="submit" value="Selesai">
                </div>
            </form>


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