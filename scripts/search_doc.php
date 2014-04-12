<!---
Author Name: Ayush Sharma
College: Arya College Of engineering & IT.
Find eme at:
ayush.sharma469@gmail.com
www.github.com/ayusharma

-->
<?php
	require 'connect.inc.php';
if(isset($_POST['search_doc'])){
	$search_doc =  	$_POST['search_doc'];
	$query = "SELECT * FROM `doctor` WHERE `Doc_name` LIKE '%".$search_doc."%' OR `Doc_email` LIKE '%".$search_doc."%' OR `id` LIKE '%".$search_doc."%'  OR `type` LIKE '%".$search_doc."%'  OR `tags` LIKE '%".$search_doc."%'  OR `info` LIKE '%".$search_doc."%'  OR `city` LIKE '%".$search_doc."%'";
	if ($query_run = mysql_query($query)){
		$mysql_num_rows = mysql_num_rows($query_run);
		if($mysql_num_rows>=1){
				while($query_result= mysql_fetch_array($query_run,MYSQL_ASSOC)){
					
					echo '<b>ID</b>: '.$search = $query_result['id'].'<br><b>Name</b>: '.$search = $query_result['Doc_name'].'<br><b>Type</b>: '.$search = $query_result['type'].'<br><b>Email</b>: '.$search = $query_result['Doc_email'].'<br><b>Contact</b>: '.$search = $query_result['doc_contact'].'<br><b>info</b>: '.$search = $query_result['info'].'<br><b>Tags</b>: '.$search = $query_result['tags'].'<br><b>City</b>: '.$search = $query_result['city'].'<hr><br>';
				}
		}
		else {
			echo $search_doc = 'No result found';
		}
	}
	else {
		echo $search_doc = 'Query is not running';
	}

}



?> 