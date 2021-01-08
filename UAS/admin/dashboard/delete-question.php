<?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: ../index.php");
    } else {
        
        include_once '../../conn.php';
    
        $id = $_GET['id'];
        
        $result = mysqli_query($conn, "DELETE FROM question WHERE id_question='$id'");
        
        if ($result) {
            echo "<script>alert('Data berhasil dihapus');document.location.href='javascript:history.go(-1)'</script>";
        }
    }
?>