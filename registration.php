  <?php 
   require_once "includes/db.php";
    //  require_once "includes/header.php"; 
      include_once "admin/functions.php";
       ?>


<?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {

      // if (isset($_POST['submit'])) {
        // code...
            $username = trim($_POST['username']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);

        $error = [

            'username'=>'',
            'email' => '',
            'password'=> ''
        ];

            if(strlen($username) < 4){
              $error['username'] = 'Username needs to be longer';
            }
            if ($username == '') {
              $error['username'] = 'Username cannot be empty';
            }

            if (user_check($username)) {
              $error['username'] = "Username Exists Already";
            }

            if(strlen($email) < 4){
              $error['email'] = 'Email needs to be longer';
            }
            if ($email == '') {
              $error['email'] = 'Email cannot be empty';
            }

            if (email_check($email)) {
                $error['email']  = "Email associated with an existing account, <a href='index.php'>Please login</a>";
            }

            if($password == ''){
              $error['password'] = "Password cannot be empty";
            }



      foreach($error as $key => $value){
          if(empty($value)){
          unset($error[$key]);
          }
      }
        if(empty($error)){
          register_user($name, $email, $password);
          // login_user($username,$password);
redirect("index.php");
        }
    }
?> 

    <!-- Page Content -->
    <div class="container">

<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
              <input type="text" autocomplete="on" value="<?php echo isset($username)? $username:'' ?>"
               name="username" id="username" class="form-control" placeholder="Enter Desired Username">
 <p><?php echo isset($error['username'])? $error['username']:'' ?></p>
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" autocomplete="on" value="<?php echo isset($email)? $email:'' ?>"
                             name="email" id="email" class="form-control" placeholder="somebody@example.com">
<p><?php echo isset($error['email'])? $error['email']:'' ?></p>
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
<p><?php echo isset($error['password'])? $error['password']:'' ?></p>
                        </div>

                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>

                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr> 