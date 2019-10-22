<?php
include('header.php');
if(!isset($_SESSION['admin'])){?>
    <script>window.location="http://localhost/Dispensary/public/admin/adminlogin.php";</script><?php
    die();
}
include '../../classes/Crud.php';
$crud = new Crud();
 
//getting id from url
$patientId = $_GET['patientId'];

//selecting data associated with this particular patientId
$patients = $crud->getData("SELECT * FROM patient WHERE pat_id='$patientId'");
 
foreach ($patients as $patient) {
    
    $pat_name = $patient['pat_name'];
    $pat_email = $patient['pat_email'];
    $pat_phone_number = $patient['pat_phone_number'];
    $DOB = $patient['dob'];
    $age= $patient['age'];  
    }

    if(isset($_POST['Update'])) 
    {   
    $pat_name = $_POST['pat_name'];
    $pat_email = $_POST['pat_email'];
    $pat_phone_number = $_POST['pat_phone_number'];
    $DOB = $_POST['dob'];
    $age= $_POST['age'];
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name']; 
    move_uploaded_file($image_tmp,"C:\\xampp\\htdocs\\Dispensary\\public\\images\\$image");  

        //updating data in the patients table
        $patients = $crud->execute("UPDATE patient SET pat_name='$pat_name',pat_email='$pat_email',pat_phone_number='$pat_phone_number',dob='$DOB',age='$age',image='$image' WHERE pat_id=$patientId");
            
    }

    
?>




                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Basic Information</h3>
                            <form class="form-material form-horizontal" method="POST" action="" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-md-12" for="example-text">Name</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="hidden" name="patientId" class="form-control" value="<?php echo $_GET['patientId'];?>" required>
                                        <input type="text" id="pat_name" name="pat_name" value="<?php echo $pat_name; ?>" class="form-control"> </div>
                                </div>
                                 <div class="form-group">
                                    <label class="col-md-12" for="example-text">Email Address</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="email" id="pat_email" name="pat_email" value="<?php echo $pat_email; ?>" class="form-control"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="example-text">Phone Number</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="text" id="pat_phone_number" name="pat_phone_number" class="form-control" value="<?php echo $pat_phone_number?>"> </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12" for="bdate">Date of Birth</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="date" id="bdate" name="dob" class="form-control" value="<?php echo $DOB; ?>"> </div>
                                </div>

                                  <div class="form-group">
                                    <label class="col-md-12" for="example-text">Age</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="text" id="pat_age" name="age" class="form-control" value="<?php echo $age ?>"> </div>
                                </div>
                              
                                <div class="form-group">
                                    <label class="col-sm-12">Profile Image</label>
                                    <div class="col-sm-12">
                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                            <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                            <input type="file" name="image"> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> </div>
                                    </div>
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