
<?php
include_once("includes/db.php");
include_once("functions.php");


//inserting data into table
if(isset($_POST['pay'])){

    $payment_id = '';
    $balance = escape($_POST['balance']);
     $deposit = escape($_POST['deposit']);
     $withdraw = escape($_POST['withdraw']);
     $trans_b = escape($_POST['trans_b']);
     $trans_e = escape($_POST['trans_e']);
     $user = escape($_POST['email']);
//   $date = date('m/d/y h:i:s a', time());

// $the_transaction_id = $_SESSION['the_transaction_id'];
// $the_transaction_id = $_GET['transaction_id'];
$the_transaction_id = $_POST['transaction_id'];
// $the_transaction_id = "1";
// $user = $_SESSION['email'];
  $date = date('d-m-y');

//   $sql = "INSERT INTO payment(payment_id, the_transaction_id) VALUE ('',$the_transaction_id)";
 $sql = "INSERT INTO payment(payment_id, the_transaction_id, user,	balance, deposit, date, withdraw, trans_b, trans_e)VALUE('',{$the_transaction_id},'{$user}','{$balance}','{$deposit}','{$date}','{$withdraw}','{$trans_b}','{$trans_e}')";
// $sql = "INSERT INTO payment(payment_id, the_transaction_id, user,balance) VALUE ('', $the_transaction_id,'{$user}',$balance)";

    $payment_query = mysqli_query($conn,$sql);
    confirmQuery($payment_query);

    ?>
 <script> 
 alert('payment Added Successfully'); 
     window.location = "user.php?id=<?php echo $transaction_id;?>";
 </script>
    <?php }?>

 
                    
            <div class="btn-info" style="float: right;">
            <form action="" method="post">
                        <div class="row">
                            <div class="col-md-4" style="float: right;">
                                <div class="d-flex align-items-center align-self-start">
                                    <h6 class="mb-0">Withdrawal</h6>
                                    <input type="text" class="form-control" name="withdraw" width='40%' placeholder="$" /><br/>
                                    <!-- <h6 class="text-muted font-weight-normal">Balance</h6> -->
                                    </div>
                                    </div>
<hr/>
                            <div class="col-md-4" style="float: right;">
                                <div class="d-flex align-items-center align-self-start">
                                    <h6 class="mb-0">Balance</h6>
                                    <input type="text" class="form-control" name="balance" width='40%' placeholder="$" /><br/>
                                    <!-- <h6 class="text-muted font-weight-normal">Balance</h6> -->
                                </div>
                                </div>
                                </div>
                            <br/>
                            <div class="col-md-4" >
                                <div class="d-flex align-items-center align-self-start">
                                <h6 class="mb-0">Deposit</h6>
                                    <input type="text" class="form-control" name="deposit" width='40%' placeholder="$"  />
                                    <!-- <h6 class="text-muted font-weight-normal">Deposit</h6> -->
                                </div>
                            </div> 
                            
                        <!-- </div> -->
                     
                    
           <hr/><hr/> 
                        <div class="col-6">
                                     <h6 class="text-muted font-weight-normal">Transfer to Bitcoin: $</h6>
 
                                    <input type="text" class="form-control" name="trans_b" width='40%'  placeholder="Transfer to Bitcoin"  />
                                    <hr/>
                                    <h6 class="text-muted font-weight-normal">Transfer to Ethereum: $</h6>

                                    <input type="text" class="form-control" name="trans_e" width='40%' placeholder="Transfer to Ethereum" />
 
                                    </div>
                                    <br/>
                                    <input  type="text" name="email" value="<?php echo $t_account; ?>" hidden />    
                                    <input  type="tel" name="transaction_id" value="<?php echo $transaction_id; ?>"  />    

                                    <input class="btn btn-success" type="submit" name="pay" value="Pay in" />    
                                    <input class="btn btn-danger" type="submit" name="Withdraw" value="Withdraw" />    
</form>
                                    </div>
