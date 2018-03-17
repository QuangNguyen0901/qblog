<?php
session_start();
echo 'backend HOME';
print_r($_SESSION);
$main_content = $root.'/app/backend/views/main_content.php';

echo $main_content;
include ('views/layout.php');
