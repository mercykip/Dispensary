<?php 
include('header.php');
if(!isset($_SESSION['admin'])){?>
    <script>window.location="http://localhost/Dispensary/public/admin/adminlogin.php";</script><?php
    die();
}
include '../../classes/Crud.php';
$crud = new Crud();
         //foreach($users as $user):
//fetching data in descending order (lastest entry first)
$query = "SELECT * FROM mmuemployee";
$users = $crud->getData($query);
?>
<div class="col-md-10 col-md-offset-1">
    <div class="panel panel-success">
        <div class="panel-heading">
            <div class="panel-title">Staff Details</div>
        </div>
        <div class="panel-body">
         <!--  <form method="post" action="printTicket.php">
             <input type="submit" name="create_pdf" class="btn btn-success" value="patiene"/>
          </form> -->
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th> Name</th>
                    <th>Gender</th>
                    <th>National Id</th>
                    <th>professional Id</th>
                    <th>profession</th>
                    <th>Email</th>
                    <th>Edit</th>
                     <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php
                 foreach($users as $user):
                ?>
                <tr>
                    <td><?php echo $user['emp_name'] ?></td>
                    <td><?php echo $user['emp_gender'] ?></td>
                    <td><?php echo $user['emp_national_id'] ?></td>
                    <td><?php echo $user['emp_pid'] ?></td>
                    <td><?php echo $user['emp_proffesion'] ?></td>
                    <td><?php echo $user['email'] ?></td>
                     <td><li><a class="btn default btn-outline"  href="editUser.php?employeeId=<?php echo $user[emp_id];?>"><i class="icon-link"></i>Edit</a></li></td>
                     <td><a class="btn btn-danger"  href="deletep.php">Delete</i></a></li></td>
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