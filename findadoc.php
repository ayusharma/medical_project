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
	<title>Find a Doctor</title>
    <link rel="stylesheet" type="text/css" href="stylesheet/findadoc.css"/>
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
     <div class="heading"><h1>Symptoms</h1></div>
     <div class="notify">
    		<div class="notifytext"></div>
   		 	<div class="cross">X</div>
    </div>
    <script type="text/javascript">
    	$(window).load(function(e) {
            slidedown();
			$(".notify > .notifytext").html("Tip to know : You can select and submit only one category");
									
        });
    </script>
   	<div class="menu">
		<table border="0">
        	<tr>
            	<td>I have hurt my</td>
    			<td>
                	<form action="findadocresult.php" method="POST">
                	<select name="part1" required>
                    	<option value="--" selected >--</option>
                    	<option value="abdomen">abdomen</option>
                        <option value="back">back</option>
                        <option value="chest">chest</option>
                        <option value="head">head</option>
                        <option value="limb">limb</option>
                        <option value="neck">neck</option>
                    </select>
                    <input type="submit" value="submit" class="button">
                    </form>
                </td>
            </tr>
            <td>I have been</td>
    			<td>
                	<form action="findadocresult1.php" method="POST">
                	<select name="part2">
                    	<option value="--" selected >--</option>
                    	<option value="assaulted">assaulted</option>
                        <option value="in a traffic accident">in a traffic accident</option>
                        <option value="shot">shot</option>
                        <option value="stabbed">stabbed</option>
                    </select>
                    <input type="submit" value="submit" class="button">
                    </form>
                </td>
            </tr>
            
            <td>I think I might have</td>
    			<td>
                	<form action="findadocresult2.php" method="POST">
                	<select name="part3">
                    	<option value="--" selected >--</option>
                    	<option value="fracture">fracture</option>
                        <option value="nosebleed">nosebleed</option>
                        <option value="sprain">sprain</option>
                        <option value="torn cartilage">torn cartilage</option>
                    </select>
                    <input type="submit" value="submit" class="button">
                    </form>
                </td>
            </tr>
            
            <td>I have pain in my</td>
    			<td>
                	<form action="findadocresult3.php" method="POST">
                	<select name="part4">
                    	<option value="--" selected >--</option>
                    	<option value="stomach">stomach</option>
                        <option value="back">back</option>
                        <option value="chest">chest</option>
                        <option value="head - headche">head - headche</option>
                        <option value="teeth/tooth">teeth/tooth</option>
                        <option value="vagina">vagina</option>
                    </select>
                    <input type="submit" value="submit" class="button">
                    </form>
                </td>
            </tr>
            
            <td>I feel</td>
    			<td>
                	<form action="findadocresult4.php" method="POST">
                	<select name="part5">
                    	<option value="--" selected >--</option>
                    	<option value="cold / fever" >cold / fever</option>
                        <option value="nausea">nausea</option>
                        <option value="vomit">vomit</option>
                        <option value="tired">tired</option>
                        <option value="weak">weak</option>
                    </select>
                    <input type="submit" value="submit" class="button">
                    </form>
                </td>
            </tr>
            
            <td>I can not</td>
    			<td>
                	<form action="findadocresult5.php" method="POST">
                	<select name="part6">
                    	<option value="--" selected >--</option>
                    	<option value="breathe">breathe</option>
                        <option value="hear">hear</option>
                        <option value="pass urine">pass urine</option>
                        <option value="remember">remember</option>
                        <option value="blindness">blindness</option>
                        <option value="sleep">sleep</option>
                        <option value="smell things">smell things</option>
                        <option value="taste">taste</option>
                        <option value="walk">walk</option>
                        <option value="write">write</option>
                    </select>
                    <input type="submit" value="submit" class="button">
                    </form>
                </td>
            </tr>
           
    	</table>
  </div>

</body>
</html>
<?php
}
else {
	header('Location: userlogin.php');
}
?>