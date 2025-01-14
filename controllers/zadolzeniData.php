<?php

$filepath = realpath(dirname(__FILE__));
$filepath = str_replace('controllers', '', $filepath);


require_once($filepath . "/Database.php");
$config = require($filepath . '/config.php');
$db = new Database($config['database']);

$heading = 'Информации за книги';

if(isset($_POST["pobaraj"])){

    $time = date("d-m-Y H:i:s");

    if(isset($_POST["pobaraj-exel"])) {
        // Excel
        header("Content-Type: application/vnd.ms-excel; charset=utf-8");
        header("Content-Disposition: attachment; filename=Knigi-site".$time.".xls");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Cache-Control: private", false);
    }

    if(isset($_POST["pobaraj-word"])) {
        // Word
        header("Content-Type: application/vnd.ms-word");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("content-disposition: attachment;filename=Knigi-site-".$time.".doc");
    }

    $order = $_POST["podredi"];
    $sort = 'ASC';

    $zadolzeni= $db->query('select * from zadolzi WHERE stat = 1 ORDER BY '.$order.' '.$sort.'')->get();
    $brzadolzeni = $db->query('select * from zadolzi WHERE stat = 1 ')->rowCount();







    echo "
    <table border='1' id='ReportTable' class='myClass'>
        <thead>
            <tr>";
    if(isset($_POST["id"])){
        echo "<th>Database ID</th>";
    }
    if(isset($_POST["imeKniga"])){
        echo "<th>Наслов</th>";
    }
    if(isset($_POST["objasnuvanje"])){
        echo "<th>Забелешка</th>";
    }
    if(isset($_POST["slika"])){
        echo "<th>Слика</th>";
    }
    if(isset($_POST["tiraz"])){
        echo "<th>Вкупно тираж</th>";
    }
    if(isset($_POST["kategorija"])){
        echo "<th>Категорија</th>";
    }
    if(isset($_POST["avtori"])){
        echo "<th>Автори</th>";
    }
    if(isset($_POST["izdavac"])){
        echo "<th>ИЗдавач</th>";
    }
    if(isset($_POST["godina"])){
        echo "<th>Година</th>";
    }
    if(isset($_POST["oddelenie"])){
        echo "<th>Одделение</th>";
    }
    if(isset($_POST["cena"])){
        echo "<th>Цена</th>";
    }
    if(isset($_POST["stat"])){
        echo "<th>Статус</th>";
    }
    echo "
            </tr>
        </thead>
    <tbody>
    ";
if($brzadolzeni > 0){
    foreach ($zadolzeni as $zadolzeno) {
        $knigi = $db->query('select * from knigi WHERE id = ' . $zadolzeno['kniga_id'] . '')->get();
        $brknigi = $db->query('select * from knigi WHERE id = ' . $zadolzeno['kniga_id'] . '')->rowCount();
        if ($brknigi > 0) {
            foreach ($knigi as $rezult) {
                echo "<tr>";
                if (isset($_POST["id"])) {
                    echo "<td>" . $rezult['id'] . "</td>";
                }
                if (isset($_POST["imeKniga"])) {
                    echo "<td>" . $rezult['imeKniga'] . "</td>";
                }
                if (isset($_POST["objasnuvanje"])) {
                    echo "<td>" . $rezult['objasnuvanje'] . "</td>";
                }
                if (isset($_POST["slika"])) {
                    echo '<td>' . htmlspecialchars($rezult['slika']) . '</td>';
                }
                if (isset($_POST["tiraz"])) {
                    echo "<td>" . $rezult['tiraz'] . "</td>";
                }
                if (isset($_POST["kategorija"])) {
                    echo "<td>" . $rezult['kategorija'] . "</td>";
                }
                if (isset($_POST["avtori"])) {
                    echo "<td>" . $rezult['avtori'] . "</td>";
                }
                if (isset($_POST["izdavac"])) {
                    echo "<td>" . $rezult['izdavac'] . "</td>";
                }
                if (isset($_POST["godina"])) {
                    echo "<td>" . $rezult['godina'] . "</td>";
                }
                if (isset($_POST["oddelenie"])) {
                    echo "<td>";
                    if ($rezult['oddelenie'] === 1) {
                        echo "Прво";
                    } elseif ($rezult['oddelenie'] === 2) {
                        echo "Второ";
                    } elseif ($rezult['oddelenie'] === 3) {
                        echo "Трето";
                    } elseif ($rezult['oddelenie'] === 4) {
                        echo "Четврто";
                    } elseif ($rezult['oddelenie'] === 5) {
                        echo "Петто";
                    } elseif ($rezult['oddelenie'] === 6) {
                        echo "Шесто";
                    } elseif ($rezult['oddelenie'] === 7) {
                        echo "Седмо";
                    } elseif ($rezult['oddelenie'] === 8) {
                        echo "Осмо";
                    } elseif ($rezult['oddelenie'] === 9) {
                        echo "Деветто";
                    } else {
                        echo "нема";
                    }
                    echo "</td>";
                }
                if (isset($_POST["cena"])) {
                    echo "<td>" . $rezult['cena'] . "</td>";
                }
                if (isset($_POST["stat"])) {
                    echo "<td>";
                    if ($rezult['stat'] === 0) {
                        echo "Активен";
                    } elseif ($rezult['stat'] === 1) {
                        echo "Неактивен";
                    } elseif ($rezult['stat'] === 2) {
                        echo "Баниран";
                    } else {
                        echo "нема";
                    }
                    echo "</td>";
                }
                echo "</tr>";
            }
        }
    }
    }else{
        echo "<tr colspan='6'><td>Неma задолжени книги</td></tr>";
    }
    echo "
        </tbody>
    </table>";

    exit;
}

require "views/zadolzeniData.view.php";