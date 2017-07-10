<?php

	if(file_exists('players.json')){  
	        $current_data = file_get_contents('players.json');  
	        $array_data = json_decode($current_data, true); 
			foreach ($array_data as $key => $entry) {
			       $array_data[$key]['Pass'] = md5(serialize($array_data[$key]['Pass']));
			}
			$newJsonString = json_encode($array_data);
			file_put_contents('players.json', $newJsonString);
	}
?>