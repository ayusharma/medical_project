<!---
Author Name: Ayush Sharma
College: Arya College Of engineering & IT.
Find eme at:
ayush.sharma469@gmail.com
www.github.com/ayusharma

--->
<?php
  $host = 'localhost';
  $user = 'root';
  $password = '';
  $mysql_db = 'mp';
  $conn_err = 'could not connect';

  if(!@mysql_connect($host,$user,$password) || !@mysql_select_db($mysql_db))
  {
    die($conn_err);
  }
  
?>