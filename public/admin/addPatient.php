<?php
include('header.php');
if(!isset($_SESSION['admin'])){?>
    <script>window.location="http://localhost/Dispensary/public/admin/adminlogin.php";</script><?php
    die();
}
include '../../classes/Crud.php';
$crud = new Crud();
 if(isset($_POST['Submit'])) {    
    $pat_name = $_POST['pat_name'];
    $pat_email = $_POST['pat_email'];
    $pat_phone_number = $_POST['pat_phone_number'];
    $pat_type = $_POST['pat_type'];
    $pat_reg_no=$_POST['pat_reg_no'];
    $DOB = $_POST['dob'];
    $age= $_POST['age'];
    $gender = $_POST['gender'];
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name']; 
    
    //Getting role id from the roles table based on role name selected.
    $pat_type_id_query = "SELECT * FROM patient_type where pat_type='$pat_type'";
    $pat_types = $crud->getData($pat_type_id_query);
    foreach ($pat_types as $type) {
           $pat_type_id = $type['pat_type_id'] ;
        }                        
          
         move_uploaded_file($image_tmp,"C:\\xampp\\htdocs\\Dispensary\\public\\images\\$image");   
        //insert data to database    
        $patient = $crud->execute("INSERT INTO `patient` (pat_name,pat_email,pat_phone_number,pat_type_id,pat_reg_no,dob,age,gender,image) VALUES ('$pat_name', '$pat_email', '$pat_phone_number', '$pat_type_id','$pat_reg_no', '$DOB', '$age', '$gender', '$image')");
        
        //display success message
        if($patient){
        echo "<font color='green'>Patient registered successfully.";
       }
    }

?>
<?php
    $patient_query = "SELECT * FROM patient_type";
    $patient_types = $crud->getData($patient_query);                                      
    ?>

                <!-- ==================================================================================================== -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Basic Information</h3>
                            <form class="form-material form-horizontal" method="POST" action="" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-md-12" for="example-text">Name</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="text" id="pat_name" name="pat_name" class="form-control" placeholder="enter patient name"> </div>
                                </div>
                                 <div class="form-group">
                                    <label class="col-md-12" for="example-text">Email Address</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="email" id="pat_email" name="pat_email" class="form-control" placeholder="enter patient Email"> </div>
                                </div>
                                  <div class="form-group">
                                    <label class="col-md-12" for="example-text">Phone Number</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="number" id="pat_phone_number" name="pat_phone_number" class="form-control" placeholder="enter patient Phone"> </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12" for="example-text"></span>Select Patient Type 
                                    </label>
                                    <div class="col-md-12">
                                        
                                            <select name="pat_type" class="form-control" required>
                                                <?php foreach($patient_types as $type):?>
                                               <option><?php echo $type['pat_type'] ?></option>
                                               <?php endforeach; ?>
                                           </select>
                                      </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="example-text">Registration Number</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="text" id="pat_reg_no" name="pat_reg_no" class="form-control" placeholder="enter patient registration"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="bdate">Date of Birth</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="date" id="bdate" name="dob" class="form-control" placeholder="enter your birth date"> </div>
                                </div>

                                  <div class="form-group">
                                    <label class="col-md-12" for="example-text">Age</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="text" id="pat_age" name="age" class="form-control" placeholder="enter patient name"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-12">Gender</label>
                                    <div class="col-sm-12">
                                        <select name="gender" class="form-control">
                                            <option>Select Gender</option>
                                            <option>Male</option>
                                            <option>Female</option>
                                        </select>
                                    </div>
                                </div>
                               <!--  <div class="form-group">
                                    <label class="control-label col-md-3">Profile Picture</label>
                                    <div class="col-md-9">
                                        <input type="file" name="image" class="form-control" required>
                                    </div>
                                </div> -->
                                <div class="form-group">
                                    <label class="col-sm-12">Profile Image</label>
                                    <div class="col-sm-12">
                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                            <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                            <input type="file" name="image"> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> </div>
                                    </div>
                                </div>
                               <!--  <div class="form-group">
                                    <label class="col-md-12">Description</label>
                                    <div class="col-md-12">
                                        <textarea class="form-control" rows="3"></textarea>
                                    </div>
                                </div> -->
                                <button type="submit"  name="Submit" class="btn btn-info waves-effect waves-light m-r-10">Submit</button>
                                <button type="submit" class="btn btn-inverse waves-effect waves-light">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
             
                <?php
               include('footer.php');
               ?>