<?php
//echo "list all post";

//?m-post&a=list&page=3
//?m-post&a=list

$page = (isset($_GET['page']) ? $_GET['page'] : 1);
$limit = 3;
$offset = ($page - 1)*$limit;
$db= new Database();

$sql = "SELECT * FROM post WHERE title !='about' AND published =1 ORDER BY id DESC LIMIT $limit OFFSET $offset";
$db->query($sql);

$row = $db->findAll();
//print_r($row);

$sql = "SELECT COUNT(*) FROM post WHERE title !='about' AND published = 1";
$db->query($sql);
$totalItems = $db->findOne()['COUNT(*)'];
$totalPages = ceil($totalItems/$limit);

$background_image ='/assets/img/home-bg.jpg';
$main_content = $root.'/app/frontend/views/post/list.php';
include ($root.'/app/frontend/views/layout.php');