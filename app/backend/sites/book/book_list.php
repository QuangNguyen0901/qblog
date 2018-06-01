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

$db = new Database();
$sql = "SELECT book.id,book.bookname,book.tag,member.user_name FROM book INNER JOIN member ON book.member_id = member.id";
$db->query($sql);
$row = $db->findAll();

$main_content = $url_common . '/app/backend/views/book/book_list.php';
$content_header = array(
    'module' => 'Book',
    'action' => 'Book List'
);
include($url_common . '/app/backend/views/layout.php');
?>
