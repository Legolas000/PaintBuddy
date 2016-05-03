

 <?php 
	
//echo "This is test page";


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//create PDF file
/* 
require("C:/wamp/www/PaintBuddy/resources/views/pages/Discount/fpdf/fpdf.php");

while (ob_get_level())
ob_end_clean();
header("Content-Encoding: None", true);


//ob_end_clean();    header("Content-Encoding: None", true);
	$pdf = new FPDF();
	//var_dump(get_class_methods($pdf));
	$pdf->AddPage();
	$pdf->SetFont("Arial", "B", "20");
	$pdf->Cell(0,10,"WELLCOME ARHAM SHAN",1,1,"C");
//ob_end_clean();
	$pdf->Output();
//ob_end_flush();
*/
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

?>

 <table border="5">
                                    <thead>
                                        <tr class="info">
                                            <th class="col-md-2 text-center">
                                                Promotion Title
                                            </th>
                                            <th class="col-md-2 text-center">
                                                Description about Promotion
                                            </th>
                                            
                                            <th class="col-md-2 text-center">
                                                From
                                            </th>
                                            <th class="col-md-2 text-center">
                                                To
                                            </th>  
                                        </tr>   
                                    </thead>
                                        <tbody>
                                            <?php 
                                                if (isset($table)) {
                                                    foreach( $table as $row ) {
                                            ?>
                                                        <tr class="success">
                                                            <td><?php echo $row->title; ?>  </td>
                                                            <td><?php echo $row->body; ?> </td>
                                                            <td><?php echo $row->sdate; ?></td>
                                                            <td><?php echo $row->edate; ?></td>
                                                            <!--  <td><a href="testmesage" class="btn btn-primary"> MESAGE</button> </td>-->            
                                                        </tr>
                                            <?php   } 
                                                } ?>
                                        </tbody>
                                    </table> 



<!-- 
<h1> ARHAM HOW ARE YOU..!!!</h1>
<p>You have successfully registered to this promotion, <br/> If u selected you will get an e-mail within 1 month...</p>
<p>Regards <br/> Team Paint Buddy</p>



<a href="promotionpdf" class="btn btn-primary"> View Promotions</a><br/>

 -->
