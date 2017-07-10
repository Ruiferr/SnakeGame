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
	<title></title>
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

		button {
		  display: inline-block;
		  border-radius: 4px;
		  background-color: cadetblue;
		  border: none;
		  text-align: center;
		  font-size: 16px;
		  transition: all 0.5s;
		  cursor: pointer;
		  margin: 5px;
    	  margin-bottom: 1%;
		}

		button span {
		  cursor: pointer;
		  display: inline-block;
		  position: relative;
		  color: aliceblue;
		  transition: 0.5s;
		}

		button span:after {
		  content: '\00bb';
		  position: absolute;
		  opacity: 0;
		  top: 0;
		  right: -20px;
		  transition: 0.5s;
		}

		button:hover span {
		  padding-right: 25px;
		}

		button:hover span:after {
		  opacity: 1;
		  right: 0;
		}
		label{
		    color: white;
		    padding: 0.2%;
		}
		.text-danger{
		    color: #de4242;
		    font-weight: bold;
		    font-family: arial;
		}

		.rank{
			width: 33%;
			height: 500px;
		}
	</style>
</head>
<body>
	<center>
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
	<div>
		<a href="snake.php"><h4>Skip Login</h4></a>
		<p><span>Note:</span> If you skip the Login you can play the game, 
		but: <br> <li> Will not have access to the leaderboard</li><br><li>Can not register your best scores</li></p>
	</div>
	</center>
	<p style="font-size: 10px;">version: 3.0<br> 01.07.17</p>
</body>
</html>