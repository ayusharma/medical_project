<!---
Author Name: Ayush Sharma
College: Arya College Of engineering & IT.
Find eme at:
ayush.sharma469@gmail.com
www.github.com/ayusharma

-->
<?php

 require 'scripts/connect.inc.php';
 require 'scripts/core.inc.php';

 if(loggedin()){
	
 $visitor_name = strtoupper(getfield('name'));
 $visitor_photo = getfield('photo');
 $visitor_email = getfield('email');

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Connect</title>
    <link rel="stylesheet" type="text/css" href="stylesheet/connect.css"/>
    <script type="text/javascript" src="scripts/jquery-1.11.0.min.js"></script>
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
			<div class="status_name">Welcome <?php echo $visitor_name; ?></div>
		</div>
		</div>
     <div class="heading"><h1>We Are Just a Click Away</h1></div>
     <div class="notify">
    		<div class="notifytext"></div>
   		 	<div class="cross">X</div>
    </div>
     <div class="menu">
    	<div class="bar">
        	<ul>
            	<li>Write to Us</li>
                <li>Contact Detail</li>
                
            </ul>
        </div>
        <div class="query">
        	<div class="move">
        		<div class="doctor">
                <?php
				 if(isset($_POST['message'],$_POST['subject'])){
			$subject =htmlentities($_POST['subject']);
			$message =htmlentities($_POST['message']);
			if(!empty($subject) && !empty($message)){
				 $query = "INSERT INTO `mp`.`connect` (`id`, `name`, `email`, `subject`,`message`) VALUES (NULL, '".$visitor_name."', '".$visitor_email."', '".$subject."', '".$message."')";
				  if($query_run = mysql_query($query)){
					  echo'<script type="text/javascript">
										 $("document").ready(function(){
										slidedown();
										$(".notify > .notifytext").html("Thank you ! We\'ll contact you soon");
										 });
										</script>';	
										 
									 }
					else {
						echo'<script type="text/javascript">
										 $("document").ready(function(){
										slidedown();
										$(".notify > .notifytext").html("Error, Please try again");
										 });
										</script>';	
						
					}
				
			}
			else {
						echo'<script type="text/javascript">
							 $("document").ready(function(){
							slidedown();
							$(".notify > .notifytext").html("Please Fill all the fields.");
							 });
							</script>';	
			}
 }
			?>
                <form action="connect.php" method="POST">
		<table border="0">
        	<tr>
    			<td>Select a Subject</td>
            </tr>
            <tr>
    			<td><select name="subject">
                	<option value="query">I Have a query</option>
                    <option value="bug"> I want to submit a bug</option>
                    <option value="patch"> I want to provide a patch</option>
                    <option value="other">Other</option>
                
                </select></td>
            </tr>
        	<tr>
    			<td>Feel Free to contact us, We do not bite.</td>
            </tr>
            <tr>
    			<td><textarea type="text" name="message" class="FormElementtext" maxlength="500" ></textarea></td>
            </tr>
            
            <tr>
            	<td>
            	<input type="submit" value="submit" class="button">
                </td>
            </tr>
    	</table>
    </form>
            	</div>
            	<div class="user">
                	<strong>Faculty Name</strong>: Mr. Vikas Mishra<br>
                    <br>
                	<strong>Contact Person</strong>: Ayush Sharma / Jay Kumar Pandya<br>
                    <strong>E-Mail Id</strong>: ayush@pixelcount.net / <br>
                    <strong>Level</strong>: 2nd Year<br>
                    <strong>Major</strong>: Computer Science Engineering<br>
                    <strong>College</strong>: Arya College of Engineering & IT, Jaipur.
            	</div>
            	<div class="delete">
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