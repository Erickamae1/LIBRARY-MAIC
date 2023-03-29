<?php
	$db = mysqli_connect("localhost","root","",'sample');
	/* server name,username,password,database name*/
	if(!$db)
	{
		die("Connection failed: " .mysqli_connect_error());
	}
	/*echo "Connected successfully.";*/	
?>