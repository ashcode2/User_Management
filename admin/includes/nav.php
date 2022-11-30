


 

                   
 

<div class="row" >
<div class="col-md-12" >
    
            <div class="admin-nav p-o col-md-3" style="float:left;">
 
                <div class="list-group list-group-flush">
                    <a href="admin-dashboard.php" class="list-group-item text-light admin-link <?= (basename($_SERVER['PHP_SELF']) == 'admin-dashboard.php') ? "nav-active" : ""; ?>">
                        <i class="fas fa-chart-pie"></i>&nbsp;&nbsp;Dashboard</a>

                        <!-- <a href="admin-users.php" class="list-group-item text-light admin-link <?//= (basename($_SERVER['PHP_SELF']) == 'users.php') ? "nav-active" : ""; ?>"> -->
                        <a href="users.php" class="list-group-item text-light admin-link <?= (basename($_SERVER['PHP_SELF']) == 'users.php') ? "nav-active" : ""; ?>">
                        <i class=" fas fa-user-friends"></i>&nbsp;&nbsp;View All Users</a>

                        <!-- <a href="users.php?source=add_user" class="list-group-item text-light admin-link <?php// (basename($_SERVER['PHP_SELF']) == 'includes/add_user.php') ? "nav-active" : ""; ?>">
                        <i class=" fas fa-user"></i>&nbsp;&nbsp;Add New User</a> -->
 
                    <a href="withdrawal.php" class="list-group-item text-light admin-link <?= (basename($_SERVER['PHP_SELF']) == 'withdrawal.php') ? "nav-active" : ""; ?>">
                        <i class="fas fa-sticky-note"></i>&nbsp;&nbsp;Withdrawal</a>

                    <a href="admin-feedback.php" class="list-group-item text-light admin-link <?= (basename($_SERVER['PHP_SELF']) == 'admin-feedback.php') ? "nav-active" : ""; ?>">
                        <i class="fas fa-comment"></i>&nbsp;&nbsp;Feedback</a>

                    <a href="admin-notification.php" class="list-group-item text-light admin-link <?= (basename($_SERVER['PHP_SELF']) == 'admin-notification.php') ? "nav-active" : ""; ?>">
                        <i class="fas fa-bell"></i>&nbsp;&nbsp;Notification</a>

                    <a href="plans.php" class="list-group-item text-light admin-link <?= (basename($_SERVER['PHP_SELF']) == 'plans.php') ? "nav-active" : ""; ?>">
                        <i class="fas fa-file"></i>&nbsp;&nbsp;Plans</a>

                    <a href="transactions.php" class="list-group-item text-light admin-link ">
                        <i class="fas fa-table"></i>&nbsp;&nbsp;Transactions</a>

                    <a href="profile.php" class="list-group-item text-light admin-link">
                        <i class="fas fa-id-card"></i>&nbsp;&nbsp;Profile</a>

                    <a href="#" class="list-group-item text-light admin-link">
                        <i class="fas fa-cog"></i>&nbsp;&nbsp;Settings</a>
                </div>
            </div>

           