<?php
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
    $query_data = $db->query("SELECT * FROM accounts WHERE item_id='".$_POST['smtp_id']."'");
    $row = $query_data->fetch_assoc();
    $details = json_decode($row['details'], TRUE);
    $smtp_server = $details['smtp_server_inf'];
    $smtp_user_name = $details['smtp_username'];
    $smtp_user_pass = $details['smtp_userpass'];
    $smtp_port = $details['smtp_port'];

}