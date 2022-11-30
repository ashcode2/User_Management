 



<?php
//inserting data into table
if(isset($_POST['send'])){

  $paid_to = $_POST['paid_to'];
  $email = $_POST['email'];
   $t_note = $_POST['t_note']; 
    $photo = $_FILES['image']['name'];
    $tmp_photo = $_FILES['image']['tmp_name']; 
    move_uploaded_file($tmp_photo, "images_reciept/$photo");
    require_once ("pdf_upload.php");
  $date = date('m/d/y h:i:s a', time());

  // $sql = "INSERT INTO transactions (transaction_id, paid_to, t_account, t_date, t_image_recipt) VALUE ('','{$paid_to}','{$email}','{$date}','{$photo}')";
  $sql = "INSERT INTO transactions (transaction_id, paid_to, t_account, t_date, t_reciept_image, t_reciept_pdf, t_note) VALUE ('','{$paid_to}','{$email}','{$date}','{$photo}','{$dest_file}','{$t_note}')";

    $transaction_query = mysqli_query($conn,$sql);
    confirmQuery($transaction_query);

    ?>
 <script> alert('Sent Successfully');  </script>
    <?php }?>







<div class="container pt-3">
    <!-- Login Form Start -->
    <div class="row justify-content wrapper" id="login-box">
        <div class="col-lg-10 my-auto">
            <div class="card-group myShadow">
                <div class="card round-left p-4" style="flex-grow:1.4;">
                    <h1 class="text-center font-weight-bold text-primary">PAY INTO BITCOIN WALLET ADDRESS

</h1>
                    <hr class="my-3">
                    <form action="" method="post" class="px-3" enctype="multipart/form-data">
<input type="text" name="email" value="<?php echo $email; ?>" hidden/>

                    <input type="text" name="paid_to" value="1GaNuTT5hkFRR822P2hnaiGYKCNTqth9Kq" id="myInput">
                        <button class="btn-info" style="border:1px solid #0275d8;" onclick="myFunction()">Copy Address</button>
                        <br/>
                        <div id="loginAlert"></div>

                        <div class="input-group input-group-lg form-group">
                            <div class="input-group-prepend">
                                <!-- <span class="input-group-text rounded-0">
                                    <i class="far fa-file fa-lg"></i>
                                </span> -->
                            </div>
                             <input style="border:1px solid #0275d8;" type="file" name="image"  class="file-upload-browse rounded-0 form-control" placeholder="Upload Reciept Image">
                        </div>
                         <div class="input-group input-group-lg form-group">
                            <div class="input-group-prepend">
                                <!-- <span class="input-group-text rounded-0">
                                    <i class="fas fa-key fa-lg"></i>
                                </span> -->
                            </div>
                            <input style="border:1px solid #0275d8;" type="file" name="pdfFile"  class="file-upload-browse rounded-0 form-control" placeholder="Upload Reciept pdf">
                        </div>
                        <div class="form-group">
                        <div class="form-group m-1 rounded card-text p-2" style="border:1px solid #0275d8;">
                        <label for="exampleTextarea1">Textarea</label>
                        <textarea name="t_note" class="form-control "  style="border:1px solid #0275d8;" rows="2"></textarea>
                      </div>
                      <!-- <button type="submit" name="send" class="btn btn-primary mr-2">Submit</button> -->
                      <!-- <button class="btn btn-dark">Cancel</button> -->
                     
                        </div>
                        <div class="form-group">
                            <input type="submit" name="send" value="Send Deposit"  class="btn btn-primary btn-lg btn-block myBtn">
                        </div>
                    </form>
                </div>
                <div class="card justify-content-center rounded-right myColor p-4">
                    <h1 class="text-center font-weight-bold text-white">PAY INTO ETHEREUM WALLET ADDRESS?
</h1>
                    <hr class="my-3 bg-light myHr">
                    <p class="text-center font-weight-bolder text-light lead">Upload your payment evidence</p>
                    <button class="btn btn-outline-light btn-lg align-self-center font-weight-bolder mt-4 myLinkBtn" id="register-link">Send Evidence of Deposit</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Form End -->
    
    <!-- Register Form Start -->
    <div class="row justify-content wrapper" id="register-box" style="display: none;">
        <div class="col-lg-10 my-auto">
            <div class="card-group myShadow">
                <div class="card justify-content-center rounded-left myColor p-4">
                    <h1 class="text-center font-weight-bold text-white">PAY INTO BITCOIN WALLET ADDRESS?</h1>
                    <hr class="my-3 bg-light myHr">
                    <p class="text-center font-weight-bolder text-light lead">Upload your payment evidence</p>
                    <button class="btn btn-outline-light btn-lg align-self-center font-weight-bolder mt-4 myLinkBtn" id="login-link">Send Evidence of Deposit</button>
                </div>
                <div class="card rounded-right p-4" style="flex-grow:1.4;">
                    <h1 class="text-center font-weight-bold text-primary">PAY INTO ETHEREUM WALLET ADDRESS</h1>
                    <hr class="my-3">
                    <form action="" method="post" class="px-3" enctype="multipart/form-data">
                       
                        <input type="text" name="paid_to" value="0x82ddaf43636236c2971d1f53d4ef3543ac552ea2" id="myAddress">
                        <button class="btn-info" style="border:1px solid #0275d8;" onclick="myFunctionAddress()">Copy Address</button>
                        <br/>
                        <div id="regAlert"></div>
                        <div class="input-group input-group-lg form-group">
                            <div class="input-group-prepend">
                                <!-- <span class="input-group-text rounded-0">
                                    <i class="far fa-file fa-lg"></i>
                                </span> -->
                            </div>
                             <input style="border:1px solid #0275d8;" type="file" name="image"  class="file-upload-browse rounded-0 form-control" placeholder="Upload Reciept Image">
                        </div>
                         <div class="input-group input-group-lg form-group">
                            <div class="input-group-prepend">
                                <!-- <span class="input-group-text rounded-0">
                                    <i class="fas fa-key fa-lg"></i>
                                </span> -->
                            </div>
                            <input style="border:1px solid #0275d8;" type="file" name="pdfFile"  class="file-upload-browse rounded-0 form-control" placeholder="Upload Reciept pdf">
                        </div>
                        <div class="form-group">
                        <div class="form-group m-1 rounded card-text p-2" style="border:1px solid #0275d8;">
                        <label for="exampleTextarea1">Textarea</label>
                        <textarea name="t_note" class="form-control "  style="border:1px solid #0275d8;" rows="2"></textarea>
                      </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="send" value="Send Deposit" class="btn btn-primary btn-lg btn-block myBtn">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Form End --> 
   <!-- Forgot Password Form End -->
</div>

 


 
  
  <!-- partial:partials/_footer.html -->

  <?php require_once ('includes/footer_one.php'); ?>

  <script>

function myFunction() {
  // Get the text field
  var copyText = document.getElementById("myInput");

  // Select the text field
  copyText.select();
  copyText.setSelectionRange(0, 99999); // For mobile devices

   // Copy the text inside the text field
  navigator.clipboard.writeText(copyText.value);

  // Alert the copied text
  alert("Copied Address: " + copyText.value);
}

function myFunctionAddress() {
  // Get the text field
  var copyText = document.getElementById("myAddress");

  // Select the text field
  copyText.select();
  copyText.setSelectionRange(0, 99999); // For mobile devices

   // Copy the text inside the text field
  navigator.clipboard.writeText(copyText.value);

  // Alert the copied text
  alert("Copied Address: " + copyText.value);
}
</script>