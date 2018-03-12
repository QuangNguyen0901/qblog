<?php
require_once($_SERVER['DOCUMENT_ROOT']. '/libs/bootstrap.php');
$background_image ='/assets/img/contact-bg.jpg';
$main_content = $root.'/app/frontend/views/contact.php';
include ($root.'/app/frontend/views/layout.php');

$sender_name    = $_POST['name'];
$sender_email   = $_POST['email'];
$sender_phone   = $_POST['phone'];
$sender_massage = $_POST['massage'];

include ($root.'/libs/send_mail.php');
?>