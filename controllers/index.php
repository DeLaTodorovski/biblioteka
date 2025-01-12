<?php
$config = require('config.php');
$db = new Database($config['database']);
$heading = "Home";
$brknigi = $db->query('select * from knigi')->rowCount();
$brucenici = $db->query('select * from ucenici')->rowCount();
$zadolzeni = $db->query('SELECT * FROM zadolzi WHERE stat = 1')->rowCount();
$banirani = $db->query('select * from ucenici WHERE stat = 2')->rowCount();
require "views/index.view.php";

