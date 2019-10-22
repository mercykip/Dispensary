<?php
include 'header.php';
 
$crud = new Crud();
 
if(isset($_POST['Submit'])) {    
    $pat_name = $_POST['pat_name'];
    $pat_email = $_POST['pat_email'];
    $pat_phone_number = $_POST['pat_phone_number'];
    $pat_type = $_POST['pat_type'];
    $pat_reg_no="MMU".rand();
    $DOB = $_POST['DOB'];
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

<div class="col-md-5 col-md-offset-2">
    <form name="addpatient" class="form-horizontal" enctype="multipart/form-data" method="post" action="">
        <div class="form-group">
            <label class="control-label col-md-3">Full Name</label>
            <div class="col-md-9">
                <input type="text" name="pat_name" class="form-control" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3">Email</label>
            <div class="col-md-9">
            <input type="email" name="pat_email" class="form-control" required>
            </div>
        </div>
          <div class="form-group">
            <label class="control-label col-md-3">Phone Number</label>
            <div class="col-md-9">
                <input type="number" name="pat_phone_number" class="form-control" required>
            </div>
        </div>
        
           <div class="form-group">
            <label class="control-label col-md-3">Select Patient Type</label>
            <div class="col-md-9">
                
                    <select name="pat_type" class="form-control" required>
                        <?php foreach($patient_types as $type):?>
                       <option><?php echo $type['pat_type'] ?></option>
                       <?php endforeach; ?>
                   </select>
   
                
            </div>
        </div>

          <div class="form-group">
            <label class="control-label col-md-3">DOB</label>
            <div class="col-md-9">
                <input type="date" name="DOB" class="form-control" required>
            </div>
        </div>
          <div class="form-group">
            <label class="control-label col-md-3">Age</label>
            <div class="col-md-9">
                <input type="number" name="age" class="form-control" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3">Gender</label>
            <div class="col-md-9">
                <input type="text" name="gender" class="form-control" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3">Profile Picture</label>
            <div class="col-md-9">
                <input type="file" name="image" class="form-control" required>
            </div>
        </div>
      
        <div class="form-group">
            <label class="control-label col-md-3">&nbsp;</label>
            <div class="col-md-9">
                <input type="submit" name="Submit" value="Register patient" class="btn btn-primary"> 
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