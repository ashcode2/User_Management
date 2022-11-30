





 
            


                        <div class="content-wrapper">
            <div class="row justify-content-center">
                <div class="col-10 grid-margin">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 grid-margin ">
                            <!-- <a href="profile.php?source=edit_profile&id=$user_id" class="btn btn-primary" style="height:5px;" >Update Profile</a> -->

                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <!-- Profile Tab Content Start-->
                                    <div class="tab-pane container active" id="profile">
                                        <div class="card-deck">
                                            <div class="card border-primary">
                                                <div class="card-header bg-primary text-light text-center lead">
                                                    User ID : <?php echo $id; ?>
                                                </div>
                                                <div class="card-body">
                                                    <p class="card-text p-2 m-1 rounded"
                                                        style="border:1px solid #0275d8;"><b>Name :
                                                        </b><?php  echo $name; ?></p>
 
                                                    <p class="card-text p-2 m-1 rounded"
                                                        style="border:1px solid #0275d8;"><b>E-mail :
                                                        </b><?php echo $email; ?></p>

                                                    <p class="card-text p-2 m-1 rounded"
                                                        style="border:1px solid #0275d8;"><b>Gender :
                                                        </b><?php echo $gender; ?></p>

                                                    <p class="card-text p-2 m-1 rounded"
                                                        style="border:1px solid #0275d8;"><b>Date of Birth :
                                                        </b><?php echo $dob; ?></p>

                                                    <p class="card-text p-2 m-1 rounded"
                                                        style="border:1px solid #0275d8;"><b>Phone :
                                                        </b><?php echo $phone; ?></p>

                                                    <p class="card-text p-2 m-1 rounded"
                                                        style="border:1px solid #0275d8;"><b>Registered On:
                                                        </b><?php echo $reg_on; ?></p>

                                                    <p class="card-text p-3 m-1 rounded"
                                                        style="border:1px solid #0275d8;"><b>E-Mail Verified :
                                                        </b><?= $verified; ?>

                                                        <?php if ($verified == 'Not Verified!') : ?>
                                                        <a href="#" id="verify-email" class="float-right">Verify
                                                            Now</a>
                                                        <?php endif; ?>
                                                    </p>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>

                                         

                                            <div class="card border-primary align-self-center">
                                                <?php if(!$photo): ?>
                                              <img src="assets/profile_pic/avatar.png" class="img-thumbnail img-fluid rounded " width="308px" alt="profile">
 
                                                <?php else:?>
                                                    <!-- <img src="<?php //'../assets/images/'.$cphoto; ?>" -->
                                                    <!-- <img src="<?php //'../assets/profile_pic/'.$photo; ?>"
                                                    class="img-thumbnail img-fluid rounded" width="400px" alt="profile"> -->

                                                    <img width='250px' height='200px' src="assets/profile_pic/<?php echo $photo; ?>" alt='<?php $name; ?>'/>
                                                <?php endif;?>
                                            </div>
                                            <a href="profile.php?source=edit_profile" class="btn btn-danger" style="height: 25px;" >Update Profile</a>

                                        </div>
                                    </div>
                                    <!-- Profile Tab Content End-->

                                 
