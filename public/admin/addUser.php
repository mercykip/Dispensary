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
    $emp_gender= $_POST['emp_gender'];
    $emp_national_id = $_POST['emp_national_id'];
    $emp_pid = $_POST['emp_pid'];
    $emp_proffesion = $_POST['emp_proffesion'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
   // $password=$_POST['password'];
    $phone_number = $_POST['phone_number'];
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name']; 
    $role=$_POST['role'];
    
   //Getting role id from the roles table based on role name selected.
    $role_query_id = "SELECT * FROM role where role_name='$role'";
    $roles_id = $crud->getData($role_query_id);
    foreach ($roles_id as $role) {
           $role_id = $role['role_id'] ;
        }                        

          
         move_uploaded_file($image_tmp,"C:\\xampp\\htdocs\\Dispensary\\public\\images\\$image");   
       //insert data to database    
        $result = $crud->execute("INSERT INTO `mmuemployee` (`emp_name`, `emp_gender`, `emp_national_id`, `emp_pid`, `emp_proffesion`, `email`, `username`, `password`, `phone_number`, `image`, `role_id`) VALUES ('$emp_name', '$emp_gender', '$emp_national_id', '$emp_pid', '$emp_proffesion', '$email', '$username', '$password', '$phone_number', '$image', '$role_id')");
        
        //display success message
        echo "<font color='green'>Employee added successfully.";
       
    

    }

?>
<?php
     $role_query = "SELECT * FROM role";
    $roles = $crud->getData($role_query);                                       
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
                                        <input type="text" id="emp_name" name="emp_name" class="form-control" placeholder="enter  name"> </div>
                                </div>
                                 <div class="form-group">
                                    <label class="col-sm-12">Gender</label>
                                    <div class="col-sm-12">
                                        <select name="emp_gender" class="form-control">
                                            <option>Select Gender</option>
                                            <option>Male</option>
                                            <option>Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="example-text">National ID</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="number" id="emp_national_id" name="emp_national_id" class="form-control" placeholder="enter  national id"> </div>
                                </div>
                                  <div class="form-group">
                                    <label class="col-md-12" for="example-text">proffesional ID</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="number" id=emp_pid" name="emp_pid" class="form-control" placeholder="enter  national id"> </div>
                                </div>
                                 <div class="form-group">
                                    <label class="col-md-12" for="example-text">proffesion</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="text" id="emp_proffesion" name="emp_proffesion" class="form-control" placeholder="enter your proffesion"> </div>
                                </div>
                                 <div class="form-group">
                                    <label class="col-md-12" for="example-text">Email Address</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="email" id="email" name="email" class="form-control" placeholder="enter  Email"> </div>
                                </div>
                                 <div class="form-group">
                                    <label class="col-md-12" for="example-text">UserName</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="text" id="userName" name="username" class="form-control" placeholder="enter username"> </div>
                                </div>
                                 <div class="form-group">
                                    <label class="col-md-12" for="example-text">Password</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="password" id="password" name="password" class="form-control" placeholder="enter Password< "> </div>
                                </div>
                                  <div class="form-group">
                                    <label class="col-md-12" for="example-text">Phone Number</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="number" id="phone_number" name="phone_number" class="form-control" placeholder="enter Phone"> </div>
                                </div>
                                  <div class="form-group">
                                    <label class="col-sm-12">Profile Image</label>
                                    <div class="col-sm-12">
                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                            <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                            <input type="file" name="image"> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="example-text"></span>Employee Role
                                    </label>
                                    <div class="col-md-12">
                                        
                                            <select name="role" class="form-control" required>
                                               <?php foreach($roles as $role):?>
                                           <option>
                                            <?php echo $role['role_name'] ?></option>
                                           <?php endforeach; ?>
                                           </select>
                                      </div>
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