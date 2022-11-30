<?php
session_start();
if(!isset($_SESSION['id'])){
	header("Location: index.php");
}
require_once 'includes/db.php';
// include('header.php');

// require_once 'includes/session.php';
require_once 'admin/functions.php';


// if(!isset($_SESSION['email'])){
//   header('location:index.php');
//   die;
// }
?>


<?php
// session_start();
// if(!isset($_SESSION['id'])){
// 	header("Location: index.php");
// }
// include_once("db_connect.php");
// $sql = "SELECT id, name, password, email FROM users WHERE id='".$_SESSION['id']."'";
$sql = "SELECT * FROM users WHERE id='".$_SESSION['id']."'";
$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
$row = mysqli_fetch_assoc($resultset);
 

$_SESSION['email'] = $row['email'];
$_SESSION['name'] = $row['name'];
$_SESSION['dob'] = $row['dob'];
$_SESSION['id'] = $row['id'];
$_SESSION['gender'] = $row['gender'];
$_SESSION['photo'] = $row['photo'];
$_SESSION['phone'] = $row['phone'];
$_SESSION['created_at'] = $row['created_at'];
$_SESSION['verified'] = $row['verified'];
$_SESSION['user_role'] = $row['user_role'];
 

$name = $_SESSION['name'];
$id = $_SESSION['id'];
$email = $_SESSION['email'];
$dob = $_SESSION['dob'];
$gender = $_SESSION['gender'];
$photo = $_SESSION['photo'];
$phone = $_SESSION['phone'];
$reg_on = $_SESSION['created_at'];
$verified = $_SESSION['verified'];
$user_role = $_SESSION['user_role'];

?>

<?php

// if(isset($_SESSION['id'])){
//   // $the_user_id = $_GET['id'];
// $the_user_id = $_SESSION['id'];
// // $the_user_id = 10;

//   $query = "SELECT * FROM users WHERE id = $the_user_id ";
//   $select_users_query = mysqli_query($conn,$query);
//   while($row = mysqli_fetch_assoc($select_users_query)) {

//      $user_id = $row['id'];
//      $name = $row['name']; 
//     $password = $row['password'];
//    $email = $row['email'];
//     $dob = $row['dob'];
//      $gender = $row['gender'];
//     $phone = $row['phone'];
//     $photo = $row['photo'];
//     $user_role = $row['user_role'];
//     $reg_on = $row['created_at'];
// }

// }
  ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?= ucfirst(basename($_SERVER['PHP_SELF'], '.php')); ?> | Dashboard</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="assets/css/style1.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="assets/images/favicon.png" />
</head>

<body>