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



$page = (isset($_GET['page']) ? $_GET['page'] : 1);
$limit = 10;
$offset = ($page - 1)*$limit;
$db= new Database();

$sql = "SELECT bookname FROM book WHERE id=$book_id";
$db->query($sql);
$book = $db->findOne();

$order = (isset($_GET['sort_by']) ? $_GET['sort_by'] :'id');
$sort_type = (isset($_GET['sort_type']) ? $_GET['sort_type'] :'DESC');

$sql = "SELECT * FROM newword WHERE book_id=$book_id ORDER BY $order ".$sort_type." LIMIT $limit OFFSET $offset";
$db->query($sql);
$row = $db->findAll();

$sql = "SELECT COUNT(*) FROM newword WHERE book_id=$book_id";
$db->query($sql);
$totalItems = $db->findOne()['COUNT(*)'];
$totalPages = ceil($totalItems/$limit);
$currentPage = $_GET['page'];
$link = '?m=newword&a=word_list&book_id='.$book_id.'&page={page}';

$main_content = $url_common . '/app/backend/views/newword/word_list.php';
$content_header = array(
    'module' => 'New Word',
    'action' => 'Words List'
);
include($url_common . '/libs/pager.php');
include($url_common . '/app/backend/views/layout.php');
?>
