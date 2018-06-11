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
$word_id= $_POST['word_id'];
$word=$_POST['word'];
$mean=$_POST['mean'];
$description=$_POST['description'];
$image= $_POST['image'];

//echo($word);


$db = new Database();
$sql = "UPDATE newword SET word = :word,mean = :mean,description= :description ,image=:image WHERE id = :word_id";
$db->query($sql);
$db->bind([
    ':word' => $word,
    ':mean' => $mean,
    ':description' => $description,
    ':image' => $image,
    ':word_id' => $word_id
]);

$db->execute();

$sql = "SELECT * FROM newword WHERE id=$word_id";
$db->query($sql);
$row2 = $db->findOne();
die (json_encode($row2));
?>
