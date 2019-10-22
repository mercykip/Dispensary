<?php
include 'header.php';
 
$crud = new Crud();

 
if(isset($_POST['search'])) {    
    $pat_reg_no=$_POST['pat_reg_no'];
    $search_query = "SELECT * FROM patient where pat_phone_number='$pat_phone_number' or pat_reg_no='$pat_reg_no' ";
    $search_results = $crud->getData($search_query);
     if($search_results==true){
        $time=date("Y-m-d");
       //Insert into ticket
       $tiket = $crud->execute("INSERT INTO `ticket` (pat_reg_no,`time`) VALUES ('$pat_reg_no','$time')");
     }
     
     else{echo "Patient Not Registered";}
     }

?>


	<div class="col-md-5 col-md-offset-2">
    <form name="addpatient" class="form-horizontal" encsearch="multipart/form-data" method="post" action="">
         <div class="form-group">
                
                <div class="col-md-9">
                <input search="text" name="pat_reg_no" class="form-control" placeholder="Search By Reg Number">
                </div>
        </div>
        
	    <div class="form-group">
            <label class="control-label col-md-3">&nbsp;</label>
            <div class="col-md-9">
                <input type="submit" name="search" value="Search" class="btn btn-primary"> 
            </div>
        </div>
    </form>
</div>


        
<div class="col-md-10 col-md-offset-1">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="panel-title">PATIENT DETAILS</div>
        </div>
        <div class="panel-body">
            <a href="getTicket.php" class="btn btn-success btn-lg pull-left">Get Ticket No</a>
            <br/>
            <hr/>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Patient Id.</th>
                    <th>Name</th>
                    <th>email</th>
                    <th>Phone Number</th>
                    <th>Reg No</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($search_results as $search):
                ?>
                <tr>
                    <td><?php echo $search['pat_id'] ?></td>
                    <td><?php echo $search['pat_name'] ?></td>
                    <td><?php echo $search['pat_email'] ?></td>
                    <td><?php echo $search['pat_phone_number'] ?></td>
                    <td><?php echo $search['pat_reg_no'] ?></td>
                    <!-- ? is used as a parameter to retrieve data using the Get command -->
                    <?php echo "<td><a href=\"getTicket.php?pat_Id=$search[pat_id]\">Get Ticket</a></td>";?>
                </tr>
                
                <?php
                endforeach;
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
    
<?php
include 'footer.php';
?>