<?php
	include("./includes/session_check.php");
	include("./includes/connection.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="shortcut icon" type="image/x-icon" href="../images/logo_icon.png" />
	<title>Admin Panel - Helping Hands</title>
	<link rel="stylesheet" type="text/css" href="./css/style.css">
	<link rel="stylesheet" type="text/css" href="./css/style_form.css">
	<script src="./js/jquery.min.js"></script>
	<script>
	$(document).ready(function(){
		$("div#senders").click(function(){
			var msg_id = $(this<"#msg_id").val();
			$("div#msg_content").load("getMsg.php?msg_id="+msg_id);
		});
	});
	</script>
</head>
<body>
	<div id="header">
		<div>
			<a href="index.php" id="logo"><img src="https://t3.ftcdn.net/jpg/01/96/73/32/160_F_196733298_kLoT45gDYllKBcJbTiUp1WZIx56XVtz5.jpg" alt="logo"></a>
			<ul>
				<li><a href="users.php">users</a></li>
				<li><a href="home.php">Donations</a></li>
				<li><a href="upload_media.php">Upload Media</a></li>
				<li><a href="news.php">News</a></li>
				<li><a href="events.php">Events</a></li>
				<li class="current"><a href="ngo_activities.php">NGO Activities</a></li>
				<li class="log_btn"><a href="./logout.php">Logout</a></li>
			</ul>
		</div>
	</div>
	<div id="body">
		<div class="ngo_activities">
			<div>
				<h3>Feedbacks</h3><hr>
				<div class="msg_sender">
				<?php
					$sql = "SELECT * FROM messages";
					$result = mysqli_query($con,$sql);
					while($rs = mysqli_fetch_array($result)){
						if($rs['isRead']==false){
							?>

								<div id="senders" style="background:#edf;color:#000;">
							<?php
						}
						else{
							?>
								<div id="senders">
							<?php
						}
						?>
						  <h4><?php echo $rs['message']; ?></h4>
							<h5><?php echo $rs['name']; ?></h4>
							<h5><?php echo $rs['email']; ?></h5>
							<input type="hidden" value="<?php echo $rs['msg_id']; ?>" id="msg_id">
							</div>
						<?php
					}
				?>
				</div>

			</div>
		</div>
	</div>
	<?php	include("./includes/footer.html");	?>
</body>
</html>
