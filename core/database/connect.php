<?php

	$connect_error = 'Sorry, there was some connectivity issue!';
	@mysql_connect('localhost:3308','root','') or die($connect_error);
	@mysql_select_db('airline') or die($connect_error);

?>