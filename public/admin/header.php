<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/log.jpg">
    <title>MULTIMEDIA UNIVERSITY DISPENSARY</title>
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="../plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">
                              
    <!-- color CSS -->
    <link href="css/colors/megna.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
                <div class="top-left-part"><a class="logo" href="adminpanel.php"><b><img style="width:50px; height: 50px;"  src=" ../plugins/images/mmulogo.jpg" alt="home" /></b><span class="hidden-xs"><strong>MULTIMEDIA</strong>DISPENSARY</span></a></div>
                
          
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- Left navbar-header -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse slimscrollsidebar">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search hidden-sm hidden-md hidden-lg">
                        <!-- input-group -->
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search..."> <span class="input-group-btn">
            <button class="btn btn-default" type="button"> <i class="fa fa-search"></i> </button>
            </span> </div>
                        <!-- /input-group -->
                    </li>
                    
                    <li class="nav-small-cap m-t-10">--- Main Menu</li>
                    <li> <a href="adminpanel.php" class="waves-effect"><i class="ti-dashboard p-r-10"></i> <span class="hide-menu">Dashboard</span></a> </li>
                      
                     <li> <a href="javascript:void(0);" class="waves-effect"><i class="ti-wallet p-r-10"></i> <span class="hide-menu">Schedule <span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                          <li> <a href="schedule.php">create schedule</a> </li>
                            <li> <a href="viewSchedule.php">view Schedule</a> </li>
                             <li> <a href="create_roles.php">create roles</a> </li> 
                        </ul>
                    </li>
                        <li> <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-user-md p-r-10"></i> <span class="hide-menu"> Employee <span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                          <li> <a href="userDetails.php">All Employees</a> </li>
                            <li> <a href="addUser.php">Add Employee</a> </li>
                        <li> <a href="userpersonalDetails.php">User Detailes</a> </li>

                        </ul>
                    </li>
                  
                    <li> <a href="javascript:void(0);" class="waves-effect active"><i class="icon-people p-r-10"></i> <span class="hide-menu">View comments <span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="viewcomments.php">view comments</a> </li>
                           
                      </ul>
                  </li>
                           <li> <a href="javascript:void(0);" class="waves-effect active"><i class="icon-people p-r-10"></i> <span class="hide-menu"> Patients <span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="patientsDetails.php">All Patients</a> </li>
                            <li> <a href="addPatient.php">Add Patient</a> </li>
                          <li> <a href="patientsPersonalDetails.php">Patients personal Details</a> </li>


                        </ul>
                    </li>                 
                    <li><a href="logout.php" class="waves-effect"><i class="icon-logout fa-fw"></i> <span class="hide-menu">Log out</span></a></li>
                    
                </ul>
            </div>
        </div>
        <!-- Left navbar-header end -->
    
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Dispensary Dashboard</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> <a href="" target="_blank" class=" pull-right m-l-20   hidden-xs hidden-sm waves-effect waves-light"></a>
                        <ol class="breadcrumb">
                            <li><a href="adminpanel.php">Dispensary</a></li>
                            <li class="active">Dashboard</li>
                             <li><a href="logout.php">Log out</a></li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!--row -->
