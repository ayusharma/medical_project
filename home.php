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
			?>
			<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Home</title>
		<link rel="stylesheet" type="text/css" href="stylesheet/home.css"/>
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
			<div class="status_image"><img src="<?php echo $visitor_photo;?>" width="40" height="40"></div>
			<div class="status_name">Welcome <?php echo $visitor_name;?></div>
		</div>
		</div>
		 <div class="heading"><h1>Help Desk</h1></div>
		 <div class="menu">
			<div>
				<a href="aboutus.php"><img src="images/works.png" width="128" height="128">
				<div class="roll">About Us</div></a>
			</div>
			<div>
				<a href="findadoc.php"><img src="images/find.png" width="128" height="128">
				<div class="roll">Find a Doctor</div></a>
			</div>
			<div>
				<a href="profile.php"><img src="images/edit.png" width="128" height="128">
				<div class="roll">Profile</div></a>
			</div>
			<div>
				<a href="connect.php"><img src="images/connect.png" width="128" height="128">
				<div class="roll">Contact Us</div></a>
			</div>
		 </div>
	
	</body>
	
	</html>
 <?php
	}
	else {
		header ('Location: userlogin.php');	
	}
	
?>

