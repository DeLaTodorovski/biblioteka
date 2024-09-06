<?php

require 'functions.php';
require 'Database.php';
require 'Response.php';
require 'router.php';
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$uri = str_replace('/biblioteka', '', $uri);
//dd($uri);
