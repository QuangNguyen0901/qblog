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
echo "index root";
echo "<br>";

require_once(__DIR__ . '/libs/bootstrap.php');
//echo 'HTTP_ HOST : '. $_SERVER['HTTP_HOST'];
//echo "<br>";
//echo 'REQUEST _URI : '. $_SERVER['REQUEST_URI'];

$admin_pattern = '/^(\/admin)(\/)((.))*/';

//echo $_SERVER['REQUEST_URI'];
//echo "<br>";
//$cwd = getcwd();
//echo $cwd;
//echo "<br>";
//echo $_SERVER['HTTP_HOST'] . '/app/backend/index.php';
//echo "<br>";

//$url_common = $_SERVER['DOCUMENT_ROOT'];
//echo $url_common;
//echo "<br>";

preg_match($admin_pattern, $_SERVER['REQUEST_URI'], $matches1);
print_r($matches1);
echo "<br>";


//preg_match('/(foo)(bar)(baz)/', 'foobarbaz', $matches, PREG_OFFSET_CAPTURE);
//print_r($matches);

if (preg_match($admin_pattern, $_SERVER['REQUEST_URI'])) {
    include($root.'/app/backend/index.php');
//    die("123");
} else {
    include_once('router.php');
}
?>

