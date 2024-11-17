<?php
require 'Validator.php';

$config = require('config.php');
$db = new Database($config['database']);

$heading = 'Книга';
$currentUserId = 1;

$note = $db->query('select * from knigi where id = :id', [
    'id' => $_GET['id']
])->findOrFail();

//authorize($note['user_id'] === $currentUserId);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];

    if (! Validator::string($_POST['imeKniga'], 1, 225)) {
        $errors['imeKniga'] = 'A body of no more than 225 characters is required.';
    }
    if (! Validator::string($_POST['objasnuvanje'], 1, 1000)) {
        $errors['objasnuvanje'] = 'A body of no more than 1000 characters is required.';
    }

    if (! Validator::emptyPost('imeKniga') ){
        $errors['imeKniga'] = 'Полето е задолжително.';    
    }
    
    if (! Validator::emptyPost('objasnuvanje') ){
        $errors['objasnuvanje'] = 'Полето е задолжително.';
    }
    if (! Validator::emptyPost('avtori') ){
        $errors['avtori'] = 'Полето е задолжително.';
    }
    if (! Validator::emptyPost('tiraz') ){
        $errors['tiraz'] = 'Полето е задолжително.';
    }
    if (! Validator::emptyPost('izdavac') ){
        $errors['izdavac'] = 'Полето е задолжително.';
    }
    if (! Validator::emptyPost('godina') ){
        $errors['godina'] = 'Полето е задолжително.';
    }



    if(isset($_FILES["slika"]) && !empty($_FILES["slika"]["name"])) {

        require 'fileupload.php';
        echo  $compressedImage;
    
    }else{
    $compressedImage = $note['slika'];
    }
    



    if (empty($errors)) {
        $db->query('UPDATE knigi SET imeKniga = :imeKniga, objasnuvanje = :objasnuvanje, slika = :slika, tiraz = :tiraz, kategorija = :kategorija, avtori = :avtori, izdavac = :izdavac, godina = :godina, oddelenie = :oddelenie, cena = :cena, stat = :stat WHERE id = '.$note['id'].'', [
            'imeKniga' => $_POST['imeKniga'],
            'objasnuvanje' => $_POST['objasnuvanje'],
            'slika' => $compressedImage,
            'tiraz' => $_POST['tiraz'],
            'kategorija' => $_POST['kategorija'],
            'avtori' => $_POST['avtori'],
            'izdavac' => $_POST['izdavac'],
            'godina' => $_POST['godina'],
            'oddelenie' => $_POST['oddelenie'],
            'cena' => $_POST['cena'],
            'stat' => $_POST['stat']
        ]);
    $message['success'] = 'Успешно зачувана книга #' .$note['id'];
    }
}



require "views/kniga.view.php";