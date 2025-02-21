<?php

$filepath = realpath(dirname(__FILE__));
$filepath = str_replace('controllers', '', $filepath);


require_once($filepath . "/Database.php");
$config = require($filepath . '/config.php');
$db = new Database($config['database']);

$heading = 'Информации за ученици';

if(isset($_POST["pobaraj"])){

    $time = date("d-m-Y H:i:s");

    if(isset($_POST["pobaraj-exel"])) {
        // Excel
        header("Content-Type: application/vnd.ms-excel; charset=utf-8");
        header("Content-Disposition: attachment; filename=Ucenici-".$time.".xls");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Cache-Control: private", false);
    }

    if(isset($_POST["pobaraj-word"])) {
        // Word
        header("Content-Type: application/vnd.ms-word");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("content-disposition: attachment;filename=Ucenici-".$time.".doc");
    }

    $order = $_POST["podredi"];
    $sort = 'ASC';

    $ucenici= $db->query('select * from ucenici WHERE stat = 2 ORDER BY '.$order.' '.$sort.'')->get();
    $brucenici = $db->query('select * from ucenici WHERE stat = 2')->rowCount();


    echo "
    <table border='1' id='ReportTable' class='myClass'>
        <thead>
            <tr>";
    if(isset($_POST["id"])){
        echo "<th>Database ID</th>";
    }
    if(isset($_POST["bid"])){
        echo "<th>Сопствено ID</th>";
    }
    if(isset($_POST["ucenikIme"])){
        echo "<th>Име</th>";
    }
    if(isset($_POST["ucenikPrezime"])){
        echo "<th>Презиме</th>";
    }
    if(isset($_POST["ucenikEmail"])){
        echo "<th>E-mail</th>";
    }
    if(isset($_POST["odd_id"])){
        echo "<th>Одделение</th>";
    }
    if(isset($_POST["klasen"])){
        echo "<th>Класен раководител</th>";
    }
    if(isset($_POST["stat"])){
        echo "<th>Статус</th>";
    }
    if(isset($_POST["zabeleska"])){
        echo "<th>Забелешка</th>";
    }
    echo "
            </tr>
        </thead>
    <tbody>
    ";

    if($brucenici > 0){
        foreach($ucenici as $rezult){
            echo  "<tr>";
            if(isset($_POST["id"])){
                echo "<td>".$rezult['id']."</td>";
            }
            if(isset($_POST["bid"])){
                echo  "<td>".$rezult['bid']."</td>";
            }
            if(isset($_POST["ucenikIme"])){
                echo  "<td>".$rezult['ucenikIme']."</td>";
            }
            if(isset($_POST["ucenikPrezime"])){
                echo  "<td>".$rezult['ucenikPrezime']."</td>";
            }
            if(isset($_POST["ucenikEmail"])){
                echo  "<td>".$rezult['ucenikEmail']."</td>";
            }
            if(isset($_POST["odd_id"])){
                echo  "<td>";
                if ($rezult['odd_id'] === 1) {
                    echo "Прво";
                }elseif ($rezult['odd_id'] === 2) {
                    echo "Второ";
                }elseif ($rezult['odd_id'] === 3) {
                    echo "Трето";
                }elseif ($rezult['odd_id'] === 4) {
                    echo "Четврто";
                }elseif ($rezult['odd_id'] === 5) {
                    echo "Петто";
                }elseif ($rezult['odd_id'] === 6) {
                    echo "Шесто";
                }elseif ($rezult['odd_id'] === 7) {
                    echo "Седмо";
                }elseif ($rezult['odd_id'] === 8) {
                    echo "Осмо";
                }elseif ($rezult['odd_id'] === 9) {
                    echo "Деветто";
                }else{
                    echo "нема";
                }
                echo  "</td>";
            }
            if(isset($_POST["klasen"])){
                echo  "<td>".$rezult['klasen']."</td>";
            }
            if(isset($_POST["stat"])){
                echo  "<td>";
                if ($rezult['stat'] === 0 ){
                    echo "Активен";
                }elseif ($rezult['stat'] === 1) {
                    echo "Неактивен";
                }elseif ($rezult['stat'] === 2) {
                    echo "Баниран";
                }else{
                    echo "нема";
                }
                echo  "</td>";
            }
            if(isset($_POST["zabeleska"])){
                echo  "<td>".$rezult['zabeleska']."</td>";
            }
            echo  "</tr>";
        }
    }else{
        echo "<tr colspan='6'><td>Не постои ученик</td></tr>";
    }
    echo "
        </tbody>
    </table>";

    exit;
}

require "views/usersData.view.php";