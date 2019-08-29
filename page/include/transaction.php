<?php


//die();
//skype ajay.yadav008
// on this file blockchane push callback
$page_value = 13;
if (!empty($page_value)) {

	// Include the autoload.php from its vendor directory

	require 'btc/vendor/autoload.php';
	$apiKey =  '97a8535a-7538-4470-8aa6-c318bb8b8f5e';
	$order_id = clear($page_value);
	$xPub = 'xpub6DHE1DPVEeK6cXF9ytHLiEH8HNZtUAbHV2jURKaNX4foVHnVXQJHMoSN1kZWXfKiGv66acYySep8yMYdnoojMpuuVFmysW9oxeFHiuvKjq5';

	
	//selct from datase  all info of this order 
	$sql = $db->query("SELECT * FROM `btc` WHERE `order_id` = '$order_id'");
	$show = $sql->fetch_assoc();	
    echo json_encode($show);


	$blockchain = new \Blockchain\Blockchain($apiKey);
	$add = $blockchain->Explorer->getAddress($show['addres']);
	$tx_x = $add->transactions[0]->hash;

	$block = $blockchain->Explorer->getTransaction($tx_x);

print_r($tx_x);

		

		//print_r($blockchain->Explorer->getTransaction($transaksion));

		//print_r($blockchain->Explorer->getBlock($transaksion));








// Output log of activity

print_r($blockchain->log);







}
