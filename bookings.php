<?php 
  include $_SERVER["DOCUMENT_ROOT"].'/airline/core/init.php';
  include SITEURL.'/includes/overall/header.php';
?>
      <legend>My Bookings</legend>

      <?php
        $uid=$f_data['f_id']; //Assigns logged in id to a variable
		
		$query="SELECT * FROM booking_details WHERE b_fid = $uid"; //Sorts by date time
        
		$resultb=$db->query($query);
	
		if(count($resultb)) {
			foreach($resultb as $b){
				$query="SELECT * FROM passenger_details WHERE p_pnr = ".$b['b_pnr']; //Sorts by date time
				$result=$db->query($query);
	     ?>
		  <table class="table table-striped ">
             <tbody>
                 <tr>
                	<td><?php echo $result[0]['p_fno'] ?>'s Flight Details</td>
                    <td>Passenger's Details</td>
                  </tr>  
                <tr>
                	<td>
                        <table class="table table-bordered">
                        	<tr>
                            	<th>Flight No:</th>
                                <td><?php echo $result[0]['p_fno'] ?></td>
                            </tr>
                            <tr>
                            	<th>From:</th>
                                <td><?php echo $result[0]['p_from'] ?></td>
                            </tr>
                            <tr>
                            	<th>to:</th>
                                <td><?php echo $result[0]['p_to'] ?></td>
                            </tr>
                            <tr>
                            	<th>Class:</th>
                                <td><?php echo $result[0]['p_class'] ?></td>
                            </tr>
                             <tr>
                            	<th>PNR Number:</th>
                                <td><?php echo $result[0]['p_pnr'] ?></td>
                            </tr>
                             <tr>
                            	<th>Departure Date & time:</th>
                                <td><?php echo $result[0]['p_dedate'].' '.$result[0]['p_detime']; ?></td>
                            </tr>
                             <tr>
                            	<th>Arrival Date & time:</th>
                                <td><?php echo $result[0]['p_ardate'].' '.$result[0]['p_artime']; ?></td>
                            </tr>
                            <tr>
                            	<th>Price:</th>
                                <td>Rs. <?php echo $b['b_price'] ?></td>
                            </tr>
                        </table>
                    </td>
                    <td>
                     
                  <table class="table table-bordered"> <tr><th>Passenger Name</th> <th>Passenger Age</th> <th>Passenger Sex</th> <th>Passenger Type</th></tr> 
		 
		<?php foreach($result as $row)
        {
			
          if($uid===$row['p_fid']) //Checks if the logged in id matches with id in DB
          { 
		    $type="Adult";
			$sex="Male";
			if($row['p_passtype']=='C'){$type="Child";}
			if($row['p_sex']=='F'){$sex="Female";}
                     	echo '<tr>
						      <td>'.$row['p_name'].'</td>
							  <td>'.$row['p_age'].'</td>
							  <td>'.$sex.'</td>
							  <td>'.$type.'</td>
						</tr>';	
            }
        }
		?>
        	</table>
              <table class="table table-bordered">
                 <tr>
                    <td align="right">
                    	 <form action="cancel.php" method="POST">
                             <input type='hidden' value='<?php echo $result[0]['p_pnr'] ?>' id='p_pnr' name='p_pnr' />
                             <input type='hidden' value='<?php echo $result[0]['p_fno'] ?>' id='p_fno' name='p_fno' />
                             <button type="submit" value="cancel" name="cancel" class="btn btn-primary ">Cancel Bookings</button>
                         </form>
                    </td>
                 </tr>
              </table>
		 		</td>
                </tr>
             </tbody>
          </table>
          <hr />
     <?php 
	   } 
	 }
?>
    
<?php include SITEURL.'/includes/overall/footer.php'; ?>