<?php 
 $amount = clear($_POST['amount']);
 ?>

 <div class="row gutter">
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="panel panel-red no-margin">
        
         <div class="panel-body" style="width: 30%; margin: 0px auto;">
         	<div class="panel no-border">
         		<div class="panel-body milky-white-bg ">           

					         	<?php  if (!empty($amount)) {  ?>
									
					                     	 <center>
								                          <h3>PerfectMoney</h3>  <br>
								                       		<img src="<?php echo base_url();?>assets/images/pm.png" width="150px">
								                        <hr>								                        
								                        <h3>$5.00 / minimum</h3> <br>

								                        <p>  the payment are automatic.</p>
								                    </center>	

					                     
					                        

					                        <?php
												$PAYMENT_ID = $user_id;
												$PAYMENT_AMOUNT = $amount;
												$PAYEE_ACCOUNT = 'U15572862';	
												$PAYEE_NAME = '247SMTP';
											?>

											<center>
												<form id="pay" action="https://perfectmoney.is/api/step1.asp" method="POST" name="Pay" style="width: 150px;margin:  0px auto;">
												
														<input type="hidden" name="PAYEE_ACCOUNT" value="<?php echo $PAYEE_ACCOUNT ;?>">
														<input type="hidden" name="PAYEE_NAME" value="<?php echo $PAYEE_NAME ;?>">
														<input type="hidden" name="PAYMENT_ID" value="<?php echo $PAYMENT_ID ;?>">
														<input type="hidden" name="PAYMENT_AMOUNT" value="<?php echo $PAYMENT_AMOUNT ;?>">
														<input type="hidden" name="PAYMENT_UNITS" value="USD">
														<input type="hidden" name="STATUS_URL" value="<?php echo base_url(); ?>/pmStatus">
														<input type="hidden" name="PAYMENT_URL" value="<?php echo base_url(); ?>/pm/thankyou">
														<input type="hidden" name="NOPAYMENT_URL" value="<?php echo base_url(); ?>/pm/fail">
														<input type="hidden" name="NOPAYMENT_URL_METHOD" value="POST">
														<input type="hidden" name="SUGGESTED_MEMO" value="Add funds ">
														<input type="hidden" name="BAGGAGE_FIELDS" value="">
														<button class="btn btn-danger center-text"  type="submit" name="PAYMENT_METHOD" >Pay ($<?php echo $amount; ?>)</button>
												</form> 
											</center>            



					                  
					            <?php }else if ($page_value == 'fail') {
					                 	echo '<br><h3 class="center-text">Payment failed! Please try again or contact us!</h3><br>';

					                 

					            	 }else if ($page_value == 'thankyou') {				                 

					                 		if (!empty($_POST['V2_HASH'])) {

					                 						 $PAYEE_ACCOUNT		= clear($_POST['PAYEE_ACCOUNT']);  
														     $PAYMENT_ID 		= clear($_POST['PAYMENT_ID']);  
														     $PAYMENT_AMOUNT 	= clear($_POST['PAYMENT_AMOUNT']); 
														     $PAYMENT_UNITS 	= clear($_POST['PAYMENT_UNITS']);
														     $PAYMENT_BATCH_NUM = clear($_POST['PAYMENT_BATCH_NUM']); 
														     $PAYER_ACCOUNT		= clear($_POST['PAYER_ACCOUNT']); 
														     $TIMESTAMPGMT 		= clear($_POST['TIMESTAMPGMT']);  
														     $V2_HASH 			= clear($_POST['V2_HASH']); 

													//generate HASH
													$ALTERNATE_PHRASE = '2tR32izr7w3HnbyRceRUrgNOC';
													$ALTERNATE_PHRASE_HASH = strtoupper(md5($ALTERNATE_PHRASE));			
												   
												    $string = $PAYMENT_ID.':'.$PAYEE_ACCOUNT.':'. $PAYMENT_AMOUNT.':'.$PAYMENT_UNITS.':'. $PAYMENT_BATCH_NUM .':'.  $PAYER_ACCOUNT	.':'.$ALTERNATE_PHRASE_HASH.':'.$TIMESTAMPGMT;

													$hash = strtoupper(md5($string));

									                 	if ($hash == $V2_HASH) {										                 												    

														     if (!empty($PAYMENT_ID)) {

														     	$hash_exist = $db->query("SELECT `transactionr_id` FROM `transaction` WHERE `hash` = '$hash'") or die($db->error);	
														     	$show_hash = $hash_exist->fetch_assoc();

														     	
														     	if (!empty($show_hash['transactionr_id'])) {
														     		echo '<br><h3 class="center-text">This transaction exist nr: '.$show_hash['transactionr_id'].'</h3><br>';
														     		
														     	}else if (empty($show_hash['transactionr_id'])) {

																     	$result = $db->query("UPDATE `members` SET `krediti` = (krediti + $PAYMENT_AMOUNT) WHERE `user_id` = '$PAYMENT_ID'");								                						
								                						$result .= $db->query("INSERT INTO `transaction` (`amount`, `btc_amount`, `username`, `user_id`, `address`, `state`, `tipi`, `date`,`hash`)   VALUES('$PAYMENT_AMOUNT','','$user_name','$PAYMENT_ID','','- PM V2 -','2',now(),'$hash')");


															 				//$result = $db->query("UPDATE `members` SET `krediti` = (krediti +  $PAYMENT_AMOUNT) WHERE `user_id` = '$PAYMENT_ID'")or die($db->error);

																			//$result .= $db->query("INSERT INTO transaction(amount,coin_amount,usd,bonus,user_id,address,hash,method,tipi,date) VALUES ('$price_in_usd','$coin_amount','$coin_amount','$bonus','$user_id','$address','$txid','$method','1',NOW())")or die($db->error);	
																		

																		if ($result) {																	
																				echo '<br><h3 class="center-text">Thank You for Payment </h3><br>';
																		}	

																}


											                 }else{
																echo "Error: User id is empty";
															 }

														}else{
															echo "Error: V2_HASH Is not Vaild";
														}	

													}else{
														echo "Error: empty Hash";
													}				     

											/*			
					                 		[PAYEE_ACCOUNT] => U15897852
										    [PAYMENT_AMOUNT] => 1
										    [PAYMENT_UNITS] => USD
										    [PAYMENT_BATCH_NUM] => 242113696
										    [PAYMENT_ID] => 21749
										    [SUGGESTED_MEMO] => Add funds 
										    [V2_HASH] => 349AC78524CE558E4B80EC603332B5A7
										    [TIMESTAMPGMT] => 1546975159
										    [PAYER_ACCOUNT] => U15897852	
					                 		echo "<pre>";
						            		print_r($_REQUEST);
						            		print_r($_POST);
						            	echo "</pre>";*/


					              }   
					        ?>



   				 </div>
             </div>
         </div>
      </div>
   </div>
</div>

