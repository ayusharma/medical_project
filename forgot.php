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
	<title>Forgot Password</title>
    <link rel="stylesheet" type="text/css" href="stylesheet/forgot.css"/>
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
                <li><a href="userlogin.php">Sign In</a></li>
            </ul>
        </nav>
        
    </header>
    <hr>
    
    <div class="heading"><h1>Have You Forgot Your Password ?</h1></div>
    <div class="notify">
    		<div class="notifytext"></div>
   		 	<div class="cross">X</div>
    </div>
    <?php
	require 'scripts/connect.inc.php';
	if(isset($_POST['name']) && isset($_POST['username']) &&  isset($_POST['sec_que']) && isset($_POST['answer']) ){
		$name = $_POST['name'];
		$username = $_POST['username'];
		$sec_que = htmlentities(strtolower($_POST['sec_que']));
		$sec_ans = htmlentities(strtolower($_POST['answer']));
		if(!empty($name) && !empty($username) && !empty($sec_que) && !empty($sec_ans)){
			$query = "SELECT `id` FROM `signup` WHERE `username` LIKE '".$username."'";
			$query_run = mysql_query($query);
			$query_username_rows = mysql_num_rows($query_run);
			if($query_username_rows == 0){
				echo'<script type="text/javascript">
							$("document").ready(function(){
							slidedown();
							$(".notify > .notifytext").html("Incorrect Combination");
							});
							</script>';	

			}
			else if( $query_username_rows == 1) {
				$id = mysql_result($query_run,0,'id');
				$query2 = "SELECT * FROM `signup` WHERE `id` = '".$id."'"; 
				$query_run2 = mysql_query($query2);
				$data_fetch = mysql_fetch_array($query_run2,MYSQL_ASSOC);
				if($data_fetch['sec_ans'] == $sec_ans && $data_fetch['sec_que'] == $sec_que){
					$to = $data_fetch['email'];
					$headers = 'From: ayush@pixelcount.net';
					$subject = 'Password';
					$body ='Hi, '.$data_fetch['name'].'<br>
					Your password is '.$data_fetch['password'];
					if(mail($to,$subject,$body,$headers)){
						echo'<script type="text/javascript">
							$("document").ready(function(){
							slidedown();
							$(".notify > .notifytext").html("Your Password Has been sent to '.$data_fetch['email'].'");
							});
							</script>';	
					}
					else {
						echo'<script type="text/javascript">
							$("document").ready(function(){
							slidedown();
							$(".notify > .notifytext").html("An error has been occured");
							});
							</script>';	
					}
					
				}
				else {
					echo'<script type="text/javascript">
							$("document").ready(function(){
							slidedown();
							$(".notify > .notifytext").html("Incorrect Combination");
							});
							</script>';	
				}
			}
			else {
						echo'<script type="text/javascript">
							$("document").ready(function(){
							slidedown();
							$(".notify > .notifytext").html("Incorrect Combination");
							});
							</script>';	
			}
						
			}
			
		
		else {
			echo'<script type="text/javascript">
							$("document").ready(function(){
							slidedown();
							$(".notify > .notifytext").html("Please Fill All the Fields.");
							});
							</script>';	
		}
	}
	
	?>
	<form action="forgot.php" method="POST">
		<table border="0">
 	    <tr>
            	<td>Your Name</td>
    			<td><input type="text" name="name"  class="FormElement" required></td>
            </tr>
            <tr>
            	<td>Your Username</td>
   				<td><input type="text" name="username" class="FormElement" required></td>
            </tr>      
            <tr>
            	<td>Your Secret Question</td>
    			<td><select name="sec_que" required>
                    	<option value="Which is your first school ?" >Which is your first school ?</option>
                        <option value="Who is your favourite teacher ?" selected>Who is your favourite teacher ?</option>
                        <option value="What is your pet name ?" >What is your pet name ?</option>
                        <option value="Where is your bith-place ?" >Where is your bith-place ?</option>
                    </select>
                </td>
            </tr>
            
            <tr>
            	<td>Your Secret Answer</td>
    			<td><input type="text" name="answer" class="FormElement"  required></td>
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