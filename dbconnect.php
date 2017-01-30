<?php
	@$dbcnx = new mysqli('localhost', 'root', '', 'heypasta');
	if(mysqli_connect_errno()){
		echo 'Error: could not connect to database.Please try again later.';
		exit;
		}
	if(!$dbcnx->select_db("heypasta"))
		exit("<p>Unable to locate heypasta</p>");
?>