<?php
session_start();
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $nm = $_SESSION['name'];
} else {
    header('location:index.php');
}

$_SESSION["file"] = 'teacher1';

$successMessage = '';

if (isset($_POST['add'])) {
    $srollno = $_POST["srollno"];
    $pname = $_POST["pname"];
    $pmobile = $_POST["pmobile"];
    $pemail = $_POST["pemail"];
    $poccupation = $_POST["poccupation"];

    $_SESSION["file"] = 'parentinfo';
    include 'config.php';

    $sql = "INSERT INTO parentinfo (srollno, pname, pmobile, pemail, poccupation) 
    VALUES ('".$srollno."','".$pname."','".$pmobile."', '".$pemail."','".$poccupation."')";

    mysqli_set_charset($conn, 'utf8');

    if (mysqli_query($conn, $sql)) {
        $successMessage = "Form submitted successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>

<!-- Display the success message -->
<?php if (!empty($successMessage)) : ?>
    <div><?php echo $successMessage; ?></div>
<?php endif; ?>

<!-- Add the rest of your HTML form here -->
<!-- ... -->




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
    <title>Add Parent Information </title>
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
                      
                    
                                
                                    <div>
                                        <h4 class="card-title">Add Parent Information </h4>
                                        <div class="form-group row">
                                      
                                      <input type="int" class="form-control" name ="srollno" placeholder="Your Roll no." required><p><p>

                              </div>
                                         <div class="form-group row">
                                      
                                            <input type="text" class="form-control" name ="pname" placeholder="Parent Name"><p><p>

                                    </div>

                                    <div class="form-group row">
                                      
                                            <input type="int" class="form-control" name ="pmobile" placeholder="Parent's mobile number"><p><p>

                                    </div>
                                    <div class="form-group row">
                                      
                                            <input type="email" class="form-control" name ="pemail" placeholder="E-mail"><p><p>

                                    </div>
                                    <div class="form-group row">
                                      
                                      <input type="text" class="form-control" name ="poccupation" placeholder="Occupation"><p><p>

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