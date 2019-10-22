<?php

include 'header.php';
 
$crud = new Crud();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Create Ticket</title>
</head>
<body>
	<div class="col-md-5 col-md-offset-2">
    <form name="addpatient" class="form-horizontal" enctype="multipart/form-data" method="post" action="">
        <div class="form-group">
	            
	            <div class="col-md-9">
	            <input type="number" name="pat_reg_no" class="form-control" placeholder="patient Registration number" required>
	            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3">&nbsp;</label>
            <div class="col-md-9">
                <input type="submit" name="submit" value="submit" class="btn btn-primary"> 
            </div>
        </div>
	    
    </form>
</div>
        

</body>
</html>