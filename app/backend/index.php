<?php
$url_common = $_SERVER['DOCUMENT_ROOT'];
require_once ($url_common . '/libs/bootstrap.php');
//////////////////////////////////////////////
//echo "index backend";
//echo '<br>';
//echo $_SERVER['REQUEST_URI'];
//echo '<br>';
//echo preg_match($admin_pattern,$_SERVER['REQUEST_URI']);
//echo '<br>';
$check_admin = preg_match($admin_pattern,$_SERVER['REQUEST_URI']);
//////////////////////////////////////////////

$admin_pattern = "/^(\/admin)(\/)((.))*)*/";

if ($check_admin = 1) {
//    echo 'if preg_match';
//    echo '<br>';
    include($url_common . '/app/backend/router.php');
}else {
    include($url_common . '/app/frontend/index.php');
}
?>


