
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Available Doctors</title>
    <link rel="stylesheet" type="text/css" href="stylesheet/findadocresult.css"/>
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
     <div class="heading"><h1>Doctors Available</h1></div>
     <div class="notify">
    		<div class="notifytext"></div>
   		 	<div class="cross">X</div>
    </div>
    
    <?php
    if(isset($_POST['part6']) && !empty($_POST['part6'])){
		$value = $_POST['part6'];
		if($value == '--'){
			echo'<script type="text/javascript">
									$("document").ready(function(){
									slidedown();
									$(".notify > .notifytext").html("You\'ve selected nothing. No results found.");
									$(".cross").click(function(){
										window.location.replace("findadoc.php");
										});
									});
									</script>';	
		}
		else {
			$query ="SELECT * FROM `doctor` WHERE `tags` LIKE  '%".$value."%'";
			$query_run = mysql_query($query);
			 while($query_result= mysql_fetch_array($query_run,MYSQL_ASSOC))
				  {
					echo '<div class="result">
						<div class="result_left"><img src="'.$query_result['doc_photo'].'"></div>
						<div class="result_right">
						<b>'.$query_result['Doc_name'].'</b><br><br>
						<b>Info:</b> '.$query_result['info'].' <br><br>
						<b>Doctor\'s Type:</b> '.$query_result['type'].' <br><br>
						<b>Contatct No.</b> '.$query_result['doc_contact'].' <br><br>
						<b>E-Mail :</b> '.$query_result['Doc_email'].' <br><br>
						
						</div>
						</div>'.'<br>';
					
				  }
   																			}
					
		
	}
    ?>
  
		

</body>

</html>
<?php
}
else {
	header('Location: userlogin.php');	
}

?>
