<?php

// gjen sa ancaunde nuk ka  shitur
use PHPMailer\PHPMailer\PHPMailer;

function unsold_tools($type)
{
    global $db;
    $sql = $db->query("SELECT `item_id` FROM `accounts` WHERE  `sold` = '0' AND `category` = '$type' AND is_deleted!=1");
    return $sql->num_rows;
}

// gjen id ne baze te userr name
function username_to_id($user_name)
{
    global $db;
    $sql = $db->query("SELECT `user_id` FROM `members` WHERE `user_name` = '$user_name'");
    $show = $sql->fetch_assoc();

    return $show['user_id'];

}

// gjen id ne baze te userr name
function id_to_username($user_id)
{
    global $db;
    $sql = $db->query("SELECT `user_name` FROM `members` WHERE `user_id` = '$user_id'");
    $show = $sql->fetch_assoc();

    return $show['user_name'];

}


// gjen sa ancaunde ka shitur  perosni
function item_refunde_accounts($user_name)
{

    global $db;

    $item_sql = $db->query("SELECT `item_id` FROM `accounts` WHERE `user_name` = '$user_name' AND `sold`= 1 AND  `refunde` = 1 AND `cashed_out` = 0");

    $item = $item_sql->num_rows;

    return $item;

}


// gjen sa ancaunde nuk ka  shitur
function item_unsold_accounts($user_name)
{
    global $db;

    $item_sql = $db->query("SELECT `item_id` FROM `accounts` WHERE `user_name` = '$user_name' AND `sold`= 0");
    $item = $item_sql->num_rows;

    return $item;

}

// gjen sa ancaunde ka shitur  perosni
function item_sold_accounts($user_name)
{
    global $db;

    $item_sql = $db->query("SELECT `item_id` FROM `accounts` WHERE `user_name` = '$user_name' AND `sold`= 1 AND  `refunde` = 0 AND `cashed_out` = 0");
    $item = $item_sql->num_rows;

    return $item;

}


function item_unsales_accounts($user_name)
{
    global $db;

    //$result = mysql_query('SELECT SUM(value) AS value_sum FROM codes');
    //$row = mysql_fetch_assoc($result);
    //$sum = $row['value_sum'];

    $item_sql = $db->query("SELECT SUM(price) AS `item_sum` FROM `accounts` WHERE `user_name` = '$user_name' AND `sold`= 0 AND  `refunde` = 0 AND `cashed_out` = 0");
    $item = $item_sql->fetch_assoc();
    $item_sum = $item['item_sum'];

    return ($item_sum);

}


// gjen sa $ ka shitur  perosni
function item_sales_accounts($user_name)
{
    global $db;

    $item_sql = $db->query("SELECT SUM(price) AS `item_sum` FROM `accounts` WHERE `user_name` = '$user_name' AND `sold`= 1 AND  `refunde` = 0 AND `cashed_out` = 0");
    $item = $item_sql->fetch_assoc();
    $item_sum = $item['item_sum'];

    return ($item_sum);

}


///////////////////////////////////////////////////////////////

// gjen resellerin  sipas id se tools
function reseller_name($item_id)
{
    global $db;

    $accounts_sql = $db->query("SELECT `user_name` FROM `accounts` WHERE `item_id` = '$item_id'") or die();
    $accounts = $accounts_sql->fetch_assoc();

    return $accounts['user_name'];

}


function reporting_tools($item_id)
{

    global $db;
    $query = $db->query("SELECT id FROM `tickets` WHERE `type` = 1 AND `item_id` = '$item_id'");
    $query_array = $query->fetch_array();

    return $query_array[0];
}

function cnt_tickets($user_name) {
    global $db;
    $query = $db->query("SELECT * FROM `tickets` WHERE `user_name` = '$user_name' AND `type` = '2' AND `statusi` = '2';");
    return $query->num_rows;
}

function ctn_all_tickets() {
    global $db;
    $query = $db->query("SELECT * FROM `tickets` WHERE `type` = '2' AND `statusi` = '2'");
    return $query->num_rows;
}

function cnt_opened_tickets() {
    global $db;
    $query = $db->query("SELECT * FROM `tickets` WHERE `type` = '2' AND `statusi` = '1'");
    return $query->num_rows;
}

function cnt_closed_tickets() {
    global $db;
    $query = $db->query("SELECT * FROM `tickets` WHERE `type` = '2' AND `statusi` = '2'");
    return $query->num_rows;
}

function cnt_refunded() {
    global $db;
    $query = $db->query("SELECT * FROM `tickets` WHERE `type` = '1' AND `statusi` = '3'");
    return $query->num_rows;
}

function cnt_pending() {
    global $db;
    $query = $db->query("SELECT * FROM `tickets` WHERE `type` = '1' AND `statusi` = '5'");
    return $query->num_rows;
}

function db_date()
{
    global $db;
    //SELECT  |  NOW(), 2014-11-22 12:45:34 | CURDATE(), 	2014-11-22 | CURTIME() 12:45:34
    $date = $db->query("SELECT NOW()");
    $show = $date->fetch_assoc();
    return $show['NOW()'];
}

function db_CURDATE()
{
    global $db;

    $date = $db->query("SELECT CURDATE()");
    $show = $date->fetch_assoc();
    return $show['CURDATE()'];
}


function login($username, $password)
{
    global $db;

    $user_id = user_id_form_username($username);
    $salt = 'KK856'; // SALT for encrypting

    $username = clear($username);
    $password = md5($password . $salt);

    $_SESSION['password'] = $password;


    $query = $db->query("SELECT COUNT(user_id) FROM `members` WHERE `user_name` = '$username' AND `pass` = '$password' ");
    $query_array = $query->fetch_array();

    return $query_array[0] == 1 ? $user_id : false;

}


