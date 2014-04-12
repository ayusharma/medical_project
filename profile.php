<!---
Author Name: Ayush Sharma
College: Arya College Of engineering & IT.
Find eme at:
ayush.sharma469@gmail.com
www.github.com/ayusharma

-->
<?php
 require 'scripts/core.inc.php';
 require 'scripts/connect.inc.php';
if(loggedin()){
	$visitor_name = strtoupper(getfield('name'));
	$visitor_photo = getfield('photo');
	$visitor_username = getfield('username');
	$visitor_age = getfield('age');
	$visitor_sex = strtoupper(getfield('sex'));
	$visitor_city = strtoupper(getfield('city'));
	$visitor_que = strtoupper(getfield('sec_que'));
	$visitor_ans = strtoupper(getfield('sec_ans'));
	$visitor_email = getfield('email');
	$visitor_password = getfield('password');
	
?>
	<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Profile</title>
    <link rel="stylesheet" type="text/css" href="stylesheet/profile.css"/>
    <script type="text/javascript" src="scripts/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="scripts/photo.js"></script>
	<script type="text/javascript" src="scripts/effects.js"></script>
</head>

<body>
	
	<header>
    	<div class="HeaderTitle">
    		<img src="images/logo.png" width="70" height="70" border="0"/>
        </div>
        <nav>
        	<ul>
            	<li><a href="home.php">Home</a></li>
                <li><a href="aboutus.php">About Us</a></li>
                <li><a href="findadoc.php">Find a Doctor</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="connect.php">Connect</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
     <hr>
     <div class="full_status">
		 <div class="status">
			<div class="status_image"><img src="<?php echo $visitor_photo; ?>" width="40" height="40"></div>
			<div class="status_name">Welcome  <?php echo $visitor_name;?></div>
		</div>
		</div>
		
     <div class="heading"><h1>Customize Your Profile</h1></div>
	 <div class="notify">
    		<div class="notifytext"></div>
   		 	<div class="cross">X</div>
    </div>
     <div class="menu">
    	<div class="bar">
        	<ul>
            	<li>View</li>
                <li>Edit</li>
            </ul>
        </div>
        <div class="query">
        	<div class="move">
        		<div class="doctor">
               
		<table border="0">
        	<tr>
            	<td>Username</td>
    			<td><div class="FormElement1"><?php echo $visitor_username; ?></div></td>
            </tr>
			<tr>
            	<td>Your name</td>
    			<td><div class="FormElement1"><?php echo $visitor_name; ?></div></td>
            </tr>
           
            <tr>
            	<td>Profile Picture</td>
   				<td><div class="FormElement1" style="height:200px; width:200px"><img src="<?php echo $visitor_photo; ?>" width="200" height="200"></div></td>
            </tr>
            <tr>
            	<td>Age</td>
    			<td><div class="FormElement1"><?php echo $visitor_email; ?></div></td>
            </tr>
            <tr>
            	<td>Age</td>
    			<td><div class="FormElement1"><?php echo $visitor_age; ?></div></td>
            </tr>
			<tr>
            	<td>Sex</td>
    			<td><div class="FormElement1"><?php echo $visitor_sex; ?></div></td>
            </tr>
			<tr>
            	<td>City</td>
    			<td><div class="FormElement1"><?php echo $visitor_city; ?></div></td>
            </tr>
			<tr>
            	<td>Secret Question</td>
    			<td><div class="FormElement1"><?php echo $visitor_que; ?></div></td>
            </tr>
			<tr>
            	<td>Your Answer</td>
    			<td><div class="FormElement1"><?php echo $visitor_ans; ?></div></td>
            </tr>
            
            
    	</table>
    
            	</div>
            	<div class="user">
                <?php
				if(isset($_POST['name']) && isset($_POST['username'])  && isset($_POST['age'])  && isset($_POST['city']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirmpassword'])){
			$name = strtolower(htmlentities($_POST['name']));
			$username = htmlentities($_POST['username']);
			$age = strtolower(htmlentities($_POST['age']));
			$city = strtolower(htmlentities($_POST['city']));
			$email = htmlentities($_POST['email']);
			$password = htmlentities($_POST['password']);
			$password_old = htmlentities(md5($_POST['password_old']));
			$confirmpassword =htmlentities($_POST['confirmpassword']);
			$filename = htmlentities($_FILES['file']['name']);
 			$size = $_FILES['file']['size'];
  			$type = $_FILES['file']['type'];
  			$tmp_name = $_FILES['file']['tmp_name'];
  			$extension = strtolower(substr($filename, strpos($filename,'.')+1));
			$max_size = 2097152;
			$location = 'profiles/';
								if(!empty($password) && !empty($confirmpassword)){
											$password_hash = md5($password);
									}
									else{
										$password_hash = $visitor_password;
									}
									
			
			if(!empty($name) && !empty($username) &&  !empty($age) && !empty($city) && !empty($email) && !empty($password_old)){
						$query_username = "SELECT * FROM `signup` WHERE  `username` LIKE  '".$username."' AND `id`!='".$_SESSION['user_id']."'";
						$query_username_run = mysql_query($query_username);
						$query_username_num_rows = mysql_num_rows($query_username_run);
						$query_email = "SELECT * FROM  `signup` WHERE  `email` LIKE  '".$email."' AND `id`!='".$_SESSION['user_id']."'";
						$query_email_run = mysql_query($query_email);
						$query_email_num_rows = mysql_num_rows($query_email_run);
						if($query_username_num_rows == 1){
							 echo'<script type="text/javascript">
									$("document").ready(function(){
									slidedown();
									$(".notify > .notifytext").html("Username already chosen");
									
									});
									</script>';	
							
							}
						
						else if($query_email_num_rows >=1){
							echo'<script type="text/javascript">
									$("document").ready(function(){
									slidedown();
									$(".notify > .notifytext").html("Email Id already registered.");
									});
									</script>';	
							}
						else if($password_old != $visitor_password){
							if($password != $confirmpassword ){
								echo'<script type="text/javascript">
							$("document").ready(function(){
							slidedown();
							$(".notify > .notifytext").html("New Password &amp; Confirm Password does not match.");
							});
							</script>';	
								}
							else{
							echo'<script type="text/javascript">
							$("document").ready(function(){
							slidedown();
							$(".notify > .notifytext").html("Incorrect current password.");
							});
							</script>';	
							}
						}
						else{
									
						if(!empty($filename) && isset($filename) &&(($extension =='jpg' || $extension == 'jpeg') && $size < $max_size && ($type=='image/jpg' || $type=='image/jpeg'))){
								@unlink($visitor_photo);
								move_uploaded_file($tmp_name,$location.$filename);
								$extension = '.'.$extension;
								
								rename($location.$filename,$location.$username.$extension);
								 
								 $query = "UPDATE `signup` SET `id`='".$_SESSION['user_id']."',`username`='".$username."',`password`='".$password_hash."',`name`='".$name."',`email`='".$email."',`age`='".$age."',`city`='".$city."',`photo`='".$location.$username.$extension."' WHERE `id`='".$_SESSION['user_id']."'";
								 if($query_run = mysql_query($query)){
										 echo'<script type="text/javascript">
										 $("document").ready(function(){
											slidedown();
										$(".notify > .notifytext").html("You\'ve successfully edited your profile.");
										$(".move").animate({top:-600},500);
										 });
										</script>';	
									 }
									 else {
										 echo'<script type="text/javascript">
										 $("document").ready(function(){
										slidedown();
										$(".notify > .notifytext").html("An error has been occured.");
										 });
										
										</script>';	
										 
									 }
							 }
							 else if(empty($filename_post) && !isset($filename_post)){
								 $query = "UPDATE `signup` SET `id`='".$_SESSION['user_id']."',`username`='".$username."',`password`='".$password_hash."',`name`='".$name."',`email`='".$email."',`age`='".$age."',`city`='".$city."' WHERE `id`='".$_SESSION['user_id']."'";
								 if($query_run = mysql_query($query)){
										 echo'<script type="text/javascript">
										 $("document").ready(function(){
											slidedown();
										$(".notify > .notifytext").html("You\'ve successfully edited your profile.");
										 });
										</script>';	
									 }
									 else {
										 echo'<script type="text/javascript">
										 $("document").ready(function(){
										slidedown();
										$(".notify > .notifytext").html("An error has been occured.");
										 });
										
										</script>';	
										 
									 }
								 
							 }
							 
							 else {
								 echo'<script type="text/javascript">
										 $("document").ready(function(){
										slidedown();
										$(".notify > .notifytext").html("File should be less than 2 MB and JPEG/JPG");
										 });
										</script>';	
							 }
							
							 
					}
		
				}
				else {
					echo'<script type="text/javascript">
							$("document").ready(function(){
							slidedown();
							$(".notify > .notifytext").html("Please fill all the fields.");
							});
							</script>';	
					}		
					
								
				}
				?>
                
				<form action="profile.php" method="POST" enctype="multipart/form-data">
		<table border="0">
 	    <tr>
            	<td>Your Name</td>
    			<td><input type="text" name="name" value="<?php echo $visitor_name; ?>" class="FormElement" required></td>
            </tr>
            <tr>
            	<td>Choose a Username</td>
   				<td><input type="text" name="username" value="<?php echo $visitor_username; ?>" class="FormElement" required></td>
            </tr>
            <tr>
                <td>Upload Your photo</td>
                <td><input type="file"  name="file" class="file_upload"  onClick="imageDown();" onChange="readURL(this,'img_prev_Photo');" ></td>

            </tr>
            <tr>
                <td></td>
                <td><div id="imgDisplayPhoto" align="center" style="border: 1px solid;height:160px;width:120px;">
                    <img id="img_prev_Photo" src="<?php echo $visitor_photo; ?>"  alt="select a image" border="0"  style="height:160px;width:120px;">
                </div> </td>

            </tr>
            
            <tr>
            	<td>Age</td>
    			<td><input type="text" name="age" value="<?php echo $visitor_age; ?>" class="FormElementAge" maxlength="3" required></td>
            </tr>

            
            <tr>
            	<td>City</td>
    			<td><select name="city" required>
                    	<option value="delhi" >New Delhi</option>
                        <option value="jaipur" selected>Jaipur</option>
                        <option value="mumbai" >Mumbai</option>
                        <option value="kolkata" >Kolkata</option>
                    </select>
                </td>
            </tr>
            
            
            
            <tr>
            	<td>E-Mail</td>
   				<td><input type="email" name="email" value="<?php echo $visitor_email; ?>" class="FormElement" required></td>
            </tr>
            
            <tr>
            	<td>Enter current password</td>
    			<td><input type="password" name="password_old" class="FormElement" placeholder="Always Required" required></td>
            </tr>
            <tr>
            	<td>Enter New Password</td>
    			<td><input type="password" name="password" class="FormElement" placeholder="Provide If you want to change" ></td>
            </tr>
            
            <tr>
            	<td>Confirm Password</td>
    			<td><input type="password" name="confirmpassword" class="FormElement" placeholder="Provide If you want to change"></td>
            </tr>
            
           
            <tr>
            	<td>
            	<input type="submit" value="submit" class="button">
                </td>
            </tr>
    	</table>
    </form>
            	</div>
            	<div class="delete">hhv
            	</div>
             </div>
         </div>
     </div>

</body>

</html>

<?php
}
else {
	header('Location: userlogin.php');	
}

?>

