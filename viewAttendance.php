<?php 
include 'header.php';
$crud = new Crud();
 
//fetching data in descending order (lastest entry first)
$query = "SELECT * FROM ticket ORDER BY `time";
$tickets = $crud->getData($query);

?>

<div class="col-md-10 col-md-offset-1">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="panel-title">Ticket</div>
        </div>
        <div class="panel-body">
          
         
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>TICKET</th>
                    <th>REG NO:</th>
                    <th>Time</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach($tickets as $ticket):
                ?>
                <tr>
                    <td><?php echo $ticket['ticket_id'] ?></td>
                    <td><?php echo $ticket['pat_reg_no'] ?></td>
                    <td><?php echo $ticket['time'] ?></td>
                </tr>
                
                <?php
                endforeach;
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
    

    </table>
    <br />
   

    
    </form>
   </div>  
  </div>  
 <?php
include 'footer.php';
?>