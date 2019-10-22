<?php
include('header.php');
if(!isset($_SESSION['admin'])){?>
    <script>window.location="http://localhost/Dispensary/public/admin/adminlogin.php";</script><?php
    die();
}
include '../../classes/Crud.php';
 
$crud = new Crud();

 
if(isset($_POST['Submit'])) {    
    $emp_name = $_POST['emp_name'];
    $status = $_POST['status'];
    $availability = $_POST['availability'];
     $duration = $_POST['duration'];
    $day = $_POST['day'];
   
    $emp_pid = $_POST['emp_pid'];
    
    
    //Getting role id from the roles table based on role name selected.
    // $pat_type_id_query = "SELECT * FROM patient_type where pat_type='$pat_type'";
    // $pat_types = $crud->getData($pat_type_id_query);
    // foreach ($pat_types as $type) {
    //        $pat_type_id = $type['pat_type_id'] ;
    //     }                        
          
         move_uploaded_file($image_tmp,"C:\\xampp\\htdocs\\Dispensary\\public\\images\\$image");   
        //insert data to database    
        $schedule = $crud->execute("INSERT INTO `schedule` (emp_name,status,duration,day,emp_pid) VALUES ('$emp_name','$status','$duration','$day','$emp_pid')");
        
        //display success message
        if($schedule){
        echo "<font color='green'>Schedule Created successfully.";
       }
    }

?>
<!-- <?php
    $patient_query = "SELECT * FROM patient_type ";
    $patient_types = $crud->getData($patient_query);                                      
    ?>
 -->
                <!-- ==================================================================================================== -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Basic Information</h3>
                            <form class="form-material form-horizontal" method="POST" action="" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-md-12" for="example-text">Nurse Name</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="text" id="emp_name" name="emp_name" class="form-control" placeholder="enter Nurse name"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-12">Status</label>
                                    <div class="col-sm-12">
                                        <select name="status" class="form-control">
                                            <option>Select Status </option>
                                            <option>Available</option>
                                            <option>Not_available</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="Period">Duration</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="number" id="duration" name="duration" class="form-control" placeholder="enter hour"> </div>
                                </div>

                            
                            
                                <div class="form-group">
                                    <label class="col-md-12" for="bdate">Day</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="date" id="day" name="day" class="form-control" placeholder="enter day"> </div>
                                </div>

                                  <div class="form-group">
                                    <label class="col-md-12" for="example-text">Employee Id</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="number" id="emp_pid" name="emp_pid" class="form-control" placeholder="enter employee pid"> </div>
                                </div>
                                <button type="submit"  name="Submit" class="btn btn-info waves-effect waves-light m-r-10">Submit</button>
                                <button type="submit" class="btn btn-inverse waves-effect waves-light">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
             
          <?php
               include('footer.php');
               ?>