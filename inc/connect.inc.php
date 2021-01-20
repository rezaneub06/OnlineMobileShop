<?php 
	$con=mysqli_connect("localhost","root","","grocery");
	if(!$con){
		die("database failed ".mysqli_error($con));
	}
	// mysql_connect("localhost","root","") or die("Couldn't connect to SQL server");
	// mysql_select_db("grocery") or die("Couldn'ttt select DB");
?>
