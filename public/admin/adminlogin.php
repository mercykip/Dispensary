<?php
session_start();
include_once("../../classes/Crud.php");
$crud = new Crud();
if(isset($_POST['login'])){
$email=$_POST['email'];
$password=$_POST['password'];

//admin login
$admin_query = "SELECT * FROM mmuemployee WHERE email='$email' and password='$password' and role_id=1";
$admin = $crud->getData($admin_query);

if($admin==true){
   $_SESSION['admin']=$admin; 
   header("Location: adminpanel.php"); 
}

else{?>
    <script type="text/javascript">
        alert("Invalid username or password");
    </script><?php
    //header("Location: login.php"); 
}
    
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title>Elite Hospital Admin Template - Hospital admin dashboard web app kit</title>
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
                              
    <!-- color CSS -->
    <link href="css/colors/megna.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body >
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <section id="wrapper" class="login-register" style="background-color: #222;">

        <div class="login-box login-sidebar" style="background-color: #222;margin: 100px auto;position:relative;border:1px solid rgb(3, 169, 243);height:390px;border-radius:3px;">
            <div class="white-box" style="padding-top:50px;">
                <form class="form-horizontal form-material" method="POST" id="loginform" action="">
                    <!-- <a href="javascript:void(0)"><img  style="width:30px; height: 30px;" src="../plugins/images/log.jpg" alt="Home" /> -->
                        <h2><center>ADMIN LOGIN</center></h2>
                        <br/>
                    <div class="form-group m-t-40">
                        <div class="col-xs-12">
                            <input class="form-control text-center" type="email" name="email" required="" placeholder="Username"> </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control text-center" type="password" name="password" required="" placeholder="Password"> </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" name="login" type="submit">Log In</button>
                        </div>
                 </form>
                
            </div>
        </div>
    </section>
   </div>
  
    <!-- jQuery -->
    <script src="../plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/dist/js/tether.min.js"></script>
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>
    <!--Style Switcher -->
    <script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>