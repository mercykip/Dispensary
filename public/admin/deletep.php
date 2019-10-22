<?php
//including the database connection file
include("../../classes/Constant.php");


 $con=new DbConfig();//creating object con

//getting userid of the data from url
 	
$patientId = $_GET['patientId'];

$patients=$con->connection->query("DELETE FROM patient WHERE pat_id='$patientId'");

if ($patients) {
   
    header("Location:patientspersonalDetails.php"); 
     echo "<font color='red'>Patient deleted successfully.";
}

?>
<?php
include 'footer.php';
?>
