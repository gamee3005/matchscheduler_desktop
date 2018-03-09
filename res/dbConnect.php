<?php
//echo "Hello dbconnect1";
	define('HOST','localhost');
	define('USER','root');
//echo "Hello dbconnect2";
	define('PASS','');
	define('DB','test');
	
	$con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');
	//mysqli::set_charset('utf8', $con);
//echo "Hello dbconnect3";
return $con;
?>