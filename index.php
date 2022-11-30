<?php 
require_once('header.php');
include_once("db_conn.php");
include_once("admin/functions.php");
?>
<title> </title>
<script type="text/javascript" src="script/validation.min.js"></script>
<script type="text/javascript" src="script/login.js"></script>
<link href="css/style.css" rel="stylesheet" type="text/css" media="screen">
 <div class="container">
 

    <!-- Login Form Start -->

	<div class="row justify-content wrapper" id="login-box">
        <div class="col-lg-10 my-auto">
            <div class="card-group myShadow">
                <div class="card round-left p-4" style="flex-grow:1.4;">
                    <h1 class="text-center font-weight-bold text-primary">Sign in to Account</h1>
                    <hr class="my-3">






	<form class="form-login" method="post" id="login-form" class="px-3">
		<h2 class="form-login-heading">User Log In Form</h2><hr />
		<div id="error">
		</div>
		<div class="form-group ">
			<input type="email" class="form-control" placeholder="Email address" name="user_email" id="user_email" />
			<span id="check-e"></span>
		</div>
		<div class="form-group">
			<input type="password" class="form-control" placeholder="Password" name="password" id="password" />
		</div>
		<hr />
		<div class="form-group">
			<button type="submit" class="btn btn-default" name="login_button" id="login_button">
			<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In
			</button> 
		</div> 
	</form>		



	</div>
                <div class="card justify-content-center rounded-right myColor p-4">
                    <h1 class="text-center font-weight-bold text-white">Hello Friends!</h1>
                    <hr class="my-3 bg-light myHr">
                    <p class="text-center font-weight-bolder text-light lead">Enter your personal details and start your journey with us!</p>
                    <button class="btn btn-outline-light btn-lg align-self-center font-weight-bolder mt-4 myLinkBtn" id="register-link">Sign Up</button>
                </div>
            </div>
        </div>
    </div>  
    <!-- Login Form End -->



    <?php
        // if ($_SERVER['REQUEST_METHOD'] == "POST") {

      if (isset($_POST['register'])) {
        // code...
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);

        $error = [

            'name'=>'',
            'email' => '',
            'password'=> ''
        ];

            if(strlen($name) < 4){
              $error['name'] = 'Username needs to be longer';
            }
            if ($name == '') {
              $error['name'] = 'Username cannot be empty';
            }

            if (user_check($name)) {
              $error['name'] = "Username Exists Already";
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
// redirect("index.php");
//         }
//     }
?> 

 <script>
    window.location = "index.php";
alert('Registered Successfully');
    </script>
    <?php
}
        }

?>




    <!-- Register Form Start -->


	<div class="row justify-content wrapper" id="register-box" style="display: none;">
        <div class="col-lg-10 my-auto">
            <div class="card-group myShadow">
                <div class="card justify-content-center rounded-left myColor p-4">
                    <h1 class="text-center font-weight-bold text-white">Welcome Back!</h1>
                    <hr class="my-3 bg-light myHr">
                    <p class="text-center font-weight-bolder text-light lead">To keep connected with us please login with your personal info.</p>
                    <button class="btn btn-outline-light btn-lg align-self-center font-weight-bolder mt-4 myLinkBtn" id="login-link">Sign In</button>
                </div>
                <div class="card rounded-right p-4" style="flex-grow:1.4;">
                    <h1 class="text-center font-weight-bold text-primary">Create Account</h1>
                    <hr class="my-3">
                    <form action="" method="post" class="px-3" id="register-form">
                        <div id="regAlert"></div>
                         <div class="input-group input-group-lg form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text rounded-0">
                                    <i class="far fa-user fa-lg"></i>
                                </span>
                            </div>
                            <input type="text" name="name" id="name" class="form-control rounded-0" placeholder="Full Name" required>
                            <p><?php echo isset($error['name'])? $error['name']:'' ?></p>
                            </div>
                        <div class="input-group input-group-lg form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text rounded-0">
                                    <i class="far fa-envelope fa-lg"></i>
                                </span>
                            </div>
                            <input type="email" name="email" id="remail" class="form-control rounded-0" placeholder="E-Mail" required>
                            <p><?php echo isset($error['email'])? $error['email']:'' ?></p>
                        </div>
                        
                         <div class="input-group input-group-lg form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text rounded-0">
                                    <i class="fas fa-key fa-lg"></i>
                                </span>
                            </div>
                            <input type="password" name="password" id="rpassword" class="form-control rounded-0" placeholder="Password" required minlength="5">
                            <p><?php echo isset($error['password'])? $error['password']:'' ?></p>
                             </div>
                          
                           <div class="input-group input-group-lg form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text rounded-0">
                                    <i class="fas fa-key fa-lg"></i>
                                </span>
                            </div>
                            <input type="password" name="cpassword" id="cpassword" class="form-control rounded-0" placeholder="Confirm Password" required minlength="5">
                            <p><?php echo isset($error['password'])? $error['password']:'' ?></p>
                            </div>
                        <div class="form-group">
                            <div id="passError" class="text-danger font-weight-bold"></div>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Sign Up" id="register-btn" name="register" class="btn btn-info btn-lg btn-block myBtn">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

	    <!-- Register Form End -->


	<div style="margin:50px 0px 0px 0px;">
		<a class="btn btn-default read-more" style="background:#3399ff;color:white" href="" title="">Registeration</a>			
	</div>		
</div>











 
  <!-- partial:partials/_footer.html -->
 



  

<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script> -->
<script type="text/javascript">
    $(document).ready(function(){
        $("#register-link").click(function(){
            $("#login-box").hide();
            $("#register-box").show();
        });
        
        $("#login-link").click(function(){
            $("#login-box").show();
            $("#register-box").hide();
        });
        
        $("#forgot-link").click(function(){
            $("#login-box").hide();
            $("#forgot-box").show();
        });
        
        $("#back-link").click(function(){
            $("#login-box").show();
            $("#forgot-box").hide();
        });
        
	});
		</script>

</body>
</html>