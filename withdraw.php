<?php 
require_once 'includes/db.php';

require_once ('includes/header.php'); 
require_once ('includes/topnav.php'); 
require_once ('includes/side_nav.php');
require_once ('admin/functions.php');
 ?>


<?php
// inserting data into table
if(isset($_POST['withdraw'])){

  $amount = $_POST['amount'];
  $email = $_POST['email'];
   $withdrawal_detail = $_POST['withdrawal_detail']; 
     $user_id = 6;
  $date = date('m/d/y h:i:s a', time());

   $sql = "INSERT INTO withdrawal_request (wr_id, the_user_id, wr_date, amount, user, withdraw_detail) VALUE ('','{$user_id}','{$date}','{$amount}','{$email}','{$withdrawal_detail}')";

    $transaction_query = mysqli_query($conn,$sql);
    confirmQuery($transaction_query);

    ?>
 <script> alert('Sent Successfully');  </script>
    <?php }?>



<div class="container pt-3">
    <!-- withdraw request Form Start -->
    <div class="row justify-content wrapper pt-3" id="login-box">
        <div class="col-lg-3"></div>
        <div class="col-lg-6 my-auto pt-3">
            <div class="card-group myShadow pt-3">
                <div class="card round-left p-4" style="flex-grow:1.4;">
                    <h1 class="text-center font-weight-bold text-primary">WITHDRAWAL REQUEST

</h1>
                    <hr class="my-3">
                    <form action="" method="post" class="px-3" enctype="multipart/form-data">
                    <input type="text" name="email" value="tesing@mail" hidden/>
                    <input type="text" name="user_id" value="1" hidden/>
  
                        <div id="loginAlert"></div>

                        <div class="form-group m-1 rounded card-text p-2" style="border:1px solid #0275d8;">
                                                        <label for="name" class="m-1">Amount :</label>
                                                        <input type="text" name="amount"   class="form-control"
                                                            value="">
                                                    </div>
 
                        <div class="form-group">
                        <div class="form-group m-1 rounded card-text p-2" style="border:1px solid #0275d8;">
                        <label for="exampleTextarea1">Withdrawal Detail | Note:</label>
                        <textarea name="withdrawal_detail" class="form-control "  style="border:1px solid #0275d8;" rows="2"></textarea>
                      </div> 
                        </div>
                        <div class="form-group">
                            <input type="submit" name="withdraw" value="Request withdrawal"  class="btn btn-primary btn-lg btn-block myBtn">
                        </div>
                    </form>
                </div>
                 
            </div>
        </div>
    </div>
    <!-- withdraw request Form End -->
    
    
</div>

 


 
  
  <!-- partial:partials/_footer.html -->

  <?php require_once ('includes/footer.php'); ?>
