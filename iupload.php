<?php
session_start();
if (isset($_SESSION['id']))
{
$id = $_SESSION['id'];
$nm = $_SESSION['name'];
}
else
header('location:index.php');

$_SESSION["file"]='type';

if (isset($_POST['add']))
{        
    $val=$_POST["type"];  
    
    //echo $val;                          
    $_SESSION["file"]='type';
    include 'config.php'; 
    $sql = "INSERT INTO type(type) VALUES ('".$val."')";
      //echo $sql; exit;
    mysqli_set_charset($conn, 'utf8');

  // echo $sql; exit;
    if (mysqli_query($conn, $sql)) 
        {
        header('location:type.php');
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
    <!-- ============================================================== 
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>-->
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
               <?php include 'adminsidebar.php';?>
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
                                        <h4 class="card-title">Enter Employee Data</h4>
                                         <div class="form-group row">
                                      
                                            <input type="text" class="form-control" name ="fname" placeholder="Enter Full Name (Surname first)"><p><p>

                                    </div>
                                    
                                    <div class="form-group row">
                                      
                                            <select class="form-control" name ="gender">
                                                <option value=""> Gender</option>
                                                <option value="Male">Male</option>
                                                 <option value="Female">Female</option>
                                                  <option value="Other">Other</option>
                                            </select>

                                    </div>
                                   <div class="form-group row">
                                      
                                            <select class="form-control" name ="cat_app">
                                                <option value=""> Caste category at the time of actual appointment</option>
                                                
                                                 <?php
                                                 include 'config.php';
                                                        $sql = "SELECT * from catagory ORDER BY catagory ASC";
                                                        //echo $sql; exit;
                                                        mysqli_set_charset( $conn, 'utf8');
                                                        $result = mysqli_query($conn, $sql);
                                                        
                                                        if (mysqli_num_rows($result) > 0) 
                                                        {
                                                        
                                                            // output data of each row
                                                            while($row = mysqli_fetch_assoc($result)) 
                                                            {
                                                             
                                                                $d=$row["catagory"];
                                                               
                                                        ?>
                                                        <option value="<?php echo $d;?>"><?php echo $d;?></option>
                                                      
                                                         <?php
                                                        }
                                                        }
                                                        mysqli_close($conn);
                                                        ?>


                                                  
                                            </select>

                                    </div>

                                    <div class="form-group row">
                                      
                                            <select class="form-control" name ="cat">
                                                <option value=""> Actual category </option>
                                                
                                                 <?php
                                                 include 'config.php';
                                                        $sql = "SELECT * from catagory ORDER BY catagory ASC";
                                                        //echo $sql; exit;
                                                        mysqli_set_charset( $conn, 'utf8');
                                                        $result = mysqli_query($conn, $sql);
                                                        
                                                        if (mysqli_num_rows($result) > 0) 
                                                        {
                                                        
                                                            // output data of each row
                                                            while($row = mysqli_fetch_assoc($result)) 
                                                            {
                                                             
                                                                $d=$row["catagory"];
                                                               
                                                        ?>
                                                        <option value="<?php echo $d;?>"><?php echo $d;?></option>
                                                      
                                                         <?php
                                                        }
                                                        }
                                                        mysqli_close($conn);
                                                        ?>


                                                  
                                            </select>

                                    </div>
                                       <div class="form-group row">
                                      
                                            <select class="form-control" name ="caste">
                                                <option value=""> Caste </option>
                                                
                                                 <?php
                                                 include 'config.php';
                                                        $sql = "SELECT * from caste ORDER BY caste ASC";
                                                        //echo $sql; exit;
                                                        mysqli_set_charset( $conn, 'utf8');
                                                        $result = mysqli_query($conn, $sql);
                                                        
                                                        if (mysqli_num_rows($result) > 0) 
                                                        {
                                                        
                                                            // output data of each row
                                                            while($row = mysqli_fetch_assoc($result)) 
                                                            {
                                                             
                                                                $d=$row["caste"];
                                                               
                                                        ?>
                                                        <option value="<?php echo $d;?>"><?php echo $d;?></option>
                                                      
                                                         <?php
                                                        }
                                                        }
                                                        mysqli_close($conn);
                                                        ?>


                                                  
                                            </select>

                                    </div>
                                         <div class="form-group row">
                                      
                                            <select class="form-control" name ="year">
                                                <option value=""> Recruitment Year </option>
                                                
                                                 <?php
                                                 include 'config.php';
                                                        $sql = "SELECT * from ryear ORDER BY year ASC";
                                                        //echo $sql; exit;
                                                        mysqli_set_charset( $conn, 'utf8');
                                                        $result = mysqli_query($conn, $sql);
                                                        
                                                        if (mysqli_num_rows($result) > 0) 
                                                        {
                                                        
                                                            // output data of each row
                                                            while($row = mysqli_fetch_assoc($result)) 
                                                            {
                                                             
                                                                $d=$row["year"];
                                                               
                                                        ?>
                                                        <option value="<?php echo $d;?>"><?php echo $d;?></option>
                                                      
                                                         <?php
                                                        }
                                                        }
                                                        mysqli_close($conn);
                                                        ?>


                                                  
                                            </select>

                                    </div>
                                    <div class="form-group row">
                                      
                                           <label > Date of Appointment</label> <input class="form-control" type="date" name="appointment">

                                    </div>
                                     <div class="form-group row">
                                      
                                           <label > Date of Birth</label> <input class="form-control" type="date" name="dob">

                                    </div>
                                      <div class="form-group row">
                                      
                                           <label > Date of Retirement</label> <input class="form-control" type="date" name="retirement">

                                    </div>


                                    <div class="form-group row">
                                      
                                            <select class="form-control" name ="validity">
                                                <option value=""> Has caste validity been checked?</option>
                                                <option value="Yes">Yes</option>
                                                 <option value="No">No</option>
                                                  <option value="NA">Not Applicable</option>
                                            </select>

                                    </div>
                                     <div class="form-group row">
                                      
                                         <input type="text" class="form-control" name ="validityno" placeholder="Caste validity check number and date(dd/mm/yyyy)"><p><p>
                                </div>
                                   <div class="form-group row">
                                      
                                            <select class="form-control" name ="committee">
                                                <option value=""> Name of Caste Validity committee </option>
                                                
                                                 <?php
                                                 include 'config.php';
                                                        $sql = "SELECT * from committee ORDER BY cname ASC";
                                                        //echo $sql; exit;
                                                        mysqli_set_charset( $conn, 'utf8');
                                                        $result = mysqli_query($conn, $sql);
                                                        
                                                        if (mysqli_num_rows($result) > 0) 
                                                        {
                                                        
                                                            // output data of each row
                                                            while($row = mysqli_fetch_assoc($result)) 
                                                            {
                                                             
                                                                $d=$row["cname"];
                                                               
                                                        ?>
                                                        <option value="<?php echo $d;?>"><?php echo $d;?></option>
                                                      
                                                         <?php
                                                        }
                                                        }
                                                        mysqli_close($conn);
                                                        ?>


                                                  
                                            </select>

                                    </div>

                                    <div class="form-group row">
                                      
                                            <select class="form-control" name ="type">
                                                <option value=""> Type </option>
                                                
                                                 <?php
                                                 include 'config.php';
                                                        $sql = "SELECT * from type ORDER BY type ASC";
                                                        //echo $sql; exit;
                                                        mysqli_set_charset( $conn, 'utf8');
                                                        $result = mysqli_query($conn, $sql);
                                                        
                                                        if (mysqli_num_rows($result) > 0) 
                                                        {
                                                        
                                                            // output data of each row
                                                            while($row = mysqli_fetch_assoc($result)) 
                                                            {
                                                             
                                                                $d=$row["type"];
                                                               
                                                        ?>
                                                        <option value="<?php echo $d;?>"><?php echo $d;?></option>
                                                      
                                                         <?php
                                                        }
                                                        }
                                                        mysqli_close($conn);
                                                        ?>


                                                  
                                            </select>

                                    </div>

                                        <div class="form-group row">
                                      
                                         <input type="text" class="form-control" name ="current" placeholder="Current School/college"><p><p>
                                </div>

                                 <div class="form-group row">
                                      
                                         <input type="text" class="form-control" name ="remarks" placeholder="Remarks"><p><p>
                                </div>

                                     
                                     <div class="form-group row">
                                      
                                            <input class="btn btn-info" id="to-recover" type="submit" value="Submit" name="add">

                                    </div>
                                        <div>
                                       <div class="table-responsive" class="class="col-12">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr style="background-color: lightskyblue; font-weight: bolder;">
                                                <th>Name</th><th>Gender</th><th>Caste category at the time of actual appointment </th><th>Catagory</th> <th>Caste</th> <th>Year</th> <th>Date of appointment</th> <th>Date of Birth</th> <th>Date of Retirement</th> <th>Validity Done?</th> <th>Validity Number and Date</th> <th>Name of validity Committee </th> <th>Type</th> <th>Current School/College</th><th>Remarks</th><th>Update</th><th>Delete</th>                                      
                                            </tr>
                                        </thead>
                                        
                                           
                                               
 <?php

                                                        include 'config.php';
                                                        $sql = "SELECT * from type ORDER BY type ASC";
                                                        //echo $sql; exit;
                                                        mysqli_set_charset( $conn, 'utf8');
                                                        $result = mysqli_query($conn, $sql);
                                                        
                                                        if (mysqli_num_rows($result) > 0) {
                                                        
                                                            // output data of each row
                                                            while($row = mysqli_fetch_assoc($result)) {
                                                             
                                                                $d=$row["type"];
                                                               
                                                        ?>
                                                        <tr><td><?php echo $d;?></td>
                                                       <td><?php echo "<a href=\"delete.php?id=".$row['id']."\">Delete</a>";?></td>
                                                        </tr>
                                                        <?php
                                                        }
                                                        }
                                                        mysqli_close($conn);
                                                        ?>


                                                    
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