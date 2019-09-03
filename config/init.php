<?php

session_start();

//@ob_start();

require 'config.php';
require 'general.php';
require 'database.php';
require 'functions.php';

if (logged_in() === true) {

    $session_user_id = clear($_SESSION['user_id']);

    $user_data = user_data($session_user_id, 'user_id', 'user_name', 'pass', 'email', 'regIP', 'dt', 'lastlogin_time', 'last_login_ip', 'krediti', 'amount_purchased', 'amount_refunds', 'super', 'active', 'rules', 'sidebar_color', 'sidebar_back_color', 'sidebar_back_image', 'checker_email');

    if (user_active($user_data['user_name']) === false) {

        session_destroy();

        header('Location: index.php');

        exit();
    }

    $menu_data = getAllmenu($user_data['super']);

    $settings = getAllSettings();
}

$errors = array();