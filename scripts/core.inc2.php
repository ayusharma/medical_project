
<!---
Author Name: Ayush Sharma
College: Arya College Of engineering & IT.
Find eme at:
ayush.sharma469@gmail.com
www.github.com/ayusharma

--->
<?php
ob_start();
session_start();
$current_file = $_SERVER['SCRIPT_NAME'];

if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])){
      $http_referer = $_SERVER['HTTP_REFERER'];
}

function loggedin(){

  if(isset($_SESSION['username']) && !empty($_SESSION['username'])){
    return true;
  }
  else {
    return false;
  }

}


 function getfieldadmin($field){
 $query = "SELECT `$field` FROM `admin` WHERE `id`='".$_SESSION['username']."'";
 if($query_run = mysql_query($query)){
  if($query_result= mysql_result($query_run,0,$field))
  {
    return $query_result;
  }
 }
 }

?>