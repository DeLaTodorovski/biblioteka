<?php
global $compressedImage;
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

    if (! Validator::string($_POST['imeKniga'], 1, 100)) {
        $errors['imeKniga'] = 'Не треба да содржи помалку од 1 и повеќе од 100 карактери.<br>';
    }
    if (! Validator::string($_POST['objasnuvanje'], 1, 1000)) {
        $errors['objasnuvanje'] = 'Не треба да содржи помалку од 1 и повеќе од 1000 карактери.<br>';
    }

    if (! Validator::emptyPost('imeKniga') ){
        $errors['imeKniga'] = 'Полето Име е задолжително.<br>';
    }

    if (! Validator::emptyPost('avtori') ){
        $errors['avtori'] = 'Полето Автори е задолжително.<br>';
    }

    if (! Validator::emptyPost('izdavac') ){
        $errors['izdavac'] = 'Полето Издавач е задолжително.<br>';
    }
    if (! Validator::emptyPost('godina') ){
        $errors['godina'] = 'Полето Година е задолжително.<br>';
    }



    if(isset($_FILES["slika"]) && !empty($_FILES["slika"]["name"])) {

        require 'fileupload.php';
        echo  $compressedImage;
    
    }else{
    $compressedImage = $note['slika'];
    }
    



    if (empty($errors)) {
        $db->query('UPDATE knigi SET imeKniga = :imeKniga, objasnuvanje = :objasnuvanje, slika = :slika, tiraz = :tiraz, kategorija = :kategorija, avtori = :avtori, izdavac = :izdavac, godina = :godina, oddelenie = :oddelenie, cena = :cena, stat = :stat WHERE id = :id', [
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
            'stat' => $_POST['stat'],
            'id' => $_POST['id']
        ]);
    $message['success'] = 'Успешно зачувана книга #' .$note['id'];
        header('Refresh: 1; URL='.$_SERVER['REQUEST_URI'].'&status=success');
    }else{
        $message['errors'] = $errors;
    }
}



require "views/kniga.view.php";