<?php	session_start();	?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Get Involved - Charis</title>

	<link rel="shortcut icon" type="image/x-icon" href="images/logo_icon.png" />
	<link rel="stylesheet" type="text/css" href="./css/style.css">
	<link rel="stylesheet" type="text/css" href="./css/style_form.css">
	<script type="text/javascript">
		function checkPassword(){
			if(document.getElementById("password").value == document.getElementById("password1").value){
				return true;
			}
			else{
				document.getElementById("password").style.border="2px solid #ff3300";
				document.getElementById("password1").style.border="2px solid #ff3300";
				return false;
			}
		}
	</script>
</head>
<body>
	<div id="header">
		<div>
			<a href="index.php" id="logo"><img src="https://t3.ftcdn.net/jpg/01/96/73/32/160_F_196733298_kLoT45gDYllKBcJbTiUp1WZIx56XVtz5.jpg" alt="logo"></a>
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="about.php">About</a></li>
				<li><a href="gallery.php">Gallery</a></li>
				<li><a href="news.php">News</a></li>
				<li><a href="event.php">Events</a></li>
				<li><a href="donate.php">Donate</a></li>
				<?php
					if(isset($_SESSION["user_id"])){
				?>
					<li><a href="profile.php">profile</a></li>
					<li class="login"><a href="logout.php">Logout</a></li>
				<?php
					}
					else{
				?>
					<li class="login"><a>Login</a></li>
				<?php
					}
				?>
				</li>
			</ul>
		</div>
	</div>
	<div id="body">
			<div>
				<div class="login_div">
					<h3>Login</h3>
					<form action="./login_check.php" method="post" class="user">
						<label>Email Address</label>
						<input type="email" name="email" required>
						<label>Password</label>
						<input type="password" name="password" required>
						<label class="forgot"><a href="forgot_password.php" style="text-decoration: none">forgot password ?</a></label><br>
						<input type="submit" value="Login">
					</form>
				</div>
				<div class="register_div">
					<h3>Register</h3>
					<form action="./registration.php" method="post" onsubmit="return checkPassword()" enctype="multipart/form-data" class="user">
						<label>first Name</label>
						<input type="text" name="fname" required>
						<label>middle Name</label>
						<input type="text" name="mname" required>
						<label>last Name</label>
						<input type="text" name="lname" required>
						<label>Gender</label>
						 <input type="checkbox" name="gender[]" value="male"> Male<br>
             <input type="checkbox" name="gender[]" value="female"> Female<br>
             <input type="checkbox" name="gender[]" value="other"> Other
						<label>Date of birth</label>
						<input type="date" name="dat" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" required>
						<label>Address</label>
						<input type="text" name="address" required>
						<label>Mobile</label>
						<input type="number" name="mobile" required>
						<label>Email Address</label>
						<input type="email" name="email" required>
						<label>Profile pic</label>
						<input type="file" name="fileToUpload">
						<label>Password</label>
						<input type="password" name="password" id="password" required>
						<label>Confirm Password</label>
						<input type="password" name="password" id="password1" required>
						<input type="submit" value="Register">
					</form>
				</div>
			</div>
	</div>
	<?php	include("./includes/footer.html");	?>
</body>
</html>
