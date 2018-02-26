<?php 
  include $_SERVER["DOCUMENT_ROOT"].'/airline/core/init.php';
  include SITEURL.'/includes/overall/header.php';
?>

	<div class="row">
		<div class="col-lg-4">
			
		</div>
		<div class="col-lg-4">
			<div class="well bs-component">
				<legend>Credit/Debit Card Details</legend>
				<form class="form-horizontal" action="confirm.php" method="POST">
					<div class="form-group">
	                    <div class="col-lg-12">
	                      <input type="text" required class="form-control" maxlength="32" name="carduser" id="carduser" placeholder="Card Holder Name">
	                    </div>
	                </div>
	                <div class="form-group">
	                    <div class="col-lg-8">
	                      <input type="text" required maxlength="16" class="form-control" name="cardnum" id="cardnum" placeholder="Card Number">
	                      </div>
	                      <div class="col-lg-4">
	                      <input type="password" required maxlength="3" class="form-control" name="cvvnum" id="cvvnum" placeholder="CVV">
	                    </div>
	                </div>
	                <center>
	                 <?php 
					  if(f_logged_in()===true) {
						$puname = $_GET['puname'];
						$puadd = $_GET['puadd'];
						$puphno = $_GET['puphno'];
						$pumail = $_GET['pumail'];
					    if(isset($_GET['chose_to'])===true) {
							$to = $_GET['chose_to'];
							$class = $_GET['class'];
							$counta = $_GET['count_a'];
							$countc = $_GET['count_c'];
					?>		
                         <input type="hidden" name="count_a" value="<?php echo $counta; ?>"/>
	             		<input type="hidden" name="count_c" value="<?php echo $countc; ?>"/>
	             		<input type="hidden" name="chose_to" value="<?php echo $to; ?>"/>
	              		<input type="hidden" name="class" value="<?php echo $class; ?>"/>
						<?php	if($counta!=0){
									for($a=1; $a<=$counta; $a++){
										$aname = "aname".$a;
										$aage = "aage".$a;
										$asex = "asex".$a;
										if(isset($_GET[$aname])){
										  echo '<input type="hidden" name="'.$aname.'" value="'.$_GET[$aname].'"/>
												<input type="hidden" name="'.$aage.'" value="'.$_GET[$aage].'"/>
												<input type="hidden" name="'.$asex.'" value="'.$_GET[$asex].'"/>';
										}
									}
								}
								if($countc!=0){
									for($c=1; $c<=$countc; $c++){
										$cname = "cname".$c;
										$cage = "cage".$c;
										$csex = "csex".$c;
										if(isset($_GET[$cname])){
											echo '<input type="hidden" name="'.$cname.'" value="'.$_GET[$cname].'"/>
												<input type="hidden" name="'.$cage.'" value="'.$_GET[$cage].'"/>
												<input type="hidden" name="'.$csex.'" value="'.$_GET[$csex].'"/>';
										}
										
									}
								}
							 	
							 if(isset($_GET['chose_fro'])===true) {
								 $fro = $_GET['chose_fro'];
								echo '<input type="hidden" name="chose_fro" value="'.$fro.'"/>';
								if($class==='Economy'){
									$eat1 = $_GET['eat1'];
									$eat2 = $_GET['eat2'];
									$ect1 = $_GET['ect1'];
									$ect2 = $_GET['ect2'];
									$etax1 = $etax2 = 500;  /**ADD Tax**/
									$etot1 = $eat1 + $ect1 + $etax1;
									$etot2 = $eat2 + $ect2 + $etax2;
									$etotr = $etot1 + $etot2;
									echo '<input type="hidden" name="ect1" value="'.$ect1.' "/>
											<input type="hidden" name="ect2" value="'.$ect2.'"/>
											<input type="hidden" name="eat1" value="'.$eat1.'"/>
											<input type="hidden" name="eat2" value="'.$eat2.'"/>
											<input type="hidden" name="etotr" value="'.$etotr.'"/>';
									
								}else if($class==='Business'){
									$bat1 = $_GET['bat1'];
									$bat2 = $_GET['bat2'];
									$bct1 = $_GET['bct1'];
									$bct2 = $_GET['bct2'];
									$btax1 = $btax2 = 1500;  /**ADD Tax**/
									$btot1 = $bat1 + $bct1 + $btax1;
									$btot2 = $bat2 + $bct2 + $btax2;
									$btotr = $btot1 + $btot2;  
									echo '<input type="hidden" name="bct1" value="'.$bct1.' "/>
											<input type="hidden" name="bct2" value="'.$bct2.'"/>
											<input type="hidden" name="bat1" value="'.$bat1.'"/>
											<input type="hidden" name="bat2" value="'.$bat2.'"/>
											<input type="hidden" name="btotr" value="'.$btotr.'"/>';
								}
                         		
					          }	else{  
					              if($class==='Economy'){ 
						            $eat1 = $_GET['eat1'];
									$ect1 = $_GET['ect1'];
									$etax1 = 500;  /**ADD Tax**/
									$etot1 = $eat1 + $ect1 + $etax1;
						          echo' <input type="hidden" name="ect1" value="'.$ect1.'"/>
	              				    	<input type="hidden" name="eat1" value="'.$eat1.'"/>
	              		          	    <input type="hidden" name="etot1" value="'.$etot1.'"/>';
						
					     	      }else if($class==='Business'){
									   $bat1 = $_GET['bat1'];
									   $bct1 = $_GET['bct1'];
									   $btax1 = 1500;  /**ADD Tax**/
									   $btot1 = $bat1 + $bct1 + $btax1;
									   echo' <input type="hidden" name="bct1" value="'.$bct1.'"/>
	              				    	<input type="hidden" name="bat1" value="'.$bat1.'"/>
	              		          	    <input type="hidden" name="btot1" value="'.$btot1.'"/>';
								  }
					          }
					    } 
					 }
				?>
		            	
                    
	                <input type="hidden" name="puname" value="<?php echo $puname; ?>"/>
	                <input type="hidden" name="puadd" value="<?php echo $puadd; ?>"/>
	                <input type="hidden" name="puphno" value="<?php echo $puphno; ?>"/>
	                <input type="hidden" name="pumail" value="<?php echo $pumail; ?>"/>
	                <button type="submit" id="book_f" name="book_f" class="btn btn-primary">Pay</button></center>
				</form>
			</div>
		</div>
		<div class="col-lg-4">
			
		</div>
	</div>

<?php include SITEURL.'/includes/overall/footer.php'; ?>