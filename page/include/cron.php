 <?php 


     $query = $db->query("SELECT * FROM `accounts` WHERE `sold` = '0' AND `country` IS NULL AND `category` = '1' OR `category` = '2'") or die($db->error);

     while ($row = $query->fetch_assoc()) { 


   	



	       	$item_id = $row["item_id"];

	      				$details = explode(':', $row["addinfo"]); 

	        			if ($row['category'] == '2') {
	        				$ip = trim(gethostbyname($details[0]));	       				
	        			
	        			}else{
	        				$ip = trim($details[0]);
	        			}

	        			
						$date = file_get_contents("https://ip.nf/".$ip.".json");
						
						if ($date != 'invalid ip address') {
										
							$json =  json_decode($date); 
							$josn_show = $json->ip; 


						     $countryCode = $josn_show->country_code;
						     $country_name = $josn_show->country;
						     $isp = $josn_show->asn;

			        	}



			        if (empty($countryCode)) {

			        	$countryCode == 'N/A';



			        }else if (empty($isp)) {

			        	$is == 'Unknown';

			        }

	     	  // if (!empty($details[0])) { 

			      $update	= $db->query("UPDATE `accounts` SET `country`= '$countryCode' , `country_name` = '$country_name', `info`= '$isp' WHERE `item_id` = '$item_id'") or die($db->error);

			       

			       		if ($update) {

			        		echo "OK: ";

			        	}else{

			        		echo "Error: ";

			        	}	

	     	// }   



	     	 echo $details[0];  echo '-';  echo $countryCode; echo '- '; echo $isp;

			 echo ' #'.$item_id.'<br>';

     }

                                                       

 ?>