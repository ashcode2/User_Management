<?php
require_once '../assets/php/session.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= ucfirst(basename($_SERVER['PHP_SELF'], '.php')); ?> | Dashboard</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="../assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../assets/css/style1.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../assets/images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <!-- Bar Navigation Start-->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
                <a class="navbar-brand brand-logo-mini" href="home.php"><img src="../assets/images/logo-mini.svg"
                        alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-menu"></span>
                </button>
                <ul class="navbar-nav w-100">
                    <li class="nav-item w-100">
                        <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                            <input type="text" class="form-control" placeholder="Search products">
                        </form>
                    </li>
                </ul>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item dropdown d-none d-lg-block">

                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                            aria-labelledby="createbuttonDropdown">
                            <h6 class="p-3 mb-0">Projects</h6>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-dark rounded-circle">
                                        <i class="mdi mdi-file-outline text-primary"></i>
                                    </div>
                                </div>

                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-dark rounded-circle">
                                        <i class="mdi mdi-web text-info"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject ellipsis mb-1">UI Development</p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-dark rounded-circle">
                                        <i class="mdi mdi-layers text-danger"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject ellipsis mb-1">Software Testing</p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <p class="p-3 mb-0 text-center">See all projects</p>
                        </div>
                    </li>
                    <li class="nav-item nav-settings d-none d-lg-block">
                        <a class="nav-link" href="#">
                            <i class="mdi mdi-view-grid"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown border-left">
                        <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#"
                            data-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-email"></i>
                            <span class="count bg-success"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                            aria-labelledby="messageDropdown">
                            <h6 class="p-3 mb-0">Messages</h6>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <img src="../assets/images/avatar.png" alt="image"
                                        class="rounded-circle profile-pic">
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject ellipsis mb-1">Admin send you a message</p>
                                    <p class="text-muted mb-0"> 1 Minutes ago </p>
                                </div>
                            </a>

                            <div class="dropdown-divider"></div>
                            <p class="p-3 mb-0 text-center">1 new messages</p>
                        </div>
                    </li>
                    <li class="nav-item dropdown border-left">
                        <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#"
                            data-toggle="dropdown">
                            <i class="mdi mdi-bell"></i>
                            <span class="count bg-danger"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                            aria-labelledby="notificationDropdown">
                            <h6 class="p-3 mb-0">Notifications</h6>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-dark rounded-circle">
                                        <i class="mdi mdi-calendar text-success"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject mb-1">Event today</p>
                                    <p class="text-muted ellipsis mb-0"> Just a reminder that you have an event today
                                    </p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-dark rounded-circle">
                                        <i class="mdi mdi-settings text-danger"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject mb-1">Settings</p>
                                    <p class="text-muted ellipsis mb-0"> Update dashboard </p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-dark rounded-circle">
                                        <i class="mdi mdi-link-variant text-warning"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject mb-1">Launch Admin</p>
                                    <p class="text-muted ellipsis mb-0"> New admin wow! </p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <p class="p-3 mb-0 text-center">See all notifications</p>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                            <div class="navbar-profile">
                                <img class="img-xs rounded-circle" src="../assets/images/avatar.png" alt="">
                                <p class="mb-0 d-none d-sm-block navbar-profile-name" data-toggle="dropdown"><i
                                        class="fas fa-user-cog"></i>&nbsp;Hi! <?= $fname; ?></p>
                                <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                            aria-labelledby="profileDropdown">
                            <h6 class="p-3 mb-0">Profile</h6>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-dark rounded-circle">
                                        <i class="mdi mdi-settings text-success"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject mb-1">Settings</p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-dark rounded-circle">
                                        <i class="mdi mdi-logout text-danger"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <ul class="nav flex-column sub-menu">
                                        <li class="nav-item"> <a class="nav-link" href="../assets/php/logout.php">Log
                                                Out </a></li>
                                    </ul>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <p class="p-3 mb-0 text-center">Advanced settings</p>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="mdi mdi-format-line-spacing"></span>
                </button>
            </div>
        </nav>
        <!-- NavBar Navigation End-->

        <!-- SideBar Navigation Start-->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
                <a class="sidebar-brand brand-logo" href="home.php"><img src="../assets/images/logo.svg"
                        alt="logo" /></a>
                <a class="sidebar-brand brand-logo-mini" href="home.php"><img src="../assets/images/logo-mini.svg"
                        alt="logo" /></a>
            </div>
            <ul class="nav">
                <li class="nav-item profile">
                    <div class="profile-desc">
                        <div class="profile-pic">
                            <div class="count-indicator">
                                <img class="img-xs rounded-circle " src="../assets/images/avatar.png" alt="">
                                <span class="count bg-success"></span>
                            </div>
                            <div class="profile-name">
                                <p class="mb-0 d-none d-sm-block navbar-profile-name" data-toggle="dropdown"><i
                                        class="fas fa-user-cog"></i>&nbsp;Hi! <?= $fname; ?></p>
                            </div>
                        </div>
                        <a href="#" id="profile-dropdown" data-toggle="dropdown"><i
                                class="mdi mdi-dots-vertical"></i></a>
                        <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list"
                            aria-labelledby="profile-dropdown">
                            <a href="#" class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-dark rounded-circle">
                                        <i class="mdi mdi-settings text-primary"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-dark rounded-circle">
                                        <i class="mdi mdi-onepassword  text-info"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>

                        </div>
                    </div>
                </li>
                <li class="nav-item nav-category">
                    <span class="nav-link">Navigation</span>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                        <span class="menu-icon">
                            <i class="mdi mdi-microsoft"></i>
                        </span>
                        <span class="menu-title">Dashboard</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="auth">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="../home.php"> My Account </a></li>
                            <li class="nav-item"> <a class="nav-link" href="../../"> Home </a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="../deposit.php">
                        <span class="menu-icon">
                            <i class="mdi mdi-store"></i>
                        </span>
                        <span class="menu-title">Deposit</span>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="profile.php">
                        <span class="menu-icon">
                            <i class="mdi mdi-coin icon-item"></i>
                        </span>
                        <span class="menu-title">Profile</span>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="withdraw.php">
                        <span class="menu-icon">
                            <i class="mdi mdi-credit-card-multiple"></i>
                        </span>
                        <span class="menu-title">Withdraw</span>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
                        aria-controls="ui-basic">
                        <span class="menu-icon">
                            <i class="mdi mdi-laptop"></i>
                        </span>
                        <span class="menu-title">Transaction</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-basic">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="request.php">Request</a></li>
                            <li class="nav-item"> <a class="nav-link" href="cancel.php">Cancel</a></li>
                            <li class="nav-item"> <a class="nav-link" href="refound.php">Refound</a></li>
                            <li class="nav-item"> <a class="nav-link" href="payment_details.php">Payment Details</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="../referral.php">
                        <span class="menu-icon">
                            <i class="mdi mdi-gift"></i>
                        </span>
                        <span class="menu-title">Referrals</span>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="../">
                        <span class="menu-icon">
                            <i class="mdi mdi-contacts"></i>
                        </span>
                        <span class="menu-title">Plan</span>
                    </a>
                </li>
                <div class="dropdown-divider"></div>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="../assets/php/logout.php">
                        <span class="menu-icon">
                            <i class="mdi mdi-logout text-danger"></i>
                        </span>
                        <span class="menu-title">Log Out</span>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- SideBar Navigation End -->

        <div class="content-wrapper">
            <div class="row justify-content-center">
                <div class="col-10 grid-margin">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 grid-margin ">
                                <div class="card justify-content-center rounded-right myColor p-3">
                                    <div class="card-header border-primary">
                                        <ul class="nav-tabs card-header-tabs">
                                            <li class="nav-item">
                                                <a href="#profile" class="nav-link active font-weight-bold"
                                                    data-toggle="tab">Profile</a>
                                            </li>

                                            <li class="nav-item">
                                                <a href="#editProfile" class="nav-link active font-weight-bold"
                                                    data-toggle="tab">Edit Profile</a>
                                            </li>

                                            <li class="nav-item">
                                                <a href="#changePass" class="nav-link active font-weight-bold"
                                                    data-toggle="tab">Change Password</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <!-- Profile Tab Content Start-->
                                    <div class="tab-pane container active" id="profile">
                                        <div class="card-deck">
                                            <div class="card border-primary">
                                                <div class="card-header bg-primary text-light text-center lead">
                                                    User ID : <?= $cid; ?>
                                                </div>
                                                <div class="card-body">
                                                    <p class="card-text p-2 m-1 rounded"
                                                        style="border:1px solid #0275d8;"><b>Name :
                                                        </b><?= $cname; ?></p>

                                                    <p class="card-text p-2 m-1 rounded"
                                                        style="border:1px solid #0275d8;"><b>E-mail :
                                                        </b><?= $cemail; ?></p>

                                                    <p class="card-text p-2 m-1 rounded"
                                                        style="border:1px solid #0275d8;"><b>Gender :
                                                        </b><?= $cgender; ?></p>

                                                    <p class="card-text p-2 m-1 rounded"
                                                        style="border:1px solid #0275d8;"><b>Date of Birth :
                                                        </b><?= $cdob; ?></p>

                                                    <p class="card-text p-2 m-1 rounded"
                                                        style="border:1px solid #0275d8;"><b>Phone :
                                                        </b><?= $cphone; ?></p>

                                                    <p class="card-text p-2 m-1 rounded"
                                                        style="border:1px solid #0275d8;"><b>Registered On:
                                                        </b><?= $reg_on; ?></p>

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
                                                <?php if(!$cphoto): ?>
                                                <img src="../assets/images/avatar.png" class="img-thumbnail img-fluid"
                                                    width="408px">
                                                <?php else:?>
                                                <img src="<?= '../assets/php/'.$cphoto; ?>"
                                                    class="img-thumbnail img-fluid" width="408px">
                                                <?php endif;?>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Profile Tab Content End-->

                                    <!-- Edit Profile Tab Content Start-->
                                    <div class="tab-pan container fade" id="#editProfile">
                                        <div class="card-deck">
                                            <div class="card border-danger align-self-center">
                                                <?php if(!$cphoto): ?>
                                                <img src="../assets/images/avatar.png" class="img-thumbnail img-fluid"
                                                    width="408px">
                                                <?php else:?>
                                                <img src="<?= '../assets/php/'.$cphoto; ?>"
                                                    class="img-thumbnail img-fluid" width="408px">
                                                <?php endif;?>
                                            </div>
                                            <div class="card board-danger">
                                <form action="" method="post" class="px-3 mt-2"
                                                    enctype="multipart/form-data" id="profile-update-form">
                                                    <input type="hidden" name="oldimage" value="<?= $cphoto; ?>">
                                                    <div class="form-group m-0">
                                                        <label for="profilePhoto" class="m-1">Upload Profile
                                                            Image</label>
                                                        <input type="file" name="image" id="profilePhoto">
                                                    </div>

                                                    <div class="form-group m-0">
                                                        <label for="name" class="m-1">Name</label>
                                                        <input type="text" name="name" id="name" class="form-control"
                                                            value="<?= $cname; ?>">
                                                    </div>

                                                    <div class="form-group m-0">
                                                        <label for="gender" class="m-1">Gender</label>
                                                        <select name="gender" id="gender" class="form-control">
                                                            <option value="" disabled
                                                                <?php if($cgender == null){echo 'selected';}?>> Select
                                                            </option>
                                                            <option value="Male"
                                                                <?php if($cgender == 'Male'){echo 'selected';}?>>Male
                                                            </option>
                                                            <option value="Female"
                                                                <?php if($cgender == 'Female'){echo 'selected';}?>>
                                                                Female</option>
                                                        </select>
                                                    </div>

                                            </div>

                                            <div class="form-group m-0">
                                                <label for="dob" class="m-1">Date of Birth</label>
                                                <input type="date" id="dob" name="dob" value="<?= $cdob; ?>"
                                                    class="form-control">
                                            </div>

                                            <div class="form-group m-0">
                                                <label for="phone" class="m-1">Phone</label>
                                                <input type="tel" id="phone" name="phone" value="<?= $cphone; ?>"
                                                    class="form-control" placeholder="Phone">
                                            </div>

                                            <div class="form-group mt-2">
                                                <input type="submit" name="profile_update" value="Update Profile"
                                                    class="btn btn-danger" id="profileUpdateBtn">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Edit Profile Tab Content End-->

                    <!-- Change Password Tab Content Start-->
                    <div class="tab-pan container fade" id="changePass">
                        <div class="card-deck">
                            <div class="card border-success">
                                <div class="card-header bg-success text-white text-center lead"> Change Password
                                </div>
                                <form action="#" method="post" class="px-3 mt-2">
                                    <div class="form-group">
                                        <label for="curpass">Enter Your Current Password</label>
                                        <input type="password" name="curpass" placeholder="Enter Current Password"
                                        class="form-control form-control-lg" id="curpass" required minlength="5">
                                    </div>

                                       <div class="form-group">
                                        <label for="newpass">Enter New Password</label>
                                       <input type="password" name="cnewpass" placeholder="New Password"
                                        class="form-control form-control-lg" id="newpass" required minlength="5">
                                    </div>

                                    
                                       <div class="form-group">
                                        <label for="cnewpass">Enter New Password</label>
                                        <input type="password" name="cnewpass" placeholder="Confirm New Password"
                                        class="form-control form-control-lg" id="cnewpass" required minlength="5">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" name="changepass" value="Change Password" class="btn btn-success
                                        btn-block btn-lg" id="changePassBtn">
                                    </div>
                                </form>
                            </div>

                            <div class="card border-success align-self-center">
                                <img src="../assets/images/change_pass.jpg" class="img-thumbnail img-fluid" width="408px">
                            </div>
                        </div>
                    </div>
                    <!-- Change Password Tab Content End-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





            <!-- partial:partials/_footer.html -->
            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright ©
                        DashboardPack 2022<br>
                    </span>
                </div>
            </footer>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../assets/vendors/chart.js/Chart.min.js"></script>
    <script src="../assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="../assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="../assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../assets/js/off-canvas.js"></script>
    <script src="../assets/js/hoverable-collapse.js"></script>
    <script src="../assets/js/misc.js"></script>
    <script src="../assets/js/settings.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../assets/js.js"></script>
    <!-- End custom js for this page -->
    <script type="text/javascript">
        $(document).ready(function(e){

            //Profile Update Ajax Request
            $("#profile-update-form").submit(function(e){
                e.preventDefault();

                $.ajax({
                    url: '../assets/php/process.php',
                    method: 'post',
                    processData: false,
                    contentType: false,
                    cache: false,
                    data: new FormData(this),
                    success:function(response){
                        location.reload();
                    }
                });
            });
        });
</script>
</body>

</html>