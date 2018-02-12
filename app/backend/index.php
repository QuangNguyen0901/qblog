<?php
require_once (__DIR__ . '/libs/bootstrap.php');


$admin_pattern = "/^(\/admin)(\/)((.))*)*/";

if (preg_match($admin_pattern,$_SERVER['REQUEST_URI'])){
    include(getcwd() . '/app/backend/router.php');
}else {
    include(getcwd() . '/app/frontend/index.php');
}
?>

