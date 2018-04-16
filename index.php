<?php
//--------CheckDB-------------
//require ('libs/config.php');
//require ('libs/Database.class.php');
//$db = new Database();
//$sql = "INSERT INTO tes_table(name) VALUE ('123')";
//$db->query($sql);
//$db->execute();
//echo $db->lastInsertId();
//--------CheckDB-------------
//echo $_SERVER['HTTP_HOST'];
//echo "index root";
//echo "<br>";
require_once(__DIR__ . '/libs/bootstrap.php');
//echo 'HTTP_ HOST : '. $_SERVER['HTTP_HOST'];
//echo "<br>";
//echo 'REQUEST _URI : '. $_SERVER['REQUEST_URI'];

$admin_pattern = '/^(\/admin)(\/)((.))*/';
if (preg_match($admin_pattern, $_SERVER['REQUEST_URI'])) {
    include($root . '/app/backend/index.php');
} else {
    include_once('router.php');
}

?>

