<?php

$config = require('config.php');
$db = new Database($config['database']);

$heading = 'Корисници';

$notes = $db->query('select * from ucenici')->get();
$brkorisnici = $db->query('select * from ucenici')->rowCount();
$per_page = 5;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];

    if (empty($errors)) {
        $db->query('DELETE FROM ucenici WHERE id = :id', [
            'id' => $_POST['pid']
        ]);
    $message['success'] = 'Успешно избришан податок со ID #'.$_POST['pid'] ;
    }
}


require "views/korisnici.view.php";