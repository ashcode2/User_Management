
<?php
require_once('functions.php');
require_once('includes/db.php');
?>

  <div class="card my-2 ">
            <div class="card-header bg-success text-white">
                <h4 class="m-0">User Transaction</h4>

                
            </div>
            <div class="card-body">
            <!-- <div class="table-responsive" id="showAllUsers"> -->
            <div class="table-responsive" >
                    <!-- <p class="text-center align-self-center lead">Please Wait...</p> -->

<?php

if(isset($_GET['p_id'])){

  $the_transaction_id = $_GET['p_id'];
//  $the_t_account = $_GET['author'];
$_SESSION['wr_id'] =  $wr_id; 

      $the_id = (int)$wr_id;
      // var_dump($query = ("SELECT * FROM transactions WHERE transaction_id = {$the_id} "));
      // $query = ("SELECT * FROM transactions WHERE transaction_id = {$the_transaction_id} ");

      // $query = ("SELECT * FROM transactions WHERE transaction_id = 91");
      //  $query = "SELECT * FROM transactions Like transaction_id = .'$the_id'.";
       $query = 'SELECT * FROM withdrawal_request WHERE wr_id = '.$the_id.'';
      // $query = "SELECT * FROM transactions Like tansaction_id =". {$the_transaction_id}.";
 
      $select_transactions_query = mysqli_query ($conn, $query) ;
      confirmQuery( $select_transactions_query ); 
 
              // $result = mysqli_query($conn, $stmt);
              // confirmQuery($stmt);
            //   // $select_transactions_query = mysqli_query ($conn, $query) ;
            //  var_dump($query );
              // echo($query );
              // $select_transactions_query = $stmt->fetch_assoc(); // fetch the data

              while($row = mysqli_fetch_assoc($select_transactions_query)) {
               $t_status = $row["wr_status"];
             $user = $row['user'];
              $wr_date = $row['wr_date'];
              $amount = $row['amount'];
              $withdraw_detail = $row['withdraw_detail'];
              $the_user_id = $row['the_user_id'];
              $wr_id = $row['wr_id'];    
                  
               $_SESSION['wr_id'] =  $wr_id;
               $_SESSION['user'] =  $t_account;

              ?> 


               <h2>
                  <a href="user.php?p_id=<?php global $wr_id; ?>" style="color:#c6164e;"><?php echo "$wr_status"; ?></a>
              </h2>
              <p class="lead">
                Transaction by:  <a href="user.php?p_id=<?php echo $user; ?>"> <?php echo "$user"; ?> </a>
                <!-- <br/>Made To:<?php //echo "$paid_to"; ?> -->
              </p>
              <p>Requested on:  <span class="glyphicon glyphicon-time"></span> <?php echo "$wr_date"; ?>
            </p>
              <hr>
              
                  
        <?php


require_once("payin.php");

?>
 
     <a class="btn btn-primary" href="../admin_home_update.php?p_id={$transaction_id}">Clikc to Approve Tranaction</a>    
                 
            
                <p><?php echo $t_note; ?></p>
                    
             
  <?php
        }


     ?> 
            

<?php 
// }
// }
}
// else {

// header( "Location:index.php");

// }?>
            <br/><hr/><br/>
         
              <!-- Comments Form -->
                        <div class="well">
                            <h4>Leave a Note:</h4>
                            <form action="" method="post" role="form">

                              <!-- <div class="form-group">
                                <label for="Author">Author</label>
                                  <input class="form-control" type="text" name="comment_author">
                              </div>

                              <div class="form-group">
                                <label for="Email">Email</label>
                                  <input class="form-control" type="email" name="comment_email">
                              </div> -->
                                <div class="form-group">
                                  <label for="Comment">Message</label>
                                    <textarea class="form-control" rows="3" name="comment_content"></textarea>
                                </div>
                                <button type="submit" name="create_comment" class="btn btn-primary">Send</button>
                            </form>
                        </div>
            <hr>
            
                                <!-- End Nested Comment -->
            </div>       

           

        </div>

            
  

        

</div>
            </div>
           
        </div>

    </div>
</div>
