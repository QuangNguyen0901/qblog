<?php
session_start();
//echo 'backend profile';
//print_r($_SESSION);
$main_content = $root . '/app/backend/views/user/profile.php';
$content_header = array(
    'module' => 'User',
    'action' => 'Profile'
);

echo $main_content;
include($root . '/app/backend/views/layout.php');
