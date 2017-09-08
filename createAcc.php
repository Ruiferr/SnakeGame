<?php include 'register.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/mobile.css">
	<title>SnakeGame</title>
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
</head>
<body>
	<div class="accountWrapper">
		<center>
			<h1>Snake Game</h1>
			<form method="post">
				<p>User name:</p>
				<input type="text" name="loginName" maxlength="15">
				<p>Password:</p>
				<input type="password" name="pass"><br><br>
				<button type="submit" name="submit" id="login" onclick="Fade()">
				Create Account</button>
			</form>
		</center>
			</div>
				<?php
					if (isset($error)) {
						echo $error;
					}
				?>
				<?php
					if (isset($message)) {
						echo $message;
					}
				?>
			<center>
			<div class="messageAccount">
				<?php
				if ($message != "") {
					echo "<a href=\"index.php\"><h4>< Start Playing</h4></a>";
				}else{
					echo "<a href=\"index.php\"><h4>< Back</h4></a>";
				}
				?>	
			</div>
		</center>
	</div>
	<p  class="version2" >version: 3.0<br> 01.07.17</p>
</body>
</html>



