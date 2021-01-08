<?php 
    session_start();

    if (!isset($_SESSION['id_users'])) {
        header("Location: ../login.php");
    } else {
        include_once '../conn.php';
    
        $id_course = $_GET['idCourse'];
        $id_chapter = $_GET['idChapter'];
    
        $query = mysqli_query($conn, "SELECT * FROM course_user WHERE id_users='".$_SESSION['id_users']."' AND id_course='$id_course'");
        $data = mysqli_fetch_assoc($query);
        $query = mysqli_query($conn, "SELECT * FROM progress_user WHERE id_course_user='".$data['id_course_user']."' AND id_chapter='$id_chapter'");
        $course_chapter = mysqli_fetch_assoc($query);
        if ($course_chapter['status'] == 0) {
            mysqli_query($conn, "UPDATE progress_user SET status='1' WHERE id_course_user='".$data['id_course_user']."' AND id_chapter='$id_chapter'");
            header("Location: course.php?id=$id_course");
        } else {
            mysqli_query($conn, "UPDATE progress_user SET status='0' WHERE id_course_user='".$data['id_course_user']."' AND id_chapter='$id_chapter'");
            header("Location: course.php?id=$id_course");
        }
    }
?>