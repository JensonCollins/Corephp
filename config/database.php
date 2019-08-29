<?php

$db_config['default'] = array(
    'hostname' => '127.0.0.1',
    'username' => 'root',
    'password' => '',
    'database' => 'smtp_db',
    'char_set' => 'utf8',
    'dbcollat' => 'utf8_general_ci',
);

$db = new mysqli($db_config['default']['hostname'], $db_config['default']['username'], $db_config['default']['password'], $db_config['default']['database']);

if ($db->connect_errno) {
    echo $db->connect_error; exit('The Webi is offline come back later');
}