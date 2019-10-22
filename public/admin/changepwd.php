<?php
include '../../classes/Crud.php';
include('header.php');
$crud = new Crud();
 
//getting id from url
$passwardId = $_GET['passwardId'];

//selecting data associated with this particular employeeId
$password= $crud->getData("SELECT * FROM mmuemployee WHERE emp_id='$passwardId'");
 


    if(isset($_POST['Update'])) 
    {   
    $cpwd = $_POST['cpwd'];
    $cpwd = $_POST['cpwd'];
    $cpwd=$user['cpwd'];
   
        //updating data in the patients table
        $password = $crud->execute("UPDATE passward SET cpwd='$cpwd',npwd='$npwd',cfpwd='$cpwd' WHERE pwd_id=$passwardId");
            
    }

    
?>
               <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Change Password</h3>
                            <form class="form-material form-horizontal" method="POST" action="" enctype="multipart/form-data">
                                
                                 <div class="form-group">
                                    <label class="col-md-12" for="example-text">Current Password</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="number" id="cpwd" name="cpwd" value="cpwd" placeholder="current password" class="form-control"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="example-text">new Password</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="number" id="npwd" name="npwd" value="cpwd" placeholder="current password" class="form-control"> </div>
                                </div>
                                 <div class="form-group">
                                    <label class="col-md-12" for="example-text">confirm Password</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="number" id="cpwd" name="cfpwd" value="cfpwd" placeholder="current password" class="form-control"> </div>
                                </div>
                              
                                <button type="submit"  name="Update" class="btn btn-info waves-effect waves-light m-r-10">Update</button>
                                <button type="submit" class="btn btn-inverse waves-effect waves-light">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
               </div>
               <?php
               include('footer.php');
               ?>