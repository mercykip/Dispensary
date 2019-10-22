
<?php
include 'header.php';
 
$crud = new Crud();

 
if(isset($_POST['Submit'])) {    
   
    $pat_reg_no="MMU".rand();
  
     
    
    //Getting role id from the roles table based on role name selected.
    $pat_type_id_query = "SELECT * FROM patient_type where pat_type='$pat_type'";
    $pat_types = $crud->getData($pat_type_id_query);
    foreach ($pat_types as $type) {
           $pat_type_id = $type['pat_type_id'] ;
        }                        
        
        //insert data to database    
        $patient = $crud->execute("INSERT INTO `ticket` (pat_reg_no) VALUES ('$pat_reg_no')");
        
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
                
                <div class="col-md-9">
                <label class="control-label col-md-3">Registration Number</label>
                <input type="number" name="pat_reg_no" class="form-control" placeholder="patient Registration number" required>
                </div>
        </div>
          
           <!-- <div class="form-group">
            <label class="control-label col-md-3">Select Patient Type</label>
            <div class="col-md-9">
                
                    <select name="pat_type" class="form-control" required>
                        <?php foreach($patient_types as $type):?>
                       <option><?php echo $type['pat_type'] ?></option>
                       <?php endforeach; ?>
                   </select>
   
                
            </div>
        </div> -->

      
        <div class="form-group">
            <label class="control-label col-md-3">&nbsp;</label>
            <div class="col-md-9">
                <input type="submit" name="Submit" value="check-in" class="btn btn-primary"> 
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