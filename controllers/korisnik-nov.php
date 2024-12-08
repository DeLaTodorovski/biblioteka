<?php
require 'Validator.php';

$config = require 'config.php';
$db = new Database($config['database']);

$heading = 'Додади корисник';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];

    if (! Validator::string($_POST['ucenikIme'], 1, 225)) {
        $errors['ucenikIme'] = 'A body of no more than 225 characters is required.';
    }
    if (! Validator::string($_POST['zabeleska'], 1, 1000)) {
        $errors['zabeleska'] = 'A body of no more than 1000 characters is required.';
    }

    if (! Validator::emptyPost('ucenikIme') ){
        $errors['ucenikIme'] = 'Полето е задолжително.';
    }
    
    if (! Validator::emptyPost('ucenikPrezime') ){
        $errors['ucenikPrezime'] = 'Полето е задолжително.';
    }




    if (empty($errors)) {
        $db->query('INSERT INTO ucenici(ucenikIme, ucenikPrezime, ucenikEmail, odd_id, klasen, stat, zabeleska) VALUES(:ucenikIme, :ucenikPrezime, :ucenikEmail, :odd_id, :klasen, :stat, :zabeleska)', [
            'ucenikIme' => $_POST['ucenikIme'],
            'ucenikPrezime' => $_POST['ucenikPrezime'],
            'ucenikEmail' => $_POST['ucenikEmail'],
            'odd_id' => $_POST['odd_id'],
            'klasen' => $_POST['klasen'],
            'stat' => $_POST['stat'],
            'zabeleska' => $_POST['zabeleska']
        ]);
            $message['success'] = 'Успешно внесен ученик со име ' .$_POST['ucenikIme'];
    }
}

require 'views/korisnik-nov.view.php';