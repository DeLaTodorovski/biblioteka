<?php
global $compressedImage;
require 'Validator.php';

$config = require 'config.php';
$db = new Database($config['database']);

$heading = 'Додади книга';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];

    if (! Validator::string($_POST['imeKniga'], 1, 100)) {
        $errors['imeKniga'] = 'Не треба да содржи помалку од 1 и повеќе од 100 карактери.<br>';
    }
    if (! Validator::string($_POST['objasnuvanje'], 1, 1000)) {
        $errors['objasnuvanje'] = 'Не треба да содржи помалку од 1 и повеќе од 1000 карактери.<br>';
    }

    if (! Validator::emptyPost('imeKniga') ){
        $errors['imeKniga'] = 'Полето Наслов е задолжително.<br>';
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
    if (! Validator::emptyPost('kolicina') ){
        $errors['godina'] = 'Полето Количина е задолжително.<br>';
    }
//    if (! Validator::emptyFiles('slika') ){
//        $errors['godina'] = 'Полето Количина е задолжително.<br>';
//    }


if(isset($_FILES["slika"]) && !empty($_FILES["slika"]["name"])) {

    require 'fileupload.php';

    if ($compressedImage == ''){
        $compressedImage = "views/resourses/images/default-image_0.jpeg";
    }

}else{
    echo "<script type='text/javascript'>alert('Доколку немате одберено слика, автоматски ќе се додели стандардната фотографија од сајтот!');</script>";
    $compressedImage = "views/resourses/images/default-image_0.jpeg";
}



    if (empty($errors)) {
        if($_POST['kolicina']  > 1){
            for($i=0; $i <= $_POST['kolicina']; $i++){
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
                    $message['success'] = 'Успешно внесени '.$_POST['kolicina'].' книги со наслов' .$_POST['imeKniga'];
                //            header('Refresh: 1; URL='.$_SERVER['REQUEST_URI'].'&status=success');
            }

        }else{
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
            //            header('Refresh: 1; URL='.$_SERVER['REQUEST_URI'].'&status=success');
        }
    }else{
        $message['errors'] = $errors;
    }
}

require 'views/kniga-nova.view.php';