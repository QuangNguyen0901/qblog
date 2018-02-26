<?php
$id = $_GET['id'];
$sql = "SELECT * FROM post WHERE id = $id";
$db= new Database();

$db->query($sql);
$row = $db->findOne();
//print_r($row);

//echo $root;
//require_once($_SERVER['DOCUMENT_ROOT']. '/libs/bootstrap.php');
$background_image ='/assets/img/home-bg.jpg';
$main_content = $root.'/app/frontend/views/post/view.php';
include ($root.'/app/frontend/views/layout.php');
?>