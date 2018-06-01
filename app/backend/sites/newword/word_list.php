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

//print_r($_SESSION['user']['id']);
$book_id= $_GET['book_id'];

$db = new Database();

$sql = "SELECT bookname FROM book WHERE id=$book_id";
$db->query($sql);
$bname = $db->findOne();

$sql = "SELECT * FROM newword WHERE book_id=$book_id";
$db->query($sql);
$row = $db->findAll();

$main_content = $url_common . '/app/backend/views/newword/word_list.php';
$content_header = array(
    'module' => 'New Word',
    'action' => 'Words List'
);
include($url_common . '/app/backend/views/layout.php');
?>
