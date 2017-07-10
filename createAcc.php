<?php include 'register.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="js/main.js"></script>
	<style type="text/css">
		p{
			font-family: arial;
		}

		form{
			margin-top: 5%;
		}
		h1{
			font-family: arial;
    		color: cadetblue;
		}
		div{
			background: cadetblue;
			color: aliceblue;
    		padding: 0.3%;
		    height: 60px;
		    margin-top: 1%;
		}
		a{
			color: darkred;
		}
		a:hover{
			color: lightblue;
			cursor: pointer;
		}
		span{
			color: darkred;
			font-size: 17px;
			font-weight: bold;
		}
		button{
			cursor: pointer;
			margin-bottom: 1%;
    		padding: 0.5%;
		}
		label{
			color: red;
		}
		.g-recaptcha{
			display: none;
		}
	</style>
</head>
<body>
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
	<div>
		<?php
		if ($message != "") {
			echo "<a href=\"index.php\"><h4>< Start Playing</h4></a>";
		}else{
			echo "<a href=\"index.php\"><h4>< Back</h4></a>";
		}
		?>	
	</div>
	</center>
	<p style="font-size: 10px;">version: 3.0<br> 01.07.17</p>
</body>
</html>