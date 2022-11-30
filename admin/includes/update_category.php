
<!--form edit-->
        <form action="" method="post">
          <div class="form-group">
            <label for="plan_title"> Edit Plan</label>

<?php
if(isset($_GET['edit'])){
  $plan_id = $_GET['edit'];


$query = "SELECT * FROM plans WHERE plan_id = $plan_id";
$select_categories_id = mysqli_query($conn,$query);

while($row = mysqli_fetch_assoc($select_categories_id)) {
$plan_id = $row['plan_id'];
$plan_title = $row['plan_title'];
?>
<input value="<?php if(isset($plan_title)){echo $plan_title;} ?>" type="text" class="form-control" name="plan_title">
<?php }
        } ?>

<?php //Updating category
if(isset($_POST['Update_category'])){
  $the_plan_title = $_POST['plan_title'];

  $stmt =mysqli_prepare($conn, "UPDATE plans SET plan_title =? WHERE plan_id =?");
  mysqli_stmt_bind_param($stmt, 'si', $the_plan_title, $plan_id);
  mysqli_stmt_execute($stmt);


  // $query = "UPDATE categories SET plan_title ='{$the_plan_title}' WHERE plan_id ={$plan_id}";
  // $update_query = mysqli_query($conn,$query);

  if(!$stmt){
    // if(!$update_query){
      die("QUERY FAILED" . mysqli_error($conn));
    }
    mysqli_stmt_close($stmt);
    //refreshing the page
    header("location:./plans.php");
}

 ?>
          </div>
          <div class="form-group">
            <input class="btn btn-primary" type="submit" name="Update_category" value="Update Plan">
          </div>

            </form>
