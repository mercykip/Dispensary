<?php 
session_start();
include 'header.php';
if(!isset($_SESSION['nurse'])){?>
    <script>window.location="http://localhost/Dispensary/login.php";</script><?php
    die();
}
$crud = new Crud();
//	 $day=date("Y-m-d");
//fetching data in descending order (lastest entry first)
$query = "SELECT patient.pat_name,patient.pat_reg_no,Patient.age,mmuemployee.emp_name,treatment.diagnosis,treatment.prescription,medicine.med_name,ticket.time from patient join treatment on treatment.pat_id=patient.pat_id join mmuemployee on mmuemployee.emp_id=treatment.emp_id , mmuemployee.emp_id=lab.emp_id, mmuemployee.emp_id=pharmacy.emp_id join medicine on medicine.med_id=treatment.med_id join ticket on ticket.pat_reg_no=patient.pat_reg_no ";
$report = $crud->getData($query);

?>

<div class="col-md-10 col-md-offset-1">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="panel-title">Patient Report</div>
        </div>
        <div class="panel-body">
            
            <br/>
            <hr/>
            <table class="table table-bordered">
                <thead>
                <tr>
                  
                    <th>Patient Name</th>
                    <th>Patient Reg No</th>
                    <th>Nurse Name</th>
                    <th>Labspecialist Name</th>
                    <th>Patient Age</th>
                    <th>Nurse Name</th>
                    <th>Prescription</th>
                    <th>Diagnosis</th>
                    <th>Medicine</th>
                    <th>Date</th>
                
                 
                </tr>
                </thead>
                <tbody>
                <?php
                foreach($report as $rep):
                ?>
                <tr>
                    
                    <td><?php echo $rep['pat_name'] ?></td>
                    <td><?php echo $rep['pat_reg_no'] ?></td>
                    <td><?php echo $rep['emp_name'] ?></td>
                    <td><?php echo $rep['age'] ?></td>
                    <td><?php echo $rep['prescription'] ?></td>
                    <td><?php echo $rep['diagnosis'] ?></td>
                    <td><?php echo $rep['med_name'] ?></td>
                    <td><?php echo $rep['time'] ?></td>
                  
                </tr>
                
                <?php
                endforeach;
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
include 'footer.php';
?>