//search in database  id form username
function user_id_form_username($username)
{
    global $db;


    $username = clear($username);
    $query = $db->query("SELECT (user_id) FROM `members` WHERE `user_name` = '$username'");
    $query_array = $query->fetch_array();

    //print_r($query_array);

    return $query_array['user_id'] != 1 ? $query_array['user_id'] : false;

}


function user_exists($username)
{
    global $db;

    $username = clear($username);

    $query = $db->query("SELECT COUNT(user_id) FROM `members` WHERE `user_name` = '$username'");
    $query_array = $query->fetch_array();

    return $query_array[0] == 1 ? true : false;

}


//if user is active or not
function user_active($username)
{
    global $db;

    $username = clear($username);
    $query = $db->query("SELECT COUNT(user_id) FROM `members` WHERE `user_name` = '$username' AND active = 1 ");
    $query_array = $query->fetch_array();

    return $query_array[0] == 1 ? true : false;

}


function user_data($user_id)
{

    global $db;

    $data = array();
    $user_id = (int)$user_id;

    $func_num_args = func_num_args();
    $func_get_args = func_get_args();

    if ($func_get_args > 1) {

        unset($func_get_args[0]);

        $fields = '`' . implode('`,`', $func_get_args) . '`';

        $quary_data = $db->query("SELECT $fields FROM `members` WHERE `user_id` = '$user_id'");
        $data = $quary_data->fetch_assoc();

        return $data;
    }
}

function getAllmenu($permission)
{
    global $db;

    $permission = (int)$permission;

    $data_array = array();

    if ($permission == 11) {
        $query_data = $db->query("SELECT * FROM menu WHERE visible=1");
        while ($row = $query_data->fetch_object())
            array_push($data_array, $row);

    } else if ($permission == 0) {
        $query_data = $db->query("SELECT * FROM menu WHERE visible=1 AND menu_type=" . $permission);
        while ($row = $query_data->fetch_object()) {
            array_push($data_array, $row);
        }
    }

    return $data_array;

}

function menuHasChild($id)
{
    global $db;
    $sql = $db->query("SELECT * FROM `menu` WHERE  visible = 1 AND parent_id = '$id'");
    return $sql->num_rows;
}

function menuHasParent($id)
{
    global $db;
    $sql = $db->query("SELECT parent_id FROM `menu` WHERE  visible = 1 AND id = '$id'");
    $data = $sql->fetch_object();
    if ($data->parent_id == 0)
        return false;
    return true;
}

function getChildMenu($parent_id)
{
    global $db;

    $data_array = array();

    $query_data = $db->query("SELECT * FROM menu WHERE visible=1 AND parent_id=" . $parent_id);
    while ($row = $query_data->fetch_object())
        array_push($data_array, $row);

    return $data_array;
}

function getAllSettings()
{
    global $db;
    $data_array = array();

    $query_data = $db->query("SELECT * FROM settings");
    while ($row = $query_data->fetch_object())
        $data_array[$row->setting_key] = $row->setting_value;

    return $data_array;
}

function getBtcAddress($user_id)
{
    global $db;

    $query_data = $db->query("SELECT * FROM btc WHERE user_id='$user_id' AND status!='completed' order by order_id desc");
    $data = $query_data->fetch_assoc();

    return $data;
}

function get_geolocation($apiKey, $ip, $lang = "en", $fields = "*", $excludes = "")
{
    $url = "https://api.ipgeolocation.io/ipgeo?apiKey=" . $apiKey . "&ip=" . $ip . "&lang=" . $lang . "&fields=" . $fields . "&excludes=" . $excludes;
    $cURL = curl_init();

    curl_setopt($cURL, CURLOPT_URL, $url);
    curl_setopt($cURL, CURLOPT_HTTPGET, true);
    curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($cURL, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Accept: application/json'
    ));
    return curl_exec($cURL);
}

function validate_ip($ip_address)
{
    if (filter_var($ip_address, FILTER_VALIDATE_IP)) {
        return true;
    } else {
        return false;
    }
}

function validate_hostname($hostname)
{
    if (filter_var(gethostbyname($hostname), FILTER_VALIDATE_IP)) {
        return true;
    } else {
        return false;
    }
}

function sendTestmailSMTP($smtp_server, $smtp_user_name, $smtp_user_pass, $smtp_port, $recepient_name, $item_id)
{
    require_once "page/include/phpmailer/vendor/autoload.php";
    $mail = new PHPMailer;

    $mail->isSMTP();
//    $mail->SMTPDebug = 2;
    $mail->Host = ($smtp_server);
    $mail->SMTPAuth = true;
    $mail->SMTPAutoTLS = false;
    $mail->Username = $smtp_user_name;
    $mail->Password = $smtp_user_pass;
    $mail->SMTPSecure = ($smtp_port === "465") ? "ssl" : "tls";// :
    $mail->Port = $smtp_port;
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );

    $mail->From = $smtp_user_name;
    $mail->FromName = explode(".",explode("@", $smtp_user_name)[0])[0];

    $mail->addAddress($recepient_name, "Recepient Name");

    $mail->isHTML(true);

    $mail->Subject = "Subject #$item_id";
    $mail->Body = "<i>This is test message from #$item_id</i>";
    $mail->AltBody = "This is test message from #$item_id";

    if (!$mail->send()) {
        return false;
    } else {
        return true;
    }
}