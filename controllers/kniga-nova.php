<?php
require 'Validator.php';

$config = require 'config.php';
$db = new Database($config['database']);

$heading = 'Додади книга';

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

    if ($compressedImage === ''){
        $compressedImage = "views/resourses/images/default-image_0.jpeg";
    }

}else{
    $compressedImage = "views/resourses/images/default-image_0.jpeg";
}



    if (empty($errors)) {
        $db->query('INSERT INTO knigi(imeKniga, objasnuvanje, slika, tiraz, kategorija, avtori, izdavac, godina, oddelenie, cena, stat) VALUES(:imeKniga, :objasnuvanje, :slika, :tiraz, :kategorija, :avtori, :izdavac, :godina, :oddelenie, :cena, :stat)', [
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
            $message['success'] = 'Успешно внесена книга со наслов' .$_POST['imeKniga'];
    }
}

require 'views/kniga-nova.view.php';