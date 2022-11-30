<?php
global $conn;

       //redirection function
function redirect($location){
  return header("Location:" . $location);
}

//sql injection prevention function
function escape($string){
    global $conn;
    return mysqli_real_escape_string($conn, $string);
}

 

// function set_message($msg){

//   if(!$msg) {
  
//   $_SESSION['message']= $msg;
  
//   } else {
  
//   $msg = "";
  
  
//       }
  
  
//   }
  
  
  // function display_message() {
  
  //     if(isset($_SESSION['message'])) {
  //         echo $_SESSION['message'];
  //         unset($_SESSION['message']);
  //     }
  
  
  // }
  

//username duplication check
function user_check($name=''){
  global $conn;

  $query = "SELECT name FROM users WHERE name = '$name'";
  $result = mysqli_query($conn,$query);

  confirmQuery($result);

  $row = mysqli_fetch_array($result);
        if(mysqli_num_rows($result) > 0){
          return true;
        }else{
          return false;
  }
}
 

      //email duplication check
      function email_check($email){
        global $conn;

        $query = "SELECT email FROM users WHERE email = '$email'";
        $result = mysqli_query($conn,$query);

        confirmQuery($result);

        $row = mysqli_fetch_array($result);
              if(mysqli_num_rows($result) > 0){
                return true;
              }else{
                return false;
        }
    }



function confirmQuery($result){
    global $conn;
  
    if(!$result){
      die("QUERY FAILED" . mysqli_error($conn));
    }
 
  }

// function is_admin($username = ''){
 
    function is_admin($username) {

        global $conn; 
    
        $query = "SELECT user_role FROM users WHERE name = '$username'";
        $result = mysqli_query($conn, $query);
        confirmQuery($result);
    
        $row = mysqli_fetch_array($result);
    
    
        if($row['user_role'] == 'admin'){
    
            return true;
    
        }else {
    
    
            return false;
        }
    
    }
    
    



    function insert_category(){
      global $conn;
            if(isset($_POST['submit'])){
          $plan_title =  $_POST['plan_title'];
    $stmt =mysqli_prepare($conn, "INSERT INTO plans(plan_title) VALUES(?) ");
          if($plan_title == "" || empty($plan_title)){
            echo "This field should not be empty";
          }else {
    
    
            // $query = "INSERT INTO categories(plan_title)";
            // $query .= "VALUE('{$plan_title}')";
            // $create_category_query = mysqli_query($conn, $query);
    
            
            mysqli_stmt_bind_param($stmt, 's', $plan_title);
            mysqli_stmt_execute($stmt);
    
    
    
            if(!$stmt){
              die('QUERY FAILED' . mysqli_error($conn));
            }
          }
                mysqli_stmt_close($stmt);
            }
    }
    
    
    function findAllCategories(){
      global $conn;
    
      $query = "SELECT * FROM plans";
      $select_categories = mysqli_query($conn,$query);
    
      while($row = mysqli_fetch_assoc($select_categories)) {
      $plan_id = $row['plan_id'];
      $plan_title = $row['plan_title'];
    
      echo "<tr>";
      echo "<td>{$plan_id}</td>";
      echo "<td>{$plan_title}</td>";
      echo "<td><a href='plans.php?delete={$plan_id}'>Delete</a></td>";
      echo "<td><a href='plans.php?edit={$plan_id}'>Edit</a></td>";
      echo "</tr>";
      }
    
    }
    
    function deleteCategories(){
      global $conn;
      if(isset($_GET['delete'])){
        $the_plan_id = $_GET['delete'];
        $query = "DELETE FROM plans WHERE plan_id ={$the_plan_id}";
        $delete_query = mysqli_query($conn,$query);
      //refreshing the page
      header("location:plans.php");
      }
    
    }
    
    
    function logged_in(){
      if(isset($_SESSION['email']) || isset($_COOKIE['email'])){
        return true;
      } else {
        return false;
      }
    }

    function register_user($username,$email,$password){
      global $conn;

      $username = mysqli_real_escape_string($conn,$username);
      $password = mysqli_real_escape_string($conn,$password);
      $email = mysqli_real_escape_string($conn,$email);
      // $password  = password_hash( $password, PASSWORD_BCRYPT, array('cost' => 10));

      $query = "INSERT INTO users(name, email, password, user_role)";
      $query.= "VALUES('{$username}','{$email}', '{$password}', 'subscriber' ) ";
      $register_user_query = mysqli_query($conn,$query);

      confirmQuery($register_user_query);
}



          
    function login_user($email, $password){
      global $conn;
      // $email = trim($email);
      // $password = trim($password); 
      
      $email ;
      $password ;
               
            // $email = mysqli_real_escape_string($conn,$email);
            // $password = mysqli_real_escape_string($conn,$password);
       
            $query = "SELECT * FROM users WHERE email ='. $email'";
            $select_user_query = mysqli_query($conn,$query);
      
            if(!$select_user_query){
            die("QUERY FAILED". mysqli_error($conn));
            }
      
            while ($row = mysqli_fetch_assoc($select_user_query)) {
              // code...
              $db_user_id = $row['id'];
              $db_username = $row['name'];
              $db_user_password = $row['password'];
              $email = $row['email'];
              $db_user_lastname = $row['user_lastname'];
              $db_user_role = $row['user_role'];
            
      
            // reversing the encrypted password for logining in
            // $password = crypt($password, $db_user_password);
      
            if (password_verify($password,$db_user_password)) {
      
              $_SESSION['name'] = $db_username;
              $_SESSION['email'] = $email;
              $_SESSION['id'] = $db_user_id;
              $_SESSION['user_role'] = $db_user_role;
      
              // redirect("/home.php");
      
              echo "success";

             } else {
      
            //  redirect("./index.php");

                echo "failed";
      //          header("Location: index.php");
      
            }
      
          }
        }
?>