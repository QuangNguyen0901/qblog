<?php
$a = $_GET['a'];
$m = $_GET['m'];

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
