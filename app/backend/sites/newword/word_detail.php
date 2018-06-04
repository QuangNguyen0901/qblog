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
//$word_id= $_POST['word_id'];
$word_id= 4;

$db = new Database();

$sql = "SELECT * FROM newword WHERE id=$word_id";
$db->query($sql);
$row = $db->findOne();
die (json_encode($row));
?>
