<?php 
session_start();
include 'header.php';
session_start();
if(!isset($_SESSION['nurse'])){?>
    <script>window.location="http://localhost/Dispensary/login.php";</script><?php
    die();}
$crud = new Crud();
//get patient id
$patient_id=$_GET['patient_id'];

//get employee id
if(isset($_SESSION['nurse'])){
  $_SESSION['nurse']=$nurse;
  foreach ($nurse as $nurs) {
   $nurse_id=$nurs['emp_id'];
}
}

if(isset($_POST['submit'])) {  

    $pat_id = $_POST['pat_id'];
     $emp_id = $_POST['emp_id'];
    $diagnosis = $_POST['diagnosis'];
    $prescription= $_POST['prescription'];
     $med_id= $_POST['med_id'];
    $test= $_POST['test'];

     $patient = $crud->execute("INSERT INTO treatment (pat_id,emp_id,diagnosis,prescription,med_id,test) VALUES ('$pat_id', '$emp_id','$diagnosis','$prescription','$med_id','$test')");
 
        
        //display success message
        if($patient){
        echo "<font color='green'>Patient treatment saved successfully.";
       }
       else{echo "failed";}
    }


    //get medicine lis
    $medicine=$crud->getData("SELECT * FROM medicine");

?>
<div class="card-body">
<form method="POST" action="" >
  <div class="row" style="padding: 17px 800px 70px 100px;"> 
    <h1></h1>
  
   
     
      <input type="hidden" name="pat_id" value="<?php echo $patient_id; ?>">
            
       <input type="hidden" name="emp_id" value="<?php echo $nurse_id; ?>">
      
  
       <div class="form-group">
      <div><label for="diagnosis">diagnosis</label></div>
      <textarea rows="4" cols="50" name="diagnosis"></textarea>  
      </div>

      <div class="form-group">
      <div><label for="prescription">prescription</label></div>
      <textarea rows="4" cols="50" name="prescription"></textarea>  
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
      <label class="col-sm-12">Test</label>
             <div class="col-sm-12">
                <select name="test" class="form-control">
                    <option>Select Test</option>
                       <option>Albumin</option>
                       <option>Allergy</option>
                       <option>Antibody Test</option>
                       <option>Blood Glucose</option>
                       <option>calcium</option>
                   
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