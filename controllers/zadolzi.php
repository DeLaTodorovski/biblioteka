<?php

$filepath = realpath (dirname(__FILE__));
$filepath = str_replace('controllers', '', $filepath);

require_once ($filepath."/Database.php");
require ($filepath."/Validator.php");

$config = require($filepath.'/config.php');


$db = new Database($config['database']);

$heading = 'Корисник';
$currentUserId = 1;


  $note = $db->query('select * from ucenici where id = :id', [
    'id' => $_GET['id']
])->findOrFail();

//$brknigi = $db->query('select * from knigi WHERE id LIKE %'.$_GET["id"].'%')->rowCount();



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $errors = [];

  $proverka = $db->query('select * from zadolzi where ucenik_id = :ucenik_id AND kniga_id = :kniga_id AND stat = 1', [
    'ucenik_id' => $_POST['ucenik_id'], 
    'kniga_id' => $_POST['imeKniga']
])->rowCount();

  if ($proverka > 0){
      $errors['imaKniga'] = 'Ученикот ја има задолжено книгата.';
  }
    


    if (empty($errors)) {
      $db->query('INSERT INTO zadolzi(kniga_id, ucenik_id, stat, zemena) VALUES(:kniga_id, :ucenik_id, :stat, :zemena)', [
          'kniga_id' => $_POST['imeKniga'],
          'ucenik_id' => $_POST['ucenik_id'],
          'stat' => 1,
          'zemena' => date('Y-m-d H:i:s')
      ]);
          $message['success'] = 'Успешно задолжен ученик со име ' .$_POST['ucenikIme'].' со книга ID:'. $_POST['imeKniga'];
 
    //     $db->query('UPDATE ucenici SET ucenikIme = :ucenikIme, ucenikPrezime = :ucenikPrezime, ucenikEmail = :ucenikEmail, odd_id = :odd_id, klasen = :klasen, stat = :stat, zabeleska = :zabeleska WHERE id = '.$note['id'].'', [
    //         'ucenikIme' => $_POST['ucenikIme'],
    //         'ucenikPrezime' => $_POST['ucenikPrezime'],
    //         'ucenikEmail' => $_POST['ucenikEmail'],
    //         'odd_id' => $_POST['odd_id'],
    //         'klasen' => $_POST['klasen'],
    //         'stat' => $_POST['stat'],
    //         'zabeleska' => $_POST['zabeleska']
    //     ]);
    // $message['success'] = 'Успешно зачуван корисник #' .$note['id'];
    }
}



require "views/zadolzi.view.php";