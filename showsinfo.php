<?php
session_start();
include 'config.php';

if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $nm = $_SESSION['name'];
} else {
    header('location:index.php');
}

$_SESSION["file"] = 'teacher1';

if (isset($_POST['roll_no'])) {
    $roll_no = $_POST['roll_no'];

    $sql = "SELECT * FROM studentinfo WHERE srollno = '$roll_no'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $student_name = $row['student_name'];
        $prn = $row['prn'];
        $srollno = $row['srollno'];
        $department = $row['department'];
        $class = $row['class'];
        $division = $row['division'];
        $age = $row['age'];
        $gender = $row['gender'];
        $email = $row['email'];
        $mobile = $row['mobile'];
        $achievements = $row['achievements'];
        $address1 = $row['address1'];
    } else {
        echo "No record found for the given roll number.";
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
    <title>student info </title>
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
               <?php include 'teachersidebar.php';?>
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
                                <h4 class="card-title">Student Information</h4>
                                <form method="POST" action="#">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Enter Roll Number:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="roll_no" placeholder="Enter Roll Number" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-9 offset-sm-3">
                                            <button type="submit" class="btn btn-primary">Get Information</button>
                                        </div>
                                    </div>
                                </form>
                                <?php if (isset($student_name)): ?>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Student Name:</label>
        <div class="col-sm-9">
            <p><?php echo $student_name; ?></p>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">PRN:</label>
        <div class="col-sm-9">
            <p><?php echo $prn; ?></p>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Roll Number:</label>
        <div class="col-sm-9">
            <p><?php echo $srollno; ?></p>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Department:</label>
        <div class="col-sm-9">
            <p><?php echo $department; ?></p>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Class:</label>
        <div class="col-sm-9">
            <p><?php echo $class; ?></p>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Division:</label>
        <div class="col-sm-9">
            <p><?php echo $division; ?></p>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Age:</label>
        <div class="col-sm-9">
            <p><?php echo $age; ?></p>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Gender:</label>
        <div class="col-sm-9">
            <p><?php echo $gender; ?></p>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Email:</label>
        <div class="col-sm-9">
            <p><?php echo $email; ?></p>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Mobile:</label>
        <div class="col-sm-9">
            <p><?php echo $mobile; ?></p>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Achievements:</label>
        <div class="col-sm-9">
            <p><?php echo $achievements; ?></p>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Address:</label>
        <div class="col-sm-9">
            <p><?php echo $address1; ?></p>
        </div>
    </div>
<?php else: ?>
    <div class="form-group row">
        <div class="col-sm-9 offset-sm-3">
            <p>No record found for the given roll number.</p>
        </div>
    </div>
<?php endif; ?>
``
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


