 




<?php

if(isset($_POST['profileupdate'])){

    $name = $_POST['name'];
    // $email = $_POST['email'];
    // $user_role = "Subscriber";
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    // $password = $_POST['newpassword'];
    $photo = $_FILES['photo']['name'];
    $tmp_photo = $_FILES['photo']['tmp_name']; 
    move_uploaded_file($tmp_photo, "assets/profile_pic/$photo");

 
    $the_user_id = $id;
   
    $query = "UPDATE users SET ";
    $query .="name = '{$name}', ";
    //  $query .="email = '{$email}', ";
    // $query .="password = '{$password}', ";
    // $query .="password = '{$password}', ";
    $query .="phone = '{$phone}', ";
    $query .="gender = '{$gender}', ";
    $query .="dob = '{$dob}', ";
    $query .="photo = '{$photo}' ";
    $query .="WHERE id ={$the_user_id}";


    $updating_query = mysqli_query($conn,$query);
    confirmQuery($updating_query);

    ?>
 <script>
    window.location = "profile.php";
alert('UPDATED Successfully');
    </script>
    <?php
}


?>



<div class="content-wrapper">
            <div class="row justify-content-center">
                <div class="col-10 grid-margin">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 grid-margin ">
 
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <!-- Profile Tab Content Start-->
                                         <div class="card-deck">
                                            <div class="card border-primary">
                                            <form action="" method="post" enctype="multipart/form-data">

                                                <div class="card-header bg-primary text-light text-center lead">
                                                    User ID : <?= $id; ?>
                                                </div>
                                                <div class="card-body">
                                                    <p>
                                                    <img src="assets/profile_pic/<?php $photo; ?>" class="img-thumbnail img-fluid rounded " width="350px">
                                                    <div class="form-group m-1 rounded card-text p-2" 
                                                         style="border:1px solid #0275d8; ">
                                                        <label for="profilePhoto" class="m-1">Upload Profile
                                                            Image</label>
                                                        <input type="file" name="photo" id="profilePhoto" >
                                                    </div>
                                                    </p> 
                                                        <div class="form-group m-1 rounded card-text p-2" style="border:1px solid #0275d8;">
                                                        <label for="name" class="m-1">Name :</label>
                                                        <input type="text" name="name" id="name" class="form-control"
                                                            value="<?= $name; ?>">
                                                    </div>
                                                    

                                                    <div class="form-group m-1 rounded card-text p-2" style="border:1px solid #0275d8;">
                                                        <label for="gender" class="m-1">Gender</label>
                                                        <select name="gender" id="gender" class="form-control">
                                                            <option value="" disabled
                                                                <?php if($gender == null){echo 'selected';}?>> Select
                                                            </option>
                                                            <option value="Male"
                                                                <?php if($gender == 'Male'){echo 'selected';}?>>Male
                                                            </option>
                                                            <option value="Female"
                                                                <?php if($gender == 'Female'){echo 'selected';}?>>
                                                                Female</option>
                                                        </select>
                                                    </div>
 
                                                        <div class="form-group m-1 rounded card-text p-2"
                                                         style="border:1px solid #0275d8;">
                                                <label for="dob" class="m-1">Date of Birth</label>
                                                <input type="date" id="dob" name="dob" value="<?php $dob; ?>"
                                                    class="form-control">
                                            </div>

                                            <div class="form-group m-1 rounded card-text p-2"
                                                         style="border:1px solid #0275d8;">
                                                <label for="phone" class="m-1">Phone</label>
                                                <input type="tel" id="phone" name="phone" value="<?= $phone; ?>"
                                                    class="form-control" placeholder="Phone">
                                            </div>
                                                    <p class="card-text p-2 m-1 rounded"
                                                        style="border:1px solid #0275d8;"><b>Registered On:
                                                        </b><?= $reg_on; ?></p>
                                                  
                                                        <p class="card-text p-2 m-1 rounded"
                                                        style="border:1px solid #0275d8;"><b>E-mail :
                                                        </b><?= $email; ?></p>

                                                   
                                                    <p class="card-text p-3 m-1 rounded"
                                                        style="border:1px solid #0275d8;"><b>E-Mail Verified :
                                                        </b><?= $verified; ?>

                                                        <?php if ($verified == 'Not Verified!') : ?>
                                                        <a href="#" id="verify-email" class="float-right">Verify
                                                            Now</a>
                                                        <?php endif; ?>
                                                    </p>
                                                    <div class="clearfix"></div>

                                                    <div class="form-group">
                                        <!-- <input type="submit" name="profileupdate" value="Update Profile" class="btn btn-primary
                                        btn-block btn-lg" id="profileUpdateBtn"> -->

                                        
                                        <input type="submit" name="profileupdate" value="Update Profile" class="btn btn-primary
                                        btn-block btn-lg">
                                    </div>
                                                </div>
                                                        </form>
                                            </div>
                          
                                    </div>
                                    <!-- Profile Tab Content End-->
<hr/>
                                 
 

                    <!-- Edit Profile Tab Content End-->

                    <!-- Change Password Tab Content Start-->
                         <div class="card-deck">
                            <div class="card border-success">
                                <div class="card-header bg-success text-white text-center lead"> Change Password
                                </div>
                                <form action="#" method="post" class="px-3 mt-2">
                                    <div class="form-group">
                                        <label for="curpass">Enter Your Current Password</label>
                                        <input type="password" name="password" placeholder="Enter Current Password"
                                        class="form-control form-control-lg" id="curpass" required minlength="5">
                                    </div>

                                       <div class="form-group">
                                        <label for="newpass">Enter New Password</label>
                                       <input type="password" name="newpassword" placeholder="New Password"
                                        class="form-control form-control-lg" id="newpass" required minlength="5">
                                    </div>

                                    
                                       <div class="form-group">
                                        <label for="cnewpass">Enter New Password</label>
                                        <input type="password" name="newpassword" placeholder="Confirm New Password"
                                        class="form-control form-control-lg" id="cnewpass" required minlength="5">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" name="changepass" value="Change Password" class="btn btn-success
                                        btn-block btn-lg" id="changePassBtn">
                                    </div>
                                </form>
                            </div>

                            <!-- <div class="card border-success align-self-center">
                                <img src="../assets/images/change_pass.jpg" class="img-thumbnail img-fluid" width="408px">
                            </div> -->
                        </div>
                    </div>
                                        <!-- <a href="profile.php?source=edit_profile&id=$user_id" class="btn btn-primary" style="height:5px;" >Update Profile</a> -->

                    <!-- Change Password Tab Content End-->
                    <!-- </div>
                </div>
            </div>
        </div>
    </div>
</div> -->

<?php //require_once("includes/footer_one.php"); ?>