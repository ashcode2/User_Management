
<?php 
// require_once 'includes/db.php';
// require_once('functions.php');
require_once 'includes/header.php'; 
require_once 'includes/pdo_db.php';


$user = $_SESSION['user'];


if(isset($_GET['p_id'])){

    $the_id = $_GET['p_id'];

    $user_id = $the_id;

    $sql = "SELECT email FROM users WHERE email ='{$user_id}' OR id ='{$user_id}'";
    $result = $pdo->query($sql);
     $result->setFetchMode(PDO::FETCH_ASSOC);
     while ($row = $result->fetch()): 
         
            $the_user= $row['email']; 
        endwhile; 

    // $sql = "SELECT * FROM payment WHERE user ='{$user_id}'";
    $sql = "SELECT * FROM payment WHERE user ='{$user_id}' OR user ='{$the_user}'";
$result = $pdo->query($sql);
 $result->setFetchMode(PDO::FETCH_ASSOC);
// $result = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
// $row = mysqli_fetch_assoc($result);

 
    while ($row = $result->fetch()): 
    //   $balance=$row['balance']);  
      $balance=$row['balance'];  
      $deposit= $row['deposit'];  
       $trans_b= $row['trans_b']; 
        $trans_e= $row['trans_e']; 
        $withdraw= $row['withdraw']; 
        // $user= $row['user']; 
    endwhile; 
?>

<?php
// if(isset($_GET['id'])){
// $the_user_id = $_GET['id'];

// $query = "SELECT * FROM users WHERE id = $the_user_id ";
// $select_users_query = mysqli_query($conn, $query);
// while($row = mysqli_fetch_assoc($select_users_query)) {

// $user_id = $row['id'];
// $username = $row['name']; 
//   $user_email = $row['email'];
// $phone = $row['phone']; 

// }


// $query = "SELECT * FROM payment WHERE user = $user_email ";
// $select_users_query = mysqli_query($conn, $query);
// while($row = mysqli_fetch_assoc($select_users_query)) {

// $user_id = $row['payment_id'];
// $balance = $row['balance']; 
//   $user_email = $row['email'];
// $withdraw = $row['withdraw']; 

// }

// }
?>

                <div class="row">
                    <div class="col-lg-12 col-md-12">

<?php 

require_once 'includes/top_nav.php'; 
require_once 'includes/nav.php';  

?>
   

   <?php
//    $query = "SELECT * FROM payment ORDER BY wr_id DESC";
//    $query = "SELECT * FROM payment WHERE id = $transaction_id";
//    $select_posts = mysqli_query($conn,$query);

//    while($row = mysqli_fetch_assoc($select_posts)) {
//    $wr_id = $row['payment_id'];
//    $user = $row['user'];
//    $amount = $row['amount'];
//    $wr_date = $row['wr_date']; 
//    $status = $row['wr_status']; 


//    }
?>
                
                    <div class="" style="float:inherit;">
   

  <div class="card my-2 ">
            <div class="card-header bg-success text-white">
                <h4 class="m-0">User <?php echo $user;?></h4>
            </div>
            <div class="card-body">




            
                    
            <!-- <div class="form-group" style="float: right;"> -->
                        <!-- <div class="row form-group">
                            <div class="col-md-4" style="float: right;"> -->
                                <div class="form-group col-md-4 col-xs-4">
                                <h6 class="text-muted font-weight-normal form-control">Last withdraw: $
                                    <b><?php echo $balance; ?></b> </h6>   
                                        
                                <h6 class="text-muted font-weight-normal form-control">Balance: $
                                    <b><?php echo $balance; ?></b> </h6>   
                                                                         
                            <!-- </div> -->
                            <!-- <br/> -->
                            <!-- <div class="col-md-4" >
                                <div class="d-flex align-items-center align-self-start"> -->
                                <h6 class="text-muted font-weight-normal form-control">Deposit: $
                                <b><?php echo $balance; ?></b>    
                                <!-- </div> -->
  
                                <!-- <div class="form-group form-control col-md-4"> -->
                                     <h6 class="text-muted font-weight-normal form-control">Bitcoin: $
                                     <b><?php echo $trans_b; ?></b>    </h6>

                                     <hr/>
                                    <h6 class="text-muted font-weight-normal form-control">Ethereum: $
                                    <b><?php echo $trans_e; ?></b>    
                                    </h6>
                                     </div>




            <?php
}

 $the_transaction_id = $_SESSION['the_transaction_id'];
 

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
 alert('payment made Successfully'); 
    //  window.location = "user.php?id=<?php echo $transaction_id;?>";
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
                                    <!-- <input  type="tel" name="transaction_id" value="<?php// echo $transaction_id; ?>"  />     -->

                                    <input class="btn btn-success" type="submit" name="pay" value="Pay in" />    
                                    <input class="btn btn-danger" type="submit" name="Withdraw" value="Withdraw" />    
</form>
                                    </div>





            </div>
            </div>
            </div>

  


 


<?php require_once "includes/footer.php";  ?>