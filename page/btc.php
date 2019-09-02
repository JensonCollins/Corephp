<?php

//if ($user_id != '4') {
//   die('Offline');
//}

// Include the autoload.php from its vendor directory

require 'include/btc/vendor/autoload.php';

if (isset($_POST['amount'])) {

    $btc_address = getBtcAddress($user_id);
    $update = null;
    $apiKey = $settings['btc_api_key'];
    $xPub = $settings['btc_xpub'];
    if ($btc_address == null) {
        $dollar = clear($_POST['amount']);
        $sql = $db->query("INSERT INTO `btc`(`user_id`, `usd`, `date`, `status`) VALUES ('$user_id','$dollar',NOW(), 'pending')") or die ($db->error);
        $order_id = $db->insert_id;

        $blockchain = new \Blockchain\Blockchain($apiKey);
        $callbackUrl = base_url().'transaction/' . $order_id;
        $gap_limit = 5; // optional - how many unused addresses are allowed before erroring out

        $response = $blockchain->ReceiveV2->generate($apiKey, $xPub, $callbackUrl, $gap_limit);
        $btc_addres = $response->getReceiveAddress();

        $amount = $blockchain->Rates->toBTC($dollar, 'USD');

        $update = $db->query("UPDATE `btc` SET `addres`= '$btc_addres', `btc`= '$amount' WHERE `order_id` = '$order_id'") or die ($db->error);

    } else {
        $blockchain = new \Blockchain\Blockchain($apiKey);
        $dollar = clear($_POST['amount']);
        $amount = $blockchain->Rates->toBTC($dollar, 'USD');
        $updated = $db->query("UPDATE `btc` SET `usd` = " . $dollar . ",`btc`= '$amount' WHERE `order_id` = '" . $btc_address['order_id'] . "'") or die ($db->error);
        $btc_address['btc'] = $amount;
        $btc_address['usd'] = $dollar;
    }

    if ($update || $btc_address) {


        ?>

        <div class="content">

            <div class="container-fluid">

                <div class="row">

                    <div class="col-md-12">

                        <div class="card">

                            <div class="card-header">

                                <strong class="card-title">BTC Payment</strong>

                            </div>

                            <div class="card-body">

                                <div class="card card-pricing card-plain">
                                    <div class="card-body">
                                        <div class="card-icon icon-black ">
                                            <?php if ($update) { ?>
                                                <img src="https://chart.googleapis.com/chart?chs=200x200&chld=M|0&cht=qr&chl=bitcoin:<?php echo $btc_addres; ?>?amount=<?php echo $amount; ?>&choe=UTF-8">
                                            <?php } else if ($btc_address) { ?>
                                                <img src="https://chart.googleapis.com/chart?chs=200x200&chld=M|0&cht=qr&chl=bitcoin:<?php echo $btc_address['addres']; ?>&choe=UTF-8">
                                            <?php } ?>
                                        </div>
                                        <?php if ($update) { ?>
                                            <h2 class="card-title"><?php echo $amount; ?></h2>

                                            <h3 class="btc_address" data-clipboard-text="<?php echo $btc_addres; ?>"
                                                id="btc_add"><?php echo $btc_addres; ?></h3>
                                        <?php } else if ($btc_address) { ?>
                                            <h2 class="card-title"><?php echo $btc_address['btc']; ?></h2>

                                            <h3 class="btc_address"
                                                data-clipboard-text="<?php echo $btc_address['addres']; ?>"
                                                id="btc_add"><?php echo $btc_address['addres']; ?></h3>

                                        <?php } ?>
                                    </div>
                                    <div class="card-footer justify-content-center ">
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
} else {
    echo "Cant show";
}
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.6.0/clipboard.min.js"></script>
<script>
    window.onload = function () {

        var clipboard1 = new Clipboard('#btc_add');
        clipboard1.on('success', function (e) {
            $("#btc_add").html("Copied!");
            window.setTimeout(function () {
                $("#btc_add").html($("#btc_add").attr("data-clipboard-text"));
            }, 1000);
            e.clearSelection();
        });
    };


</script>