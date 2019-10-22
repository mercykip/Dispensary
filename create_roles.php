
<?php
include 'header.php';
 
$crud = new Crud();

 
if(isset($_POST['Submit'])) {    
    $role = $_POST['role'];
    $role_description= $_POST['role_description'];
  
       //insert data to database    
        $result = $crud->execute("INSERT INTO `role` (`role_name`, `role_description`) VALUES ('$role', '$role_description')");
        
        //display success message
        if($result==true){
        echo "<font color='green'>Role created successfully.";
    }
       
    }

?>
                             
<div class="col-md-5 col-md-offset-2">
    <form name="create_roles" class="form-horizontal" enctype="multipart/form-data" method="post" action="create_roles.php">
        <div class="form-group">
            <label class="control-label col-md-3">Role</label>
            <div class="col-md-9">
                <input type="text" name="role" class="form-control" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3">Role Description</label>
            <div class="col-md-9">
                <input type="text" name="role_description" class="form-control" required>
            </div>
        </div>
    
        <div class="form-group">
            <label class="control-label col-md-3">&nbsp;</label>
            <div class="col-md-9">
                <input type="submit" name="Submit" value="Add Role" class="btn btn-primary"> 
            </div>
        </div>
    </form>
</div>

<?php
include 'footer.php';
?>