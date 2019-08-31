<?php

$date = db_CURDATE();

function payments($date)
{
    global $db;

    $payments_btc_sql = $db->query("SELECT SUM(amount) AS `payments_btc` FROM `transaction`  WHERE `date` LIKE '%$date%'");
    $payments_btc = $payments_btc_sql->fetch_assoc();

    return $payments_btc['payments_btc'] * 1;

}


function reg_teday($date)
{

    global $db;

    $reg_teday = $db->query("SELECT `user_id` FROM `members` WHERE `active`= 1 AND `dt` LIKE '%$date%'");
    return $reg_teday->num_rows;


}


function reseller()
{
    global $db;
    $reseller_res = $db->query("SELECT `user_id` FROM `members` WHERE `active`= 1 AND  `reseller` = 1 AND  `reseller_active` = 1");
    return $reseller_res->num_rows;

}

function total_users()
{
    global $db;
    $all_users = $db->query("SELECT `user_id` FROM `members` WHERE `active`= 1");
    return $all_users->num_rows;

}


function sales_accounts()
{

    global $db;

    $item_sql = $db->query("SELECT SUM(price) AS `item_sum` FROM `accounts` WHERE `sold`= 1 AND `cashed_out` = 0");
    $item = $item_sql->fetch_assoc();
    $item_sum = $item['item_sum'];

    return ($item_sum);

}


// gjen sa $ jan ber sipas dates
function item_amount_tools($date)
{
    global $db;

    $item_sql = $db->query("SELECT SUM(price) AS `item_sum` FROM `accounts` WHERE `sold`= 1 AND  `date_purchased` LIKE '%$date%'");
    $item = $item_sql->fetch_assoc();

    return $item['item_sum'] * 1;
}


$pergindja = 0.50;
//Active Sales
$item_sales = sales_accounts() * $pergindja;

?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-warning card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">payment</i>
                        </div>
                        <p class="card-category">Payments Today</p>
                        <h3 class="card-title"><?php echo payments($date); ?> $</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">payment</i> Today's Payment
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-rose card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">equalizer</i>
                        </div>
                        <p class="card-category">Users Register Today</p>
                        <h3 class="card-title"><?php echo reg_teday($date); ?></h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">local_offer</i> Today's registration
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">verified_user</i>
                        </div>
                        <p class="card-category">Users Total</p>
                        <h3 class="card-title"><?php echo total_users(); ?></h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">date_range</i> Total users
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">account_balance_wallet</i>
                        </div>
                        <p class="card-category">Total Users Balance</p>
                        <h3 class="card-title">
                            <?php

                            $krediti = $db->query("SELECT SUM(`krediti`) FROM members WHERE `active`= 1");
                            $totla_kredit = $krediti->fetch_array();

                            echo $totla_kredit[0];

                            ?>$
                        </h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">update</i> Total Balance
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>