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

    if (!$_POST['bookname'] || $_POST['bookname'] == '') {
        $flash['type'] = 'alert-danger';
        $flash['msg'] .= 'Please input book name';
        $success = false;
    } else {
        $bookname = $_POST['bookname'];
    }

    if ($success) {
        $flash['msg'] = 'Successfully add new book';
        $_SESSION['flash'] = $flash;
//        print_r($_SESSION);die;

        $date = date('Y/m/d H:i:s');

        $db = new Database();
        $sql = "INSERT INTO book (`bookname`,`member_id`,`updated`,`created`) VALUES (:bookname,:member_id,:updated,:created) ";
        $db->query($sql);
        $db->bind([
            ':bookname' => $bookname,
            ':member_id' => $_SESSION['user']['id'],
            ':created' => $date,
            ':updated' => $date
        ]);
        $db->execute();

        header('Location:http://' . HOST . '/admin/?m=book&a=book_list');
        exit;
    } else {
        $flash['type'] = 'alert-danger';
        $_SESSION['flash'] = $flash;
//        print_r($_SESSION);die;
        header('Location:http://' . HOST . '/admin/?m=book&a=book_list');
        exit;
    }
}