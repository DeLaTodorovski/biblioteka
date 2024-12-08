<?php

$config = require('config.php');
$db = new Database($config['database']);

$heading = 'Книги';

$notes = $db->query('select * from knigi')->get();
$brknigi = $db->query('select * from knigi')->rowCount();
$per_page = 5;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];

    if (empty($errors)) {
        $db->query('DELETE FROM knigi WHERE id = :id', [
            'id' => $_POST['pid']
        ]);
    $message['success'] = 'Успешно избришан податок со ID #'.$_POST['pid'] ;
    }
}


require "views/knigi.view.php";  