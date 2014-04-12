<!---
Author Name: Ayush Sharma
College: Arya College Of engineering & IT.
Find eme at:
ayush.sharma469@gmail.com
www.github.com/ayusharma

--->
<?php
	require 'connect.inc.php';
if(isset($_POST['email'])){
	$email =  	$_POST['email'];
	$query = "SELECT * FROM `signup` WHERE `email` LIKE '".$email."'";
	if(filter_var($email,FILTER_VALIDATE_EMAIL)){
	if ($query_run = mysql_query($query)){
		$mysql_num_rows = mysql_num_rows($query_run);
		if($mysql_num_rows>=1){
		
					echo 'Email ID Already Chosen';
				
		}
		else {
			echo $email = 'Valid Email ID';
		}
	}
	else {
		echo $email = 'Query is not running';
	}
	}
	else {
		if(strlen($email)==0){
		echo $email = 'Enter Email Address';
		}
		else {
			echo $email = 'Invalid Email';
		}
	}
}



?> 