<!---
Author Name: Ayush Sharma
College: Arya College Of engineering & IT.
Find eme at:
ayush.sharma469@gmail.com
www.github.com/ayusharma

-->
<?php
	require 'connect.inc.php';
if(isset($_POST['search'])){
	$search =  	$_POST['search'];
	$query = "SELECT * FROM `signup` WHERE `name` LIKE '%".$search."%' OR `username` LIKE '%".$search."%' OR `id` LIKE '%".$search."%'  OR `email` LIKE '".$search."'  OR `age` LIKE '".$search."'";
	if ($query_run = mysql_query($query)){
		$mysql_num_rows = mysql_num_rows($query_run);
		if($mysql_num_rows>=1){
				while($query_result= mysql_fetch_array($query_run,MYSQL_ASSOC)){
					
					echo '<b>ID</b>: '.$search = $query_result['id'].'<br><b>Name</b>: '.$search = $query_result['name'].'<br><b>Username</b>: '.$search = $query_result['username'].'<br><b>Email</b>: '.$search = $query_result['email'].'<br><b>Age</b>: '.$search = $query_result['age'].'<hr><br>';
				}
		}
		else {
			echo $search = 'No result found';
		}
	}
	else {
		echo $search = 'Query is not running';
	}

}



?> 