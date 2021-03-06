<?php
session_start();
include("./includes/connection.php");
	?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="shortcut icon" type="image/x-icon" href="images/logo_icon.png" />
	<title>Events - Charis</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div id="header">
		<div>
			<a href="index.php" id="logo"><img src="https://t3.ftcdn.net/jpg/01/96/73/32/160_F_196733298_kLoT45gDYllKBcJbTiUp1WZIx56XVtz5.jpg" alt="logo"></a>
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="about.php">About</a></li>
				<li><a href="gallery.php">gallery</a></li>
				<li><a href="news.php">News</a></li>
				<li class="current"><a>Events</a></li>
				<li><a href="donate.php">Donate</a></li>
				<?php
					if(isset($_SESSION["user_id"])){
				?>
					<li><a href="profile.php">profile</a></li>
				<!--	<li><a href="faq.php">FAQ</a></li> -->
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
			<div class="header">
				<div class="aside" >
				<?php
					$sql = "SELECT * FROM event ORDER BY date DESC";
					$result = mysqli_query($con,$sql);
					$rs = mysqli_fetch_array($result);
				?>
					<div >
						<h2><a href="event.php"><?php echo $rs['event_name']; ?></a></h2>
						<span class="date"><?php echo $rs['date']; ?></span>
						<span class="date"><?php echo $rs['time']; ?></span>
						<p>
								<?php echo $rs['event_description']; ?></br>
							<?php echo $rs['duration']; ?>
							<img src="<?php echo $rs['image']; ?>" height="150px" width="150px;"/>
						</p>
					</div>
				<?php
					$count = 1;
					while($rs = mysqli_fetch_array($result)){
						if($count <=5){
				?>
				<div style="overflow:scroll">
					<ul style="display:inline;" >
						<li>
							<h2><a href="event.php"><?php echo $rs['event_name']; ?></a></h2>
							<span class="date"><?php echo $rs['date']; ?></span>
							<span class="date"><?php echo $rs['time']; ?></span>
							<p>
								<?php echo $rs['event_description']; ?>
							</br>
								<?php echo $rs['duration']; ?>

							</p>
						</li>
					</ul>
				</div>
				<?php
						}
						$count++;
					}
				?>
				</div>
			</div>

			<div class="footer">
				<p>
					 Be kind and start helping people.
				</p>
				<a href="login.php">Get Involved</a>
			</div>
		</div>
	</div>
	<?php	include("./includes/footer.html");	?>
</body>
</html>
