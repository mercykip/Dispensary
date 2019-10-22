<?php 
include 'header.php';
if(!isset($_SESSION['lab'])){?>
    <script>window.location="http://localhost/Dispensary/login.php";</script><?php
    die();
}
include '../../classes/Crud.php';
$crud = new Crud();
 
//fetching data in descending order (lastest entry first)
$query = "SELECT * FROM lab";
$patients = $crud->getData($query);
?>

<div class="col-md-10 col-md-offset-1">
    <div class="panel panel-success">
        <div class="panel-heading">
            <div class="panel-title">patient Details</div>
        </div>
        <div class="panel-body">
   
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th> Registration</th>
                     <th>Test</th>
                      <th>Test Result</th>
                </tr>
                </thead>
                <tbody>
                <?php
                 foreach($patients as $patient):
                ?>
                <tr>
                    <td><?php echo $patient['pat_reg_no'] ?></td>
                    <td><?php echo $patient['test'] ?></td>
                     <td><?php echo $patient['test_status'] ?></td>
                         <!-- <td><a class="btn default btn-outline"  href="editmed.php?pharmacyId=<?php echo $patient[phar_id];?>"><i class="">Edit</i></a></li><td> -->
         
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