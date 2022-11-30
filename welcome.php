


<?php
require_once 'includes/header.php';
require_once 'includes/pdo_db.php';


?>

<?php
// session_start();
// if(!isset($_SESSION['id'])){
// 	header("Location: index.php");
// }
// include('header.php');
// include_once("db_connect.php");
// $sql = "SELECT id, name, password, email FROM users WHERE id='".$_SESSION['id']."'";
// $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
// $row = mysqli_fetch_assoc($resultset);
 

// $_SESSION['email'] = $row['email'];
// $_SESSION['name'] = $row['name'];
// $_SESSION['id'] = $row['id'];
 

// $name = $_SESSION['name'];
// $id = $_SESSION['id'];
// $email = $_SESSION['email'];
 ?>

<?php
  

//  $username="root";
//  $password="";
//  $pdo = new PDO("mysql:host=localhost;dbname=db_user_system", $username, $password);

 
//  $sql = "SELECT * FROM payment WHERE user = :$email";
 $sql = "SELECT * FROM payment WHERE user = user";
$result = $pdo->query($sql);
 $result->setFetchMode(PDO::FETCH_ASSOC);
// $result = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
// $row = mysqli_fetch_assoc($resultset);

 
    while ($row = $result->fetch()): 
    //   $balance=$row['balance']);  
      $balance=$row['balance'];  
      $deposit= $row['deposit'];  
       $trans_b= $row['trans_b']; 
        $trans_e= $row['trans_e']; 
          $withdraw= $row['withdraw']; 
           endwhile; 
           
           require_once 'includes/topnav.php';
require_once 'includes/side_nav.php';

?>

<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card corona-gradient-card">
                    <div class="card-body py-0 px-0 px-sm-3">
                        <div class="row align-items-center">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">$<?php echo $balance; ?> 
                                </h3>
                        
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="icon icon-box-success ">
                                    <span class="mdi mdi-coin icon-item"></span>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Balance</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">$<?php echo $deposit; ?></h3>

                                </div>
                            </div>
                            <div class="col-3">
                                <div class="icon icon-box-success">
                                    <span class="mdi mdi-arrow-bottom-left icon-item"></span>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Deposit</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">$<?php echo $withdraw; ?></h3>

                                </div>
                            </div>
                            <div class="col-3">
                                <div class="icon icon-box-danger">
                                    <span class="mdi mdi-arrow-top-right icon-item"></span>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Withdraw</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">$0.3</h3>
                                    <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="icon icon-box-success ">
                                    <span class="mdi mdi-chart-bar"></span>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Bonus</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Transaction History</h4>

                        <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                            <div class="text-md-center text-xl-left">
                                <div class="icon icon-box-success ">
                                    <span class="mdi mdi-currency-btc"></span>
                                </div>
                                <h6 class="mb-1">Transfer to Bitcoin</h6>
                                <!--     <p class="text-muted mb-0">07 Jan 2019, 09:12AM</p> -->
                            </div>
                            <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                                <h6 class="font-weight-bold mb-0">$<?php echo $trans_b; ?></h6>
                            </div>
                        </div>
                        <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                            <div class="text-md-center text-xl-left">
                                <div class="icon icon-box-success ">
                                    <span class="mdi mdi-currency-eth"></span>
                                </div>
                                <h6 class="mb-1">Transfer to Ethereum</h6>

                            </div>
                            <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                                <h6 class="font-weight-bold mb-0">$<?php echo $trans_e; ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row justify-content-between">
                            <h4 class="card-title mb-1">Referral</h4>
                            <p class="text-muted mb-1">Status</p>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="preview-list">
                                    <div class="preview-item border-bottom">
                                        <div class="preview-thumbnail">
                                            <div class="preview-icon bg-primary">
                                                <i class="mdi mdi-file-document"></i>
                                            </div>
                                        </div>
                                        <div class="preview-item-content d-sm-flex flex-grow">
                                            <div class="flex-grow">
                                                <h6 class="preview-subject">Refer</h6>
                                                <!--         <p class="text-muted mb-0">Broadcast web app mockup</p>
                              </div>
                              <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                <p class="text-muted">15 minutes ago</p>
                                <p class="text-muted mb-0">30 tasks, 5 issues </p>
                              </div> -->

                              
<?php

// $payment_id = $_GET['payment_id'];
// $payment_id = 1;
// $payment_id = $_SESSION['username'];

// // $query = 'SELECT * FROM payment WHERE user = '.$payment_id.'';
// $query = 'SELECT * FROM payment WHERE user = '.$payment_id.'';
//   var_dump($query);
//     //   $select_transactions_query = mysqli_query ($conn, $query) ;
//     //   confirmQuery( $select_transactions_query ); 
// // if(isset($_GET['payment_id'])){
// //     $payment_id = $_GET['payment_id'];
 
// //    $query = "SELECT * FROM payment WHERE user = $payment_id ";
// //     $select_admin_query = mysqli_query($conn,$query);
// //     confirmQuery($select_admin_query );
//     while($row = mysqli_fetch_assoc($select_admin_query)) {
 
//    $payment_id = $row['payment_id'];
//     $balance = $row['balance'];
//     $deposit = $row['deposit']; 
//     $trans_b = $row['trans_b'];
//   echo  $trans_e = $row['trans_e'];
//    echo $user = $row['user'];
 
//   }
// // }
// echo"hi";


?>
                                            </div>
                                        </div>




                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--        -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Visitors by Countries</h4>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <i class="flag-icon flag-icon-us"></i>
                                                    </td>
                                                    <td>USA</td>
                                                    <td class="text-right"> 1500 </td>
                                                    <td class="text-right font-weight-medium"> 56.35% </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <i class="flag-icon flag-icon-de"></i>
                                                    </td>
                                                    <td>Germany</td>
                                                    <td class="text-right"> 800 </td>
                                                    <td class="text-right font-weight-medium"> 33.25% </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <i class="flag-icon flag-icon-au"></i>
                                                    </td>
                                                    <td>Australia</td>
                                                    <td class="text-right"> 760 </td>
                                                    <td class="text-right font-weight-medium"> 15.45% </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <i class="flag-icon flag-icon-gb"></i>
                                                    </td>
                                                    <td>United Kingdom</td>
                                                    <td class="text-right"> 450 </td>
                                                    <td class="text-right font-weight-medium"> 25.00% </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <i class="flag-icon flag-icon-ro"></i>
                                                    </td>
                                                    <td>Romania</td>
                                                    <td class="text-right"> 620 </td>
                                                    <td class="text-right font-weight-medium"> 10.25% </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <i class="flag-icon flag-icon-br"></i>
                                                    </td>
                                                    <td>Brasil</td>
                                                    <td class="text-right"> 230 </td>
                                                    <td class="text-right font-weight-medium"> 75.00% </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div id="audience-map" class="vector-map"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->



        <?php
        require_once 'includes/footer.php';
        ?>
