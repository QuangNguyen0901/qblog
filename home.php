<?php
$sql = "SELECT * FROM post WHERE title!='about' ORDER BY id DESC LIMIT 4";
$db= new Database();

$db->query($sql);
$row = $db->findAll();
//print_r($row);

//echo $root;
//require_once($_SERVER['DOCUMENT_ROOT']. '/libs/bootstrap.php');
$background_image ='/assets/img/home-bg.jpg';
$main_content = $root.'/app/frontend/sites/home.php';
include ($root.'/app/frontend/views/layout.php');

?>