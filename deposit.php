
   <?php require_once ('includes/header.php'); ?>
  <?php require_once ('admin/functions.php'); ?>
  <?php require_once ('includes/topnav.php'); ?>
  <?php require_once ('includes/side_nav.php'); ?>



  
<div class="content-wrapper">
            <div class="row justify-content-center">
                <div class="col-10 grid-margin">
                  
 

  <?php

if(isset($_POST['send'])){
$transaction_id = "";
$paid_to	 = $_POST['paid_to'];
// $paid_from	 = escape($_POST['paid_from	']);
// $t_reciept_image	 = escape($_POST['t_reciept_image	']);
// $t_reciept_pdf	 = escape($_POST['t_reciept_pdf	']);
// $t_account = escape($_POST['t_account']);
 $t_note = $_POST['t_note'];
 $t_status = "pending";

 $t_reciept_image = $_FILES['image']['name'];
 $t_image_temp = $_FILES['image']['tmp_name']; 
    require_once ("pdf_upload.php");
  // $t_date = date('d-m-y');
  $t_date = date('m/d/y h:i:s a', time());
    move_uploaded_file($t_image_temp, "images_reciept/$t_reciept_image");
 
  echo  $t_account = $cemail;
    
$query = "INSERT INTO transactions(transaction_id, paid_to, t_account, t_date,
t_reciept_image, t_reciept_pdf, t_note, t_status)";
$query .= "VALUE('{$transaction_id}','{$paid_to}','{$t_account}','{$t_date}',
'{$t_reciept_image}','{$dest_file}','{$t_note}','{$t_status}')";

$create_post_query = mysqli_query($conn,$query);
//$the_post_id = mysqli_insert_id($connection);
  confirmQuery($create_post_query);

    // echo "<p class='bg-success'> Post Added. <a href='deposit.php'>View Post</a></p>";

   ?> <script>
alert('Sent Successfully');
    </script>
    <?php
}

 
 ?>
  <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 grid-margin ">



  
                            </div>

         <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <!-- <smaill class="btn-primary"><?php// $cname; ?></small> -->
                    <h2 class="page-title">Select Your Wallet for Payment </h2>
                    <p class="card-description"></p>
                    
                    <form class="forms-sample" action="" method="post" enctype="multipart/form-data">
                    <!-- <b>E-mail : </b><?php //$cemail; ?> <br/><hr/> -->
                      <div class="form-group">
                        <input for="exampleInputName1" value="1GaNuTT5hkFRR822P2hnaiGYKCNTqth9Kq" />
                        <p class="card-description"> BITCOIN WALLET ADDRESS </p>
                      </div>
                        <div class="form-group">
                        <input for="exampleInputName1" name="paid_to" value="0x82ddaf43636236c2971d1f53d4ef3543ac552ea2" />
                        <p class="card-description"> ETHEREUM WALLET ADDRESS </p>
                      </div>
                      <!-- <div class="form-group">
                        <label>File upload</label>
                        <input type="file" name="images[]" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                          </span>
                        </div>
                      </div> -->

                      <input type="text" name="paid_to" class="form-group m-1 rounded card-text p-2" style="border:1px solid #0275d8;">
                     <i> <small for="paid_to">copy and paste here the Wallet you paid to.</small></i><br/>


                      <div class="form-group m-1 rounded card-text p-2" style="border:1px solid #0275d8;">
    <label for="image">Upload Reciept Image</label><br/>
    <input type="file" name="image"  class="file-upload-browse" >
  </div>
    
    <div class="form-group m-1 rounded card-text p-2" style="border:1px solid #0275d8;">
    <label for="pdfFile">Upload Reciept pdf</label><br/>
    <input	type="file" name="pdfFile" /> 
  </div>
                      <div class="form-group m-1 rounded card-text p-2" style="border:1px solid #0275d8;">
                        <label for="exampleTextarea1">Textarea</label>
                        <textarea name="t_note" class="form-control"  rows="4"></textarea>
                      </div>
                      <button type="submit" name="send" class="btn btn-primary mr-2">Submit</button>
                      <button class="btn btn-dark">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>

 


        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Activities History</h4>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>
                        <div class="form-check form-check-muted m-0">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input">
                          </label>
                        </div>
                    <tr>
                      <th scope="col">Crypto Withdraw</th>
                      <th scope="col">Withdrawal ID</th>
                      <th scope="col">Time</th>
                      <th scope="col">Status</th>
                      <th scope="col">Amount</th>
                    </tr>
                  </thead>
                  <tbody>
                    
   <?php
   $query = "SELECT * FROM transactions ORDER BY transaction_id DESC";
   $select_posts = mysqli_query($conn,$query);

   while($row = mysqli_fetch_assoc($select_posts)) {
   $transaction_id = $row['transaction_id'];
   $paid_to = $row['paid_to'];
   $paid_from = $row['paid_from'];
   $t_account = $row['t_account'];
   $t_date = $row['t_date'];
   $tran_plan_id = $row['tran_plan_id'];
   $t_note = $row['t_note'];
   $t_status = $row['t_status'];
   $t_reciept_image = $row['t_reciept_image'];
   $t_reciept_pdf = $row['t_reciept_pdf']; 


// echo "<tr>";
?>
                    <tr>
                      <td>
                        Deposit
                      </td>
                      <td><?php echo $transaction_id ;?>
                        </td>
                      <td> <?php echo $t_date ;?></td>
                      <td><a href="#" class="status_btn"> 
                      <?php echo $t_status ;?>
                      </a></td>
                      <td><?php echo $t_note ;?></td>
                    </tr>
                   


                    <?php
   }
   ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>


  <!-- partial:partials/_footer.html -->

  <?php require_once ('includes/footer.php'); ?>
 