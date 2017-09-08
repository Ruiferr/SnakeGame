<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Rationale" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/mobile.css">

	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>

	<title>SnakeGame</title>
</head>
<body>
	<div class="gameWrapper">
		<center>
		<h1>Snake Game</h1>
		</center>
		<div class="game">
			<canvas  id="panel"></canvas>
		</div>
		<center>
		<h2>Score: <span id="points">0</span></h2>
		
		<h4 id="info"><br><img class="instructions" src="keys.png"><br> 
		Press any key to start the game</h4>	
		<button onclick="controls()" id="info2" style="margin-bottom: 1%;">Controls</button>
		</center>
		<div class="mobileControls">
			<button class="up" onclick="keyPushMobile(38)">up</button>
			<button class="left" onclick="keyPushMobile(37)">left</button>
			<button class="down" onclick="keyPushMobile(40)">down</button>
			<button class="right" onclick="keyPushMobile(39)">right</button>
		</div>
		<center>
		<div class="messageLogin">
			<?php
			if (isset($_SESSION['user_name'])) {
				?><center>
				  <button style="margin-top: 1%;"><a href="logout.php">Logout</a></button>
				  <p>Player: <?php echo $_SESSION['user_name'] ?> </p>
				  </center>
				<?php
			}else{
				?><p>Login <a class="messageLink" href="index.php" style="font-weight: bold;">here</a> to submit your scores<br> and check the leaderboard!</p><?php
			}
			?>
		</div>
		</center>
	</div>
	
	<div class="layer"></div>
	
	<div class="gamelvl" id="mode">
		<p>GAME LEVEL: </p>
		<div class="dificulty">
			<button onclick="easy()" class="easyDif">Easy</button>
			<button onclick="medium()" class="mediumDif">Medium</button>
			<button onclick="hard()" class="hardDif">Hard</button>
		</div>
	</div>
</body>
</html>