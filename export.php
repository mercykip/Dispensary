<?php  
//export.php  
$connect = mysqli_connect("localhost", "root", "", "addSite");
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM articles";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                    <th>AUTHOR NO.</th>
                    <th>TITLE</th>
                    <th>CONTENT</th>
                    <th>ORDER</th>
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
         <td>'.$row["authorId"].'</td>  
         <td>'.$row["articleTitle"].'</td>  
         <td>'.$row["articleFullText"].'</td>  
         <td>'.$row["articleOrder"].'</td>  
    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }
}


if(isset($_POST["exporttxt"]))
{
 $query = "SELECT * FROM articles";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {?>
  <table id="myTable" border="1" class="table table-bordered">
       <thead>
           <tr>
               <th>AUTHOR NO.</th>
                <th>TITLE</th>
                <th>CONTENT</th>
                <th>ORDER</th>
                   
            </tr>
         </thead>
         <tbody><?php
  while($row = mysqli_fetch_array($result))
  {?>
   
     <tr>
           <td><?php echo $row['authorId'] ?></td>
           <td><?php echo $row['articleTitle'] ?></td>
           <td><?php echo $row['articleFullText'] ?></td>
           <td><?php echo $row['articleOrder'] ?></td>
        
        </tr>
  
       </tbody>
       </table>  <?php
  }
  header('Content-Type: application/txt');
  header('Content-Disposition: attachment; filename=download.txt');
   
 }
}


//exporting to pdf
function fetch_data(){
$output = '';
$connect=mysqli_connect("localhost", "root", "", "addSite");
$query = "SELECT * FROM articles";
$result = mysqli_query($connect, $query);
while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
         <td>'.$row["authorId"].'</td>  
         <td>'.$row["articleTitle"].'</td>  
         <td>'.$row["articleFullText"].'</td>  
         <td>'.$row["articleOrder"].'</td>  
        
    </tr>
   ';
}
return $output;
}
?>
<?php
if(isset($_POST["create_pdf"]))
{
  require_once('tcpdf/tcpdf.php');
  $obj_pdf=new TCPDF('P',PDF_UNIT, PDF_PAGE_FORMAT,true, 'UTF-8',false);
   $obj_pdf->SetCreator(PDF_CREATOR);
   $obj_pdf->SetTitle("Export Users Data To Pdf Page");
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
        <th>AUTHOR ID.</th>
        <th>TITLE</th>
        <th>Article CONTENT</th>
        <th>ORDER</th>
    </tr>

   ';
   $content.=fetch_data();

   $content.='</table>'; 

   $obj_pdf->writeHTML($content);

   $obj_pdf->Output("articles.pdf","I");


}
 ?>
<div class="container" style="width: 700px;">
  <h3 align="center">Export Articles data</h3>
   <br />
    <div class="table-responsive">
   <table class="table table-bordered" bordered="1"> 

     <tr> 
        <th>AUTHOR ID.</th>
        <th>TITLE</th>
        <th>CONTENT</th>
        <th>ORDER</th>
       
    </tr>
    <?php echo fetch_data();?>
  </table>
</div>
</div>








      