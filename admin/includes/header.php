 
 <?php
 ob_start();
 session_start();

//  require_once('php/admin-db.php');
//  require_once('db.php');
 require_once('db.php');
 require_once('functions.php');
//  require_once('includes/php/config.php');
 
 ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Breeze Ja">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php

    // $title = basename($_SERVER['PHP_SELF'], '.php');
    // $title = explode('-', $title);
    // $title = ucfirst($title[1]);
    ?>
    <title>Admin Panel</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js" defer></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#open-nav").click(function() {
                $(".admin-nav").toggleClass('animate');
            });
        });
    </script>
    <style type="text/css">
        .admin-nav {
            width: 220px;
            min-height: 110vh;
            overflow: hidden;
            background-color: #343a40;
            /* transition: 0.3s all ease-in-out; */
        }

        .admin-link {
            background-color: #343a40;
        }

        .admin-link:hover,
        .nav-active {
            background-color: #212529;
            text-decoration: none;
        }

        .animate {
            width: 0;
            transition: 0.3s all ease-in-out;
        }
    </style>
</head>

<body  >
   