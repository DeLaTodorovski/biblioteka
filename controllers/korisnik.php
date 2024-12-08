<?php
require 'Validator.php';

$config = require('config.php');
$db = new Database($config['database']);

$heading = 'Корисник';
$currentUserId = 1;

$note = $db->query('select * from ucenici where id = :id', [
    'id' => $_GET['id']
])->findOrFail();

//authorize($note['user_id'] === $currentUserId);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];

    if (! Validator::string($_POST['ucenikIme'], 1, 225)) {
        $errors['ucenikIme'] = 'A body of no more than 225 characters is required.';
    }
    if (! Validator::string($_POST['zabeleska'], 1, 1000)) {
        $errors['objasnuvanje'] = 'A body of no more than 1000 characters is required.';
    }

    if (! Validator::emptyPost('ucenikIme') ){
        $errors['imeKniga'] = 'Полето е задолжително.';
    }
    
    if (! Validator::emptyPost('ucenikPrezime') ){
        $errors['objasnuvanje'] = 'Полето е задолжително.';
    }
    if (! Validator::emptyPost('ucenikEmail') ){
        $errors['ucenikEmail'] = 'Полето е задолжително.';
    }
    if (! Validator::emptyPost('klasen') ){
        $errors['klasen'] = 'Полето е задолжително.';
    }



    

    if (empty($errors)) {
        $db->query('UPDATE ucenici SET ucenikIme = :ucenikIme, ucenikPrezime = :ucenikPrezime, ucenikEmail = :ucenikEmail, odd_id = :odd_id, klasen = :klasen, stat = :stat, zabeleska = :zabeleska WHERE id = '.$note['id'].'', [
            'ucenikIme' => $_POST['ucenikIme'],
            'ucenikPrezime' => $_POST['ucenikPrezime'],
            'ucenikEmail' => $_POST['ucenikEmail'],
            'odd_id' => $_POST['odd_id'],
            'klasen' => $_POST['klasen'],
            'stat' => $_POST['stat'],
            'zabeleska' => $_POST['zabeleska']
        ]);
    $message['success'] = 'Успешно зачуван корисник #' .$note['id'];
    }
}



require "views/korisnik.view.php";