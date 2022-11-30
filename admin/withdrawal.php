
<?php  
require_once 'includes/header.php'; 
?>


                <div class="row">
                    <div class="col-lg-12 col-md-12">

<?php 

require_once 'includes/top_nav.php'; 
require_once 'includes/nav.php';  

?>
   
                
                    <div class="" style="float:inherit;">
    <?php 

                            //  if(!is_admin($_SESSION['username'])){

                            //      redirect("index.php");
                            //  } 
//                                else {                       } 

 
  ?>
 
                        <!--users-->
<?php
if(isset($_GET['source'])){

  $source = $_GET['source'];
}else {
  $source = '';
}

switch ($source) {

    case 'withdrawal_log':
      // code...
      require_once "includes/withdraw.php";
      break;

      case 'edit_user':
        // code...
        require_once "includes/edit_user.php";
        break;

  default:
  require_once "includes/view_all_withdraw_request.php";
 
    break;
}

 ?>




 


<?php require_once "includes/footer.php";  ?>