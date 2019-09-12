<?php
include 'config/init.php';

$page_name = clear(isset($_GET['page']) ? $_GET['page'] : ''); //page_value   clear($_GET['page']);
$page_value = clear(isset($_GET['id']) ? $_GET['id'] : ''); //page_value   clear($_GET['page']); clear($_GET['id']);
$page_id = clear(isset($_GET['value']) ? $_GET['value'] : ''); //page_value   clear($_GET['page']); clear($_GET['id']);

if (logged_in() == 0) {

    if ($page_name == 'login' || $page_name == '') {
        include 'page/login.php';
    } else if ($page_name == 'register') {
        include 'page/register.php';

    } else if ($page_name == 'cron') {
        include 'page/include/cron.php';

    } else if ($page_name == 'transaction') {
        include 'page/include/transaction.php';

    } else {
        include 'page/login.php';
    }

} else if (logged_in() == 1) {

    $user_name = clear($user_data['user_name']);
    $user_id = clear($user_data['user_id']);

    $active_menu = "";

    if ($page_name == 'ajax') {

        include "page/ajax.php";

    } else if ($page_name == 'grid') {
        // *********************** GRID **********************//
        // grid for table
        if ($page_value == 'accounts') {
            // get grid for table
            include "page/include/grid/accounts.php";
        } else
            if ($page_value == 'stuff') {
                // get grid for table
                include "page/include/grid/stuff.php";
            } else
                if ($page_value == 'cards') {
                    // get grid for table
                    include "page/include/grid/cards.php";
                }

    } else if ($page_name == 'buy') {
        //page withot hader and footer      
        include "page/include/buy.php";

    } else {
        //page with header and footer

        include 'page/include/header.php';
        include 'page/include/menu.php';

        // rules rederect
        if ($page_name != 'rules') {
            if ($user_data['rules'] == "0") {
                header('Location: rules');
                exit('rules');
            }
        }

        if ($page_name == 'login' || $page_name == 'home' || $page_name == '') {

            include 'page/home.php';

        } else if ($page_name == 'rdps') {

            include 'page/rdps.php';

        } else if ($page_name == 'sshs') {

            include 'page/sshs.php';

        } else if ($page_name == 'cpanels') {

            include 'page/cpanels.php';

        } else if ($page_name == 'shells') {

            include 'page/shells.php';

        } else if ($page_name == 'php_mailer') {

            include 'page/php_mailer.php';

        } else if ($page_name == 'smtps') {

            include 'page/smtps.php';

        } else if ($page_name == 'others') {

            include 'page/others.php';

        } else if ($page_name == 'smtpIP') {

            include 'page/smtpIP.php';

        } else if ($page_name == 'smtpDomain') {

            include 'page/smtpDomain.php';

        } else if ($page_name == 'leads') {

            include 'page/leads.php';

        } else if ($page_name == 'purchased') {

            include 'page/purchased.php';

        } else if ($page_name == 'tickets') {

            include 'page/tickets.php';

        } else if ($page_name == 'balance') {
            include 'page/balance.php';

        } else if ($page_name == 'pm') {
            include 'page/pm.php';

        } else if ($page_name == 'btc') {
            include 'page/btc.php';

        } else if ($page_name == 'rules') {

            include 'page/rules.php';

        } else if ($page_name == 'profile') {

            include 'page/profile.php';

        } else if ($page_name == 'transaction') {
            include 'page/include/transaction.php';

        } else if ($page_name == 'admin') {

            if ($user_data['super'] == 11) {

                $active_menu = 'admin/' . $page_value;

                if ($page_value == 'home' || $page_value == '') {
                    include 'page/admin/home.php';
                    $active_menu = 'admin' . $page_value;
                } else if ($page_value == 'tickets') {
                    include 'page/admin/tickets.php';
                } else if ($page_value == 'add') {
                    include 'page/admin/add.php';
                } else if ($page_value == 'users') {
                    include 'page/admin/users.php';
                } else if ($page_value == 'transactions') {
                    include 'page/admin/transactions.php';
                } else if ($page_value == 'support') {
                    include 'page/admin/tickets.php';
                } else if ($page_value == 'unsold') {
                    include 'page/admin/unsold.php';
                } else if ($page_value == 'sold') {
                    include 'page/admin/sold.php';
                } else if ($page_value == 'manual') {
                    include 'page/admin/manual.php';
                } else if ($page_value == 'menu') {
                    include 'page/admin/menu.php';
                } else if ($page_value == 'news') {
                    include 'page/admin/news.php';
                } else {
                    include 'page/404.php';
                }

            }

        } else {

            include 'page/404.php';

        }

        include 'page/include/footer.php';
    }//

}