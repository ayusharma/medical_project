
<!---
Author Name: Ayush Sharma
College: Arya College Of engineering & IT.
Find eme at:
ayush.sharma469@gmail.com
www.github.com/ayusharma

-->
<?php
	require 'connect.inc.php';
if(isset($_POST['username'])){
	$username =  	$_POST['username'];
	$query = "SELECT * FROM `signup` WHERE `username` LIKE '".$username."'";
	if ($query_run = mysql_query($query)){
		$mysql_num_rows = mysql_num_rows($query_run);
		if($mysql_num_rows>=1){
				
					
					echo 'Username already chosen';
				
		}
		else {
				if(strlen($username)==0){
			echo $username = 'Type a Username';
				}
			else {
				echo $username = 'Valid Username';
			}
		}
	}
	else {
		echo $username = 'Query is not running';
	}

}



?> 