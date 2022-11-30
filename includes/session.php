<?php

// session_start();
require_once 'auth.php';
$cuser = new Auth();

if(!isset($_SESSION['email'])){
    header('location:index.php');
    die;
}

$cemail = $_SESSION['user'];
// $c_email = $_SESSION['email'];

$data = $cuser->currentUser($cemail);

$cid = $data['id'];
$cname = $data['name'];
$c_email = $data['email'];
$cpass = $data['password'];
$cphone = $data['phone'];
$cgender = $data['gender'];
$cdob = $data['dob'];
$cphoto = $data['photo'];
$created = $data['created_at'];
$verified = $data['verified'];

$reg_on = date('d M Y', strtotime($created));

$verified = $data['verified'];

$fname = strtok($cname, "");

if($verified == 0){
    $verified = 'Not Verified!';
}
else{
    $verified = 'Verified';
}


?>