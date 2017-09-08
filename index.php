 <?php
 session_start();

 $message = '';  
 $error = '';  
 	if(isset($_POST["submit"])){

      if(empty($_POST["loginName"])){

           $error = "<label class='text-danger'>< Enter User Name ></label>";  
      }  
      else if(empty($_POST["pass"])){

           $error = "<label class='text-danger'>< Enter Password ></label>";  
      }   
      else{  
           if(file_exists('players.json')){  

                $current_data = file_get_contents('players.json');  
                $array_data = json_decode($current_data, true);  
                $login = $_POST["loginName"];
                $pass = md5(serialize($_POST["pass"]));
                foreach ($array_data as $player) {
                	if ($login == $player['User'] && $pass == $player['Pass']) {
                		$_SESSION['user_name'] = $login;
                		header('Location:snake.php');
                	}else if ($login == $player['User']) {
                		$error = "<label class='text-danger'>Password incorrect!</label>";
                	}else{
           				$error = "<label class='text-danger'>User not registered!</label>"; 
                	}
                }
           	}else{
           		$error = "<label class='text-danger'>Unexpect error connecting to database</label>";  
           	}
      	}  
	} 
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<title>SnakeGame</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/mobile.css">

</head>
<body>
		<div class="loginWrapper">
			<center>
				<div class="login">
					<h1>Snake Game</h1>
					<form method="post">
						<p>User name:</p>
						<input type="text" name="loginName">
						<p>Password:</p>
						<input type="password" name="pass"><br><br>
						<button type="submit" name="submit" id="login"><span>Login </span></button>
					</form>		
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
					<?php 
					if ($message == "") {
						echo "<p id=\"createAcc\">Create Account <a href=\"createAcc.php\">here</a></p>";
					}

					?>		
				</div>
			</center>
			<div class="skip">
				<center>
				<a href="snake.php"><h2>Skip Login</h2></a>
				<p>
					<span>Note:</span> 
					If you skip the Login you can play the game, but:<br><br>
					Will not have access to the leaderboard</li><br>
					Can not register your best scores</li>
				</p>
				</center>
			</div>		
		</div>
		<p class="version">version: 3.0<br> 01.07.17</p>
</body>
</html>