<?php

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_POST['sidebar_back_color'])) {
    $db->query("UPDATE `members` SET sidebar_back_color='" . $_POST['sidebar_back_color'] . "' WHERE user_id='" . $user_id . "'");
    if ($db->affected_rows >= 1) {
        echo json_encode(array('success' => 1));
    } else {
        echo json_encode(array('failed' => 1));
    }
}
if (isset($_POST['sidebar_color'])) {
    $db->query("UPDATE `members` SET sidebar_color='" . $_POST['sidebar_color'] . "' WHERE user_id='" . $user_id . "'");
    if ($db->affected_rows >= 1) {
        echo json_encode(array('success' => 1));
    } else {
        echo json_encode(array('failed' => 1));
    }
}
if (isset($_POST['sidebar_back_image'])) {
    $db->query("UPDATE `members` SET sidebar_back_image='" . $_POST['sidebar_back_image'] . "' WHERE user_id='" . $user_id . "'");
    if ($db->affected_rows >= 1) {
        echo json_encode(array('success' => 1));
    } else {
        echo json_encode(array('failed' => 1));
    }
}

if (isset($_POST['smtp_id'])) {
    $query_data = $db->query("SELECT * FROM accounts WHERE item_id='" . $_POST['smtp_id'] . "'");
    if($query_data) {
        $row = $query_data->fetch_assoc();
        $details = json_decode($row['details'], TRUE);

        $smtp_ports = ["465", "587", "25"];

        $smtp_server = $details['smtp_server_inf'];
        $smtp_user_name = $details['smtp_username'];
        $smtp_user_pass = $details['smtp_userpass'];
        $smtp_port = $details['smtp_port'];
        $recepient_name = $_POST['recepient_name'];

        echo json_encode(array(
            "success" => 1,
            "host" => $smtp_server,
            "user" => $smtp_user_name,
            "pass" => $smtp_user_pass,
            "port" => $smtp_port
        ));
    } else {
        echo json_encode(array("success" => 0));
    }

    /*$success = 0;
    for ($i = 0; $i < count($smtp_ports); $i++) {
        if (sendTestmailSMTP($smtp_server, $smtp_user_name, $smtp_user_pass, $smtp_ports[$i], $recepient_name, $_POST['smtp_id'])) {
            $success = 1;
            break;
        }
    }
    echo json_encode(array("success" => $success));
    if ($success == 0) {
        $db->query("UPDATE accounts SET is_deleted = 1 WHERE item_id='" . $_POST['smtp_id'] . "'");
    }*/
}

if (isset($_POST['del_smtp_id'])) {
    $query = $db->query("UPDATE accounts SET is_deleted = 1 WHERE item_id='" . $_POST['del_smtp_id'] . "'");
    if ($db->affected_rows >= 1) {
        echo json_encode(array('success' => 1));
    } else {
        echo json_encode(array('failed' => 1));
    }
}

if (isset($_POST['checker_email'])) {
    $member_id = $_POST['member_id'];
    $checker_email = $_POST['checker_email'];
    $db->query("UPDATE members SET checker_email='$checker_email' WHERE user_id='$member_id'");
    if ($db->affected_rows >= 1) {
        echo json_encode(array('success' => 1));
    } else {
        echo json_encode(array('success' => 0));
    }
}

if (isset($_POST['token'])) {
    header('Content-type: application/json');
    $user = clear($_POST['username']);
    $password = clear($_POST['password']);
    $captcha = clear($_POST['token']);
    if (!$captcha) {
        die(json_encode(array('success' => 0, 'error_msg' => "Please fill out the captcha form")));
    }
    $secretKey = "6LcUHbgUAAAAAHYIb4EjQE1i4TJK53BBCndK8NM-";
    $ip = $_SERVER['REMOTE_ADDR'];

    // post request to server
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $data = array('secret' => $secretKey, 'response' => $captcha);

    $options = array(
        'http' => array(
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($data)
        )
    );
    $context = stream_context_create($options);
    $response = file_get_contents($url, false, $context);
    $responseKeys = json_decode($response, true);
    if ($responseKeys["success"]) {
//        echo json_encode(array('success' => 1));
    } else {
        echo json_encode(array('success' => 0, 'error_msg' => 'captcha code error'));
    }
    if (empty($user) === true || empty($user) === true) {
        echo json_encode(array('success' => 0, 'error_msg' => 'Put the correct password or username'));
    } else if (user_exists($user) === false) {
        echo json_encode(array('success' => 0, 'error_msg' => 'You are not a member? Sign up now!'));
    } else if (user_active($user) === false) {
        echo json_encode(array('success' => 0, 'error_msg' => 'Your profile is deactivated'));
    } else {
        $login = login($user, $password);
        if ($login === false) {
            echo json_encode(array('success' => 0, 'error_msg' => 'Password is incorrect'));
        } else {
            $_SESSION['user_id'] = $login;
            $_SESSION['login_time'] = db_date();
            echo json_encode(array('success' => 1));
        }
    }
}