<?php 
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: ../index.php");
    } else {
        include_once '../../conn.php';
    
        $kelas_level = $_GET['course'];
        $query= mysqli_query($conn, "SELECT * FROM course WHERE kelas_level='$kelas_level'");
        $data = mysqli_fetch_all($query, MYSQLI_ASSOC);
    
        if (isset($_POST['submit'])) {
            $topik = $_POST['topik'];
            $deskripsi = $_POST['deskripsi'];
            $select = $_POST['select'];

            $file_name = $_FILES['file']['name'];
            
            $result = mysqli_query($conn, "INSERT INTO course(topik, deskripsi, kelas_level, src_img) VALUES ('$topik', '$deskripsi', '$select', '$file_name')");
            move_uploaded_file($_FILES['file']['tmp_name'], "../../gambar/".$_FILES['file']['name']);
    
            if ($result) {
                echo "<script>alert('Berhasil Ditambah!');document.location.href='list-course.php?course=$select'</script>/n";
            } else {
                echo "<script>alert('Gagal Ditambah!');document.location.href='list-course.php?course=$select'</script>/n";
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

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">

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

            <h1>List of Course<button type="button" class="btn btn-primary ml-2" data-toggle="modal" data-target="#exampleModal">
                Add
            </button></h1>
            <div class="table-responsive">
                <table id="example" class="table table-bordered">
                    <thead>
                        <th width="15%">Title</th>
                        <th>Deskripsi</th>
                        <th width="2%">Action</th>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($data as $course) {
                        ?>
                            <tr>
                                <td><?=$course['topik'];?></td>
                                <td><?=$course['deskripsi'];?></td>
                                <td><div class="d-flex">
                                    <a href="chapter-course.php?id=<?=$course['id_course'];?>" class="badge badge-primary">View Chapter</a>
                                    <?php 
                                    if ($course['kelas_level'] == 'premium') {
                                    ?>
                                        <a href="exam.php?id=<?=$course['id_course'];?>" class="badge badge-info ml-2">View Exam</a>
                                    <?php
                                    } 
                                    ?>
                                    <a href="edit-course.php?id=<?=$course['id_course'];?>" class="badge badge-warning ml-2">Edit</a>
                                    <a href="delete-course.php?id=<?=$course['id_course'];?>" class="badge badge-danger ml-2" onclick="return confirm('yakin?')">Delete</a>
                                </div></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>

        </div>

    </div>

    <!-- Modal -->
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
                <form action="list-course.php?course=<?=$kelas_level;?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="topik">Topik</label>
                            <input type="text" class="form-control" id="topik" name="topik" required>
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                            <label for="kelas_level">Kelas Level</label>
                            <select class="form-control" name="select">
                                <option value="premium">Premium</option>
                                <option value="free">Free</option>
                            </select>
                            <label for="src_img">Source Gambar</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile04" name="file">
                                <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                            </div>
                            
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input class="btn btn-primary" type="submit" name="submit" value="Add">
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
    
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
        $('#example').DataTable();
    </script>
</body>

</html>