
   <?php require_once ('includes/header.php'); 
    require_once ('admin/functions.php');  
  require_once ('includes/topnav.php'); 
   require_once ('includes/side_nav.php'); ?>



  
<div class="content-wrapper">
            <div class="row justify-content-center">
                <div class="col-10 grid-margin">
                  
 

  <?php

if(isset($_POST['send'])){
$transaction_id = "";
$paid_to	 = $_POST['paid_to']; 
$t_note = $_POST['t_note'];
// $t_note = escape($_POST['t_note']);
$t_status = "pending";

 $t_reciept_image = $_FILES['image']['name'];
 $t_image_temp = $_FILES['image']['tmp_name']; 
    require_once ("pdf_upload.php");
  $t_date = date('d-m-y');
//   $t_date = date('m/d/y h:i:s a', time());
    move_uploaded_file($t_image_temp, "images_reciept/$t_reciept_image");
 
   $t_account = $email;
    
$sql = "INSERT INTO transactions (t_note) VALUE ('$t_note')";
 

$create_post_query = mysqli_query($conn, $sql);
 confirmQuery($create_post_query);
// var_dump($query);
 
 
   ?> <script>
alert('Sent Successfully');
    </script>
    <?php
}

 require_once("send_transaction.php");
 ?>







<?php require_once ('includes/footer.php'); ?>