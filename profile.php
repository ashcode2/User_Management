<?php 
require_once 'includes/db.php';

require_once ('includes/header.php'); 
require_once ('includes/topnav.php'); 
require_once ('includes/side_nav.php');
require_once ('admin/functions.php');
 ?>




  <?php
if(isset($_GET['source'])){

  $source = $_GET['source'];
}else {
  $source = '';
}

switch ($source) {

    

      case 'edit_profile':
        // code...
        require_once "includes/edit_profile.php";
        break;

  default:
  require_once "includes/user_profile.php";
    break;
}

 ?>




  
  <!-- partial:partials/_footer.html -->

  <?php require_once ('includes/footer.php'); ?>