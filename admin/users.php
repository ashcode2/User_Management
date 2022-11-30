

 <div class="row" > 
                <!-- <div class="container"> -->
               
                    <div class="col-lg-12 col-md-12">

<?php 
require_once 'includes/header.php';  

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

 
          
                        <h1 class="page-header">
                           Hi 
                            <small>
                            <?php
         if(isset($_SESSION['username'])) {

                            echo $_SESSION['username'];
                            }
                    ?>
                            </small>
                        </h1>
                        <!--users-->
<?php
if(isset($_GET['source'])){

  $source = $_GET['source'];
}else {
  $source = '';
}

switch ($source) {

    case 'add_user':
      // code...
      require_once "includes/add_user.php";
      break;

      case 'edit_user':
        // code...
        require_once "includes/edit_user.php";
        break;

  default:
  require_once "includes/view_all_users.php";
// require_once "includes/edit_user.php";

    break;
}

 ?>


</div>
</div>
</div>
</div>


 


<?php require_once "includes/footer.php";  ?>