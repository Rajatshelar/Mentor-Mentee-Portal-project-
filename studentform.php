<?php
session_start();
if (isset($_SESSION['id']))
{
$id = $_SESSION['id'];
$nm = $_SESSION['name'];
}
else
header('location:index.php');

$_SESSION["file"]='teacher1';

if (isset($_POST['add'])) {
  $student_name = $_POST["student_name"];
  $prn = $_POST["prn"];
  $srollno = $_POST["srollno"];
  $department = $_POST["department"];
  $class = $_POST["class"];
  $division = $_POST["division"];
  $age = $_POST["age"];
  $gender = $_POST["gender"];
  $email = $_POST["email"];
  $mobile = $_POST["mobile"];
  $achievements = $_POST["achievements"];
  $address1 = $_POST["address1"];

  $_SESSION["file"] = 'studentinfo';
  include 'config.php';

  $sql = "INSERT INTO studentinfo (srollno,student_name, prn, department, class, division, age, gender, email, mobile, achievements, address1)
  VALUES ('$srollno','$student_name', '$prn', '$department', '$class', '$division', $age, '$gender', '$email', '$mobile', '$achievements', '$address1')";

      // echo $sql; exit;
    mysqli_set_charset($conn, 'utf8');

  // echo $sql; exit;
    if (mysqli_query($conn, $sql)) 
        {
        header('location:studentform.php');
    } else {
        echo "Error:". mysqli_error($conn);
    }
    mysqli_close($conn);
    }
    
    

?>



<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Student form </title>
    <!-- Custom CSS -->
    <link href="assets/libs/flot/css/float-chart.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== 
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <?php include 'topbar.php';?>
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
             <div class="scroll-sidebar">
               <?php include 'studentsidebar.php';?>
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
           
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Sales Cards  -->
                <!-- ============================================================== -->
                <div class="row">
                                     <?php include 'stat.php';?>


                                   
                                </div>
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                 <form method="POST" action="#" accept-charset="UTF-8" ><input name="_token" type="hidden">
                <div class="row">
                    <div class="col-md-8">
                      
                           
                    <div class="form-group row">
    <label class="col-sm-3 col-form-label">Student Name:</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" name="student_name" placeholder="Student Name" required>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-3 col-form-label">PRN:</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" name="prn" placeholder="PRN" required>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-3 col-form-label">Roll no:</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" name="srollno" placeholder="Roll no." required>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-3 col-form-label">Department:</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" name="department" placeholder="Department" required>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-3 col-form-label">Class:</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" name="class" placeholder="Class" required>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-3 col-form-label">Division:</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" name="division" placeholder="Division" required>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-3 col-form-label">Age:</label>
    <div class="col-sm-9">
        <input type="number" class="form-control" name="age" placeholder="Age" required>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-3 col-form-label">Gender:</label>
    <div class="col-sm-9">
        <select class="form-control" name="gender" required>
            <option value="">Select Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-3 col-form-label">Email:</label>
    <div class="col-sm-9">
        <input type="email" class="form-control" name="email" placeholder="Email" required>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-3 col-form-label">Mobile:</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" name="mobile" placeholder="Mobile" required>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-3 col-form-label">Achievements:</label>
    <div class="col-sm-9">
        <textarea class="form-control" name="achievements" placeholder="Achievements" required></textarea>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-3 col-form-label">Address:</label>
    <div class="col-sm-9">
        <textarea class="form-control" name="Address1" placeholder="Address" required></textarea>
    </div>
</div>


    
                                     
    <div class="form-group row">
                                      
                                      <input class="btn btn-info" id="to-recover" type="submit" value="Submit" name="add">

                              </div>

 


                                                    
                                        </table>

                                    </div>
                                    </div>

                                
                                
                            
                       
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Recent comment and chats -->
                <!-- ============================================================== -->
                   

                
        </form>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                All Right Reserved . Designed and Developed by Shelar.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!-- <script src="dist/js/pages/dashboards/dashboard1.js"></script> -->
    <!-- Charts js Files -->
    <script src="assets/libs/flot/excanvas.js"></script>
    <script src="assets/libs/flot/jquery.flot.js"></script>
    <script src="assets/libs/flot/jquery.flot.pie.js"></script>
    <script src="assets/libs/flot/jquery.flot.time.js"></script>
    <script src="assets/libs/flot/jquery.flot.stack.js"></script>
    <script src="assets/libs/flot/jquery.flot.crosshair.js"></script>
    <script src="assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="dist/js/pages/chart/chart-page-init.js"></script>

</body>

</html>