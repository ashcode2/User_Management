


  <div class="card my-2 " style="  width: 80%;
                height: 500px;
                overflow-x: hidden;
                overflow-y: auto;      
                 " >
            <div class="card-header bg-success text-white">
                <h4 class="m-0">Users Transactions</h4>
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
              case 'Approved':
                $query = "UPDATE transactions set t_status = '{$bulk_options}' WHERE transaction_id = {$postValueId} ";

                    $update_to_published_status = mysqli_query($conn,$query);
                    confirmQuery($update_to_published_status);
                break;

                case 'pending':
                  $query = "UPDATE transactions set t_status = '{$bulk_options}' WHERE transaction_id = {$postValueId} ";

                      $update_to_draft_status = mysqli_query($conn,$query);
                      confirmQuery($update_to_draft_status);
                  break;

                  case 'delete':
                  $query = "DELETE FROM transactions WHERE transaction_id = {$postValueId}";

                        $update_to_delete_status = mysqli_query($conn,$query);
                        confirmQuery($update_to_delete_status);
                    break;

                  case 'clone':

                  $query = "SELECT * FROM transactions WHERE transaction_id = $postValueId";
                  $select_posts_query = mysqli_query($conn,$query);

                  while ($row = mysqli_fetch_array($select_posts_query)) {
                    $t_date = $row['t_date'];
                    $paid_from = $row['paid_from'];
                    $post_date = $row['post_date'];
                    $post_category_id = $row['post_category_id'];
                    $t_status = $row['t_status'];
                    $t_reciept_image = $row['t_reciept_image'];
                  //  $t_reciept_image_temp = $_FILES['image']['tmp_name'];
                    $post_tags = $row['post_tags'];
                    $post_content = $row['post_content'];


                    $query = "INSERT INTO transactions(post_category_id, t_date, paid_from, post_date,
                    t_reciept_image, post_content,post_tags, t_status)";
                    $query .= "VALUE({$post_category_id},'{$t_date}','{$paid_from}',now(),
                    '{$t_reciept_image}','{$post_content}','{$post_tags}','{$t_status}')";

                    $create_post_query = mysqli_query($conn,$query);
                       confirmQuery($create_post_query);

                  }

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
      <th>Trans_Id</th>
        <!-- <th>paid_to</th>
      <th>paid_from</th> -->
      <th>t_account</th>
      <th>t_date</th>
      <th>t_status</th>
      <th>t_reciept_image</th>
      <th>t_reciept_pdf</th>
      <th>View Transaction</th>
      <th>Edit</th>
      <th>Delete</th>
     
    </tr>
  </thead>
  <tbody>
   <?php
   $query = "SELECT * FROM transactions ORDER BY transaction_id DESC";
   $select_posts = mysqli_query($conn,$query);

   while($row = mysqli_fetch_assoc($select_posts)) {
   $transaction_id = $row['transaction_id'];
   $paid_to = $row['paid_to'];
  //  $paid_from = $row['paid_from'];
   $t_account = $row['t_account'];
   $t_date = $row['t_date'];
   $tran_plan_id = $row['tran_plan_id'];
   $t_note = $row['t_note'];
   $t_status = $row['t_status'];
   $t_reciept_image = $row['t_reciept_image'];
   $t_reciept_pdf = $row['t_reciept_pdf']; 


echo "<tr>";
?>
<td>
 <input type='checkbox' class="checkBoxes" id='selectAllBoxes' name="checkBoxArray[]" value="<?php echo $transaction_id;?>">
</td>
 <?php
echo "<td>{$transaction_id}</td>";
echo "<td><a href='user.php?p_id=$t_account' >{$t_account}</a></td>";
//  echo "<td>{$paid_to}</td>";

// echo "<td>{$paid_from}</td>";
echo "<td>{$t_date}</td>";

$query = "SELECT * FROM plans WHERE plan_id = {$tran_plan_id}";
$select_categories_id = mysqli_query($conn,$query);

while($row = mysqli_fetch_assoc($select_categories_id)) {
$cat_id = $row['plan_id'];
$plan_title = $row['plan_title'];

echo "<td>{$plan_title}</td>";
}
echo "<td>{$t_status}</td>";
echo "<td><img width='100' src='../images_reciept/$t_reciept_image' alt='image'></td>";
echo "<td><img width='30' src='../images_reciept/adobe.png' alt='Pdf'></td>";
// echo "<td>{$post_tags}</td>";

// $query = "SELECT * FROM comments WHERE comment_transaction_id = $transaction_id";
// $send_comment_query = mysqli_query($conn,$query);

// $row = mysqli_fetch_array($send_comment_query);
// $comment_id = $row['comment_id'];
// $count_comments = mysqli_num_rows($send_comment_query);

// echo "<td><a class='btn btn-primary' href='post_comments.php?id=$transaction_id'>[{$count_comments}] commented</a></td>";


// echo "<td>{$post_date}</td>";
echo "<td><a class='btn btn-primary' href=transactions.php?source=user_transaction&p_id=$transaction_id'>View Tranaction</a></td>";
echo "<td><a class='btn btn-info'  href='../admin_home_update.php?p_id={$transaction_id}'>Approve Tranaction</a></td>";

?>
<form method="post">
<input type="hidden" name="transaction_id" value="<?php echo $transaction_id ?>">

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

$the_transaction_id = escape($_POST['transaction_id']);

$query = "DELETE FROM transactions WHERE transaction_id = {$the_transaction_id}";
$delete_query = mysqli_query($conn,$query);

//refreshing the page
header("location:./transactions.php");

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

