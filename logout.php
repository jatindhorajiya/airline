<?php

	session_start();
	session_destroy();
	header('Location: '.$_SERVER["DOCUMENT_ROOT"].'/airline/index.php');

?>