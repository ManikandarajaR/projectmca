<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['trmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {

$trmsaid=$_SESSION['trmsaid'];
$dname=$_POST['dname'];
$RegStd=$_POST['RegStd'];
$company=$_POST['company'];
$interviewdate=$_POST['interviewdate'];
$SelectedStd=$_POST['SelectedStd'];

$sql="insert into department (DepartmentName,Register_Student,CompanyName,InterviewDate,InterviewResult)values(:dname,:RegStd,:company,:interviewdate,:SelectedStd)";
$query=$dbh->prepare($sql);
$query->bindParam(':dname',$dname,PDO::PARAM_STR);
$query->bindParam(':RegStd',$RegStd,PDO::PARAM_STR);
$query->bindParam(':company',$company,PDO::PARAM_STR);
$query->bindParam(':interviewdate',$interviewdate,PDO::PARAM_STR);
$query->bindParam(':SelectedStd',$SelectedStd,PDO::PARAM_STR);
 $query->execute();

   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("Information has been added.")</script>';
echo "<script>window.location.href ='add-information.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}
}
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
   
    <title>TRMS Add </title>
  

    <link rel="apple-touch-icon" href="apple-icon.png">


    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body>
    <!-- Left Panel -->

    <?php include_once('includes/sidebar.php');?>

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php include_once('includes/header.php');?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Share Information</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="add-information.php">Share information</a></li>
                            <li class="active">Add</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-6"></div>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header"><strong>Information</strong><small> Details</small></div>
                              <form name="" method="post" action="" enctype="multipart/form-data">
                                   <div class="card-body card-block">
                                        <div class="form-group">
                                             <label for="company" class=" form-control-label">Department Name</label>
                                             <input type="text" name="dname" value="" class="form-control" id="tname" required="true">
                                        </div>                                
                                        <div class="row form-group">
                                             <div class="col-12">
                                                  <div class="form-group">
                                                       <label for="RegStd" class=" form-control-label">Registered Student</label>
                                                       <input type="text" name="RegStd" id="RegStd" value="" class="form-control" required="true">
                                                  </div>
                                             </div> 
                                        </div>
                                        <div class="row form-group">
                                             <div class="col-12">
                                                  <div class="form-group">
                                                       <label for="cname" class=" form-control-label">Drive </label>
                                                       <select type="text" name="company" id="company" value="" class="form-control" required="true">
                                                                 <?php 
                                                                      $sql2 = "SELECT * from   company ";
                                                                      $query2 = $dbh -> prepare($sql2);
                                                                      $query2->execute();
                                                                      $result2=$query2->fetchAll(PDO::FETCH_OBJ);

                                                                      foreach($result2 as $row)
                                                                      {          
                                                                      ?>  
                                                                      <option value="<?php echo htmlentities($row->CompanyName);?>">
                                                                           <?php echo htmlentities($row->CompanyName);?>
                                                            </option>
                                                                 <?php } ?> 
                                                       </select>
                                                   </div>
                                             </div>
                                        </div>
                                        
                                        <div class="row form-group">
                                             <div class="col-12">
                                                  <div class="form-group">
                                                       <label for="city" class=" form-control-label">Interview Date</label>
                                                       <input type="date" name="interviewdate" id="interviewdate" value="" class="form-control" required="true">
                                                  </div>
                                             </div>
                                        </div>
'                                       <div class="row form-group">
                                             <div class="col-12">
                                                  <div class="form-group">
                                                       <label for="SelectedStd" class=" form-control-label">Selected Student</label>
                                                       <input type="text" name="SelectedStd" id="SelectedStd" value="" class="form-control" required="true">
                                                  </div>
                                             </div> 
                                        </div>'
                                         <p style="text-align: center;">
                                             <button type="submit" class="btn btn-primary btn-sm" name="submit" id="submit">
                                             <i class="fa fa-dot-circle-o"></i>  Add
                                             </button>
                                         </p>
                                                    
                                   </div>
                              </form>
                    </div>                            
               </div>
          </div><!-- .animated -->
     </div><!-- .content -->
</div><!-- /#right-panel -->
                                <!-- Right Panel -->


                            <script src="vendors/jquery/dist/jquery.min.js"></script>
                            <script src="vendors/popper.js/dist/umd/popper.min.js"></script>

                            <script src="vendors/jquery-validation/dist/jquery.validate.min.js"></script>
                            <script src="vendors/jquery-validation-unobtrusive/dist/jquery.validate.unobtrusive.min.js"></script>

                            <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
                            <script src="assets/js/main.js"></script>
</body>
</html>
