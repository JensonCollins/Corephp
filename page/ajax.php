<?php
if (isset($_POST['sidebar_back_color'])) {
    $db->query("UPDATE `members` SET sidebar_back_color='".$_POST['sidebar_back_color']."' WHERE user_id='".$user_id."'");
    if($db->affected_rows >= 1) {
        echo json_encode(array('success' => 1));
    } else {
        echo json_encode(array('failed' => 1));
    }
}
if (isset($_POST['sidebar_color'])) {
    $db->query("UPDATE `members` SET sidebar_color='".$_POST['sidebar_color']."' WHERE user_id='".$user_id."'");
    if($db->affected_rows >= 1) {
        echo json_encode(array('success' => 1));
    } else {
        echo json_encode(array('failed' => 1));
    }
}