<?php

$url_common = $_SERVER['DOCUMENT_ROOT'];
require_once($url_common . '/libs/Database.class.php');
require_once($url_common . '/libs/bootstrap.php');
session_start();
//if (isset($_SESSION['flash'])) {
//   if (basename($_SERVER['PHP_SELF']) != $_SESSION['flash']) {
//        unset($_SESSION['flash']);
//   }
//}

$db = new Database();
$sql = "SELECT * FROM category";
$db->query($sql);
$row = $db->findAll();

$main_content = $url_common . '/app/backend/views/category/category_list.php';
$content_header = array(
    'module' => 'Category',
    'action' => 'Category List'
);
include($url_common . '/app/backend/views/layout.php');
?>
