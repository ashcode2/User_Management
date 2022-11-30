


  <div class="card my-2 " style="  width: 80%;
                height: 500px;
                overflow-x: hidden;
                overflow-y: auto;      
                 " >
            <div class="card-header bg-success text-white">
                <h4 class="m-0">Total Registered Users</h4>
            </div>
            <div class="card-body">
            <!-- <div class="table-responsive" id="showAllUsers"> -->
            <div class="table-responsive" >
                    <!-- <p class="text-center align-self-center lead">Please Wait...</p> -->

 

<table class="table table-bordered table-hover ">
  <thead>
    <tr>
      <th>Id</th>
      <th>Image</th>
      <th>Username</th> 
      <th>Email</th>
      <th>Phone</th>
      <th>Gender</th>
      <th>Verified</th>
      <th>Role</th>
    </tr>
  </thead>
<tbody>
   <?php
   $query = "SELECT * FROM users";
   $select_users = mysqli_query($conn,$query);

   while($row = mysqli_fetch_assoc($select_users)) {
   $user_id = $row['id'];
   $username = $row['name']; 
   $user_password = $row['password'];
   $user_email = $row['email'];
   $user_phone = $row['phone'];
   $user_gender = $row['gender'];
   $user_image = $row['photo'];
   $status = $row['verified'];
   $user_role = $row['user_role'];

echo "<tr>";
echo "<td>{$user_id}</td>";
echo "<td><img width='100' src='../assets/profile_pic/$user_image' alt='$username'/></td>";
echo "<td>{$username}</td>"; 
// echo "<td><a href='user.php?id=$transaction_id' >{$user_email}</a></td>";
// echo "<td><a href='user.php?p_id=$user_id' >{$user_email}</a></td>";
echo "<td><a href='user.php?p_id=$user_email' >{$user_email}</a></td>";
echo "<td>{$user_phone}</td>";
echo "<td>{$user_gender}</td>";
echo "<td>$status</td>";
echo "<td>$user_role</td>";

// $query = "SELECT * FROM comments WHERE comment_id = {$post_cat_id}";
// $select_comments = mysqli_query($conn,$query);
//
// while($row = mysqli_fetch_assoc($select_comments)) {
// $cat_id = $row['cat_id'];
// $cat_title = $row['cat_title'];
//
// echo "<td>{$cat_title}</td>";
// }

$query = "SELECT * FROM users WHERE id = 'name' ";
$select_users_by_id_query = mysqli_query($conn,$query);

while($row = mysqli_fetch_assoc($select_users_by_id_query)){
  $user_id = $row['id'];
  $username = $row['name'];
}

// echo "<td><a class='btn btn-primary' href='users.php?change_to_admin=$user_id'>Admin</a></td>";
// echo "<td><a class='btn btn-info' href='users.php?change_to_sub=$user_id'>Subscriber</a></td>";
echo "<td><a class='btn btn-success' href='users.php?source=edit_user&id=$user_id'>Edit</a></td>";

echo "<td><a class='btn btn-danger' href='users.php?delete=$user_id'>Delete</a></td>";
     
?> 
    
    
<?php
echo "</tr>";
}
    ?>
   </tbody>
</table>

<?php

// if(isset($_GET['change_to_admin'])){

// $this_user_id = $_GET['change_to_admin'];

// $query = "UPDATE users SET user_role = 'admin' WHERE id = {$this_user_id}";
// $admin_user_query = mysqli_query($conn,$query);

// //refreshing the page
// header("location:./users.php");
// }


// if(isset($_GET['change_to_sub'])){

// $this_user_id = $_GET['change_to_sub'];

// $query = "UPDATE users SET user_role = 'subscriber' WHERE id = {$this_user_id}";
// $subscriber_user_query = mysqli_query($conn,$query);

// //refreshing the page
// header("location:./users.php");
// }




if(isset($_GET['delete'])){
  // if(isset($_SESSION['user_role'])){
//   if($_SESSION['user_role'] == 'admin'){

   $this_user_id =mysqli_real_escape_string($conn, $_POST['id']);
     $this_user_id = escape($_GET['delete']);
 
    $query = "DELETE FROM users WHERE id = $this_user_id";
    $update_to_delete_status = mysqli_query($conn,$query);
    confirmQuery($update_to_delete_status);
 
//refreshing the page
header("location:./users.php");
//    }
// }
}



 

?>
                 </div>
            </div>
           
        </div>

    <!-- </div>
</div> -->



<!-- Footer Area -->
  