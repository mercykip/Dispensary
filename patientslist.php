<?php 
session_start();
include 'header.php';
$crud = new Crud();
//$patient_id=$_GET['patient_id'];
 $day=date("Y-m-d");
//fetching data in descending order (lastest entry first)
$query = "SELECT patient.pat_id,patient.pat_name,patient.pat_reg_no,patient.age,ticket.time from patient join ticket on ticket.pat_reg_no=patient.pat_reg_no where ticket.time='$day'";
$patients  = $crud->getData($query);
?>

<div class="col-md-10 col-md-offset-1">
    <div class="panel panel-primary">
        <div class="panel-heading" style="background-color:#4062a0;border-color: #4062a0;">
            <div class="panel-title">Patient Today</div>
        </div>
        <div class="panel-body">
    
            <table class="table table-bordered">
                <thead>
                <tr>
                  
                    <th>Name</th>
                    <th>Reg No</th>
                    <th>Age</th>
                    <th>Time</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
               <?php
                 foreach($patients as $patient):
                ?>
                <tr>
                    <td><?php echo $patient['pat_name'] ?></td>
                     <td><?php echo $patient['pat_reg_no'] ?></td>
                    <td><?php echo $patient['age'] ?></td>
                    <td><?php echo $patient['time'] ?></td>
                     <td><a class=""  href="treatment.php?patientId=<?php echo $patient[pat_id];?>"><i class="icon-link">Diagonise</i></a></td>
                   
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