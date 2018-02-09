<?php

require ('libs/config.php');
require ('libs/Database.class.php');

$db = new Database();

$sql = "INSERT INTO tes_table(name) VALUE ('123')";
$db->query($sql);

//if($db->execute()){
//    echo $db->lastInsertId();
//}else{
//    echo "Insert fail";
//};

$db->execute();
echo $db->lastInsertId();
