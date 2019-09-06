<?php

switch (ENV) {
    case 'development':
        $db_config['development'] = array(
            'hostname' => '127.0.0.1',
            'username' => 'root',
            'password' => '',
            'database' => 'smtp_db',
            'char_set' => 'utf8',
            'dbcollat' => 'utf8_general_ci',
        );
        break;

    case 'production':
        $db_config['production'] = array(
            'hostname' => '31.184.198.147',
            'username' => 'remote',
            'password' => 'xAraCvC6B9c',
            'database' => 'smtp_db',
            'char_set' => 'utf8',
            'dbcollat' => 'utf8_general_ci',
        );
        break;

    default:
        $db_config['default'] = array(
            'hostname' => '127.0.0.1',
            'username' => 'root',
            'password' => '',
            'database' => 'smtp_db',
            'char_set' => 'utf8',
            'dbcollat' => 'utf8_general_ci',
        );
}

$db = new mysqli($db_config[ENV]['hostname'], $db_config[ENV]['username'], $db_config[ENV]['password'], $db_config[ENV]['database']);

if ($db->connect_errno) {
    echo $db->connect_error; exit('The Webi is offline come back later');
}