<?php

$url_common = $_SERVER['DOCUMENT_ROOT'];
require_once($url_common . '/libs/Database.class.php');
require_once($url_common . '/libs/bootstrap.php');
session_start();
$_SESSION['flash'] = Null;

//print_r($_GET);

$id = $_GET['id'];

$db = new Database();
$sql = "DELETE FROM category WHERE id = :id";
$db->query($sql);
$db->bind([
    ':id' => $id
]);
if ($db->execute()) {
    $flash = [
        'type' => 'alert-success',
        'msg' => 'Successfully delete a category'
    ];
    $_SESSION['flash'] = $flash;
    header('Location:http://' . HOST . '/admin/?m=category&a=category_list');
    exit;
}





