<?php 
session_start();
include 'header.php';
session_start();
if(!isset($_SESSION['pharmacist'])){?>
    <script>window.location="http://localhost/Dispensary/login.php";</script><?php
    die();}
$crud = new Crud();
//get patient id
$patient_id=$_GET['patient_id'];

//get employee id
if(isset($_SESSION['pharmacist'])){
  $_SESSION['pharmacist']=$pharmacist;
  foreach ($pharmacist as $pharmacis) {
   $pharmacist_id=$pharmacis['emp_id'];
}
}

if(isset($_POST['submit'])) {  
    
  $pat_id = $_POST['pat_id'];
       $med_id= $_POST['med_id'];
       $pat_reg_no=$_POST['pat_reg_no'];
       $emp_id = $_POST['emp_id'];
       $med_status = $_POST['med_status'];

       $pharma = $crud->execute("INSERT INTO pharmacy (pat_id,med_id,pat_reg_no,emp_id,med_status) VALUES ('$pat_id','$med_id','$pat_reg_no','$emp_id','$med_status')");
 
      
        //display success message
        if($pharma){
        echo "<font color='green'>medication saved successfully.";
       }
       else{echo "<font color='green'>medication not be saved.";}
    }


    //get medicine lis
    $medicine=$crud->getData("SELECT * FROM medicine");

?>
<div class="card-body">
<form method="POST" action="" >
  <div class="row" style="padding: 17px 800px 70px 100px;"> 
    <h1></h1>
      <input type="hidden" name="pat_id" value="<?php echo $patient_id; ?>">
      <input type="hidden" name="emp_id" value="<?php echo $pharmacyId;?>">
      <div class="form-group">
      <label class="col-md-12" for="example-text">Registration Number</span>
          </label>
           <div class="col-md-12">
          <input type="text"  name="pat_reg_no" class="form-control" > </div>
    </div>
      
  <div class="form-group">
      <label class="col-sm-12">Status</label>
             <div class="col-sm-12">
                <select name="med_status" class="form-control">
                    <option>Select Medical Status</option>
                       <option>Yes</option>
                       <option>No</option>
                   </select>
              </div>
             </div>
 
        <div class="form-group">
            <label class="col-md-12" for="example-text"></span>Medicine
            </label>
            <div class="col-md-12">
                
                    <select name="med_id" class="form-control" required>
                       <?php foreach($medicine as $med):?>
                   <option value="<?php echo $med['med_id'];?>">
                    <?php echo $med['med_name']; ?></option>
                   <?php endforeach; ?>
                   </select>
              </div>
        </div>
    
    <div class="form-group">
    <div><BUTTON type="submit" name="submit" class="btn btn-info" class="form-control">save details</BUTTON> 
   </div> 
</div>
</form>
</div>
<?php
include 'footer.php';
?>