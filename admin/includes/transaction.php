
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
$_SESSION['the_transaction_id'] =  $the_transaction_id; 

      $the_id = (int)$the_transaction_id;
      // var_dump($query = ("SELECT * FROM transactions WHERE transaction_id = {$the_id} "));
      // $query = ("SELECT * FROM transactions WHERE transaction_id = {$the_transaction_id} ");

      // $query = ("SELECT * FROM transactions WHERE transaction_id = 91");
      //  $query = "SELECT * FROM transactions Like transaction_id = .'$the_id'.";
       $query = 'SELECT * FROM transactions WHERE transaction_id = '.$the_id.'';
      // $query = "SELECT * FROM transactions Like tansaction_id =". {$the_transaction_id}.";
 
      $select_transactions_query = mysqli_query ($conn, $query) ;
      confirmQuery( $select_transactions_query ); 
 

              while($row = mysqli_fetch_assoc($select_transactions_query)) {
               $t_status = $row["t_status"];
             $t_account = $row['t_account'];
              $t_date = $row['t_date'];
              $post_image = $row['t_reciept_image'];
              $post_pdf = $row['t_reciept_pdf'];
              $t_note = $row['t_note'];
              $paid_to = $row['paid_to'];
               $transaction_id = $row['transaction_id'];    
                  
               $_SESSION['the_transaction_id'] =  $the_transaction_id;
               $_SESSION['user'] =  $t_account;

              ?> 


               <h2>
                  <a href="user.php?p_id=<?php global $transaction_id; ?>" style="color:#c6164e;"><?php echo "$t_status"; ?></a>
              </h2>
              <p class="lead">
                Transaction by:  <a href="user.php?p_id=<?php echo $t_account; ?>"> <?php echo "$t_account"; ?> </a>
                <br/>Made To:<?php echo "$paid_to"; ?>
              </p>
              <p>Posted on:  <span class="glyphicon glyphicon-time"></span> <?php echo "$t_date"; ?>
            </p>
              <hr>
              
                  
        <?php


require_once("payin.php");

?>

<?php

                  echo " <div>";
                   if ( empty($post_image) || !$post_image) {
echo "<h4>Reciept not Uploaded</h4>";
                   }else{
          
         echo    "</div> <br/>";
            echo    "<img class='img-responsive' src='../images_reciept/$post_image' alt='No Upload' width='40%' height='100%'/>";
                   }
            ?>
<!--                </div>-->
                          
    <?php
                  
                   if ( empty($post_pdf) || !$post_pdf) {
//  echo "<h4>pdf Copy Reciept not Uploaded </h4>";

                   }else{         
            echo       " <div class='embed-responsive embed-responsive-16by9 quotes'>";
         
      echo "<embed src='../pdf/$post_pdf' type='application/pdf' width='40%' height='300px' />";
   echo "  </div>
              
      <hr/>
<br/>";
              
                  }
 
       ?>
     <a class="btn btn-primary" href="../admin_home_update.php?p_id={$transaction_id}">Clikc to Approve Tranaction</a>    
                 
            
                <p><?php echo $t_note; ?></p>
                    
             
  <?php
        }


     ?> 
                  <hr/> 
                
  

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

            <!-- Blog Sidebar Widgets Column -->
         <?php //include "includes/sidebar.php";?>

        </div>

            
  

        

</div>
            </div>
           
        </div>

    </div>
</div>
