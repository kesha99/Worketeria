<!DOCTYPE html>

<?php
include("functions/functions.php");
include("includes/database.php");

?>
<html lang='en'>
<head>
	<meta class="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>give work form</title>
	<link rel='stylesheet' href='css/style.min.css' />
	
 
  
	
	</head>
<body>
	<!-- navbar -->
	<div class="navbar">
		<nav class="nav__mobile"></nav>
		<div class="container">
			<div class="navbar__inner">
				<a href="index.php" class="navbar__logo">Worketeria</a>
				<nav class="navbar__menu">
					<ul>
						<li><a href="log_in.php">Log in</a></li>
						
					</ul>
				</nav>
				<div class="navbar__menu-mob"><a href="" id='toggle'><svg role="img" xmlns="/images/undraw_content_vbqo.svg" viewBox="0 0 448 512"><path fill="currentColor" d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z" class=""></path></svg></a></div>
			</div>
		</div>
	</div>

	<!-- Authentication pages -->
	<div class="auth">
		<div class="container">
			<div class="auth__inner">
				<div class="auth__media">
					<img src="./images/undraw_selfie.svg">
				</div>
				<div class="auth__auth">
					<h1 class="auth__title">Give your work</h1>
					<p>Fill in your Details to proceed</p>
					<form method="post" action="give_work_form.php" enctype="multipart/form-data" autocompelete="new-password" role="presentation" class="form">
					<label><b>Username</b></label>
                        <input type="text" name="username" class="fakefield">
						
						<label><b>Title of work</b></label>
                        <input type="text" name="title" class="fakefield">
                        <label><b>Email</b></label>
                        <input type="text" name="email" id='email' placeholder="you@example.com">
                        <label><b>Mobile no:</b></label>
                        <input type="tel" name="number" class="fakefield">
                        <label for="add"><b>Address:</b></label>
						<textarea id="add" name="user_add"></textarea>
                        <label><b>City</b></label>
                        <input type="text" name="city" class="fakefield">
                        <label for="bio" ><b>Details about work:</b></label>
						<textarea id="bio" name="details"></textarea>
                        <label><b>Profile photo</b></label>
                        <input type="file" name="profile">
                        <label for="job"><b>Work category:</b></label>
						<select id="job" name="user_job">
								
						<?php

                             $get_cats = "select * from categories";

                             $run_cats = mysqli_query($con, $get_cats);

                              while($row_cats=mysqli_fetch_array($run_cats)){

                             $cat_id = $row_cats['cat_id'];
                             $cat_title = $row_cats['cat_title'];
                             echo"<option value='$cat_id'>$cat_title</option>";
                              }

                       ?>
						  </select>
						
						<button type='submit' name='register' class="button button__accent">Submit</button>
                        
					</form>
				</div>
			</div>
		</div>
	</div>
<script src='js/app.min.js'></script>
</body>
</html>

<?php
if(isset($_POST['register'])){
	
	$ip = getIp();
	$w_name= $_POST['username'];
	$w_title= $_POST['title'];
	$w_email = $_POST['email'];
	$w_number = $_POST['number'];
	$w_add = $_POST['user_add'];
	$w_city = $_POST['city'];
	$w_details = $_POST['details'];
	
	$w_cat = $_POST['user_job'];

	$w_image = $_FILES['profile']['name'];
	$w_image_tmp = $_FILES['profile']['tmp_name'];

	move_uploaded_file($w_image_tmp,"work_image/$w_image");

	 $insert_w = "INSERT INTO work( work_ip , work_name, work_title , work_email , work_contact , work_add , work_city , work_details ,work_image ,work_cat) values ('$ip','$w_name','$w_title','$w_email','$w_number','$w_add','$w_city','$w_details','$w_image','$w_cat')";


		 $run_w = mysqli_query($con,$insert_w);
		 
		 if($run_w){
			 echo "<script>alert('submit successfully')</script>";
		 }
}

?>