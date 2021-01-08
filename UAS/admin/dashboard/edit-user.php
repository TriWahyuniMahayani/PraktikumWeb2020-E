<?php 
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: ../index.php");
    } else {
        
        include_once '../../conn.php';
    
        $id = $_GET['id'];
        $query = mysqli_query($conn, "SELECT * FROM users WHERE id_users='$id'");
        $row = mysqli_fetch_assoc($query);
    
        $query = mysqli_query($conn, "SELECT * FROM langganan WHERE id_users='$id'");
        if (mysqli_num_rows($query) != 0) {
            $a = mysqli_fetch_assoc($query);
            if (strval($a['end_date']) > strval(date("Y-m-d"))) {
                $langganan = true;
                $pernah = true;
            }
            else {
                $langganan = false;
                $pernah = true;
            }
        }
        else {
            $langganan = false;
            $pernah = false;
        }
    
        if (isset($_POST['submit'])) {
            $select = $_POST['select'];
            if ($pernah) {
                if ($langganan) {
                    $date = $a['end_date'];
                    $start_date = $a['start_date'];
                } else {
                    $date = date('Y-m-d');
                    $start_date = date('Y-m-d');
                }
                $end_date = date('Y-m-d', strtotime(strval($date).'+ '.strval($select).' days')); 
                $result = mysqli_query($conn, "UPDATE langganan SET start_date = '$start_date', end_date = '$end_date' WHERE id_users='$id'");
                if ($result) {
                    echo "<script>alert('Berhasil Diedit!');document.location.href='manage-user.php'</script>/n";
                } else {
                    echo "<script>alert('Gagal Diedit!');document.location.href='edit-user.php?id=$id'</script>/n";
                }
            } else {
                $start_date = date('Y-m-d');
                $end_date = date('Y-m-d', strtotime(strval($start_date).'+ '.strval($select).' days')); 
                $result = mysqli_query($conn, "INSERT INTO langganan(start_date, end_date, id_users) VALUES ('$start_date', '$end_date', '$id')");
                if ($result) {
                    echo "<script>alert('Berhasil Diedit!');document.location.href='manage-user.php'</script>/n";
                } else {
                    echo "<script>alert('Gagal Diedit!');document.location.href='edit-user.php?id=$id'</script>/n";
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

    <title>Collapsible sidebar using Bootstrap 4</title>

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

            <h1>Edit of User</h1>
            
            <form action="edit-user.php?id=<?=$id;?>" method="post">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?=strval($row['first_name']).' '.strval($row['last_name']);?>" disabled>
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="<?=$row['email'];?>" disabled>
                    <label for="end_date">Tanggal Langganan Selesai</label>
                    <input type="text" class="form-control" id="end_date" name="end_date" value="<?php echo ($langganan) ? $a['end_date'] : "Anda belum berlanganan"?>" disabled>
                    <label for="langganan">Langganan</label>
                    <select class="form-control" name="select">
                        <option value="60">60 Hari</option>
                        <option value="30">30 Hari</option>
                    </select>
                </div>
                <input class="btn btn-primary" type="submit" value="Edit" name="submit">
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