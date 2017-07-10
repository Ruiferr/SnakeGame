<?php
	session_start();
	if (isset($_SESSION['user_name'])) {
		$user = $_SESSION['user_name'];
		$maxScore = $_POST['val'];

	   	if(file_exists('players.json')){  
	        $current_data = file_get_contents('players.json');  
	        $array_data = json_decode($current_data, true); 
			foreach ($array_data as $key => $entry) {
			    if ($entry['User'] == $user) {
			        if ($array_data[$key]['Score'] < $maxScore) {
			        	$array_data[$key]['Score'] = $maxScore;
			        }
			    }
			}
			$newJsonString = json_encode($array_data);
			file_put_contents('players.json', $newJsonString);
		}

	$score_data = json_decode(file_get_contents('players.json'), true);
	usort($score_data, function($a, $b) {

	return $a['Score'] > $b['Score'] ? -1 : 1;
	});
	if (filesize("players.json") > filesize("players2.json")) {
       copy("players.json","players2.json"); 
    }

?>
	<center>
	<div class="rank">
		<br><button onclick="restart()" style="cursor: pointer;"><h4><a>Play Again &#8634;</a></h4></button><br>

		<h3>- BEST SCORES -</h3>
		<table>
			<tbody>
				</tr>	
					<th></th>
					<th colspan="2">Player:</th>
					<th colspan="2">Score:</th>
				</tr>
				<?php 
				for ($i=0; $i < 10 ; $i++) { ?>			
				<tr>
					<td class="special"><?php if ($score_data[$i]['User'] == $user) {
					 	echo '&#9654;';
					 } ?></td>			
					<td colspan="2"><?php 
					if ($i < 3 ) {
						echo '&#9813; ';
					}echo ($i+1)?>. <?php  print_r($score_data[$i]['User']) ?></td>
					<td colspan="2"><?php print_r($score_data[$i]['Score']) ?></td>
				</tr>
				<?php
				}
				?>
			</tbody>
		</table>
	</div>
	</center>

<?php
	}else{
?>
	<center>
	<div class="rank">
		<br><button onclick="restart()" style="cursor: pointer;"><h4><a>Play Again &#8634;</a></h4></button><br>
		<h3>&#8636;&nbsp;&nbsp;Best Scores&nbsp;&nbsp;&#8640;</h3>
		<p></p>
	</div>
	</center>
<?php
	}
?>
