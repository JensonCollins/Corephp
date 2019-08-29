<?php 

if ($user_id != '4') {
   die('Offline');
}

// Include the autoload.php from its vendor directory

require 'include/btc/vendor/autoload.php';

if (isset($_POST['amount'])) {


		$dollar =  clear($_POST['amount']);
		$sql =  $db->query("INSERT INTO `btc`(`user_id`, `usd`, `date`) VALUES ('$user_id','$dollar',NOW())") or die ($db->error);
		$order_id = $db->insert_id;


		$apiKey =  '97a8535a-7538-4470-8aa6-c318bb8b8f5e';
		$xPub = 'xpub6DHE1DPVEeK6cXF9ytHLiEH8HNZtUAbHV2jURKaNX4foVHnVXQJHMoSN1kZWXfKiGv66acYySep8yMYdnoojMpuuVFmysW9oxeFHiuvKjq5';


		$blockchain = new \Blockchain\Blockchain($apiKey);
		$callbackUrl = 'https://247smtp.com/transaction/'.$order_id;
		$gap_limit = 5; // optional - how many unused addresses are allowed before erroring out

        $response = $blockchain->ReceiveV2->generate($apiKey, $xPub, $callbackUrl, $gap_limit);
        $btc_addres = $response->getReceiveAddress();
		
        $amount = $blockchain->Rates->toBTC($dollar, 'USD');
		
		$update =  $db->query("UPDATE `btc` SET `addres`= '$btc_addres', `btc`= '$amount' WHERE `order_id` = '$order_id'") or die ($db->error);



	if ($update) {



?>

        <div class="breadcrumbs">

            <div class="col-sm-4">

                <div class="page-header float-left">

                    <div class="page-title">

                        <h1>ShopName</h1>

                    </div>

                </div>

            </div>

            <div class="col-sm-8">

                <div class="page-header float-right">

                    <div class="page-title">

                        <ol class="breadcrumb text-right">

                            <li><a href="#">Dashboard</a></li>

                            <li><a href="#">BTC Payment</a></li>                            

                        </ol>

                    </div>

                </div>

            </div>

        </div>







        <div class="content mt-3">

            <div class="animated fadeIn">

                <div class="row">



                    <div class="col-md-12">

                        <div class="card">

                            <div class="card-header">

                                <strong class="card-title">BTC Payment</strong>

                            </div>

                            <div class="card-body">



                            	<div class="container">

										  <div class="row">

										    <div class="col-sm-3">

										    	<center>

										    		 <h3>Bitcoin Payment</h3>    <br>                          



										     		<img src="https://chart.googleapis.com/chart?chs=200x200&chld=M|0&cht=qr&chl=bitcoin:<?php echo$btc_addres;?>?amount=<?php echo $amount;?>&choe=UTF-8">

										     	</center>



										    </div>

										    <div class="col-sm-8">

										     <br><br><br><br>

										     <h2><?php echo$amount;?></h2>

										      <h2><?php echo$btc_addres;?></h2>

										    </div>										    

										  </div>

										</div>  



                           </div>

                        </div>

                    </div>





                </div>

            </div><!-- .animated -->

        </div><!-- .content -->



<?php 



		}

}else{

	echo "Cant show";

}



?>