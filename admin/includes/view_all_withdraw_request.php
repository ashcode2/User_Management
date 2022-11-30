


  <div class="card my-2 " style="  width: 80%;
                height: 500px;
                overflow-x: hidden;
                overflow-y: auto;      
                 " >
            <div class="card-header bg-success text-white">
                <h4 class="m-0">Withdrawal Request</h4>
            </div>
            <div class="card-body">
            <!-- <div class="table-responsive" id="showAllUsers"> -->
            <div class="table-responsive" >
                    <!-- <p class="text-center align-self-center lead">Please Wait...</p> -->


<?php
          require_once ("delete_modal.php");

  if(isset($_POST['checkBoxArray'])){

foreach ($_POST['checkBoxArray'] as $postValueId) {
  // code...
  $bulk_options = $_POST['bulk_options'];

            switch ($bulk_options) {
              case 'withdrawed':
                $query = "UPDATE withdrawal_request set wr_status = '{$bulk_options}' WHERE wr_id = {$postValueId} ";

                    $update_to_published_status = mysqli_query($conn,$query);
                    confirmQuery($update_to_published_status);
                break;

                case 'pending':
                  $query = "UPDATE withdrawal_request set wr_status = '{$bulk_options}' WHERE wr_id = {$postValueId} ";

                      $update_to_draft_status = mysqli_query($conn,$query);
                      confirmQuery($update_to_draft_status);
                  break;

                  case 'delete':
                  $query = "DELETE FROM withdrawal_request WHERE wr_id = {$postValueId}";

                        $update_to_delete_status = mysqli_query($conn,$query);
                        confirmQuery($update_to_delete_status);
                    break;

                   

            }

}

   }

 ?>  
 

<form class="" action="" method="post">

 <table class="table table-bordered table-hover ">
<!-- 
<div id="bulkOptionsContainer" class="col-xs-4">

  <select class="form-control" name="bulk_options">
    <option value="">select Options</option>
    <option value="published">Publish</option>
    <option value="draft">Draft</option>
    <option value="delete">Delete</option>
    <option value="clone">Clone</option>
  </select>

</div> -->
  <!-- <div class="col-xs-4">
    <input type="submit" name="submit" value="Apply" class="btn btn-success">
    <a href="" class="btn btn-primary">Add New</a>
  </div>
<br/><hr/> -->

  <thead>
    <tr>
      <th><input type="checkbox" name="" id="selectAllBoxes">  </th>
      <th>WR_Id</th>
        <!-- <th>user</th>
      <th>paid_from</th> -->
      <th>amount</th>
      <th>wr_date</th>
      <th>status</th>
      <th>Account</th>
       <th>Withdraw</th>
      <th>Delete</th>
     
    </tr>
  </thead>
  <tbody>
   <?php
   $query = "SELECT * FROM withdrawal_request ORDER BY wr_id DESC";
   $select_posts = mysqli_query($conn,$query);

   while($row = mysqli_fetch_assoc($select_posts)) {
   $wr_id = $row['wr_id'];
   $user = $row['user'];
   $amount = $row['amount'];
   $wr_date = $row['wr_date']; 
   $status = $row['wr_status']; 


echo "<tr>";
?>
<td>
 <input type='checkbox' class="checkBoxes" id='selectAllBoxes' name="checkBoxArray[]" value="<?php echo $transaction_id;?>">
</td>
 <?php
echo "<td>{$wr_id}</td>";
echo "<td>{$amount}</td>";


// echo "<td>{$paid_from}</td>";
echo "<td>{$wr_date}</td>";
echo "<td>{$status}</td>";
 echo "<td><a href='user.php?p_id=$user' >{$user}</a></td>";

// $query = "SELECT * FROM plans WHERE plan_id = {$tran_plan_id}";
// $select_categories_id = mysqli_query($conn,$query);

// while($row = mysqli_fetch_assoc($select_categories_id)) {
// $cat_id = $row['plan_id'];
// $plan_title = $row['plan_title'];

// echo "<td>{$plan_title}</td>";
// } 

//  echo "<td><a class='btn btn-primary' href=withdrawal.php?source=user_wr&p_id={$transaction_id}'>View Tranaction</a></td>";
echo "<td><a class='btn btn-info'  href='../withdrawal.php?p_id={$wr_id}'>Approve Withdrawal</a></td>";

?>
<form method="post">
<input type="hidden" name="wr_id" value="<?php echo $wr_id ?>">

<?php echo '<td><input class="btn btn-danger" type="submit" name="delete" Value="Delete"></td>';
 ?>
</form>
<?php

//echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to Delete'); \" href='posts.php?delete={$transaction_id}'>Delete</a></td>";

// echo "<td><a class='btn btn-success' href='transactions.php?reset={$transaction_id}'><b>{$post_views_count}</b><small> Views__</small><i>Click to Reset</i></a></td>";

echo "</tr>";

}
    ?>


   </tbody>
</table>
 </form> 

<?php

if(isset($_POST['delete'])){

$the_wr_id = escape($_POST['wr_id']);

$query = "DELETE FROM withdrawal_request WHERE wr_id = {$the_wr_id}";
$delete_query = mysqli_query($conn,$query);

//refreshing the page
header("location:./withdrawal.php");

}

// if(isset($_GET['reset'])){

// $the_transaction_id = $_GET['reset'];

// $query = "UPDATE  transactions SET post_views_count = 0 WHERE transaction_id =" . mysqli_real_escape_string($conn, $_GET['reset']) ." ";
// $reset_query = mysqli_query($conn,$query);

// //refreshing the page
// header("location:./transactions.php");

// }
 ?>



<script>
    


    $(document).ready(function(){


        $(".delete_link").on('click', function(){


            var id = $(this).attr("rel");

            var delete_url = "transactions.php?delete="+ id +" ";


            $(".modal_delete_link").attr("href", delete_url);


            $("#myModal").modal('show');


        });

    });



  <?php if(isset($_SESSION['message'])){

         unset($_SESSION['message']);

     }

         ?>



</script>




</div>
            </div>
           
        </div>

    </div>
</div>

