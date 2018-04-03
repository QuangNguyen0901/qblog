<?php
//session_start();
//echo 'backend profile';
//print_r($_SESSION);

$_SESSION['flash']=Null;

if (!empty($_POST)){
    $flash=[
        'type'=>'success',
        'msg'=>''
    ];

    $folder_to_upload = '/data/img/avatar';
    $maxSize = 300000; //3mb
    $allowType = array('jpeg','jpg','bmp','png');
    $full_name = '';
    $email = '';
    $role='';
    $img='';
    $file = $_FILES['fileToUpload'];

    $success = true;

    if ($file['name'] == ''){

    }

}




//show view
$main_content = $root . '/app/backend/views/user/profile.php';
$content_header = array(
    'module' => 'User',
    'action' => 'Profile'
);

echo $main_content;
include($root . '/app/backend/views/layout.php');


