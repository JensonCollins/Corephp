<?php

//skype ajay.yadav008
// on this file blockchane push callback

if (!empty($page_value)) {

	// Include the autoload.php from its vendor directory

	require 'btc/vendor/autoload.php';
	$apiKey =  $settings['btc_api_key'];
	$order_id = clear($page_value);
	$xPub = $settings['btc_xpub'];

	
	//selct from datase  all info of this order 
	$sql = $db->query("SELECT * FROM `btc` WHERE `order_id` = '$order_id'");
	$show = $sql->fetch_assoc();


	$blockchain = new \Blockchain\Blockchain($apiKey);
	$add = $blockchain->Explorer->getAddress($show['addres']);
	$tx_x = $add->transactions[0]->hash;

    if($tx_x)
    {
        $updated = $db->query("UPDATE `btc` SET `status` = 'completed' WHERE `order_id` = '" . $show['order_id'] . "'") or die ($db->error);
    }
	$block = $blockchain->Explorer->getTransaction($tx_x);

print_r($tx_x);

		

		//print_r($blockchain->Explorer->getTransaction($transaksion));

		//print_r($blockchain->Explorer->getBlock($transaksion));





// Output log of activity

//print_r($blockchain->log);

}