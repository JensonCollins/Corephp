<?php

if ($page_value == 'tools') {

		if (isset($_POST['id'])) {	       

			$item_id   = clear(($_POST['id'])); // id e
		        
			$accounts_query = $db->query("SELECT `price`,`sold` FROM `accounts` WHERE `item_id` = '$item_id'");
			$row       = $accounts_query->fetch_assoc();
			$final_price = $row['price'];

			if ($final_price < 0){ die('<center><strong>WELL WELL WELL WE CATCH U DUMB ! #1025</strong></center>'); }
						        
			$krediti = clear($user_data['krediti']);			
						        
			if ($krediti >= $final_price) {

					      
								if ($row["sold"] == '0') {

									//update statusin ne te shitur
									$db->query("UPDATE `accounts` SET `sold` = 1, `buyer` = '$user_name', `date_purchased` = NOW() WHERE `item_id` = '$item_id'") or die($db->error);
									
									 // zbrit vleren e llogaris :D
									$db->query("UPDATE `members` SET `krediti` = (krediti - '$final_price') WHERE `user_id` = '$user_id'") or die($db->error);
													                
									// UPDATE amount_purchased +1
									$db->query("UPDATE `members` SET `amount_purchased` = (amount_purchased + '1') WHERE `user_id` = '$user_id'")or die($db->error);
														                
									 //krijon logs per shitjet
									$diferenca = $krediti - $final_price;

									// $db->query("INSERT INTO purchases(item_id,price,user_name,date,before_balance,after_balance,tipi) VALUES('$item_id', '$final_price', '$user_name', now(), '$krediti','$diferenca', '1')") or die($db->error); // insert purchase info
														                
														                
											echo alert('U have Bought tools please wait for redirect to Purchased or <a href="purchased">click here</a>','success');	
											echo '<meta http-equiv="refresh" content="3; url=purchased" />';											                
									                
									} else {
									                
								
									echo alert('Alrady sold !','primary');
									                
									}
						            
						            
			} else {

				echo  alert('Balanc Low! Your balance is not enough to pay this account Please Refill your Balance!','info');
				 echo '<meta http-equiv="refresh" content="3; url=balance" />';				            
						            
			}      
			        
		}


}