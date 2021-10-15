<?php
$conn = mysqli_connect("localhost","root","","wedding");
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
$conn -> set_charset("utf8");
 
error_reporting( error_reporting() & ~E_NOTICE );
date_default_timezone_set('Asia/Bangkok');

?>