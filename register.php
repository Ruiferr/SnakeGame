 <?php  
 $message = '';  
 $error = ''; 
 $repeat = false; 
 if(isset($_POST["submit"]))  
 {  
      if(empty($_POST["loginName"]))  
      {  
           $error = "<label class='text-danger'>Enter User Name</label>";  
      }  
      else if(empty($_POST["pass"]))  
      {  
           $error = "<label class='text-danger'>Enter Password</label>";  
      }   
      else  
      {  
           if(file_exists('players.json'))  
           {  
                $current_data = file_get_contents('players.json');  
                $array_data = json_decode($current_data, true);
                foreach ($array_data as $key => $entry) {
			    	    if ($entry['User'] == $_POST["loginName"]) {
			    		   $error = "<label class='text-danger'>This user name is already registered!</label>";
			    		   $repeat = true;
	                 	return true;      

			        }	
			   	}

			   	if ($repeat == false) {
				   	$extra = array(  
	                     "User"          =>     $_POST["loginName"],  
	                     "Pass"          =>     md5(serialize($_POST["pass"])),  
	                     "Score"          =>     "0",  
	                );  
	                $array_data[] = $extra;  
	                $final_data = json_encode($array_data);  
	                if(file_put_contents('players.json', $final_data))  
	                {  
	                 	$message = "<label class='text-danger' style=\"color: green;\">User registration successful!!</label>"; 
	                 	return false;      
	                }
			   	} 
           }  
           else  
           {  
                $error = 'JSON File not exits';  
           }  
      }  
 } 
?>