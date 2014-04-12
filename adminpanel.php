<!---
Author Name: Ayush Sharma
College: Arya College Of engineering & IT.
Find eme at:
ayush.sharma469@gmail.com
www.github.com/ayusharma

-->
<?php
 require 'scripts/connect.inc.php';
 require 'scripts/core.inc2.php';
 $admin_name = strtoupper(getfieldadmin('admin_name'));
 if(loggedin()){
	 
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Admin Panel</title>
    <link rel="stylesheet" type="text/css" href="stylesheet/adminpanel.css"/>
    <script type="text/javascript" src="scripts/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="scripts/effects.js"></script>
    <script type="text/javascript" src="scripts/photo.js"></script>
    <script type="text/javascript" src="scripts/search.js"></script>
</head>

<body>
	<div class="full">
		<div class="ask">
        <div class="ask_notify"></div>
        <div class="yes">YES</div>
        <div class="no">NO</div>
        <div class="close">CLOSE</div>
        </div>
     </div>
	<header>
    	<div class="HeaderTitle">
    		<img src="images/logo.png" width="70" height="70" border="0"/>
        </div>
        <nav>
        	<ul>
            	<li><a href="adminpanel.php">Admin Panel</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
     <hr>
     <div class="full_status">
		 <div class="status">
			<div class="status_image"><img src="images/admin.png" width="40" height="40"></div>
			<div class="status_name">Welcome Admin <?php echo $admin_name; ?></div>
		</div>
		</div>
     <div class="heading"><h1>Admin Panel</h1></div>
     <div class="notify">
    		<div class="notifytext"></div>
   		 	<div class="cross">X</div>
    </div>
     <div class="menu">
    	<div class="bar">
        	<ul>
            	<li>Add a Doctor</li>
                <li>All Users</li>
                <li>User Management</li>
                <li>All Doctors</li>
                <li>Doctor Management</li>
                 <li>User's Response</li>
            </ul>
        </div>
        <div class="query">
        	<div class="move">
        		<div class="doctor">
              <?php
					if(isset($_POST['Doc_name'])  && isset($_POST['type']) && isset($_POST['info'])  && isset($_POST['city']) && isset($_POST['Doc_email']) && isset($_POST['doc_contact'])){
						$Doc_name = $_POST['Doc_name'];
						$type = $_POST['type'];
						$info = $_POST['info'];
						 $array = array(
							@$_POST['tags1'],
							@$_POST['tags2'],
							@$_POST['tags3'],
							@$_POST['tags4'],
							@$_POST['tags5'],
							@$_POST['tags6'],
							@$_POST['tags7'],
							@$_POST['tags8'],
							@$_POST['tags9'],
							@$_POST['tags10'],
							@$_POST['tags12'],
							@$_POST['tags13'],
							@$_POST['tags14'],
							@$_POST['tags15'],
							@$_POST['tags16'],
							@$_POST['tags17'],
							@$_POST['tags18'],
							@$_POST['tags19'],
							@$_POST['tags20'],
							@$_POST['tags21'],
							@$_POST['tags22'],
							@$_POST['tags23'],
							@$_POST['tags24'],
							@$_POST['tags25'],
							@$_POST['tags26'],
							@$_POST['tags27'],
							@$_POST['tags28'],
							@$_POST['tags29'],
							@$_POST['tags30'],
							@$_POST['tags31'],
							@$_POST['tags32'],
							@$_POST['tags33']
							);
						$array_string = @$_POST['tags1'].' '.
							@$_POST['tags2'].' '.
							@$_POST['tags3'].' '.
							@$_POST['tags4'].' '.
							@$_POST['tags5'].' '.
							@$_POST['tags6'].' '.
							@$_POST['tags7'].' '.
							@$_POST['tags8'].' '.
							@$_POST['tags9'].' '.
							@$_POST['tags10'].' '.
							@$_POST['tags12'].' '.
							@$_POST['tags13'].' '.
							@$_POST['tags14'].' '.
							@$_POST['tags15'].' '.
							@$_POST['tags16'].' '.
							@$_POST['tags17'].' '.
							@$_POST['tags18'].' '.
							@$_POST['tags19'].' '.
							@$_POST['tags20'].' '.
							@$_POST['tags21'].' '.
							@$_POST['tags22'].' '.
							@$_POST['tags23'].' '.
							@$_POST['tags24'].' '.
							@$_POST['tags25'].' '.
							@$_POST['tags26'].' '.
							@$_POST['tags27'].' '.
							@$_POST['tags28'].' '.
							@$_POST['tags29'].' '.
							@$_POST['tags30'].' '.
							@$_POST['tags31'].' '.
							@$_POST['tags32'].' '.
							@$_POST['tags33'];
							
						$city = $_POST['city'];
						$Doc_email = $_POST['Doc_email'];
						$doc_contact = $_POST['doc_contact'];
						$filename= $_FILES['file']['name'];
						$size = $_FILES['file']['size'];
						$filetype = $_FILES['file']['type'];
						$tmp_name = $_FILES['file']['tmp_name'];
						$extension = strtolower(substr($filename, strpos($filename,'.')+1));
						$max_size = 2097152;
						$location = 'doc/';
						if(!empty($Doc_name) && !empty($type) && !empty($info) &&  !empty($city) && !empty($Doc_email) && !empty($doc_contact)){
							if(($extension =='jpg' || $extension == 'jpeg') && $size < $max_size && ($filetype=='image/jpg' || $filetype=='image/jpeg')){
								$extension = '.'.$extension;
								if(file_exists($location.$Doc_name.$extension)){
									$query ="SELECT * FROM `doctor` WHERE `doc_photo` LIKE  '".$location.$Doc_name.$extension."'";
									$query_run = mysql_query($query);
									while($query_result= mysql_fetch_array($query_run,MYSQL_ASSOC))
				  					{
										 $id = $query_result['id'];
										 rename($location.$Doc_name.$extension,$rename = $location.$Doc_name.rand(1000,9999).$extension);
										 $query_update = "UPDATE `doctor` SET `doc_photo`='".$rename."'WHERE `id`='".$id."'";
									}
								
										if($query_update_run = mysql_query($query_update)){
											move_uploaded_file($tmp_name,$location.$filename);
											rename($location.$filename,$location.$Doc_name.$extension);
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
									move_uploaded_file($tmp_name,$location.$filename);
									rename($location.$filename,$location.$Doc_name.$extension);
								}
								
								 
								 $query = "INSERT INTO `mp`.`doctor` (`id`, `Doc_name`, `type`,`info`, `tags`, `city`, `Doc_email`, `doc_contact`, `doc_photo`) VALUES (NULL, '".$Doc_name."', '".$type."', '".$info."', '".$array_string."', '".$city."',  '".$Doc_email."', '".$doc_contact."', '".$location.$Doc_name.$extension."')";			
								 if($query_run = mysql_query($query)){
										 echo'<script type="text/javascript">
										$("document").ready(function(){
										slidedown();
										$(".notify > .notifytext").html("Successful");
										});
										</script>';	
									 }
									 else {
										  echo'<script type="text/javascript">
										$("document").ready(function(){
										slidedown();
										$(".notify > .notifytext").html("fail");
										});
										</script>';
									 }
								
							}
							else {
								echo'<script type="text/javascript">
							$("document").ready(function(){
							slidedown();
							$(".notify > .notifytext").html("Image should be less than 2 MB and JPEG/JPG");
							});
							</script>';	
							
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
					else {
							echo'<script type="text/javascript">
							$("document").ready(function(){
							slidedown();
							$(".notify > .notifytext").html("Tip: Be careful in changing the things.");
							});
							</script>';	
						}
					?>
                <form action="<?php echo $_SERVER['SCRIPT_NAME'];?>" method="POST" enctype="multipart/form-data">
		<table border="0">
        	<tr>
            	<td>Doctor's Name</td>
    			<td><input type="text" name="Doc_name" class="FormElement" required></td>
            </tr>
            <tr>
                <td>Doctor's photo</td>
                <td><input type="file"  name="file" class="file_upload"  onClick="imageDown();" onChange="readURL(this,'img_prev_Photo');" required></td>

            </tr>
            <tr>
                <td></td>
                <td><div id="imgDisplayPhoto" align='center' style="border: 1px solid;height:160px;width:120px;">
                    <img id="img_prev_Photo" src="images/profile.png"  alt="select a image" border="0"  style="height:160px;width:120px;">
                </div> </td>

            </tr>
            <tr>
            	<td>Type</td>
    			<td><select name="type" required>
                    	<option value="dentist" selected>Dentist</option>
                        <option value="ent" >ENT</option>
                        <option value="gynecologist" >Gynecologist</option>
                        <option value="neurologist" >Neurologist</option>
                        <option value="orthopedic" >Orthopedic</option>
                        <option value="physician" >Physician</option>
                        <option value="surgeon" >Surgeon</option>
                    </select>
                 </td>
            </tr>
            <tr>
            	<td>Doctor's Info</td>
                <td><textarea type="text" name="info" class="FormElementtext" maxlength="500" required></textarea></td>
            </tr>
            <tr>
            	<td>Please select the tags</td>
    			<td>
                	<input type="checkbox" name="tags1" value="abdomen" class="checkbox">abdomen
                    <input type="checkbox" name="tags2" value="assaulted" class="checkbox">assaulted
                    <input type="checkbox" name="tags3" value="back" class="checkbox">back
                    <input type="checkbox" name="tags4" value="blindness" class="checkbox">blindness
                    <input type="checkbox" name="tags5" value="breathe" class="checkbox">breathe 
                    <input type="checkbox" name="tags6" value="chest" class="checkbox">chest
                    <input type="checkbox" name="tags7" value="cold/fever" class="checkbox">cold/fever
                    <input type="checkbox" name="tags8" value="fracture" class="checkbox">fracture
                    <input type="checkbox" name="tags9" value="head" class="checkbox">head
                    <input type="checkbox" name="tags10" value="head-headche" class="checkbox">head-headche
                    <input type="checkbox" name="tags11" value="hear" class="checkbox">hear
                    <input type="checkbox" name="tags12" value="in a traffic accident" class="checkbox">in a traffic accident
                    <input type="checkbox" name="tags13" value="limb" class="checkbox">limb
                    <input type="checkbox" name="tags14" value="nausea" class="checkbox">nausea
                    <input type="checkbox" name="tags15" value="neck" class="checkbox">neck
                    <input type="checkbox" name="tags16" value="nosebleed" class="checkbox">nosebleed
                    <input type="checkbox" name="tags17" value="passurine" class="checkbox">passurine
                    <input type="checkbox" name="tags18" value="remember" class="checkbox">remember
                    <input type="checkbox" name="tags19" value="shot" class="checkbox">shot
                    <input type="checkbox" name="tags20" value="sleep" class="checkbox">sleep
                    <input type="checkbox" name="tags21" value="smell things" class="checkbox">smell things
                    <input type="checkbox" name="tags22" value="sprain" class="checkbox">sprain
                    <input type="checkbox" name="tags23" value="stabbed" class="checkbox">stabbed
                    <input type="checkbox" name="tags24" value="stomach" class="checkbox">stomach
                    <input type="checkbox" name="tags25" value="taste" class="checkbox">taste
                    <input type="checkbox" name="tags26" value="teeth/tooth" class="checkbox">teeth/tooth
                    <input type="checkbox" name="tags27" value="tired" class="checkbox">tired
                    <input type="checkbox" name="tags28" value="torn cartilage" class="checkbox">torn cartilage
                    <input type="checkbox" name="tags29" value="vagina" class="checkbox">vagina
                    <input type="checkbox" name="tags30" value="vomit" class="checkbox">vomit
                    <input type="checkbox" name="tags31" value="walk" class="checkbox">walk
                    <input type="checkbox" name="tags32" value="weak" class="checkbox">weak
                    <input type="checkbox" name="tags33" value="write" class="checkbox">write
                    </td>
            </tr>
          	<tr>
             <!---	<td>Selected Tags</td>
                <td><textarea type="text" name="tags" class="FormElementtext" maxlength="500" required></textarea></td>
            </tr>
           <script type="text/javascript">
			var i=0;
            $('document').ready(function(e) {
                $('.checkbox').click(function(e) {
               i = $('.FormElementtext').html(this.value);
				 i++;
                });
            });
            
            
            </script>--->
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
   				<td><input type="email" name="Doc_email" class="FormElement" required></td>
            </tr>
            
            <tr>
            	<td>Contact No.</td>
    			<td><input type="text" name="doc_contact" class="FormElement" required></td>
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
                <?php
					$query_users = "SELECT * FROM signup";
					$query_run_users = mysql_query($query_users);
					while($query_result_users= mysql_fetch_array($query_run_users,MYSQL_ASSOC))
				 	 {
					echo '<div class="result">
						<div class="result_left"><img src="'.$query_result_users['photo'].'"></div>
						<div class="result_right"> <b>'.$query_result_users['id'].'. '.$query_result_users['name'].'</b><br>
						<b>Username: </b> '.$query_result_users['username'].' <br>
						<b>E-mail: </b> '.$query_result_users['email'].' <br>
						<b>Sex: </b> '.$query_result_users['sex'].' <br>
						<b>Age: </b> '.$query_result_users['age'].' <br>
						<b>City: </b> '.$query_result_users['city'].' <br>
						<b>Secret Que: </b> '.$query_result_users['sec_que'].' <br>
						<b>Secret Answer: </b> '.$query_result_users['sec_ans'].' <br>
						
						</div>
						</div>'.'<br>';
					
				  	}
				
				
				?>
            	</div>
            	<div class="delete">
                <?php 
					if(isset($_POST['delete']) && !empty($_POST['delete'])){
						$delete = $_POST['delete'];
						$query_two = "SELECT * FROM `signup` WHERE `id`='".$delete."'";
						$query_two_run = mysql_query($query_two);
						$photo = mysql_fetch_array($query_two_run,MYSQL_ASSOC);
						$unlink = $photo['photo'];
						@unlink($unlink);
						$query_one = "DELETE FROM `signup` WHERE `id`='".$delete."'";
						$query_one_run = mysql_query($query_one);
						
						
						
						
						
						if($query_one_run && $query_two_run)
						{
							echo'<script type="text/javascript">
							$("document").ready(function(){
							slidedown();
							$(".notify > .notifytext").html("Sucessfully deleted the user with id '.$delete.'");
							});
							</script>';	
							
						}
						else {
							echo'<script type="text/javascript">
							$("document").ready(function(){
							slidedown();
							$(".notify > .notifytext").html("OOps.. Something is not right");
							});
							</script>';	
						}
						
						
					}
				
				?>
                <form action="adminpanel.php" method="post" id="delete_doc1">
                <table>
                	<tr>
                    	<td>ID of the user</td>
                    	<td>
                			<input type="text" name="delete"  id="ask_permission_value1" class="FormElement" required>
                            
                    	</td>
                        <td>
                        	<input type="button" value="Delete User" id="ask_permission1"  class="button">
                        </td>
                    </tr>
                    </form>
                     <form>
                    <tr>
                       
                      
                    	<td>Search a user</td>
                    	<td>
                			<input type="text" id="search" name="search" class="FormElement" placeholder="start to type">
                            
                    	</td>
                        <td>
                        	
                        </td>
                    </tr>
                    </table>
                    </form>
             
                <div class="search_result"></div>
            	</div>
               <div class="delete2">
               	<?php
					$query_users = "SELECT * FROM doctor";
					$query_run_users = mysql_query($query_users);
					while($query_result_users= mysql_fetch_array($query_run_users,MYSQL_ASSOC))
				 	 {
					echo '<div class="result">
						<div class="result_left"><img src="'.$query_result_users['doc_photo'].'"></div>
						<div class="result_right"> <b>'.$query_result_users['id'].'. '.$query_result_users['Doc_name'].'</b><br>
						<b>Type: </b> '.$query_result_users['type'].' <br>
						<b>E-mail: </b> '.$query_result_users['Doc_email'].' <br>
						<b>city: </b> '.$query_result_users['city'].' <br>
						<b>Tags: </b> '.$query_result_users['tags'].' <br>
						</div>
						</div>'.'<br>';
					
					 }
				?>
               
               </div> 
               <div class="delete3">
               	<?php 
					if(isset($_POST['delete_doc']) && !empty($_POST['delete_doc'])){
						$delete_doc = $_POST['delete_doc'];
						$query_two = "SELECT * FROM `doctor` WHERE `id`='".$delete_doc."'";
						$query_two_run = mysql_query($query_two);
						$photo = mysql_fetch_array($query_two_run,MYSQL_ASSOC);
						$unlink = $photo['doc_photo'];
						@unlink($unlink);
						$query_one = "DELETE FROM `doctor` WHERE `id`='".$delete_doc."'";
						$query_one_run = mysql_query($query_one);
						
						
						
						
						
						if($query_one_run && $query_two_run)
						{
							echo'<script type="text/javascript">
							$("document").ready(function(){
							slidedown();
							$(".notify > .notifytext").html("Sucessfully deleted the Doctor with id '.$delete_doc.'");
							});
							</script>';	
							
						}
						else {
							echo'<script type="text/javascript">
							$("document").ready(function(){
							slidedown();
							$(".notify > .notifytext").html("OOps.. Something is not right");
							});
							</script>';	
						}
						
						
					}
				
				?>
                <form action="adminpanel.php" method="post" id="delete_doc">
                <table>
                	<tr>
                    	<td>ID of the doctor</td>
                    	<td>
                			<input type="text" name="delete_doc"  id="ask_permission_value"class="FormElement" required>
                            
                    	</td>
                        <td>
                        	<input type="button" value="Delete Doctor" id="ask_permission" class="button">
                          
                        </td>
                    </tr>
                    </form>
                     <form>
                    <tr>
                       
                      
                    	<td>Search a Doctor</td>
                    	<td>
                			<input type="text" id="search_doc" name="search_doc" class="FormElement" placeholder="start to type">
                            
                    	</td>
                        <td>
                        	
                        </td>
                    </tr>
                    </table>
                    </form>
             
                <div class="search_result_admin"></div>
               </div>
               <div class="user_connect">
               		<?php
					$query_user_connect = "SELECT * FROM connect";
					$query_run_user_connect = mysql_query($query_user_connect);
					while($query_result_user_connect= mysql_fetch_array($query_run_user_connect,MYSQL_ASSOC))
				 	 {
					echo '<div class="user_connect_result">
							<b>id</b>: '.$query_result_user_connect['id'].'<br>
							<b>Name</b>: '.$query_result_user_connect['name'].'<br>
							<b>Subject</b>: '.$query_result_user_connect['subject'].'<br>
							<b>Email</b>: '.$query_result_user_connect['email'].' <br>
							<b>Message</b> : '.$query_result_user_connect['message'].'<br><hr>
					
					
					</div>';
						
					 }
				?>
               
               
               </div>
             </div>
             
         </div>
     </div>
	
</body>

</html>
<?php
 }
 else {
	 header('Location: adminlogin.php');
 }
 ?>