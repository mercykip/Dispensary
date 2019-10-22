<?php 
include 'header.php';
if(!isset($_SESSION['admin'])){?>
    <script>window.location="http://localhost/Dispensary/public/admin/adminlogin.php";</script><?php
    die();
}
include '../../classes/Crud.php';
$crud = new Crud();
 
//fetching data in descending order (lastest entry first)
$query = "SELECT * FROM patient";
$patients = $crud->getData($query);
?>

<div class="col-md-10 col-md-offset-1">
    <div class="panel panel-success">
        <div class="panel-heading">
            <div class="panel-title">patien Details</div>
        </div>
        <div class="panel-body">
         <!--  <form method="post" action="printTicket.php">
             <input type="submit" name="create_pdf" class="btn btn-success" value="patiene"/>
          </form> -->
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th> Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                     <th>Registration number</th>
                     <th>DoB</th>
                      <th>Age</th>
                       <th>Gender</th>
                       
                     <th>Action</th>
                     <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php
                 foreach($patients as $patient):
                ?>
                <tr>
                    <td><?php echo $patient['pat_name'] ?></td>
                    <td><?php echo $patient['pat_email'] ?></td>
                    <td><?php echo $patient['pat_phone_number'] ?></td>
                     <td><?php echo $patient['pat_reg_no'] ?></td>
                     <td><?php echo $patient['dob'] ?></td>
                    <td><?php echo $patient['age'] ?></td>
                    <td><?php echo $patient['gender'] ?></td>
                     
                      <td><a class="btn default btn-outline"  href="patientReport.php?patieneId=<?php echo $patient[patient_id];?>"><i class="icon-link">Report</i></a></li></td>
                       
                          <td><a class="btn btn-danger"  href="deletep.php?patientId=<?php echo $patient[pat_id];?>"><i class="icon-link">Delete</i></a></td>
                </tr>
                
                <?php
                endforeach;
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
  </div>  

         <?php
               include('footer.php');
               ?>