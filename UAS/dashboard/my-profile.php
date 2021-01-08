<?php
    session_start();

    if (!isset($_SESSION['id_users'])) {
        header("Location: ../login.php");
    } else {
        include_once '../conn.php';
    
        if (isset($_POST['submit'])) {
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $phone_number = $_POST['phone_number'];
    
            $result = mysqli_query($conn, "UPDATE users SET first_name='$first_name',last_name='$last_name', phone_number='$phone_number' WHERE id_users='".$_SESSION['id_users']."'");
            if ($result) {
                $_SESSION['first_name'] = $first_name;
                $_SESSION['last_name'] = $last_name;
                $_SESSION['phone_number'] = $phone_number;
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

    <title>My Profile</title>

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

            <div class="text-center">
                <h3>My Profile</h3>
                <i class="fas fa-user-circle fa-5x"></i>
                <p><?= $_SESSION['first_name'];?> <?= $_SESSION['last_name'] ?></p>
                <p><?=$_SESSION['email'];?> | <?=$_SESSION['phone_number'];?></p>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <?php
                        $query = mysqli_query($conn, "SELECT * FROM langganan WHERE id_users='".$_SESSION['id_users']."'");
                        if (mysqli_num_rows($query) != 0) {
                            $row = mysqli_fetch_assoc($query);
                        ?>
                            <div class="col text-center">
                                <p>Membership Level<br>Premium</p>
                            </div>
                            <div class="col text-center">
                                <p>Started On<br><?=$row['start_date'];?></p>
                            </div>
                            <div class="col text-center">
                                <p>Valid Up To<br><?=$row['end_date'];?></p>
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="col text-center">
                                <p>Membership Level<br>Free</p>
                            </div>
                            <div class="col text-center">
                                <a class="btn btn-info" href="subscribe.php" role="button">Mulai Langanan</a>
                            </div>
                        <?php
                        }
                        ?>
                        <div class="col text-center">
                            <button type="button" class="btn btn-primary ml-2" data-toggle="modal" data-target="#exampleModal">Edit Profile</button>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Course</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="my-profile.php" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama">First Name</label>
                            <input type="text" class="form-control" id="nama" name="first_name" value="<?=$_SESSION['first_name'];?>" required>
                            <label for="nama">Last Name</label>
                            <input type="text" class="form-control" id="nama" name="last_name" value="<?=$_SESSION['last_name'];?>" required>
                            <label for="nama">Phone Number</label>
                            <input type="text" class="form-control" id="nama" name="phone_number" value="<?=$_SESSION['phone_number'];?>" required>
                        </div>  
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input class="btn btn-primary" type="submit" name="submit" value="Edit">
                    </div>
                </form>
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