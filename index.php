<?php
// PHP code for logging error into a given file
error_reporting(E_ALL);
ini_set('display_errors', '1');
require 'functions.php';
require 'Database.php';
require 'Response.php';
require 'router.php';
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$uri = str_replace('/biblioteka', '', $uri);

