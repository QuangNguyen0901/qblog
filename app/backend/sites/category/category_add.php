<?php

$url_common = $_SERVER['DOCUMENT_ROOT'];
require_once($url_common . '/libs/Database.class.php');
require_once($url_common . '/libs/bootstrap.php');
session_start();
$_SESSION['flash'] = Null;

if (!empty($_POST)) {
    $flash = [
        'type' => 'alert-success',
        'msg' => ''
    ];

    $success = true;

    if (!$_POST['category_title'] || $_POST['category_title'] == '') {
        $flash['type'] = 'alert-danger';
        $flash['msg'] .= 'Please input category name';
        $success = false;
    } else {
        $c_title = $_POST['category_title'];
        $c_alias = $_POST['category_title'];
    }

    if ($success) {
        $flash['msg'] = 'Successfully add new category';
        $_SESSION['flash'] = $flash;
//        print_r($_SESSION);die;

        $db = new Database();
        $sql = "INSERT INTO category (`title`, `alias`) VALUES (:title,:alias) ";
        $db->query($sql);
        $db->bind([
            ':title' => $c_title,
            ':alias' => $c_alias
        ]);
        $db->execute();

        header('Location:http://' . HOST . '/admin/?m=category&a=category_list');
        exit;
    } else {
        $flash['type'] = 'alert-danger';
        $_SESSION['flash'] = $flash;
//        print_r($_SESSION);die;
        header('Location:http://' . HOST . '/admin/?m=category&a=category_list');
        exit;
    }
}