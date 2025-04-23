<?php
    session_start();
    session_destroy(); // Hủy session
    // Chuyển hướng đến trang login.php
    header('Location: login.php');
    exit;
?>
