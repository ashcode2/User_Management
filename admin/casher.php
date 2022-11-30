
<?php 
require_once 'includes/db.php';
require_once('functions.php');
require_once 'includes/header.php'; ?>


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

 
           


                        <div class="card my-2 ">
            <div class="card-header bg-success text-white">
                <h4 class="m-0">Transaction Deposit/Withdrawal</h4>
            </div>
            <div class="card-body">
            <!-- <div class="table-responsive" id="showAllUsers"> -->
            <div class="table-responsive" >
                    <!-- <p class="text-center align-self-center lead">Please Wait...</p> -->


                        <!--Add category Form-->
<div class="col-md-6" style="float:right;">

<?php insert_category(); ?>

<form action="" method="post">
<div class="form-group">
<label for="plan_title"> Add Deposit</label>
<input type="text" class="form-control" name="plan_title">
</div>
<div class="form-group">
<input class="btn btn-primary " id="add_cash" type="submit" name="submit" value="Add Plan">
</div>

</form>
              <?php  
              if(isset($_GET['edit'])){
                $plan_id = $_GET['edit'];

                
                include "includes/update_category.php";
              }
               ?>
    </div>  <!--End Add category Form-->

    <div class="col-md-6" style="float:inherit;"><!--Displaying categories -->

    <table class="table table-bordered table-hover ">
    <thead>
    <tr>
    <th>Id</th>
    <th>Tranaction Balance</th>
    </tr>
    </thead>
    <tbody>

<?php findAllCategories(); ?>
<?php deleteCategories(); ?>

      </tbody>
    </table>
  </div><!--End Displaying categories -->
                </div>
             



                
</div>
            </div>
           
        </div>

    </div>
</div>

<?php include "includes/footer.php" ?>
