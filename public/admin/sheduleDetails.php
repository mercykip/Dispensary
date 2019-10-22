<?php 
include 'header.php';
if(!isset($_SESSION['admin'])){?>
    <script>window.location="http://localhost/Dispensary/public/admin/adminlogin.php";</script><?php
    die();
}
$crud = new Crud();
 
//fetching data in descending order (lastest entry first)
$query = "SELECT * FROM Schedule";
$schedule = $crud->getData($query);

?>

<div class="col-md-10 col-md-offset-1">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="panel-title">Schedule</div>
        </div>
        <div class="panel-body">
          <form method="post" action="">
             <input type="submit" name="create_pdf" class="btn btn-success" value="Print schedules"/>
          </form>
            <br/>
            <hr/>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Nurse Name</th>
                    <th>Status:</th>
                    <th>Duration</th>
                     <th>Day</th>
                     <th>Employee pid</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach($schedule as $schedules):
                ?>
                <tr>
                    <td><?php echo $schedules['emp_name'] ?></td>
                    <td><?php echo $schedules['status'] ?></td>
                    <td><?php echo $schedules['duration'] ?></td>
                     <td><?php echo $schedules['day'] ?></td>
                      <td><?php echo $schedules['emp_pid'] ?></td>
                </tr>
                
                <?php
                endforeach;
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
    

    </table>
    <br />
   

    
    </form>
   </div>  
  </div>  
 <?php
include 'footer.php';
?>