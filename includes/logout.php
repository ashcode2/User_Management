<?php
    session_start();
    unset($_SESSION['name']);
    unset($_SESSION['id']);	

    session_abort();
    header('location:../../index.php');
?>