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
      
    body{
        
    }
</style>
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
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav" >
                   
                <?php
                    if(isset($_SESSION['nurse'])):
                    $nurse=$_SESSION['nurse'];
                    foreach($nurse as $user){
                       $nurse_id=$user['userId'];
                    }
                    ?>
                        <li><a href="patientsList.php">Diagonise Patient</a></li>
                        <li><a href="treatment.php">Treatment</a></li>
                        <li><a href="patientReport.php">Patient Report</a></li>
                       
                        
                    <?php 
                       elseif(isset($_SESSION['pharmacist'])): 
                        $pharmacist=$_SESSION['pharmacist'];
                        foreach($pharmacist as $pharmacis){
                        $pharmacist_id=$user['userId'];
                       }
                    ?>
                        <li><a href="pharmacy.php">Patient Medicine</a></li>
                        <li><a href="viewStatus.php">Status</a></li>
                       
                    <?php 
                       elseif(isset($_SESSION['reception'])): 
                        $reception=$_SESSION['reception'];
                        foreach($reception as $reception){
                        $reception_id=$user['userId'];
                       }
                    ?>
                       
                             <li><a href="addPatient.php">Add patient</a></li>
                                 <li><a href="searchPatient.php">search patient</a></li>
                              <li><a href="viewDetails.php">view Patients</a></li>
                             <li><a href="viewAttendance.php">Patients Attendance</a></li> 

                    <?php 
                       elseif(isset($_SESSION['lab'])): 
                        $lab=$_SESSION['lab'];
                        foreach($lab as $lab){
                        $lab_id=$user['userId'];
                       }
                    ?>
                       
                             <li><a href="lab.php">Laboratory</a></li>
                                 <li><a href="teststatus.php">view test</a></li>
                              


                        <?php
                        elseif(isset($_SESSION['user'])): 
                        $user=$_SESSION['user'];
                        foreach($user as $user){
                        $author=$user['userId'];

                    ?>
                       
                       
                    <?php }?>
                        
                    <?php else: ?>
                        
                    <?php endif; ?>                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <?php if(isset($_SESSION['nurse'])|| isset($_SESSION['lab']) || isset($_SESSION['reception']) || isset($_SESSION['pharmacist'])) : ?>
                    <li>
                        <a href="logout.php">Logout</a>
                    </li>
                    <?php endif; ?>
                </ul>
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