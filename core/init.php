<?php 
	ob_start();
	session_start();
	//error_reporting(0);
    define ('SITEURL',$_SERVER["DOCUMENT_ROOT"].'/airline');
	define ('WSITEURL','http://'.$_SERVER['HTTP_HOST'].'/airline');
	
	require SITEURL.'/core/database/connect.php';
	require SITEURL.'/core/functions/general.php';
	require SITEURL.'/core/functions/users.php';
	
	$current_file = $_SERVER['SCRIPT_NAME'];
	$current_file = explode('/',$current_file);
	$current_file = end($current_file);

	if(f_logged_in() === true) {
	      $session_f_id = $_SESSION['f_id'];
	      $f_data = f_data($session_f_id,'f_id','f_uname','f_password','f_fname','f_lname','f_address','f_phone','f_mailid','f_sex','f_regdate','f_passrec');
	      if(f_active($f_data['f_uname']) === false) {
			session_destroy();
			header('Location: '.SITEURL.'/index.php');
			exit();
		}
		
	      if($current_file !== 'changepass.php' && $current_file !== 'logout.php' && $f_data['f_passrec'] == 1) {
	      		header('Location: '.SITEURL.'/changepass.php?force');
	      		exit();
	      }
	}
	require SITEURL.'/adminpanel/config/config.php';

	$errors = array();

?>