<?php

//phpinfo();
$config = require('config.php');
$db = new Database($config['database']);
$converter = new Encryption;

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

$passSha =  md5('mirjance@123');
echo $passSha;

<<<<<<< HEAD
$pass = 'mirjance@123';



$encoded = $converter->encode($pass, $passSha);
$decoded = $converter->decode($encoded, $passSha);    

echo "<p>$encoded<p>$decoded";

require "views/knigi.view.php";
=======
require "views/knigi.view.php";  
>>>>>>> e28b6eda08b2a3925019d41e7db14efec29714e7
