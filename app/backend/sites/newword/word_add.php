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

    if (!$_POST['word'] || $_POST['word'] == '') {
        $flash['type'] = 'alert-danger';
        $flash['msg'] .= 'Please input word';
        $success = false;
    } else {
        $word = $_POST['word'];
    }

    if (!$_POST['mean'] || $_POST['mean'] == '') {
        $flash['type'] = 'alert-danger';
        $flash['msg'] .= 'Please input mean';
        $success = false;
    } else {
        $mean = $_POST['mean'];
    }


    if ($success) {
        $flash['msg'] = 'Successfully add new word';
        $_SESSION['flash'] = $flash;
//        print_r($_SESSION);die;

        $date = date('Y/m/d H:i:s');

        $db = new Database();
        $sql = "INSERT INTO newword (`word`,`book_id`,`mean`,`description`,`image`,`updated`,`created`) VALUES (:word,:book_id,:mean,:description,:image,:updated,:created) ";
        $db->query($sql);
        $db->bind([
            ':word' => $word,
            ':book_id' => $_POST['book_id'],
            ':mean' => $mean,
            ':description' => $_POST['description'],
            ':image' => $_POST['image'],
            ':created' => $date,
            ':updated' => $date
        ]);
        $db->execute();

        header('Location:http://' . HOST . '/admin/?m=newword&a=word_list&book_id='.$_POST['book_id'] );
        exit;
    } else {
        $flash['type'] = 'alert-danger';
        $_SESSION['flash'] = $flash;
//        print_r($_SESSION);die;
        header('Location:http://' . HOST . '/admin/?m=newword&a=word_list&book_id='.$_POST['book_id']);
        exit;
    }
}