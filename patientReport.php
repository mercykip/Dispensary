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
$query = "SELECT patient.*, lab.*,pharmacy.* from lab join patient on lab.pat_reg_no=patient.pat_reg_no join pharmacy on pharmacy.pat_reg_no=Patient.pat_reg_no";
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
                     <th>Medicine</th>
                    <th>Medical status</th>
                    <th>Test</th>
                    <th>Test Result</th>
                    <th>Report</th>
                
                 
                </tr>
                </thead>
                <tbody>
                <?php
                foreach($report as $rep):
                ?>
                <tr>
                    
                    <td><?php echo $rep['pat_name'] ?></td>
                    <td><?php echo $rep['pat_reg_no'] ?></td>
                     <td><?php echo $rep['med_id'] ?></td>
                     <td><?php echo $rep['med_status'] ?></td>
                    <td><?php echo $rep['test'] ?></td>
                    <td><?php echo $rep['test_status'] ?></td>
                    <td><a class=""  href="treatmentReport.php?"><i class="icon-link">PatientReport</i></a></td>
                   
                     </tr>
                  
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