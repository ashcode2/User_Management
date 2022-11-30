<?php 

require_once ('includes/db.php');
require_once('functions.php');

// if(!is_admin($_SESSION['username'])){

//     redirect("index.php");
// } 
//                                else {                       } 
?>


 


<div class="card my-2 border-success">
            <div class="card-header bg-success text-white">
                <h4 class="m-0">Add New User</h4>
            </div>
            <div class="card-body">
            <!-- <div class="table-responsive" id="showAllUsers"> -->
            <div class="table-responsive" >
                    <!-- <p class="text-center align-self-center lead">Please Wait...</p> -->



<form  action="" method="post" enctype="multipart/form-data">


<div class="form-group">
<!-- <img width='100' src='../images/<?php //$user_image;?>' alt=' ' class=""> -->
<label for="title">User Image</label>
<input type="file" name="image" >
</div>

<div class="form-group">
<label for="username">Full Name</label>
<input type="text"  name="name" class="form-control" value=''>
</div>

 

<div class="form-group">
<label for="user_role">Role</label>
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

<div class="form-group">
<label for="gender">Gender</label>
<select name="gender" id="">
<option value='gender' > select</option>
 <option value='Male'>Male</option>
<option value='Female'>Female</option> 
 
</select>
</div>
 
<div class="form-group">
<label for="username">Date of Birth</label>
<input type="date" name="dob" class="form-control" value=' '>
</div>

<div class="form-group">
<label for="username">Email</label>
<input type="email" name="email" class="form-control" value=' '>
</div>

<div class="form-group">
<label for="username">Phone No.:</label>
<input type="text" name="phone" class="form-control" value=' '>
</div>
 
<div class="form-group">
<label for="password">Password</label>
<input type="password" value=' ' name="password" class="form-control">
</div>

<div class="form-group">
<input type="submit" name="edit_user" class="btn btn-primary" value="Update User">
</div>
</form>




</div>
            </div>
           
        </div>

    </div>
</div>



<!-- Footer Area -->
 
 
 
