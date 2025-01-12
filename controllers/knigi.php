<?php

$config = require('config.php');
$db = new Database($config['database']);

$heading = 'Книги';


if ((isset($_GET['podredi'])) && (isset($_GET['sort']))) {

    $exist = $db->query('show columns from knigi')->get();

    $column_names = [];
    if(!empty($exist)){
        foreach($exist as $column){
            $column_names[] = $column['Field'];
        }
    }
    $order = isset($_GET['podredi']) ? $_GET['podredi'] : 'id';
//    var_dump($column_names);
    if (in_array($order, $column_names)) {
        $orBy = 'ORDER BY';
        $order = isset($_GET['podredi']) ? $_GET['podredi'] : 'id';
        $sort = ((isset($_GET['sort']) ? $_GET['sort'] : 'ASC') == 'ASC') ? 'DESC' : 'ASC';
    }else{
        $orBy = '';
        $order = '';
        $sort = '';
    }

}else{
    $orBy = '';
    $order = '';
    $sort = '';
}

if ((isset($_GET['prikazi'])) && (($prikaz = filter_input(INPUT_GET, 'prikazi', FILTER_VALIDATE_INT)) !== false && $prikaz > 0)) {
    $per_page = $_GET['prikazi'];
}else{
    $per_page = 10;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    if(isset($_POST['baranje']) && !empty($_POST['baranje'])) {

        $notes = $db->query('select * from knigi WHERE imeKniga LIKE :ime OR id = :id '.$orBy.' '.$order.' '.$sort.'', [
            'ime' => "%" . $_POST['baranje'] . "%",
            'id' => $_POST['baranje']
        ])->get();

        $brknigi = $db->query('select * from knigi WHERE imeKniga LIKE :ime OR id = :id '.$orBy.' '.$order.' '.$sort.'', [
            'ime' => "%" . $_POST['baranje'] . "%",
            'id' => $_POST['baranje']
        ])->rowCount();

    }else{
        $notes = $db->query('select * from knigi '.$orBy.' '.$order.' '.$sort.'')->get();
        $brknigi = $db->query('select * from knigi '.$orBy.' '.$order.' '.$sort.'')->rowCount();
    }

    if(isset($_POST['izbrisi'])) {
        $db->query('DELETE FROM knigi WHERE id = :id', [
            'id' => $_POST['pid']
        ]);
        $message['success'] = 'Успешно избришан податок со ID #'.$_POST['pid'] ;
        header('Refresh: 1; URL='.$_SERVER['REQUEST_URI'].'&status=success');
    }

}else{
    $notes = $db->query('select * from knigi '.$orBy.' '.$order.' '.$sort.'')->get();
    $brknigi = $db->query('select * from knigi '.$orBy.' '.$order.' '.$sort.'')->rowCount();
}


require "views/knigi.view.php";  