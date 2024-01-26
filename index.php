<?php
session_start();
if(isset($_POST['forget']))
{
header("location:forget.php");
}
if(isset($_POST['login']))
{
$e=$_POST['username'];
$p=$_POST['pass'];
$id=0;
$status="";
$name="";
$dept="";
include 'config.php';
$sql = "SELECT * from users where email='".$e."' and password='".$p."'";
//echo $sql; exit;
//connection conversion     
mysqli_set_charset( $conn, 'utf8');

$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    //echo mysqli_num_rows($result);
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
     
        $id=$row["id"];
        $status=$row["status1"];
    }
    
  // echo $s; exit;
    $_SESSION['id']=$id;
    $_SESSION['name']=$name;
     
    $_SESSION['status1']=$status;
    $status=trim($status);
 // echo $status; 
  if($status=="admin")
    {
       // echo "hi"; exit;
    header('Location:admin.php');
    }
    else if($status=='teacher')
    {
    header('Location:teacher.php');
    }
  else if($status=='student')
  {
  header('Location:student.php');
  }
  else if($status=='parent')
    {
    header('Location:parent.php');
    }
  

    
}
    else
    {
          
          header('Location:index.php');
    }

mysqli_close($conn);

}


?>


<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Log In</title>
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
    <div class="main-wrapper">
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
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
    <form method="POST" action="#" accept-charset="UTF-8" ><input name="_token" type="hidden">

        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
            <div class="auth-box bg-dark border-top border-secondary">

                <div id="loginform">
                                                 <span ><h3 class="card-title" style="color: whitesmoke; text-align: center;">Rayat Shikshan Sanstha's KBPCOE ,Satara</h3> </span>

                    <div class="text-center p-t-20 p-b-20">
                                                <span class="db"><img src="assets/images/logoo.png" alt="logo" /></span><br>

                        <span class="db"><img src="assets/images/text.png" alt="logo" /></span>
                    </div>
                    <!-- Form -->
                    <form class="form-horizontal m-t-20" id="loginform" action="index.html">
                        <div class="row p-b-30">
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control form-control-lg" placeholder="Username" aria-label="Username" name="username" aria-describedby="basic-addon1" required>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-warning text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                                    </div>
                                    <input type="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" name="pass" aria-describedby="basic-addon1" required>
                                </div>
                            </div>
                        </div>
                        <div class="row border-top border-secondary">
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="p-t-20">
                                    <center> <input class="btn btn-info" id="to-recover" type="submit" value="Login" name="login"></center>

                                       <!-- <input class="btn btn-success float-right" id="to-recover" type="submit" value="Lost password?" name="forget">-->
                                       
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!--
                    <div id="recoverform">
                    
                    <div class="row m-t-20">
                         Form 
                        <form class="col-12" action="index.html">
                             email 
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-danger text-white" id="basic-addon1"><i class="ti-email"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-lg" placeholder="Email Address" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        -->
                            <!-- pwd -->
                           <!-- <div class="row m-t-20 p-t-20 border-top border-secondary">
                                <div class="col-12">
                                    <a class="btn btn-success" href="#" id="to-login" name="action">Back To Login</a>
                                    <button class="btn btn-info float-right" type="button" name="action">Recover</button>
                                </div>
                            </div>-->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </form>
       
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>

    $('[data-toggle="tooltip"]').tooltip();
    $(".preloader").fadeOut();
    // ============================================================== 
    // Login and Recover Password 
    // ============================================================== 
    $('#to-recover').on("click", function() {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
    });
    $('#to-login').click(function(){
        
        $("#recoverform").hide();
        $("#loginform").fadeIn();
    });
    </script>

</body>

</html>