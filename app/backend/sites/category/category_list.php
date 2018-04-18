<?php

$url_common = $_SERVER['DOCUMENT_ROOT'];
require_once($url_common . '/libs/Database.class.php');
require_once($url_common . '/libs/bootstrap.php');
session_start();
$_SESSION['flash'] = Null;



$main_content = $url_common . '/app/backend/views/category/category_list.php';
$content_header = array(
    'module' => 'Category',
    'action' => 'Category List'
);
include($url_common . '/app/backend/views/layout.php');
?>
