<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

//97a8535a-7538-4470-8aa6-c318bb8b8f5e


// Include the autoload.php from its vendor directory
require 'vendor/autoload.php';

$apiKey =  '97a8535a-7538-4470-8aa6-c318bb8b8f5e';
$xPub = 'xpub6DHE1DPVEeK6cXF9ytHLiEH8HNZtUAbHV2jURKaNX4foVHnVXQJHMoSN1kZWXfKiGv66acYySep8yMYdnoojMpuuVFmysW9oxeFHiuvKjq5';


$blockchain = new \Blockchain\Blockchain($apiKey);
$callbackUrl = 'http://example.com/transaction?secret=mySecret';
$gap_limit = 5; // optional - how many unused addresses are allowed before erroring out

$response = $blockchain->ReceiveV2->generate($apiKey, $xPub, $callbackUrl, $gap_limit);

// Show receive address to user:
echo "Send coins to " . $response->getReceiveAddress();