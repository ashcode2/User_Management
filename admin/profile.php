 <?php //error_reporting (0); ?>

<?php 
require_once 'includes/db.php';
require_once('functions.php');
require_once 'includes/header.php'; ?>


                <div class="row">
                    <div class="col-lg-12 col-md-12">

<?php 

require_once 'includes/top_nav.php'; 
require_once 'includes/nav.php';  

?>
   
                
                    <div class="" style="float:inherit;">
    <?php 

                            //  if(!is_admin($_SESSION['username'])){

                            //      redirect("index.php");
                            //  } 
//                                else {                       } 

 
  ?>

  
                        <div class="card my-2 ">
            <div class="card-header bg-success text-white">
                <h4 class="m-0">Admin Profile</h4>
            </div>
            <div class="card-body">
            <!-- <div class="table-responsive" id="showAllUsers"> -->
            <div class="table-responsive" >
                    <!-- <p class="text-center align-self-center lead">Please Wait...</p> -->


<?php

if(isset($_SESSION['username'])){
    //$id = $_SESSION['id'];
    $username = $_SESSION['username'];

    $query = "SELECT * FROM admin WHERE username = '{$username}'";
    $selct_user_profile_query = mysqli_query($conn,$query);

    while ($row = mysqli_fetch_array($selct_user_profile_query)) {
      $id = $row['id'];
      $username = $row['username']; 
      $password = $row['password'];
      $email = $row['email'];
      // $user_image = $row['user_image'];
      $user_role = $row['user_role'];
    }

}

 ?>



 <?php

 if(isset($_GET['id'])){
   $the_id = $_GET['id'];

   $query = "SELECT * FROM admin WHERE id = $the_id ";
   $select_admin_query = mysqli_query($conn,$query);
   while($row = mysqli_fetch_assoc($select_admin_query)) {

  $id = $row['id'];
   $username = $row['username'];
  //  $user_firstname = $row['user_firstname']; 
   $email = $row['email'];
   //$user_image = $row['user_image'];
   $user_role = $row['user_role'];

 }


//  }

 if(isset($_POST['edit_user'])){
 
   $user_role = escape($_POST['user_role']);
   $username = escape($_POST['username']);
   // $post_image = $_FILES['image']['name'];
   // $post_image_temp = $_FILES['image']['tmp_name'];
   $email = escape($_POST['email']);
   $password = escape($_POST['password']);

 // move_uploaded_file($post_image_temp, "../images/$post_image");
 //
 // //retaining the image of the post
 //       if(empty($post_image)){
 //         $query = "SELECT * FROM posts WHERE post_id $the_get_post_id ";
 //         $select_image = mysqli_query($conn,$query);
 //
 //         while($row = mysqli_fetch_assoc($select_image)) {
 //         $post_image = $row['post_image'];
 //       }
 //     }

 if (!empty($password)) {
 $query_password = "SELECT password FROM admin WHERE id = $the_id ";
 $get_user_query = mysqli_query($conn,$query);
   confirmQuery($get_user_query);
 $row = mysqli_fetch_array($get_user_query);

         $db_password = $row['password'];

           if ($db_password != $password) {
                $hashed_password  = password_hash( $password, PASSWORD_BCRYPT, array('cost' => 10));
                   }

 $query = "UPDATE admin SET "; 
 $query .="user_role = '{$user_role}', ";
 $query .="username = '{$username}', ";
 $query .="email = '{$email}', ";
 $query .="password = '{$hashed_password}' ";
 $query .="WHERE username = '{$username}' ";

   $edit_user_query = mysqli_query($conn,$query);
   confirmQuery($edit_user_query);
 }

}
}

  ?> 

<form  action="" method="post" enctype="multipart/form-data">

 


<div class="form-group">
<label for="username">Role</label>
<select name="user_role" id="">
  <option value='' ><?php echo $user_role; ?></option>
  <?php
                       
     if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin') {
            
         if($user_role == 'admin'){
                        echo "<option value='admin'>admin</option>";
                        echo "<option value='subscriber'>subscriber</option>";
                        
                        }else{
                        echo "<option value='subscriber'>subscriber</option>";
                        }
     }
                               ?>
                              </select>
                          </div>


                          <!-- <div class="form-group">
                            <label for="title">Post Image</label>
                            <input type="file" name="image" >
                          </div> -->

                          <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text"  name="username" class="form-control" value='<?php echo $username; ?>'>
                          </div>

                          <div class="form-group">
                            <label for="username">Email</label>
                          <input type="email" name="email" class="form-control" value='<?php echo $email; ?>'>
                          </div>

                          <div class="form-group">
                            <label for="username">Password</label>
                          <input type="password" value='<?php echo $password; ?>' name="password" class="form-control">
                          </div>

                          <div class="form-group">
                            <input type="submit" name="edit_user" class="btn btn-primary" value="Update Profile">
                          </div>
                        </form>


   </div>
                <!-- /.row -->
                </div>
                <!-- /.container-fluid -->

                </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->



    <?php


//require_once("includes/payin.php");

?>


       
</div>
            </div>
           
        </div>

    </div>
</div>

    <?php require_once "includes/footer.php";  ?>
