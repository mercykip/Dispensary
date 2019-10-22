<?php 
session_start();
include 'header.php';
$crud = new Crud();
//$patient_id=$_GET['patient_id'];
 //$day=date("Y-m-d");
 //$query = "SELECT treatment.*,patient.*,  from treatment join patient on treatment.pat_reg_no=patient.pat_reg_no ";
 $query = "SELECT* FROM treatment ";
$report = $crud->getData($query);

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
                  
                    
                    <th>Reg No</th>
                    
                    <th>diagnosis</th>
                    <th>Prescription</th>
                </tr>
                </thead>
                <tbody>
               <?php
                 foreach($report as $rep):
                ?>
                <tr>
    
                     <td><?php echo $rep['pat_reg_no'] ?></td>
                    
                    <td><?php echo $rep['diagnosis'] ?></td>
                   <td><?php echo $rep['prescription'] ?></td>
                   
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