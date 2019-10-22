
<?php
include('header.php');
if(!isset($_SESSION['pharmacist'])){?>
    <script>window.location="http://localhost/Dispensary/login.php";</script><?php
    die();
}
include '../../classes/Crud.php';
$crud = new Crud();
 
//getting id from url
$patientId = $_GET['patientId'];

//selecting data associated with this particular employeeId
$users = $crud->getData("SELECT * FROM pharmacy WHERE pat_id='$patientId'");
 
foreach ($users as $user) {

     $med_status=$user['med_status']; 
    }
    
    if(isset($_POST['Update'])) 
    {

  $med_status=$_POST['med_status']; 
   
        //updating data in the patients table
        $users = $crud->execute("UPDATE pharmacy SET med_status='$med_status'");
            
  
if ($users) {
    echo "updated successfully";
    # code...
}
else{
     echo "error";
  }  
}
?>
               <div class="container">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Edit status</h3>
                            <form class="form-material form-horizontal" method="POST" action="" enctype="multipart/form-data">
                               
                                 <div class="form-group">
                                    <label class="col-md-12" for="example-text">medical status</span>
                                    </label>
                                    <div class="col-md-4">
                                         <select name="med_status" class="form-control" value="<?php echo $med_status; ?>">
                                                <option>Select Medical Status</option>
                                                           <option>Yes</option>
                                                            <option>No</option>
                                            </select>
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