<?php

$filepath = realpath (dirname(__FILE__));
$filepath = str_replace('controllers', '', $filepath);

require_once ($filepath."/Database.php");
require ($filepath."/Validator.php");

$config = require($filepath.'/config.php');


$db = new Database($config['database']);

$heading = 'Раздолжи';
$currentUserId = 1;


$note = $db->query('select * from ucenici where id = :id', [
    'id' => $_GET['id']
])->findOrFail();

$zadolzi = $db->query('SELECT * FROM zadolzi WHERE ucenik_id = :ucenik_id AND stat = 1', [
    'ucenik_id' => $note['id']
])->get();

$knigi = [];
$j= 0;
foreach ($zadolzi as $zadolzena){
    $knigi_get = $db->query('SELECT * FROM knigi WHERE id = :kniga_id', [
        'kniga_id' => $zadolzena['kniga_id']
    ])->get();
    foreach ($knigi_get as $kniga){
        $knigi[] = $kniga;
    }
$j++;
}

$per_page = 5;


//$brknigi = $db->query('select * from knigi WHERE id LIKE %'.$_GET["id"].'%')->rowCount();



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $errors = [];

//   $proverka = $db->query('select * from zadolzi where ucenik_id = :ucenik_id AND kniga_id = :kniga_id AND stat = 1', [
//     'ucenik_id' => $_POST['ucenik_id'], 
//     'kniga_id' => $_POST['imeKniga']
// ])->rowCount();

//   if ($proverka > 0){
//       $errors['imaKniga'] = 'Ученикот ја има задолжено книгата.';
//   }
    


    if (empty($errors)) {
 
        $db->query('UPDATE zadolzi SET dase_vrati = :dase_vrati, stat = :stat, vratena = :vratena WHERE kniga_id = :kniga_id', [
            'stat' => 0,
            'dase_vrati' => NULL,
            'vratena' => date('Y-m-d H:i:s'),
            'kniga_id' => $_POST['b_id']
        ]);

        $message['success'] = 'Успешно раздолжен ученик ' .$_POST['ucenikIme'].' со книга ID:'. $_POST['b_id'];
        header('Refresh: 1; URL='.$_SERVER['REQUEST_URI'].'&status=success');
    }
}



require "views/razdolzi.view.php";