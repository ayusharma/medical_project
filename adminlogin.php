<!---
Author Name: Ayush Sharma
College: Arya College Of engineering & IT.
Find eme at:
ayush.sharma469@gmail.com
www.github.com/ayusharma

-->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="stylesheet/adminlogin.css"/>
    <script type="text/javascript" src="scripts/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="scripts/effects.js"></script>
</head>

<body>
	
	<header>
    	<div class="HeaderTitle">
    	<img src="images/logo.png" width="70" height="70">
        </div>
        <nav>
        	<ul>
            	<li><a href="home.php">Home</a></li>
                <li><a href="userlogin.php">Sign In</a></li>
            </ul>
        </nav>
        
    </header>
     <hr>
    
     <div class="heading"><h1>Admin Log In</h1></div>
     <div class="notify">
    		<div class="notifytext"></div>
   		 	<div class="cross">X</div>
    </div>
<?php
	require 'scripts/connect.inc.php';
	require 'scripts/core.inc2.php';
	if(isset($_POST['admin_name']) && isset($_POST['admin_password'])){
		$admin_name = $_POST['admin_name'];
		$admin_password = $_POST['admin_password'];
		$password_hash = md5($admin_password);
		if(!empty($admin_name) && !empty($admin_password)){
			$query = "SELECT `id` FROM `admin` WHERE `admin_name`='".mysql_real_escape_string($admin_name)."' AND `admin_password`='".mysql_real_escape_string($password_hash)."'";
			 if($query_run = mysql_query($query)){
			 $query_num_rows = mysql_num_rows($query_run);
			 if($query_num_rows == 0)
			 {
				 echo'<script type="text/javascript">
				$(".notify").slideDown(1000);
				$(".cross").click(function(e) {
				$(".notify").slideUp(1000);
					});
				$(".notify > .notifytext").html("Invalid Username/Password Combination.");
				</script>';
			 }
			 else if($query_num_rows == 1) {
				 $user_id = mysql_result($query_run,0,'id');
                 $_SESSION['username'] = $user_id;
                 header('Location: adminpanel.php');
				 }
		 }
		}
		else {
			echo '<script type="text/javascript">
			$("document").ready(function(){
				slidedown();
				$(".notify > .notifytext").html("Please fill all the fields.");
			});
			</script>';
		}
	}
	

?>
     
	<form action="adminlogin.php" method="POST">
		<table border="0">
        	
            
            <tr>
            	<td>Admin Username</td>
   				<td><input type="text" name="admin_name" class="FormElement" r></td>
            </tr>
            
           
            <tr>
            	<td>Admin Password</td>
    			<td><input type="password" name="admin_password" class="FormElement" ></td>
            </tr>
            
           
            <tr>
            	<td>
            	<input type="submit" value="Sign In" class="button">
                </td>
                <td>
                </td>
               
            </tr>
    	</table>
    </form>
   
</body>

</html>
