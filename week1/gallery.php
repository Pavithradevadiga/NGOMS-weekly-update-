<?php
session_start();
include("./includes/connection.php");
	?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="shortcut icon" type="image/x-icon" href="images/logo_icon.png" />
	<title>Gallery - Charis</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

	<div id="header">
		<div>
			<a href="index.php" id="logo"><img src="https://t3.ftcdn.net/jpg/01/96/73/32/160_F_196733298_kLoT45gDYllKBcJbTiUp1WZIx56XVtz5.jpg" alt="logo"></a>
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="about.php">About</a></li>
				<li class="current"><a>gallery</a></li>
				<li><a href="news.php">News</a></li>
				<li><a href="event.php">Events</a></li>
				<li><a href="donate.php">Donate</a></li>
				<?php
					if(isset($_SESSION["user_id"])){
				?>
					<li><a href="profile.php">profile</a></li>
			<!--		<li><a href="faq.php">FAQ</a></li> -->
					<li class="log_btn"><a href="logout.php">Logout</a></li>
				<?php
					}
					else{
				?>
					<li class="log_btn"><a href="login.php">Login</a></li>
				<?php
					}
				?>
			</ul>
		</div>
	</div>
	<div id="body">
		<div id="gallery">
			<div class="header" style="height:600px;overflow:scroll">

				<div class="stored">
					<h2>Added Pics</h2><hr>
					<?php
						$sql = "SELECT * FROM media_gallery ORDER BY num DESC";
						$result = mysqli_query($con,$sql);
						$count=1;
						while($rs = mysqli_fetch_array($result)){
							if($count<=8){
							?>
							<a>
								<div style="height:200px">

									<img src="<?php echo $rs['image']; ?>"  height="200px" width="500px" style="border:none">
									<span style="padding-top:27px;padding-right:28px;padding-bottom"><?php echo $rs['caption']; ?></span>
									<span style="padding-top:10px"><?php echo $rs['description']; ?></span>
								</div>
							</a>
							<?php
							}
							$count++;
						}
					?>
				</div>



			<div class="footer">
				<p>
					To help people who need your aid
				</p>
				<a href="login.php">Get Involved</a>
			</div>
		</div>
	</div>
	<?php	include("./includes/footer.html");	?>
</body>
</style>
</html>
