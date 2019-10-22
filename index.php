<?php
include 'home.php';

include_once("classes/Crud.php");
 
$crud = new Crud();

 $fname="";
 $comment="";
 
if(isset($_POST['submit'])) {    
    $fname = $_POST['fname'];
    $comment= $_POST['comment'];
}
$result = $crud->execute("INSERT INTO `comments` (`fname`, `comment`) VALUES ('$fname', '$comment')");
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" c
      ontent="">
    <meta name="author" content="">

    <title>Dispensary</title>

    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <link rel="stylesheet" type="text/css" href="">
</head>
 
</head>
<body>
    
<!--modal-->
<center><div class="container" >
    <div id="mycarousel" class="carousel slide" data-ride="carousel" >
        <ol class="carousel-indicators"> 
           <li data-target="#mycarousel" data-slide-to="0"></li> 
           <li data-target="#mycarousel" data-slide-to="1"></li> 
           <li data-target="#mycarousel" data-slide-to="2"></li> 
        </ol>
        <div class="carousel-inner">
           <div class="item active">
 <img src="./image/adm.jpg" style="width: 100%; height: 300px;">
            <div class="carousel-caption">
                <p >
                <h2 style="color: black;">welcome all to Multimedia University dispensary</h2>
                <img src="./image/adm.jpg">
                <button type="button" class="btn btn-lg btn-success"><a href="index.php">click to Comment </a> </button>
            </div>
           </div>
           <div class="item ">
             <img src="./image/lab.jpg" style="width: 100%; height: 300px;">
            <div class="carousel-caption">
                <p>
                   <h2 style="color: black;">welcome all to Multimedia University dispensary</h2>
      
               
            </div>
           </div>
           <div class="item " >
           <img src="./image/buz.jpg" style="width: 100%; height: 300px;">
            <div class="carousel-caption">
                <p >
             <h2 style="color: black;">welcome all to Multimedia University dispensary</h2>
    
               
            </div>
           </div>
        </div>
        <a href="#mycarousel" class="left carousel-control" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
        <a href="#mycarousel" class="right carousel-control" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div>
</div>
</center>
<!--grouping using rows and cols -->



<div class="card-body">
 
<form method="POST" action="<?php echo $_SERVER ['PHP_SELF'];?>" role="form">
  <div class="row" style="padding: 17px 800px 70px 100px;"> 
       <h2 style="color: black;">feedback</h2> <i style="color: black;">please fill in the form</i></center><br>
      <div class="form-group">
      <div><label for="name">First Name</label></div>
      <input type="text"  name="fname"  class="form-control" style="background: #bbc8ce;" >
      </div>
      
      <div class="form-group">
            <label for="comment">comment</label>
            <textarea class="form-control" cols="50" rows="10" name="comment" style="background: #bbc8ce;" placeholder="enter comment" ></textarea>
        </div>
            <div class="form-group">
            <button type="submit" name="submit" class="btn btn-success btn-md">submit</button>
            <button type="reset" class="btn btn-danger btn-md">cancel</button>
        </div>
  </form>
</div>
</center>
</div>
<footer>
    <nav class="navbar navbar-inverse navbar-static-bottom">
       <div class="navbar-text"></div>
       <div class="pull-right">
           <a href="www.facebook.com"><i class="fa fa-facebook fa-2x"></i></a>
           <a href="www.facebook.com"><i class="fa fa-youtube fa-2x"></i></a>
           <a href="www.facebook.com"><i class="fa fa-twitter fa-2x"></i></a>
           <a href="www.facebook.com"><i class="fa fa-google-plus fa-2x"></i></a>
       </div>
    </nav>
</footer>









<!-- jQuery -->
    <script src="jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" integrity="sha384-mE6eXfrb8jxl0rzJDBRanYqgBxtJ6Unn4/1F7q4xRRyIw7Vdg9jP4ycT7x1iVsgb" crossorigin="anonymous"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Theme JavaScript -->
<!--     <script src="js/agency.min.js"></script> -->
</body>
</html> 