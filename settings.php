<?php 
    $title = 'Airlines | Settings';
	include $_SERVER["DOCUMENT_ROOT"].'/airline/core/init.php';
	f_protect_page();
	include SITEURL.'/includes/overall/header.php';
	$name = $f_data['f_fname'].' '.$f_data['f_lname'];
	$query="SELECT * FROM `card_details` WHERE `c_name`='$name'";
  	$result2=$db->query($query);
  	$b=$result2[0];
	if(empty($_POST)===false) {
		$required_fields = array('f_fname','f_lname','f_mailid');
		foreach($_POST as $key=>$value) {
			if(empty($value) && in_array($key, $required_fields) === true ) {
				$errors[] = 'All the fields are required';
				break 1;
			}
		}

		if(empty($errors) === true ) {
			if(filter_var($_POST['f_mailid'], FILTER_VALIDATE_EMAIL) === false) {
				$errors[] = 'Please enter a valid email address';
			}
			if(f_email_exists($_POST['f_mailid']) === true && $f_data['f_mailid'] !== $_POST['f_mailid']){
				$errors[] ='Sorry, the email is already in use';
			}
			if(!preg_match('/^[a-z]{2,30}$/i', $_POST['f_fname'])) {
				$errors[] = 'Your first name can contain only alphabets';
			}
			if(!preg_match('/^[a-z]{2,30}$/i', $_POST['f_lname'])) {
				$errors[] = 'Your last name can contain only alphabets';
			}
		}
	}
?>

	<h3>Settings</h3>

<?php

	if(isset($_GET['success']) ===true && empty($_GET['success'])===true) {
		echo 'Updated!';
	}
	else 
	{
	if(empty($_POST) ===false && empty($errors)===true) {
		$update_data = array(
			'f_fname' 	=> $_POST['f_fname'],
			'f_lname' 	=> $_POST['f_lname'],
			'f_mailid'	=> $_POST['f_mailid'],
			);
		update_f($session_f_id, $update_data);
		header('Location: settings.php?success');
		exit();
	}
	else if(empty($errors) === false ) {
		echo output_errors($errors);
	}

?>
<br />
<div class="row">
<div class="col-md-6">
    <form action="" method="POST">
        <div class="form-group">
            <label>First Name: </label> 
            <input type="text" name="f_fname"  class="form-control"  value="<?php echo $f_data['f_fname']; ?>"/>
        </div>
        <div class="form-group">
        <label>Last Name: </label>
        <input type="text" name="f_lname" class="form-control" value="<?php echo $f_data['f_lname']; ?>"/>
        </div>
        <div class="form-group">
        <label>Email ID: </label>
        <input type="text" name="f_mailid" class="form-control" value="<?php echo $f_data['f_mailid']; ?>"/>
        </div>
        <input type="submit" class="btn btn-primary" value="Update" />
    
    </form>
</div>
<div class="col-md-6">
   <h4>Card Details</h4>
   <table class="table table-bordered">
   		<tr>
            <th colspan="2"> TOTAL Balance : <?php echo $b['c_balance']; ?> /- Rupees</th>
        </tr>
        <tr>
        	<td>Name On Card </td>
            <td><?php echo $b['c_name']; ?></td>
        </tr>
        <tr>
        	<td>Card Number</td>
            <td><?php echo $b['c_cnum']; ?></td>
        </tr>
        <tr>
        	<td>Card CVV</td>
            <td><?php echo $b['c_cvv']; ?></td>
        </tr>
   </table>
</div>
</div>
<?php
}

	include SITEURL.'/includes/overall/footer.php';

?>