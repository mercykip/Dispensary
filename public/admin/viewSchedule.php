<?php 
include 'header.php';
if(!isset($_SESSION['admin'])){?>
    <script>window.location="http://localhost/Dispensary/public/admin/adminlogin.php";</script><?php
    die();
}
include '../../classes/Crud.php';
$crud = new Crud();
 
//fetching data in descending order (lastest entry first)
$query = "SELECT * FROM schedule";
$schedul = $crud->getData($query);

?>

<div class="col-md-10 col-md-offset-1">
    <div class="panel panel-success">
        <div class="panel-heading">
            <div class="panel-title">Schedule</div>
        </div>
        <div class="panel-body">
         <!--  <form method="post" action="printTicket.php">
             <input type="submit" name="create_pdf" class="btn btn-success" value="schedule"/>
          </form> -->
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Nurse Name</th>
                    <th>Status:</th>
                    <th>Duration</th>
                     <th>Day</th>
                     <th>Employee pid</th>
                     <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                 foreach($schedul as $scheduls):
                ?>
                <tr>
                    <td><?php echo $scheduls['emp_name'] ?></td>
                    <td><?php echo $scheduls['status'] ?></td>
                    <td><?php echo $scheduls['duration'] ?></td>
                     <td><?php echo $scheduls['day'] ?></td>
                     <td><?php echo $scheduls['emp_pid'] ?></td>
                      <td><a class="btn default btn-outline"  href="editSchedule.php?scheduleId=<?php echo $scheduls[schedule_id];?>"><i class="icon-link"></i></a></li><td>
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