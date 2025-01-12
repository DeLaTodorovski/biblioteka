<?php

$filepath = realpath (dirname(__FILE__));
$filepath = str_replace('controllers', '', $filepath);
require_once ($filepath."/functions.php");
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
        $proverka = $db->query('select * from zadolzi where '.$baraj.' = :kniga_id AND stat = 1', [
            'kniga_id' => $rezult['id']
        ])->rowCount();

        if($proverka > 0) {
            $text = "Земена";
            $color= "red";
        }else{
            $text = "Достапна";
            $color = "green";
        }
            echo "<tr>
                    <td class='p-4 border-b border-slate-200' style='width:150px'><input type='radio' name='$kade' id='$kade' value='".$rezult['id']."'>".$rezult['id'].".  
                    </td>
                    <td class='p-4 border-b border-slate-200' style='width:150px'>".$rezult[$kade]."</td>
                    <td class='p-4 border-b border-slate-200' style='width:150px'>".$rezult['avtori']."</td>
                    <td class='p-4 border-b border-slate-200' style='width:150px'>".kategorijaKniga($rezult['kategorija'])."</td>
                    <td class='p-4 border-b border-slate-200' style='width:150px'>".$rezult['godina']."</td>
                    <td class='p-4 border-b border-slate-200' style='width:150px'>".$rezult['oddelenie']." одд.</td>
                    <td class='p-4 border-b border-slate-200' style='width:150px'>".statusKniga($rezult['stat'])."</td>
                    <td class='p-4 border-b border-slate-200' style='width:150px'><p style='display:inline;color:".$color."'>".$text."</p></td>
                   </tr>";


    }
  }else{
    echo "Не постои таа книга";
  }


