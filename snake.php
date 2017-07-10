<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<script type="text/javascript" src="js/main.js"></script>
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<title>SnakeGame</title>
	<link href="https://fonts.googleapis.com/css?family=Rationale" rel="stylesheet">
	<style type="text/css">
		body{
			background: whitesmoke;
		}
		canvas{
			border: 1px solid black;
		}

		h1{
			font-family: arial;
    		color: cadetblue;
		}

		h2{
			font-family: arial;
			width: 20%;

		}

		h3{
			font-family: 'Rationale', sans-serif;
		    font-size: 28px;
		    color: #ab0202;

		}
		#start{
			width: 100%;
		}
		span{
    		color: cadetblue;
			font-weight: bold;
		}

		#maxPoints{
			color: darkred;
		}

		.arrows{
    		width: 60%;
		}

		.control{
			float: left;
			height: 100px;
			width: 33%;
		}

		.control:nth-child(even){
			width: 33%;
		    font-size: 30px;
		    border-radius: 10px;
		    background: lightgrey;
		    font-weight: bold;
		    float: left;
		}
		a{
			font-family: 'Rationale', sans-serif;
			text-decoration: none;
			color: darkcyan;
			font-size: 18px;
		}
		a:hover{
			color: lightslategray;;
		}
		ul{
			list-style-type: none;
			width: 10%;
		}
		li{
			text-align: left;
		}

		img{
			width: 5%;
		}
		th, td {
		    padding: 15px;
		    font-family: arial;
		    font-size: 25px;
		}

		td:nth-child(even){
			font-weight: bold;
		}

		tr:nth-child(2){
		    color: white;
		    background: cadetblue;
		}
		tr:nth-child(3){
		    color: white;
		    background: rgba(114, 157, 158, 0.67);
		}
		tr:nth-child(4){
		    color: white;
		    background: rgba(161, 172, 173, 0.59);
		}
		tr{
			color: rgba(0, 0, 0, 0.52);
		}

		th{
			font-family: 'Rationale', sans-serif;
			background-color: whitesmoke;
			color: black;
    		text-align: left;
		}

		.special{
			background-color: whitesmoke;
			color: black;
		}
		label{
		    font-family: 'Rationale', sans-serif;
		    font-size: 20px;
		}
		.gameLvl{
			padding: 2%;
			background: lightgrey;
			border-radius: 20px 20px 0 0;
			width: 40%;
		}

		.gameLvl button{
			padding: 0.5%;
			margin-left: 1%;
		}
	</style>
</head>
<body>
	<center>
	<h1>Snake Game</h1>
	<div class="game">
	<canvas id="panel" width="400px" height="400px"></canvas>
	</div>
	<h2>Score: <span id="points">0</span></h2>
	<h4 id="info"><br><img src="keys.png"><br> 
	Press any key to start the game</h4>
	<button onclick="controls()" id="info2" style="margin-bottom: 1%;">Controls</button>
	<div class="gameLvl" id="mode">
		<label>Select the game difficulty: </label>
		<button onclick="easy()" style="cursor: pointer;color: white; font-weight:bold;background: darkseagreen;border-color: darkseagreen;">Easy</button>
		<button onclick="medium()" style="cursor: pointer;color: white; font-weight:bold;background: #de9604;;border-color: #de9604;;">Medium (standart)</button>
		<button onclick="hard()" style="cursor: pointer;color: white; font-weight:bold;background: darkred;border-color: darkred;">Hard</button>
	</div>
	</center>
	<?php
	if (isset($_SESSION['user_name'])) {
		?><center>
		  <button style="margin-top: 1%;"><a href="logout.php">Logout</a></button>
		  <p>Player: <?php echo $_SESSION['user_name'] ?> </p>
		  </center>
		<?php
	}else{
		?><center><p>Login <a href="index.php" style="font-weight: bold">here</a> to submit your scores<br> and check the leaderboard!</p></center><?php
	}
	?>
</body>
</html>