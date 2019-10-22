<?php
//starting the session
session_start();
//including the database connection file
include_once("classes/Crud.php");

?>
<!DOCTYPE html>
<!-- saved from url=(0027)https://arawa-sys.com/login -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="Cg0eT2Rn69FgaziqCs1Y9X2XMjAlFF7aA62jR4Ap">

    <title>
           Multimedia Dispensary
    </title>

    <!-- Styles -->
     <link href="css/agency.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="">
      <script src="myscript.js"></script>
    <link href="./public/app.css" rel="stylesheet">
    <link href="./public/sweetalert.css" rel="stylesheet">
    <script src="./public/jquery.min.js"></script>
    <script src="./public/jquery.datetimepicker.js"></script>
    <style type="text/css">
        .panel-primary>.panel-heading{
            background-color:#4062a0;
            border-color: #4062a0;
        }
    </style>
</head>
<body>
<div id="app">
    
    <nav class="navbar navbar-default navbar-static-top" style="background: #01c0c8;color:#222;">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="index.php" style="color:#000;">
                   Multimedia Dispensary
                </a>
                 <a class="navbar-brand" href="login.php" pull-right     style="color:#000;">
                 login
                </a>
                 <a class="navbar-brand" href="./public/admin/adminlogin.php" class="navbar-collapse collapse pull-right"class="icon-circle"   style="color:#000;">admin
                 
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav" >
             
            </div>
        </div>
        <form class="form-horizontal logout_form" method="post" action="https://arawa-sys.com/logout">
            <input type="hidden" name="_token" value="Cg0eT2Rn69FgaziqCs1Y9X2XMjAlFF7aA62jR4Ap">
        </form>
    </nav>
    <div class="row system-container">
<?php
include 'footer.php';
?>