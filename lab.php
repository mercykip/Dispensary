<?php 
session_start();
include 'header.php';
session_start();
if(!isset($_SESSION['lab'])){?>
    <script>window.location="http://localhost/Dispensary/login.php";</script><?php
    die();}
$crud = new Crud();
//get patient id
$patient_id=$_GET['patient_id'];

//get employee id
if(isset($_SESSION['lab'])){
  $_SESSION['lab']=$lab;
  foreach ($lab as $lab) {
   $lab_id=$lab['emp_id'];
}
}

if(isset($_POST['submit'])) {  
    
 $pat_reg_no = $_POST['pat_reg_no'];
    $test= $_POST['test'];
      $test_status=$_POST['test_status'];
  

       $lab = $crud->execute("INSERT INTO lab (pat_reg_no,test,test_status) VALUES ('$pat_reg_no','$test','$test_status')");
 
      
        //display success message
        if($lab){
        echo "<font color='green'>Test saved successfully.";
       }
       else{echo "<font color='green'>Test not be saved.";}
    }


    //get medicine lis
  //  $medicine=$crud->getData("SELECT * FROM medicine");

?>
<div class="card-body">
<form method="POST" action="" >
  <div class="row" style="padding: 17px 800px 70px 100px;"> 
    <h1></h1>
      <input type="hidden" name="pat_id" value="<?php echo $patient_id; ?>">
      <input type="hidden" name="emp_id" value="<?php echo $lab_id;?>">
      <div class="form-group">
      <label class="col-md-12" for="example-text">Registration Number</span>
          </label>
           <div class="col-md-12">
          <input type="text"  name="pat_reg_no" class="form-control" > </div>
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
      <label class="col-sm-12">Test</label>
             <div class="col-sm-12">
                <select name="test_status" class="form-control">
                    <option>Select Test</option>
                       <option>Not Present</option>
                       <option>present</option>
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