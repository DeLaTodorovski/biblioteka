<?php

$filepath = realpath(dirname(__FILE__));
$filepath = str_replace('controllers', '', $filepath);

require_once($filepath . "/Database.php");
$config = require($filepath . '/config.php');
$db = new Database($config['database']);


$baraj = $_GET['baraj'];
$zbor = $_GET['zbor'];

$notes = $db->query('select * from ucenici WHERE ucenikIme LIKE :ime OR ucenikPrezime LIKE :prezime OR id = :id', [
    'ime' => "%" . $zbor . "%",
    'prezime' => "%" . $zbor . "%",
    'id' => $zbor
])->get();

$brojbaranje = $db->query('select * from ucenici WHERE ucenikIme LIKE :ime OR ucenikPrezime LIKE :prezime OR id = :id', [
    'ime' => "%" . $zbor . "%",
    'prezime' => "%" . $zbor . "%",
    'id' => $zbor
])->rowCount();


if($brojbaranje > 0){
    foreach($notes as $rezult){

            echo "<tr><td><input type='radio' name='$baraj' id='$baraj' value='".$rezult['id']."'> ID ".$rezult['id'].". ".$rezult[$baraj]."</td></tr>";
    }
}else{
    echo "Не постои таа книга";
}

