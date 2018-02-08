<?php

require ('libs/config.php');
require ('libs/Database.class.php');

$db = new Database();

$sql = "INSERT INTO tes_table(name) VALUE ('abc')";
$db->query($sql);
if($db->execute()){
    echo $db->lastInsertId('abcxyz');
}else{
    echo "Insert fail";
};
