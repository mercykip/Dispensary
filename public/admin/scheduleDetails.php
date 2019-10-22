<?php
include('header.php');
if(!isset($_SESSION['admin'])){?>
    <script>window.location="http://localhost/Dispensary/public/admin/adminlogin.php";</script><?php
    die();
}
include '../../classes/Crud.php';
$crud = new Crud();
 
//getting id from url
$scheduleId = $_GET['scheduleId'];

//selecting data associated with this particular employeeId
$schedul = $crud->getData("SELECT * FROM schedule WHERE schedule_id='$scheduleId'");
 
 foreach($schedul as $scheduls): {

     $emp_name=$scheduls['emp_name']; 
     $status=$scheduls['status']; 
     $duration=$scheduls['duration']; 
     $day=$scheduls['day']; 
     $emp_pid=$scheduls['emp_pid']; 
    
    }

    if(isset($_POST['Update'])) 
    {   
    $emp_name = $_POST['emp_name'];
    $status = $_POST['status'];
    $duration=$_POST['duration'];
    $day=$_POST['day']; 
    $emp_pid=$_POST['emp_pid']; 
    
        //updating data in the patients table
        $schedul = $crud->execute("UPDATE schedule SET emp_name='$emp_name',status='$status',duration='$duration',day='$day', emp_pid='$emp_pid' WHERE schedule_id=$scheduleId");
            
    }

    
?>
               <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Employee Personal Information</h3>
                            <form class="form-material form-horizontal" method="POST" action="" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-md-12" for="example-text">Name</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="hidden" name="$scheduleId" class="form-control" value="<?php echo $_GET['scheduleId']; ?>" required="">
                                        <input type="text" id="emp_name" name="emp_name" value="<?php echo $emp_name; ?>" class="form-control"> </div>
                                </div>
                                 <div class="form-group">
                                    <label class="col-md-12" for="example-text">status </span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="text" id="status" name="status" value="<?php echo $status; ?>" class="form-control"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="example-text">Duration</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="number" id="duration" name="duration" class="form-control" value="<?php echo $duration; ?>"> </div>
                                </div>
                                 <div class="form-group">
                                    <label class="col-md-12" for="example-text">day</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="date" id="day" name="day" value="<?php echo $day; ?>" class="form-control"> </div>
                                </div>
                                   <div class="form-group">
                                    <label class="col-md-12" for="example-text">Employee Pid</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="number" id="emp_pid" name="emp_pid" value="<?php echo $emp_pid; ?>" class="form-control"> </div>
                                </div>
                                  
                                <button type="submit"  name="Update" class="btn btn-info waves-effect waves-light m-r-10">Update</button>
                                <button type="submit" class="btn btn-inverse waves-effect waves-light">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>

              <?php
               include('footer.php');
               ?>