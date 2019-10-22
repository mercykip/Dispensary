<?php 
include('header.php');
if(!isset($_SESSION['admin'])){?>
    <script>window.location="http://localhost/Dispensary/public/admin/adminlogin.php";</script><?php
    die();
}
include '../../classes/Crud.php';
$crud = new Crud();
 
//fetching data in descending order (lastest entry first)
$query = "SELECT * FROM mmuemployee";
$users = $crud->getData($query);
?>

                <div class="row el-element-overlay">
                    <!-- .usercard -->
              <?php
                foreach($users as $user):
                ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="white-box">
                            <div class="el-card-item">
                                <div class="el-card-avatar el-overlay-1"> <img  style="width:150px; height: 150px;" src="http://localhost/Dispensary/public/images/<?php echo $user['image'];?>" />
                                    <div class="el-overlay">
                                        <ul class="el-info">
                                            <li><a class="btn default btn-outline image-popup-vertical-fit" href="http://localhost/Dispensary/public/images/<?php echo $user['image'];?>"></i></a></li>
                                            <li><a class="btn default btn-outline"  href="editUser.php?employeeId=<?php echo $user[emp_id];?>"><i class="icon-link"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="el-card-content">
                                    <h3 class="box-title">Name:<?php echo $user['emp_name'] ;?></h3>
                                     <small>Employee Pid:<?php echo $user['emp_pid'] ;?></small><br/>
                                      <small>Employee Proffesion:<?php echo $user['emp_proffesion'] ;?></small><br/>
                                     <small>username:<?php echo $user['username'] ;?></small><br/>
                                     </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                    <!-- /.usercard-->
                    <!-- /.usercard -->
                
               </div>
            </div>
        </div>
                <!-- /.row -->
              <?php
               include('footer.php');
               ?>