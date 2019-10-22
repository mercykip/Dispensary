<?php 
include 'header.php';
$crud = new Crud(); 
$connect = mysqli_connect("localhost", "root", "", "dispensary");
$output = '';
function fetch_data(){
$output = '';
$connect = mysqli_connect("localhost", "root", "", "dispensary");
$query = "SELECT * FROM ticket  ORDER BY `time` DESC  limit 1";
$result = mysqli_query($connect, $query);
while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
         <td>'.$row["ticket_id"].'</td>  
         <td>'.$row["pat_reg_no"].'</td>  
         <td>'.$row["time"].'</td>  
    </tr>
  ';
}
return $output;
}
 if(isset($_POST["create_pdf"]))
{
  require_once('tcpdf/tcpdf.php');
  $obj_pdf=new TCPDF('P',PDF_UNIT, PDF_PAGE_FORMAT,true, 'UTF-8',false);
   $obj_pdf->SetCreator(PDF_CREATOR);
   $obj_pdf->SetTitle("Export tickets Data To Pdf Page");
   $obj_pdf->AddPage();
   $obj_pdf->SetHeaderData('','',PDF_HEADER_TITLE,PDF_HEADER_STRING);
   $obj_pdf->SetHeaderFont(Array(PDF_FONT_NAME_MAIN, '',PDF_FONT_SIZE_MAIN ));
   $obj_pdf->SetFooterFont(Array(PDF_FONT_NAME_DATA, '',PDF_FONT_SIZE_DATA ));
   $obj_pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
   $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
   $obj_pdf->setMargins(PDF_MARGIN_LEFT,'5',PDF_MARGIN_RIGHT);
   $obj_pdf->SetPrintHeader(false);
   $obj_pdf->SetPrintFooter(false);
   $obj_pdf->SetAutoPageBreak(TRUE,10);
   $obj_pdf->SetFont('helvetica','',12);
   $content='';
   $content.='
   <table cellspacing="0" cellpadding="5" border="1"> 
     <tr> 
        <th>Ticket NO.</th>
        <th width="10%">REG NO </th>
        <th width"30%">Time:</th>
    </tr>
   ';
   $content.=fetch_data();
   $content.='</table>'; 
   $obj_pdf->writeHTML($content);
   ob_end_clean();
   $obj_pdf->Output("tickets.pdf","I");
}
 ?>
<div class="container" style="width: 700px;">
  <h3 align="center">MMU Patient Ticket NO</h3>
   <br />
    <div class="table-responsive">
   <table class="table table-bordered" bordered="1"> 
     <tr> 
        <th width="10%">TICKET NO.</th>
        <th width="10%">REG NO</th>
        <th width="10%">TIME</th>
    </tr>
    <?php echo fetch_data();?>
  </table>
</div>
</div>
