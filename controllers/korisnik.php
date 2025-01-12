<?php
require 'Validator.php';

$config = require('config.php');
$db = new Database($config['database']);

$heading = 'Ученик';
$currentUserId = 1;

$note = $db->query('select * from ucenici where id = :id', [
    'id' => $_GET['id']
])->findOrFail();

//authorize($note['user_id'] === $currentUserId);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];

    if (! Validator::string($_POST['ucenikIme'], 1, 100)) {
        $errors['ucenikIme'] = 'Не треба да содржи најмалку 1 и не повеќе од 100 карактери.<br>';
    }

    if (! Validator::emptyPost('ucenikIme') ){
        $errors['ucenikIme'] = 'Полето Име е задолжително.<br>';
    }

    if (! Validator::emptyPost('ucenikPrezime') ){
        $errors['ucenikPrezime'] = 'Полето Презиме е задолжително.<br>';
    }

    // if (! Validator::emptyPost('ucenikEmail') ){
    //     $errors['ucenikEmail'] = 'Полето е задолжително.';
    // }
    // if (! Validator::emptyPost('klasen') ){
    //     $errors['klasen'] = 'Полето е задолжително.';
    // }



    

    if (empty($errors)) {
        $db->query('UPDATE ucenici SET bid = :bid, ucenikIme = :ucenikIme, ucenikPrezime = :ucenikPrezime, ucenikEmail = :ucenikEmail, odd_id = :odd_id, klasen = :klasen, stat = :stat, zabeleska = :zabeleska WHERE id = '.$note['id'].'', [
            'bid' => $_POST['bid'],
            'ucenikIme' => $_POST['ucenikIme'],
            'ucenikPrezime' => $_POST['ucenikPrezime'],
            'ucenikEmail' => $_POST['ucenikEmail'],
            'odd_id' => $_POST['odd_id'],
            'klasen' => $_POST['klasen'],
            'stat' => $_POST['stat'],
            'zabeleska' => $_POST['zabeleska']
        ]);
    $message['success'] = 'Успешно зачуван корисник #' .$note['id'];
    header('Refresh: 1; URL='.$_SERVER['REQUEST_URI'].'&status=success');
    }else{
        $message['errors'] = $errors;
    }
}



require "views/korisnik.view.php";