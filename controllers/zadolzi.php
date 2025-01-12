<?php

$filepath = realpath (dirname(__FILE__));
$filepath = str_replace('controllers', '', $filepath);

require_once ($filepath."/Database.php");
require ($filepath."/Validator.php");

$config = require($filepath.'/config.php');


$db = new Database($config['database']);

$heading = 'Задолжи';
$currentUserId = 1;


  $note = $db->query('select * from ucenici where id = :id', [
    'id' => $_GET['id']
])->findOrFail();

//$brknigi = $db->query('select * from knigi WHERE id LIKE %'.$_GET["id"].'%')->rowCount();



if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $errors = [];



    if (isset($_POST['imeKniga']) && !empty($_POST['imeKniga'])) {

        $proverka = $db->query('select * from zadolzi where kniga_id = :kniga_id AND stat = 1', [
            'kniga_id' => $_POST['imeKniga']
        ])->rowCount();

        if ($proverka > 0) {
            $errors['imaKniga'] = 'Ученикот ја има задолжено книгата.';
        }

        if (empty($errors)) {
            $db->query('INSERT INTO zadolzi(kniga_id, ucenik_id, stat, zemena, dase_vrati) VALUES(:kniga_id, :ucenik_id, :stat, :zemena, :dase_vrati)', [
                'kniga_id' => $_POST['imeKniga'],
                'ucenik_id' => $_POST['ucenik_id'],
                'stat' => 1,
                'zemena' => date('Y-m-d H:i:s'),
                'dase_vrati' => date($_POST['dase_vrati'] . ' H:i:s')
            ]);
            $message['success'] = 'Успешно задолжен ученик со име ' . $_POST['ucenikIme'] . ' со книга ID:' . $_POST['imeKniga'];
        }else{
            $message['errors'] = $errors;
        }
    }else{
        $errors['greska'] = 'Ве молиме обележете некоја книга.';
    }
}



require "views/zadolzi.view.php";