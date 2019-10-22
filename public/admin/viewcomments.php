<?php 
include 'header.php';
if(!isset($_SESSION['admin'])){?>
    <script>window.location="http://localhost/Dispensary/public/admin/adminlogin.php";</script><?php
    die();
}
include '../../classes/Crud.php';
$crud = new Crud();
 
//fetching data in descending order (lastest entry first)
$query = "SELECT * FROM comments";
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
                    <th>First Name</th>
                    <th>Comment</th>
                        </tr>
                </thead>
                <tbody>
                <?php
                 foreach($schedul as $scheduls):
                ?>
                <tr>
                    <td><?php echo $scheduls['fname'] ?></td>
                    <td><?php echo $scheduls['comment'] ?></td>
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