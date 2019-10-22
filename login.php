<?php
include 'header.php';
?>
<div class="col-md-6 col-md-offset-2">
  <div class="panel panel-primary">
    <div class="panel-heading">Login</div>
        <div class="panel-body " >
            <form class="form-horizontal" method="post" action="login.php">
                <div class="form-group">
                    <label class="control-label col-md-3">username</label>
                        <div class="col-md-9">
                            <input type="email" name="email" class="form-control" required>
                        </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Password</label>
                        <div class="col-md-9">
                            <input type="password" name="password" class="form-control" required>
                        </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">&nbsp;</label>
                        <div class="col-md-9">
                            <input type="submit" name="login" value="Login" class="btn btn-primary"> 
                        </div>
                </div>
            </form>
        </div>
  </div>
</div>


<?php
include 'footer.php';
?>