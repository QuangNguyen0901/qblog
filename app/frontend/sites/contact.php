<?php
require_once($_SERVER['DOCUMENT_ROOT']. '/libs/bootstrap.php');
$background_image ='/assets/img/contact-bg.jpg';
$main_content = $root.'/app/frontend/views/contact.php';
include ($root.'/app/frontend/views/layout.php');

$sender_email = $_POST['name'];
echo $sender_email;



include ($root.'/libs/send_mail.php');
?>