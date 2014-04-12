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
	<title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="stylesheet/signup.css"/>
	<script type="text/javascript" src="scripts/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="scripts/effects.js"></script>
    <script type="text/javascript" src="scripts/photo.js"></script>
    <script type="text/javascript" src="scripts/search.js"></script>
</head>

<body>
	<div class="help"></div>
	<header>
    	<div class="HeaderTitle">
    	<img src="images/logo.png" width="70" height="70">
        </div>
        <nav>
        	<ul>
                <li><a href="userlogin.php">Sign In</a></li>
            </ul>
        </nav>
        
    </header>
    <hr>
    <div class="notify">
    		<div class="notifytext"></div>
   		 	<div class="cross">X</div>
    </div>
    <div class="heading"><h1>User Registration</h1></div>
    <?php
		require 'scripts/connect.inc.php';
		if(isset($_POST['name']) && isset($_POST['username']) && isset($_POST['name']) && isset($_POST['age']) && isset($_POST['sex']) && isset($_POST['city']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirmpassword']) && isset($_POST['sec_que']) && isset($_POST['answer']) ){
			$name = strtolower(htmlentities($_POST['name']));
			$username = htmlentities($_POST['username']);
			$age = strtolower(htmlentities($_POST['age']));
			$sex = strtolower(htmlentities($_POST['sex']));
			$city = strtolower(htmlentities($_POST['city']));
			$email = htmlentities($_POST['email']);
			$password = htmlentities($_POST['password']);
			$password_hash = md5($password);
			$confirmpassword =htmlentities($_POST['confirmpassword']);
			$sec_que = strtolower(htmlentities($_POST['sec_que']));
			$answer = strtolower(htmlentities($_POST['answer']));
			$filename = htmlentities($_FILES['file']['name']);
 			$size = $_FILES['file']['size'];
  			$type = $_FILES['file']['type'];
  			$tmp_name = $_FILES['file']['tmp_name'];
  			$extension = strtolower(substr($filename, strpos($filename,'.')+1));
			$max_size = 2097152;
			$location = 'profiles/';
			if(!empty($name) && !empty($username) && !empty($filename) && !empty($age) && !empty($sex) && !empty($city) && !empty($email) && !empty($password) && !empty($confirmpassword) && !empty($sec_que) && !empty($answer)){
						$query_username = "SELECT * FROM `signup` WHERE  `username` LIKE  '".$username."'";
						$query_username_run = mysql_query($query_username);
						$query_username_num_rows = mysql_num_rows($query_username_run);
						$query_email = "SELECT * FROM  `signup` WHERE  `email` LIKE  '".$email."'";
						$query_email_run = mysql_query($query_email);
						$query_email_num_rows = mysql_num_rows($query_email_run);
						if($query_username_num_rows == 1){
							 echo'<script type="text/javascript">
									$(".notify").slideDown(1000);
									$(".cross").click(function(e) {
									$(".notify").slideUp(1000);
										});
									$(".notify > .notifytext").html("Username already chosen");
									</script>';	
							
							}
						
						else if($query_email_num_rows >=1){
							echo'<script type="text/javascript">
									$(".notify").slideDown(1000);
									$(".cross").click(function(e) {
									$(".notify").slideUp(1000);
										});
									$(".notify > .notifytext").html("Email Id already registered.");
									</script>';	
							}
						else if($password != $confirmpassword){
							echo'<script type="text/javascript">
							$(".notify").slideDown(1000);
							$(".cross").click(function(e) {
							$(".notify").slideUp(1000);
								});
							$(".notify > .notifytext").html("Password combination does not match.");
							</script>';	
						}
						else{
						if(($extension =='jpg' || $extension == 'jpeg') && $size < $max_size && ($type=='image/jpg' || $type=='image/jpeg')){
								 move_uploaded_file($tmp_name,$location.$filename);
								$extension = '.'.$extension;
								rename($location.$filename,$location.$username.$extension);
								 
								 $query = "INSERT INTO `mp`.`signup` (`id`, `username`, `password`, `name`, `email`, `age`, `sex`, `city`, `sec_que`, `sec_ans`, `photo`) VALUES (NULL, '".$username."', '".$password_hash."', '".$name."', '".$email."', '".$age."', '".$sex."', '".$city."', '".$sec_que."', '".$answer."', '".$location.$username.$extension."')";
								 
								 if($query_run = mysql_query($query)){
										 echo'<script type="text/javascript">
										$(".notify").slideDown(1000);
										$(\'form\').slideUp(1000);
										$(".cross").click(function(e) {
										$(".notify").slideUp(1000);
										});
										
										$(".notify > .notifytext").html("You\'ve successfully signed up. Click to go on <a href=\'userlogin.php\'>login page</a>");
										
										</script>';	
									 }
							 }
							 else {
								 echo'<script type="text/javascript">
										$(".notify").slideDown(1000);
										$(\'form\').slideUp(1000);
										$(".cross").click(function(e) {
										$(".notify").slideUp(1000);
										});
										
										$(".notify > .notifytext").html("File should be less than 2 MB and JPEG/JPG");
										
										</script>';	
							 }
							 
					}
		
				}
				else {
					echo'<script type="text/javascript">
							$(".notify").slideDown(1000);
							$(".cross").click(function(e) {
							$(".notify").slideUp(1000);
								});
							$(".notify > .notifytext").html("Please fill all the fields.");
							</script>';	
					}		
					
								
				}
			?>
	<form action="signup.php" method="POST" enctype="multipart/form-data">
		<table border="0">
 	    <tr>
            	<td>Your Name</td>
    			<td><input type="text" name="name" id="name" value="" class="FormElement" required></td>
            </tr>
            <tr>
            	<td>Choose a Username</td>
   				<td><input type="text" name="username" id="searchusername"class="FormElement" required></td>
            </tr>
            <tr>
                <td>Upload Your photo</td>
                <td><input type="file"  name="file" id="photo" class="file_upload"  onClick="imageDown();" onChange="readURL(this,'img_prev_Photo');" required></td>

            </tr>
            <tr>
                <td></td>
                <td><div id="imgDisplayPhoto" align='center' style="border: 1px solid;height:160px;width:120px;">
                    <img id="img_prev_Photo" src="images/profile.png"  alt="select a image" border="0"  style="height:160px;width:120px;">
                </div> </td>

            </tr>
            
            <tr>
            	<td>Age</td>
    			<td><input type="text"  name="age" id="age" value="" class="FormElementAge" maxlength="3" required></td>
            </tr>

            <tr>
            	<td>Sex</td>
    			<td>
                	<select name="sex" id="sex" required>
                    	<option value="male" selected >Male</option>
                        <option value="female">Female</option>
                    </select>
                </td>
            </tr>
            
            <tr>
            	<td>City</td>
    			<td><select name="city" id="city" required>
                    	<option value="delhi" >New Delhi</option>
                        <option value="jaipur" selected>Jaipur</option>
                        <option value="mumbai" >Mumbai</option>
                        <option value="kolkata" >Kolkata</option>
                    </select>
                </td>
            </tr>
            
            
            
            <tr>
            	<td>E-Mail</td>
   				<td><input type="email" name="email" id="email" value="" class="FormElement" required></td>
            </tr>
            
            <tr>
            	<td>Enter New Password</td>
    			<td><input type="password" name="password"  id="password" class="FormElement" maxlength="45" required></td>
            </tr>
            
            <tr>
            	<td>Confirm Password</td>
    			<td><input type="password" name="confirmpassword" class="FormElement" id="confirmpassword" maxlength="45" required></td>
            </tr>
            
            <tr>
            	<td>Secret Question</td>
    			<td><select name="sec_que" id="sec_que" required>
                    	<option value="Which is your first school ?" >Which is your first school ?</option>
                        <option value="Who is your favourite teacher ?" selected>Who is your favourite teacher ?</option>
                        <option value="What is your pet name ?" >What is your pet name ?</option>
                        <option value="Where is your bith-place ?" >Where is your bith-place ?</option>
                    </select>
                </td>
            </tr>
            
            <tr>
            	<td>Answer</td>
    			<td><input type="text" name="answer" class="FormElement" id="sec_ans" required></td>
            </tr>
            <tr>
            	<td>
            	<input type="submit" value="submit" class="button">
                </td>
            </tr>
    	</table>
    </form>
	
	
</body>

</html>