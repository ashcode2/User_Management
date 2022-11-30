<nav class="sidebar sidebar-offcanvas" id="sidebar">
      <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="home.php"><img src="assets/images/logo.svg" alt="logo" /></a>
        <a class="sidebar-brand brand-logo-mini" href="home.php"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
      </div>
      <ul class="nav">
        <li class="nav-item profile">
          <div class="profile-desc">
            <div class="profile-pic">
              <div class="count-indicator">
                <img class="img-xs rounded-circle " src="assets/images/avatar.png" alt="">
                <span class="count bg-success"></span>
              </div>
              <div class="profile-name">
                <p class="mb-0 d-none d-sm-block navbar-profile-name" data-toggle="dropdown"><i class="fas fa-user-cog"></i>&nbsp;Hi! <?= $name; ?></p>
              </div>
            </div>
            <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
            <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
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


        <!-- <li class="nav-item menu-items">
          <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
            <span class="menu-icon">
              <i class="mdi mdi-microsoft"></i>
            </span>


            <span class="menu-title">Dashboard</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="auth">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="home.php"> My Account </a></li>
              <li class="nav-item"> <a class="nav-link" href="<?php //if (isset()) ?>"> Home </a></li>
            </ul>
          </div>
        </li> -->

        <li class="nav-item menu">
          <a class="nav-link" href="home.php">
          <span class="menu-icon">
              <i class="mdi mdi-microsoft"></i>
            </span>
            <span class="menu-title">Dashboard</span>
          </a>
        </li>

        <li class="nav-item menu-items">
          <a class="nav-link" href="user_transaction.php">
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
          <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
            <span class="menu-icon">
              <i class="mdi mdi-laptop"></i>
            </span>
            <span class="menu-title">Transaction</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="ui-basic">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="pages/request.php">Request</a></li>
              <li class="nav-item"> <a class="nav-link" href="pages/cancel.php">Cancel</a></li>
              <li class="nav-item"> <a class="nav-link" href="pages/refound.php">Refound</a></li>
              <li class="nav-item"> <a class="nav-link" href="pages/payment_details.php">Payment Details</a></li>
            </ul>
          </div>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" href="referral.php">
            <span class="menu-icon">
              <i class="mdi mdi-gift"></i>
            </span>
            <span class="menu-title">Referrals</span>
          </a>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" href="plans.php">
            <span class="menu-icon">
              <i class="mdi mdi-contacts"></i>
            </span>
            <span class="menu-title">Plan</span>
          </a>
        </li>
        <div class="dropdown-divider"></div>
        <li class="nav-item menu-items">
          <a class="nav-link" href="logout.php">
            <span class="menu-icon">
              <i class="mdi mdi-logout text-danger"></i>
            </span>
            <span class="menu-title">Log Out</span>
          </a>
        </li>
      </ul>
    </nav>
