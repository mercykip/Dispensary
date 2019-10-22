
<?php
include('header.php');
if(!isset($_SESSION['admin'])){?>
    <script>window.location="http://localhost/Dispensary/public/admin/adminlogin.php";</script><?php
    die();
}
include '../../classes/Crud.php';
$crud = new Crud();
 
//getting id from url
$employeeId = $_GET['employeeId'];

//selecting data associated with this particular employeeId
$users = $crud->getData("SELECT * FROM mmuemployee WHERE emp_id='$employeeId'");
 
foreach ($users as $user) {

     $emp_name=$user['emp_name']; 
     $email=$user['email']; 
     $phone_number=$user['phone_number']; 
     $username=$user['username']; 
     
    
    }

    if(isset($_POST['Update'])) 
    {   
    $emp_name = $_POST['emp_name'];
    $email = $_POST['email'];
    $phone_number=$user['phone_number'];
    $username=$user['username']; 
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name']; 
    move_uploaded_file($image_tmp,"C:\\xampp\\htdocs\\Dispensary\\public\\images\\$image");  

        //updating data in the patients table
        $users = $crud->execute("UPDATE mmuemployee SET emp_name='$emp_name',email='$email',phone_number='$phone_number',username='$username', image='$image' WHERE emp_id=$employeeId");
            
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
                                        <input type="hidden" name="$employeeId" class="form-control" value="<?php echo $_GET['employeeId']; ?>" required="">
                                        <input type="text" id="emp_name" name="emp_name" value="<?php echo $emp_name; ?>" class="form-control"> </div>
                                </div>
                                 <div class="form-group">
                                    <label class="col-md-12" for="example-text">Email Address</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="email" id="email" name="email" value="<?php echo $email; ?>" class="form-control"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="example-text">Phone Number</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="number" id="phone_number" name="phone_number" class="form-control" value="<?php echo $phone_number; ?>"> </div>
                                </div>
                                 <div class="form-group">
                                    <label class="col-md-12" for="example-text">Username</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="text" id="username" name="username" value="<?php echo $username; ?>" class="form-control"> </div>
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