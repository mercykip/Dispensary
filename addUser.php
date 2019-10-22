
<?php
include 'header.php';
 
$crud = new Crud();

 
if(isset($_POST['Submit'])) {    
    $emp_name = $_POST['emp_name'];
    $emp_gender= $_POST['emp_gender'];
    $emp_national_id = $_POST['emp_national_id'];
    $emp_pid = $_POST['emp_pid'];
    $emp_proffesion = $_POST['emp_proffesion'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
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

<div class="col-md-5 col-md-offset-2">
    <form name="adduser" class="form-horizontal" enctype="multipart/form-data" method="post" action="addUser.php">
        <div class="form-group">
            <label class="control-label col-md-3">Full Name</label>
            <div class="col-md-9">
                <input type="text" name="emp_name" class="form-control" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3">Gender</label>
            <div class="col-md-9">
                <input type="text" name="emp_gender" class="form-control" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3">National ID</label>
            <div class="col-md-9">
                <input type="number" name="emp_national_id" class="form-control" required>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3">Profession ID</label>
            <div class="col-md-9">
                <input type="number" name="emp_pid" class="form-control" required>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3">Proffession </label>
            <div class="col-md-9">
                <input type="text" name="emp_proffesion" class="form-control" required>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3">Email</label>
            <div class="col-md-9">
                <input type="email" name="email" class="form-control" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3">UserName</label>
            <div class="col-md-9">
                <input type="text" name="username" class="form-control" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3">Password</label>
            <div class="col-md-9">
                <input type="password" name="password" class="form-control" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3">Phone Number</label>
            <div class="col-md-9">
                <input type="number" name="phone_number" class="form-control" required>
            </div>
        </div>
       <!--   <div class="form-group">
            <label class="control-label col-md-3">User Type</label>
            <div class="col-md-9">
            <select name="userType" class="form-control" required>
                    <option>admin</option>
                    <option>author</option>
            </select>
        </div>
         </div> -->
        <div class="form-group">
            <label class="control-label col-md-3">Profile Picture</label>
            <div class="col-md-9">
                <input type="file" name="image" class="form-control" required>
            </div>
        </div>
         <div class="form-group">
            <label class="control-label col-md-3">Employee Role</label>
            <div class="col-md-9">
                
                    <select name="role" class="form-control" required>
                        <?php foreach($roles as $role):?>
                       <option><?php echo $role['role_name'] ?></option>
                       <?php endforeach; ?>
                   </select>
   
                
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3">&nbsp;</label>
            <div class="col-md-9">
                <input type="submit" name="Submit" value="Register Employee" class="btn btn-primary"> 
            </div>
        </div>
    </form>
</div>

<?php
include 'footer.php';
?>


<?php
    // if(isset($_SESSION['admin'])){
    //     ?><script type="text/javascript">
    //         function validate(){
    //         if(document.adduser.userType.value=="admin"){
    //             alert("Access denied!! only SuperUser has previlege to this option");
    //             document.adduser.userType.focus();
    //             return false;
    //         }}
    //     </script><?php
    // }
               
                                       
    ?>