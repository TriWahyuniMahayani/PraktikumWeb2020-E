<?php 
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: ../index.php");
    } else {
        include_once '../../conn.php';
    
        $id = $_GET['id'];
        
        $query = mysqli_query($conn, "SELECT * FROM question WHERE id_course='$id'");
        $data = mysqli_fetch_all($query, MYSQLI_ASSOC);
    
        if (isset($_POST['submit'])) {
            $question = $_POST['question'];
            $choiceA = $_POST['choiceA'];
            $choiceB = $_POST['choiceB'];
            $choiceC = $_POST['choiceC'];
            $choiceD = $_POST['choiceD'];
            $answer = $_POST['answer'];
    
            $result = mysqli_query($conn, "INSERT INTO question(question, choiceA, choiceB, choiceC, choiceD, answer, id_course) VALUES ('$question', '$choiceA', '$choiceB', '$choiceC', '$choiceD', '$answer', '$id')");
    
            if ($result) {
                echo "<script>alert('Berhasil Ditambah!');document.location.href='exam.php?id=$id'</script>/n";
            } else {
                echo "<script>alert('Gagal Ditambah!');document.location.href='exam.php?id=$id'</script>/n";
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

            <h1>Exam of Course<button type="button" class="btn btn-primary ml-2" data-toggle="modal" data-target="#exampleModal">
                Add
            </button></h1>
            
            <form>
                <?php 
                foreach ($data as $question) {
                ?>
                    <div class="border-top border-bottom mb-4">
                        <div><?=$question['question'];?><a href="edit-question.php?id=<?=$question['id_question'];?>" class="badge badge-warning ml-2">Edit</a><a href="delete-question.php?id=<?=$question['id_question'];?>" class="badge badge-danger ml-2" onclick="return confirm('yakin?')">Delete</a></div>
                        <div class="col-md-3"><input class="radios" type="radio" id="ChoiceA" disabled <?php echo ($question['answer'] == $question['choiceA']) ? "checked" : "" ;?>> A. <?=$question['choiceA'];?></div>
                        <div class="col-md-3"><input class="radios" type="radio" id="ChoiceB" disabled <?php echo ($question['answer'] == $question['choiceB']) ? "checked" : "" ;?>> B. <?=$question['choiceB'];?></div>
                        <div class="col-md-3"><input class="radios" type="radio" id="ChoiceC" disabled <?php echo ($question['answer'] == $question['choiceC']) ? "checked" : "" ;?>> C. <?=$question['choiceC'];?></div>
                        <div class="col-md-3"><input class="radios" type="radio" id="ChoiceD" disabled <?php echo ($question['answer'] == $question['choiceD']) ? "checked" : "" ;?>> D. <?=$question['choiceD'];?></div>
                    </div>
                <?php
                }
                ?>
            </form>


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
                <form action="exam.php?id=<?=$id?>" method="post">
                    <div class="modal-body">            
                        <div class="form-group">
                            <label for="nama">Question</label>
                            <textarea class="form-control" id="question" name="question" rows="3" required></textarea>
                            <label for="nama" required>Choice A</label>
                            <input type="text" class="form-control" id="choiceA" name="choiceA">
                            <label for="nama" required>Choice B</label>
                            <input type="text" class="form-control" id="choiceB" name="choiceB">
                            <label for="nama" required>Choice C</label>
                            <input type="text" class="form-control" id="choiceC" name="choiceC">
                            <label for="nama" required>Choice D</label>
                            <input type="text" class="form-control" id="choiceD" name="choiceD">
                            <label for="nama" required>Answer</label>
                            <input type="text" class="form-control" id="answer" name="answer">
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

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
</body>

</html>