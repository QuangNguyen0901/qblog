<?php
$url_common = $_SERVER['DOCUMENT_ROOT'];
require_once ($url_common . '/libs/bootstrap.php');
echo "index backend";

$admin_pattern = "/^(\/admin)(\/)((.))*)*/";

if (preg_match($admin_pattern,$_SERVER['REQUEST_URI'])){
    include($url_common . '/app/backend/router.php');
}else {
    include($url_common . '/app/frontend/index.php');
}
?>

