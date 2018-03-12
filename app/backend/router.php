<?php
//echo 'router backend';
if (!session_id()) session_start();

$user = $_SESSION['user'];
//
//

$a = $_GET['a'];
$m = $_GET['m'];

if (!$user || $user['role']!=1){
    //redirect toi trang login
    $m='user';
//    $a='login';
    $a='test';
//}

if ($m) {
    if ($a) {
        $act = 'app/backend/sites/' . $m . '/' . $a . '.php';
        if (file_exists($act)) {
            include($act);
        } else {
            header("Location:http://" . $_SERVER['HTTP_HOST'] . "/admin/?a=404");
        }
    }
}else{
        if ($a){
            $act = 'app/backend/sites/' . $a . '.php';
            if (file_exists($act)){
                include ($act);
            }else{
                header("Location:http://". $_SERVER['HTTP_HOST'] . "/admin/?a=404");
            }
        }else{
            include ('home.php');
        }
    }
}

