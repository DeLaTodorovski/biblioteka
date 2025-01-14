<?php

$filepath = realpath (dirname(__FILE__));
$filepath = str_replace('controllers', '', $filepath);

require_once ($filepath."/Database.php");
$config = require($filepath.'/config.php');
$db = new Database($config['database']);



    $baraj = $_GET['baraj'];
    $tabla = $_GET['tabla'];
    $kade = $_GET['kade'];
    $zbor = $_GET['zbor'];

$baranje = $db->query('select * from '.$tabla.' WHERE '.$kade.' LIKE :zbor OR id = :id ', [
  'zbor' => "%" .$zbor. "%",
  'id' => $zbor
])->get();

$brojbaranje = $db->query('select * from '.$tabla.' WHERE '.$kade.' LIKE :zbor OR id = :id ', [
    'zbor' => "%" .$zbor. "%",
    'id' => $zbor
  ])->rowCount();



  if($brojbaranje > 0){
    foreach($baranje as $rezult){
        $proverka = $db->query('select * from zadolzi where kniga_id = :kniga_id AND stat = 1', [
            'kniga_id' => $rezult['id']
        ])->rowCount();
        
        if($proverka > 0){
            echo "<tr><td><input type='radio' name='$baraj' id='$baraj' value='".$rezult['id']."'> ID ".$rezult['id'].". ".$rezult[$baraj]." <p style='display:inline;color:red'>Земена</p></td></tr>";
        }else{
            echo "<tr><td><input type='radio' name='$baraj' id='$baraj' value='".$rezult['id']."'> ID ".$rezult['id'].". ".$rezult[$baraj]."</td></tr>";
        }
    }
  }else{
    echo "Не постои таа книга";
  }


