<?php
//echo "user login aaaa";
//define('HOST','qblog.com');
print_r($_SESSION);
if (!session_id()) session_start();
$_SESSION['user']=NULL;
require_once ($url_common.'/libs/hash.php');
$hash = new Hash();
$flash = [
    'type' =>'',
    'msg' =>''
];

if(!empty($_POST)){
    $user_name = '';
    $pass = '';
    $success = true;

    if (!$_POST['user'] || $_POST['user'] == ''){
        $flash['type'] = 'alert-danger';
        $flash['msg'].='Please input username';
        $success = false;
    }else $user_name = $_POST['user'];

    if (!$_POST['pass'] || $_POST['pass'] == ''){
        $flash['type'] = 'alert-danger';
        if ($flash['msg'] != '') $flash['msg'].='<br>';
        $flash['msg'].='Please input password';
        $success = false;
    }else $pass = $_POST['pass'];
//echo $user_name;

    if($success){
        $db= new Database();
        $flash = NULL;
        unset($_SESSION['flash']);
        $sql= "SELECT salt FROM member WHERE user_name = '$user_name'";
        echo $sql;
        $db->query($sql);
//        $db->bind([
//            ':user_name'=>$user_name
//        ]);
        $salt = $db->findOne()['salt'];
        $pass = $hash->create($pass,$salt);

        $sql = "SELECT * FROM member WHERE user_name = '$user_name' AND password = '$pass'";
        echo $sql;
        $db->query($sql);
//        $db->bind([
//            ':user_name'=>$user_name,
//            ':pass'=>$pass
//        ]);
        $user = $db->findOne();

        if ($db->rowCount() == 1){
            $_SESSION['user'] = $user;
            echo 'login thanh cong';
            header("Location:http://qblog.com/admin/");
//            header("Location:http://qblog.com/admin/?m=user&a=test");

            exit;
        }else {
            $_SESSION['flash']=$flash;
            header("Location:http://qblog.com/admin/?m=user&a=login");
            exit;
        }
    }else{
        $_SESSION['flash']=$flash;
        header("Location: http://qblog.com/admin/?m=user&a=login");
        exit;
    }
}else{
    include($url_common . '/app/backend/views/user/login.php');
}




