<?php
include '../../classes/Crud.php';
if(!isset($_SESSION['admin'])){?>
    <script>window.location="http://localhost/Dispensary/public/admin/adminlogin.php";</script><?php
    die();
}
include('header.php');
$crud = new Crud();
 
//getting id from url
$scheduleId = $_GET['scheduleId'];

//selecting data associated with this particular scheduleId
$scheduls = $crud->getData("SELECT * FROM schedule WHERE schedule_id='$scheduleId'");
 
foreach ($scheduls as $schedul) {

     $emp_name=$schedul['emp_name']; 
     $status=$schedul['status']; 
     $duration=$schedul['duration']; 
     $day=$schedul['day']; 
    $emp_pid=$schedul['emp_pid']; 
    
    }

    if(isset($_POST['Update'])) 
    {   
    $emp_name = $_POST['emp_name'];
    $status = $_POST['status'];
    $duration=$_POST['duration'];
    $day=$_POST['day']; 
    $emp_pid=$_POST['emp_pid'];
     
        //updating data in the patients table
        $scheduls = $crud->execute("UPDATE  schedule SET emp_name='$emp_name',status='$status',duration='$duration',day='$day', emp_pid='$emp_pid' WHERE schedule_id=$scheduleId");
            
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
                                    
                                    <select name="status" class="form-control" id="status" value="<?php echo $status; ?>">
                                            <option>Select Status </option>
                                            <option>Available</option>
                                            <option>Not_available</option>
                                        </select> 
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="example-text">Duration</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="number" id="duration" name="duration" class="form-control" value="<?php echo $duration; ?>"> </div>
                                </div>
                                 <div class="form-group">
                                    <label class="col-md-12" for="example-text">Day</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="text" id="day" name="day" value="<?php echo $day; ?>" class="form-control"> </div>
                                </div>
                                  <div class="form-group">
                                    <label class="col-md-12" for="example-text">employee pid</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="nuumber" id="emp_pidy" name="emp_pid" value="<?php echo $emp_pid; ?>" class="form-control"> </div>
                                </div>
                                <button type="submit"  name="Update" class="btn btn-info waves-effect waves-light m-r-10">Update</button>
                                <button type="submit" class="btn btn-inverse waves-effect waves-light">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
</div>
              <?php
               include('footer.php');
               ?>