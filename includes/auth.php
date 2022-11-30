<?php

require_once("db.php");
require_once ('pdo_db.php');
// require_once 'config.php';

class Auth extends Database{

   
    //Register New User
    public function register($name, $email, $password){
        $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :pass)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['name'=>$name, 'email'=>$email, 'pass'=>$password]);
        return true;
    }
    
    //Check if user Already Registered
    public function user_exist($email){
        $sql = "SELECT email FROM users WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['email'=>$email]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $result;
    }
    
    //login Existing User
    public function login($email){
        require_once("../admin/functions.php");
        login_user($_POST['email'],$_POST['password']);

    //     $email = $_POST['email'];
    //     $password = $_POST['password'];

    //     // $sql = "SELECT email, password FROM users WHERE email = :email AND deleted != 0";
    //     // $sql ="SELECT email AND password FROM users WHERE email = $email";
    //     $sql = "SELECT email AND password FROM users WHERE email ='. $email.' AND password ='. $password.'";
    //     // $stmt = $pdo->query($sql);
 
    //     // $stmt->execute(['email'=>$email]);

    //     $login_query = mysqli_query($conn, $sql);
    //     confirmQuery($login_query);
    //     // $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
    //     // return $login_query;
    //     // return $row;
    // }
    
    // //Current User In Session
    // public function currentUser($email){
    //     $username="root";
    //     $password="";
    //     $pdo = new PDO("mysql:host=localhost;dbname=db_user_system", $username, $password);
    //     // $sql = "SELECT * FROM users WHERE email = user";
        
    //     $sql = "SELECT * FROM users WHERE email = email AND deleted != 0";
    //     // $stmt = $this->conn->prepare($sql);
    //     $stmt = $pdo->query($sql);

    //     // $stmt->execute(['email'=>$email]);
    //     $row = $stmt->fetch(PDO::FETCH_ASSOC);

 
        
    //     return $row;

    
    }
    
    //Forgot Password
    public function forgot_password($token,$email){
        $sql = "UPDATE users SET token = :token, token_expire = DATE_ADD(NOW(), INTERVAL 10 MINUTE) WHERE email = :email";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['token'=>$token,'email'=>$email]);
        
        return true;
    }
    
    //Reset Password User Auth
    public function reset_pass_auth($email, $token){
        $sql = "SELECT id FROM users WHERE email = :email AND token = :token != '' AND token_expire > NOW() AND deleted != 0";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['email'=>$email, 'token'=>$token]);
        
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $row;
    }
    
    //Update New Password
    public function update_new_pass($pass, $email){
        $sql = "UPDATE users SET token = '', password = :pass WHERE email = :email AND deleted != 0";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['pass'=>$pass, 'email'=>$email]);
        return true;
    }

    //Add New Note
    public function add_new_note($uid, $title, $note){
        $sql = "INSERT INTO notes (uid, title, note) VALUES (:uid, :title, :note)";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['uid'=>$uid, 'title'=>$title, 'note'=>$note]);
        return true;
    } 

    //Fetch All Note of An user
    public function get_notes($uid){
        $sql = "SELECT * FROM notes WHERE uid = :uid";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['uid'=>$uid]);

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    //Update Profile of An USer
    // public function update_profile($name,$gender,$dob,$phone,$photo,$id){
    //     $sql = "UPDATE users SET name = :name, gender = :gender, dob = :dob, phone = :phone, photo = :photo WHERE id = :id AND deleted = 0";
    //     $stmt = $this->conn->prepare($sql);
    //     $stmt->execute(['name'=>$name, 'gender'=>$gender, 'dob'=>$dob, 'phone'=>$phone, 'photo'=>$photo, 'id'=>$id]);
    //     return true;
    // }

    public function update_profile($name,$gender,$dob,$phone,$photo,$email,$user_role,$id){
        $sql = "UPDATE users SET name = :name, gender = :gender, dob = :dob, phone = :phone, photo = :photo, email = :email, user_role = :user_role WHERE id = :id AND deleted = 0";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['name'=>$name, 'gender'=>$gender, 'dob'=>$dob, 'phone'=>$phone, 'photo'=>$photo, 'email'=>$email, 'user_role'=>$user_role, 'id'=>$id]);
        return true;
    }

    
//Fetch balance and deposit of An user
// public function get_payment($cemail){
//     // $sql = "SELECT * FROM payment WHERE user = :user";
//     $sql = "SELECT * FROM payment WHERE user = :user";
//     // $stmt = mysqli_query($conn, $sql);
//     $stmt = $this->conn->prepare($sql);
//     $stmt->execute(['user'=>$cemail]);

//     $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
//     return $result;
// }

// public function get_payment($email){
//     $sql = "SELECT * FROM users WHERE email = :email AND deleted != 0";
//     $stmt = $this->conn->prepare($sql);
//     $stmt->execute(['email'=>$email]);
//     $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
//     return $row;
// }

}





?>