<?php 
  include $_SERVER["DOCUMENT_ROOT"].'/airline/core/init.php';
 
require_once 'vendor/dompdf/autoload.inc.php';
use Dompdf\Dompdf;

if($_POST['action']=='pdf'){
 $dompdf = new Dompdf();
  $query="SELECT * FROM booking_details WHERE b_pnr = ".$_POST['p_pnr'];
  $result2=$db->query($query);
  $b=$result2[0];
  $query="SELECT * FROM passenger_details WHERE p_pnr = ".$_POST['p_pnr']; //Sorts by date time
  $result=$db->query($query);
  if(count($result)){
    $html = '<html><body><style>table td, table th{text-align:left; border:1px solid #000; padding:5px;}</style><h1 style="text-align:center;">AIRLINE BOOKING SYSTEM TICKET</h1>
	<p style="text-align:center;"><strong>Booking Details</strong></p>
	<table cellspacing="0" cellpadding="0" style="width:50%; margin:auto; border:1px solid #000;"><tbody>
	    <tr>
		    <th>Booking By</th>
		    <td>'.$b['b_name'].'</td>
		</tr>
		<tr>
		    <th>Phone</th>
		    <td>'.$b['b_phno'].'</td>
		</tr>
		<tr>
		    <th>EMail</th>
		    <td>'.$b['b_mail'].'</td>
		</tr>
		<tr>
		    <th>Total Ticket</th>
		    <td>'.$b['b_total'].'</td>
		</tr>
	</table>
	<br>
	<table cellspacing="0" cellpadding="0" style="width:100%; border:1px solid #000;"><tbody>
                 <tr>
                	<td>'.$result[0]['p_fno'] .' Flight Details</td>
                    <td>Passenge Details</td>
                  </tr>  
                <tr>
                	<td>
                        <table cellspacing="0" cellpadding="0" style="border:1px solid #000;width:100%;"><tr>
                            	<th>Flight No:</th>
                                <td>'.$result[0]['p_fno'].'</td>
                            </tr>
                            <tr>
                            	<th>From:</th>
                                <td>'. $result[0]['p_from'].'</td>
                            </tr>
                            <tr>
                            	<th>to:</th>
                                <td>'.$result[0]['p_to'].'</td>
                            </tr>
                            <tr>
                            	<th>Class:</th>
                                <td>'.$result[0]['p_class'].'</td>
                            </tr>
                             <tr>
                            	<th>PNR Number:</th>
                                <td>'.$result[0]['p_pnr'].'</td>
                            </tr>
                             <tr>
                            	<th>Departure Date & time:</th>
                                <td>'.$result[0]['p_dedate'].' '.$result[0]['p_detime'].'</td>
                            </tr>
                             <tr>
                            	<th>Arrival Date & time:</th>
                                <td>'.$result[0]['p_ardate'].' '.$result[0]['p_artime'].'</td>
                            </tr>
                            <tr>
                            	<th>Price:</th>
                                <td>Rs. '.$b['b_price'].'</td>
                            </tr>
                        </table>
                    </td>
                    <td>
                  <table cellspacing="0" cellpadding="0" style="border:1px solid #000;width:100%;" > <tr><th>Passenger Name</th> <th>Passenger Age</th> <th>Passenger Sex</th> <th>Passenger Type</th></tr>';
				  foreach($result as $row)
					  {
						  
						  $type="Adult";
						  $sex="Male";
						  if($row['p_passtype']=='C'){$type="Child";}
						  if($row['p_sex']=='F'){$sex="Female";}
									  $html .= '<tr>
											<td>'.$row['p_name'].'</td>
											<td>'.$row['p_age'].'</td>
											<td>'.$sex.'</td>
											<td>'.$type.'</td>
									  </tr>';	
						  
					  }
					$html .= ' </table></td></tr></tbody></table></body></html>';
  }
 
 $dompdf->loadHtml($html);
 // (Optional) Setup the paper size and orientation
 $dompdf->setPaper('A4','landscape');
 // Render the HTML as PDF
 $dompdf->render();
 // Output the generated PDF to Browser
 $dompdf->stream($_POST['p_pnr'], array('Attachment'=>0));
}
header('Location: '.WSITEURL.'/bookings.php');
exit;
?>