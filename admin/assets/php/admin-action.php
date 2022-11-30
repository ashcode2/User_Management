<?php

require_once 'admin-db.php';
require_once('../../functions.php');
$admin = new Admin();
session_start();

//Handle Admin Login Ajax Request
if(isset($_POST['action']) && $_POST['action'] == 'adminLogin'){
    $username = $admin->test_input($_POST['username']);
    $password = $admin->test_input($_POST['password']);

    // $hpassword = sha1($password);
    $hpassword = $password;

    $loggedInAdmin = $admin->admin_login($username,$hpassword);

    if($loggedInAdmin != null){
        echo 'admin_login';
        $_SESSION['username'] = $username;
    }
    else{
        echo $admin->showMessage('danger','Username or Password is Incorrect!');
    }
}



$query = "SELECT * FROM users WHERE id = 'name' ";

// $select_users_by_id_query = mysqli_query($conn, $query);
$select_users_by_id_query = $this-> conn->prepare($query);
// $select_users_by_id_query->execute();
confirmQuery($select_users_by_id_query);
confirmQuery($select_users_by_id_query);
$result = $select_users_by_id_query->fetchAll(PDO::FETCH_ASSOC);


while($row = mysqli_fetch_assoc($select_users_by_id_query)){
  $user_id = $row["id"];
  $username = $row["name"];
}


//Handle Fetch All Users Ajax Request
if(isset($_POST['action']) && $_POST['action'] == 'fetchAllUsers'){
    $output = '';
    $data = $admin->fetchAllUsers(0);
    $path = '../assets/php/';

    if($data){
        $output .= '<table class="table table-striped table-bordered text-center">
                    <thead>
                         <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>E-Mail</th>
                            <th>Phone</th>
                            <th>Gender</th>
                            <th>Verified</th>
                             <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>';
                foreach ($data as $row) {
                    if($row['photo'] != ''){
                        $uphoto = $path.$row['photo'];
                    }
                    else{
                        $uphoto = '../../../assets/images/avatar.png';
                    }
                    $output .= '<tr>
                                    <td>'.$row['id'].'</td>
                                    <td><img src="'.$uphoto.'" class="rounded-circle"
                                        width="40px" /></td>
                                    <td>'.$row['name'].'</td>
                                    <td>'.$row['email'].'</td>
                                    <td>'.$row['phone'].'</td>
                                    <td>'.$row['gender'].'</td>
                                    <td>'.$row['verified'].'</td>
                                    <td>
                                       

                                            <a class="btn btn-primary" href="users.php?source=edit_user&id=$user_id">
                                            Edit</a>
                                            <a class="btn btn-danger fa-trash-alt" href="users.php?delete=$user_id">
                                            Delete</a>
                                </td>
                                </tr>';
                }
                $output .='</tbody>
                    </table>';
                echo $output;
    }
    else{
        echo '<h3 class="text-center text-secondary">:( No any user registered yet!</h3>';
    }
}




if(isset($_GET['delete'])){
    // if(isset($_SESSION['username'])){
    if($_SESSION['username'] == 'admin'){
  
  //    $this_user_id =mysqli_real_escape_string($connection, $_POST['user_id']);
       $this_user_id = escape($_GET['delete']);
   
      $query = "DELETE FROM users WHERE id = $this_user_id";
      $update_to_delete_status = mysqli_query($conn,$query);
      confirmQuery($update_to_delete_status);
   
  //refreshing the page
  header("location:./users.php");
  //    }
  }
  }
  
  
?>