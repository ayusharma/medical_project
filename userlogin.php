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
	<title>User Login</title>
    <link rel="stylesheet" type="text/css" href="stylesheet/userlogin.css"/>
    <script type="text/javascript" src="scripts/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="scripts/effects.js"></script>
</head>

<body>
	
	<header>
    	<div class="HeaderTitle">
        	<img src="images/logo.png">
    
        </div>
        <nav>
        	 A System to Prescribe the Medicine for Given Symptoms
        </nav>
        
    </header>
    <hr>
    <div class="notify">
    		<div class="notifytext"></div>
   		 	<div class="cross">X</div>
    </div>
    
    
    <?php
 require 'scripts/connect.inc.php';
 require 'scripts/core.inc.php';
  @$http_client_ip = $_SERVER['HTTP_CLIENT_IP'];
  @$http_x_forwarded_for = $_SERVER['HTTP_X_FORWARDED_FOR'];
  @$remote_addr = $_SERVER['REMOTE_ADDR'];
  
  $browser = get_browser(null,true);
  $browser = strtolower($browser['browser']); //selecting the key element browser
  date_default_timezone_set('Asia/Calcutta');
  $date = date('Y/m/d H:i:s');
     
     if(!empty($http_client_ip)){
      $ip = $http_client_ip;
     }else if (!empty($http_x_forwarded_for)){
           $ip = $http_x_forwarded_for;
          
     }else {
       $ip = $remote_addr;
      
     }
 
 $query_security = "INSERT INTO `mp`.`security` (`id`, `ip`, `browser`,`time`) VALUES (NULL, '".$ip."', '".$browser."','".$date."')";
 $query_security_run = mysql_query($query_security);

 if(isset($_POST['username']) && isset($_POST['password'])){
	 if(!empty($_POST['username']) && !empty($_POST['username'])){
		 $username = $_POST['username'];
		 $password = $_POST['password'];
		 $password_hash = md5($password);
		 
		 $query = "SELECT `id` FROM `signup` WHERE `username`='".mysql_real_escape_string($username)."' AND `password`='".mysql_real_escape_string($password_hash)."'";
		 
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
                 $_SESSION['user_id'] = $user_id;
                 header('Location: home.php');
				 }
		 }
		 
		 
		 
	 }
	 else {
			 echo'<script type="text/javascript">
				$(".notify").slideDown(1000);
				$(".cross").click(function(e) {
				$(".notify").slideUp(1000);
					});
				$(".notify > .notifytext").html(" Please Fill all the fields.");
				</script>';
		 
	 }
 }
 ?>
 
 
	<form action="<?php echo $current_file; ?>" method="POST">
		<table border="0">
        	
            
            <tr>
            	<td>Username</td>
   				<td><input type="text" name="username" class="FormElement" maxlength="45" required></td>
            </tr>
            
           
            <tr>
            	<td>Password</td>
    			<td><input type="password" name="password" class="FormElement" maxlength="45" required></td>
            </tr>
            
           
            <tr>
            	<td>
                </td>
                <td>
                  	<input type="submit" value="Log IN" class="button">
                </td>
            </tr>
    	</table>
    </form>
    <div class="WantSignUp"><a href="adminlogin.php">forgot password</a> ?
         <br><br>
         Click to <a href="signup.php">Sign Up</a>
    	<br>
        <br>
        Go to <a href="adminlogin.php">Admin Panel</a>
    </div>
	
	
</body>

</html>