<?php
session_start();
if (isset($_SESSION['id']))
{
$id = $_SESSION['id'];
$nm = $_SESSION['name'];
}
else
header('location:index.php');



if (isset($_POST['add']))
{        
   
    include 'config.php'; 
    $sql = "select * from employee order by date_format(str_to_date(app_date, '%d-%m-%Y'), '%Y-%m-%d'),date_format(str_to_date(dob, '%d-%m-%Y'), '%Y-%m-%d') ASC"; 
              //echo $sql; exit;
    mysqli_set_charset($conn, 'utf8');

   $result = mysqli_query($conn, $sql);
   $cnt=1;
                                                        
                                                        if (mysqli_num_rows($result) > 0) {
                                                        
                                                            // output data of each row
                                                            while($row = mysqli_fetch_assoc($result)) {
                                                             
                                                           $s=$cnt; 
                                                           $i=$row['id'];    
                                                           $n=$row['name'];
                                                           $ad=$row['app_date'];
                                                           $dob=$row["dob"];
                                                           $caste=$row['app_caste'];
                                                           

                                                                 $sql1 = "INSERT INTO `seniority`(`id`, `name`, `app_date`, `dob`, `seniority`, `app_caste`) VALUES (".$i.",'".$n."','".$ad."','".$dob."','".$s."','".$caste."')";
                                                                 //  echo $sql1; exit;
    mysqli_set_charset($conn, 'utf8');

  // echo $sql; exit;
    if (mysqli_query($conn, $sql1)) 
        {
       // header('location:seniority.php');
    } else {
        echo "Error:". mysqli_error($conn);
    }




                                                                                                                
                                                       /* echo "|".$s."|".$i."|".$n."|".$ad."|".$caste."|".$dob."<br>";*/
                                                        $cnt++;
                                                        }
                                                        }
                                                        mysqli_close($conn);
                                                 
  }  




/*if (isset($_POST['add_bindu']))
{        
   
    include 'config.php'; 
    $sql = "select  from seniority where app_caste="SC" and type<>"Retired"; 
          //echo $sql; exit;
    mysqli_set_charset($conn, 'utf8');

   $result = mysqli_query($conn, $sql);
   $cnt=1;
                                                        
                                                        if (mysqli_num_rows($result) > 0) {
                                                        
                                                            // output data of each row
                                                            while($row = mysqli_fetch_assoc($result)) {
                                                             
                                                           $s=$cnt; 
                                                           $i=$row['id'];    
                                                           $n=$row['name'];
                                                           $ad=$row['app_date'];
                                                           $dob=$row["dob"];
                                                           $caste=$row['app_caste'];
                                                           $type=$row['type'];
                                                           

                                                                 $sql1 = "INSERT INTO `seniority`(`id`, `name`, `app_date`, `dob`, `seniority`, `app_caste`) VALUES (".$i.",'".$n."','".$ad."','".$dob."','".$s."','".$caste."','".$type."')";
                                                                 //  echo $sql1; exit;
    mysqli_set_charset($conn, 'utf8');

  // echo $sql; exit;
    if (mysqli_query($conn, $sql1)) 
        {
       // header('location:seniority.php');
    } else {
        echo "Error:". mysqli_error($conn);
    }
*/



                                                                                                                
                                                       /* echo "|".$s."|".$i."|".$n."|".$ad."|".$caste."|".$dob."<br>";*/
                                                      /*  $cnt++;
                                                        }
                                                        }
                                                        mysqli_close($conn);

  }  */


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
    <title>बिंदू-नामावली </title>
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
    <!-- ============================================================== -->
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
               <?php include 'sidebar.php';?>
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
                                        <h4 class="card-title">Seniority List</h4>
                                        
                                     <div class="form-group row">
                                      
                                            <input class="btn btn-info" id="to-recover" type="submit" value="Generate Seniority List" name="add">

                                    </div>
                                    <div class="form-group row">
                                      
                                            <input class="btn btn-info" id="to-recover" type="submit" value="Assign Bindu Number" name="add_bindu">

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
                All Right Reserved . Designed and Developed by Prof. Dipali Dayanand Ghatge.
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