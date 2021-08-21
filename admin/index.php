<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['login'])) 
  {
    $username=$_POST['username'];
    $password=md5($_POST['password']);
    $sql ="SELECT ID FROM admin WHERE UserName=:username and Password=:password";
    $query=$dbh->prepare($sql);
    $query-> bindParam(':username', $username, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    if($query->rowCount() > 0)
{
foreach ($results as $result) {
$_SESSION['trmsaid']=$result->ID;
}
$_SESSION['login']=$_POST['username'];
echo "<script type='text/javascript'> document.location ='./dashboard.php'; </script>";
} 
}

?>
    
<!doctype html>
<html class="no-js" lang="en">
<head>
    
    <title>TRMS Admin Login</title>
    

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



</head>

<body class="bg-img" >

    <!--<div class="sufee-login d-flex align-content-center flex-wrap" >
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <h3 style="color:black" class="text-white"> KEC PLECEMENT LOGIN </h3>
                    <hr  color="red"/>
                </div>
                <div class="login-form">
                    <form action="" method="post" name="login">
                        
                        <div class="form-group">
                            <label>User Name</label>
                            <input type="text" class="form-control" placeholder="User Name" required="true" name="username">
                        </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" placeholder="Password" name="password" required="true">
                        </div>
                                <div class="checkbox">
                                    <label class="pull-left">
                                <a href="../index.php">Back Home!!</a>
                                    <label class="pull-right">
                                <a href="forgot-password.php" style="padding-left: 250px">Forgot Password?</a>
                            </label>

                                </div>
                                <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30" name="login">Sign in</button> -->

      <div class="rn-contact-area rn-section-gap section-separator" id="contacts">
            <div class="container">

                    <div data-aos-delay="600" class="col-lg-6 contact-input box-center">
          
                        <div class="contact-form-wrapper bg-black">
                            <div class="introduce">
                                 
                                <form class="rnt-contact-form rwt-dynamic-form row" id="contact-form" method="POST" action="" name="login">

                                <div class="col-lg-12 text-center">
                                        <h5>LOGIN</h5>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="contact-name">User name</label>
                                            <input class="form-control form-control-lg" name="username" id="contact-name" type="text">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="contact-phone">Password</label>
                                            <input class="form-control" name="password"  id="contact-phone" type="password">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 mt-5">
                                        <button name="login" type="submit" id="submit" class="rn-btn">
                                            <span>LOGIN</span>
                                            <i data-feather="arrow-right"></i>
                                        </button>
                                    </div>

                                    <div class="col-lg-12 mt-5 " >
                                        <div class="row">
                                             <div class="col-lg-6">
                                             <a href="#" style="">Back</a>
                                             <i data-feather="arrow-right"></i> 
                                             </div>    
                                             <div class="col-lg-6 text-right">
                                                  <a href="forgot-password.php" style="">Forgot Password?</a>
                                             <i data-feather="arrow-right"></i>
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
