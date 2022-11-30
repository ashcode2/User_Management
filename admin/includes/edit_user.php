<?php 

// require_once ('includes/db.php');
// require_once('functions.php');

// if(!is_admin($_SESSION['username'])){

//     redirect("index.php");
// } 
//                                else {                       } 
?>




<?php

if(isset($_GET['id'])){
$the_user_id = $_GET['id'];

$query = "SELECT * FROM users WHERE id = $the_user_id ";
$select_users_query = mysqli_query($conn, $query);
while($row = mysqli_fetch_assoc($select_users_query)) {

$user_id = $row['id'];
$username = $row['name']; 
// $user_image = $row['image']; 
$user_password = $row['password'];
$user_email = $row['email'];
$phone = $row['phone'];
$user_image = $row['photo'];
$dob = $row['dob'];
$gender = $row['gender'];
$user_role = $row['user_role'];

}

if(isset($_POST['edit_user'])){
 
$user_role = escape($_POST['user_role']);
$username = escape($_POST['name']);
// $user_email = escape($_POST['email']);
$user_password = escape($_POST['password']);
$phone = escape($_POST['phone']);
$gender = escape($_POST['gender']);
$dob = escape($_POST['dob']);

$user_image = $_FILES['image']['name'];
$user_image_temp = $_FILES['image']['tmp_name'];
move_uploaded_file($user_image_temp, "../assets/profile_pic/$user_image");

//retaining the image of the user
      if(empty($user_image)){
        $query = "SELECT * FROM users WHERE id = $the_user_id ";
        $select_image = mysqli_query($conn,$query);

        while($row = mysqli_fetch_assoc($select_image)) {
        $user_image = $row['photo'];
      }
    } 

if (!empty($user_password)) {

$query_password = "SELECT password FROM users WHERE id = $the_user_id ";
$get_user_query = mysqli_query($conn,$query_password);
confirmQuery($get_user_query);
$row = mysqli_fetch_array($get_user_query);

$db_user_password = $row['password'];

if ($db_user_password = $user_password) {
$hashed_password  = password_hash( $user_password, PASSWORD_BCRYPT, array('cost' => 10));


$query = "UPDATE users SET "; 
$query .="name = '{$username}', ";
$query .="photo = '{$user_image}', ";
// $query .="email = '{$user_email}', ";
$query .="password = '{$hashed_password}', ";
$query .="phone = '{$phone}', ";
$query .="gender = '{$gender}', ";
$query .="dob = '{$dob}' ";
// $query .="photo = '{$user_image}' ";
// $query .="user_role = '{$user_role}' ";
$query .="WHERE id ={$the_user_id}";

$edit_user_query = mysqli_query($conn,$query);
confirmQuery($edit_user_query);
// var_dump($edit_user_query);
// echo "<p class='bg-success'> user detail Updated <a href='./users.php'>View user</a></p>";

}
}

?>
<script>
    alert("User Profile Updated Successfully");
      window.location = "./users.php";
</script>
<?php
}
}else {
header("Location: index.php");

}
?>




<div class="card my-2 border-success">
            <div class="card-header bg-success text-white">
                <h4 class="m-0">Edit User</h4>
            </div>
            <!-- <div class="col-2"></div> -->
            <div class="card-body col-md-8">
            <!-- <div class="table-responsive" id="showAllUsers"> -->
            <div class="table-responsive" >
                    <!-- <p class="text-center align-self-center lead">Please Wait...</p> -->



<form  action="" method="post" enctype="multipart/form-data">
 

<div class="form-group m-1 rounded card-text p-2" style="border:1px solid #0275d8;">
<img width='320px' src='../assets/images/<?php $user_image;?>' alt='<?php echo $user_image; ?>' class="">
<label for="title">User Image</label>
<input type="file" name="image" >
</div>

<div class="form-group m-1 rounded card-text p-2" style="border:1px solid #0275d8;">
<label for="username">Full Name</label>
<input type="text"  name="name" class="form-control" value='<?php echo $username; ?>' >
</div>

 

<div class="form-group m-1 rounded card-text p-2" style="border:1px solid #0275d8;"><label for="user_role">Role</label>
<select name="user_role" id="">
<option value='<?php echo $user_role; ?>' ><?php echo $user_role; ?></option>
<?php
if($user_role == 'admin'){
echo "<option value='subscriber'>subscriber</option>";

}else{
echo "<option value='admin'>admin</option>";
}
?>
</select>
</div>

<div class="form-group m-1 rounded card-text p-2" style="border:1px solid #0275d8;">
<label for="gender">Gender</label>
<select name="gender" id="">
<option value='<?php echo $gender; ?>' ><?php echo $gender; ?></option>
 <option value='Male'>Male</option>
<option value='Female'>Female</option> 
 
</select>
</div>
 
<div class="form-group m-1 rounded card-text p-2" style="border:1px solid #0275d8;">
<label for="username">Date of Birth</label>
<input type="date" name="dob" class="form-control" value='<?php echo $dob; ?>'>
</div>

<div class="form-group m-1 rounded card-text p-2" style="border:1px solid #0275d8;">
<label for="username">Email</label>
<input type="email" name="email" class="form-control" value='<?php echo $user_email; ?>'>
</div>

<div class="form-group m-1 rounded card-text p-2" style="border:1px solid #0275d8;">
<label for="username">Phone No.:</label>
<input type="text" name="phone" class="form-control" value='<?php echo $phone; ?>'>
</div>
 
<div class="form-group m-1 rounded card-text p-2" style="border:1px solid #0275d8;">
<label for="password">Password</label>
<input type="password" value='<?php echo $user_password; ?>' name="password" class="form-control">
</div>

<div class="form-group">
<input type="submit" name="edit_user" class="btn btn-primary" value="Update User">
</div>
</form>




</div>
            </div>
           <!-- <div class="col-2"></div> -->
        </div>

    </div>
</div>



<!-- Footer Area -->
 

<!-- <script type="text/javascript">
    $(document).ready(function(){

        //Fetch All Users Ajax Request
        fetchAllUsers();
        function fetchAllUsers(){
            $.ajax({
                // url: 'includes/edit_user.php',
                method: 'post',
                data: { action: 'fetchAllUsers' },
                success:function(response){
                    $("#showAllUsers").html(response);
                }
            });
        }
    });
</script> -->
 
