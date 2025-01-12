<?php
require 'Validator.php';

$config = require 'config.php';
$db = new Database($config['database']);

$heading = 'Додади ученик';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];

    if (! Validator::string($_POST['ucenikIme'], 1, 20)) {
        $errors['ucenikIme'] = 'Не треба да содржи помалку од 1 и повеќе од 20 карактери.<br>';
    }

    if (! Validator::emptyPost('ucenikIme') ){
        $errors['ucenikIme'] = 'Полето Име е задолжително.<br>';
    }
    
    if (! Validator::emptyPost('ucenikPrezime') ){
        $errors['ucenikPrezime'] = 'Полето Презиме е задолжително.<br>';
    }




    if (empty($errors)) {
        $db->query('INSERT INTO ucenici(bid, ucenikIme, ucenikPrezime, ucenikEmail, odd_id, klasen, stat, zabeleska) VALUES(:bid,:ucenikIme, :ucenikPrezime, :ucenikEmail, :odd_id, :klasen, :stat, :zabeleska)', [
            'bid' => $_POST['bid'],
            'ucenikIme' => $_POST['ucenikIme'],
            'ucenikPrezime' => $_POST['ucenikPrezime'],
            'ucenikEmail' => $_POST['ucenikEmail'],
            'odd_id' => $_POST['odd_id'],
            'klasen' => $_POST['klasen'],
            'stat' => $_POST['stat'],
            'zabeleska' => $_POST['zabeleska']
        ]);
            $message['success'] = 'Успешно внесен ученик со име ' .$_POST['ucenikIme'];
//            header('Refresh: 1; URL='.$_SERVER['REQUEST_URI'].'&status=success');
    }else{
        $message['errors'] = $errors;
    }
}

require 'views/korisnik-nov.view.php';