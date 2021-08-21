<?php
session_start();
error_reporting(0);
include('includes/db.php');

if(isset($_POST['submit']))
  {
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$newpassword=md5($_POST['newpassword']);
  $sql ="SELECT Email FROM admin WHERE Email=:email and MobileNumber=:mobile";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
$con="update admin set Password=:newpassword where Email=:email and MobileNumber=:mobile";
$chngpwd1 = $dbh->prepare($con);
$chngpwd1-> bindParam(':email', $email, PDO::PARAM_STR);
$chngpwd1-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$chngpwd1->execute();
echo "<script>alert('Your Password succesfully changed');</script>";
}
else {
echo "<script>alert('Email id or Mobile no is invalid');</script>"; 
}
}

?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    
    <title>TRMS Forgot Password</title>
  

    <link rel="apple-touch-icon" href="apple-icon.png">
   

    <link rel="apple-touch-icon" href="apple-icon.png">
   
   <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
   <link rel="stylesheet" href="assets/css/vendor/slick.css">
   <link rel="stylesheet" href="assets/css/vendor/slick-theme.css">
   <link rel="stylesheet" href="assets/css/vendor/aos.css">
   <link rel="stylesheet" href="assets/css/plugins/feature.css">
   <!-- Style css -->
   <link rel="stylesheet" href="assets/css/style.css">
   <link rel="stylesheet" href="assets/css/styles.css">
   <link rel="stylesheet" href="./style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

<script type="text/javascript">

function valid()
{
if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
alert("New Password and Confirm Password Field do not match  !!");
document.chngpwd.confirmpassword.focus();
return false;
}
return true;
}
</script>

</head>


<div class="rn-contact-area rn-section-gap section-separator" id="contacts">
            <div class="container">

                    <div data-aos-delay="600" class="col-lg-6 contact-input box-center">
          
                        <div class="contact-form-wrapper bg-black">
                            <div class="introduce">
                                 
                            <form class="rnt-contact-form rwt-dynamic-form row" id="contact-form" method="POST" action="" name="login">

                                <div class="col-lg-12 text-center">
                                        <h5>FORGOT PASSWORD</h5>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                        <label>Email Address</label>
<input type="email" class="form-control"  required="" name="email">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                        <label>Mobile Number</label>
<input type="text" class="form-control"  name="mobile" required="true">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                        <label>Password</label>
<input class="form-control" type="password" name="newpassword" required="true"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                        <label>Confirm Password</label>
<input class="form-control" type="password" name="confirmpassword" required="true" />
                                        </div>
                                    </div>

                                    <div class="col-lg-12 mt-5 " >
                                        <div class="row">
                                             <div class="col-lg-6">
                                             <a href="./index.php" style="">Sign in</a>
                                             <i data-feather="arrow-right"></i> 
                                             </div>    
                                             <div class="col-lg-6 text-right">
                                                       <button name="submit" type="submit" id="submit" class="rn-btn">
                                                  <span>reset</span>
                                                  <i data-feather="arrow-right"></i>
                                                  </button>
                                             </div>    
                                        </div>
                                       
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                           
                            
                    </form>
                </div>
            </div>
        </div>
    </div>




    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


</body>

</html>
