<?php 
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: ../index.php");
    }else {
        include_once '../../conn.php';
    }
    
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Dashboard</title>

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
                <li class="active">
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
                    <a href="manage-user.php">Manage User</a>
                </li>
            </ul>

            <ul class="list-unstyled CTAs">
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
                </div>
            </nav>

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 text-center">
                            <i class="fas fa-users fa-5x" style="color: rgb(49, 161, 189)"></i>
                            <?php 
                                $query = mysqli_query($conn, "SELECT COUNT(id_users) AS count FROM users");
                                $users = mysqli_fetch_assoc($query);
                            ?>
                            <p class="m-0 p-0 font-weight-bold text-dark"><?=$users['count'];?></p>
                            <p>All Users</p>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 text-center">
                            <i class="fas fa-user-friends fa-5x" style="color: rgb(49, 161, 189)"></i>
                            <?php 
                                $query = mysqli_query($conn, "SELECT COUNT(id_users) AS count FROM langganan");
                                $users = mysqli_fetch_assoc($query);
                            ?>
                            <p class="m-0 p-0 font-weight-bold text-dark"><?=$users['count'];?></p>
                            <p>Users Premium</p>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 text-center">
                            <i class="fas fa-book fa-5x" style="color: rgb(49, 161, 189)"></i>
                            <?php 
                                $query = mysqli_query($conn, "SELECT COUNT(id_course) AS count FROM course");
                                $users = mysqli_fetch_assoc($query);
                            ?>
                            <p class="m-0 p-0 font-weight-bold text-dark"><?=$users['count'];?></p>
                            <p>All Course</p>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 text-center">
                            <i class="fas fa-trophy fa-5x" style="color: rgb(49, 161, 189)"></i>
                            <?php 
                                $query = mysqli_query($conn, "SELECT COUNT(id_course) AS count FROM course WHERE kelas_level='premium'");
                                $users = mysqli_fetch_assoc($query);
                            ?>
                            <p class="m-0 p-0 font-weight-bold text-dark"><?=$users['count'];?></p>
                            <p>Courses Premium</p>
                        </div>
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