<?php
//including the database connection file
include_once("classes/Constant.php");

 //$con=new DbConfig();//creating object con

//getting userid of the data from url
 	
$patientId = $_GET['patientId'];

$patien=$con->connection->query("DELETE FROM patient WHERE pat_id='$patientId'");

if ($patien) {
   
    header("Location:viewDetails.php");
   
}
$employeeId = $_GET['employeeId'];

$employee=$con->connection->query("DELETE FROM mmuemployee WHERE emp_id='$employeeId'");

if ($patien) {
   
    header("Location:viewDetails.php");
   
}
?>
<?php
include 'footer.php';
?>