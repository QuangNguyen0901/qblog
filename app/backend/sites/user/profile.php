<?php

$url_common = $_SERVER['DOCUMENT_ROOT'];
require_once($url_common . '/libs/class.upload.php');
require_once($url_common . '/libs/Database.class.php');
require_once($url_common . '/libs/bootstrap.php');
session_start();
//echo 'backend profile';
//print_r($_SESSION);
//print_r($_SESSION['flash']);
//echo '<br>';
//var_dump($_FILES);
//echo '<br>';
//echo '<br>';
$_SESSION['flash'] = Null;

if (!empty($_POST)) {
//    var_dump($_FILES);
//    var_dump($_POST);
    $flash = [
        'type' => 'success',
        'msg' => ''
    ];

    $folder_to_upload = '/data/img/avatar';
    $maxSize = 300000; //3mb
    $allowType = array('jpeg', 'jpg', 'bmp', 'png');
    $full_name = '';
    $email = '';
//    $role = '';
    $img = '';
    $file = $_FILES['fileToUpload'];
    $success = true;

    $full_name = $_POST['full_name'];
    $email = $_POST['email'];

//    print_r($_FILES);
    if ($file['name'] == '') {
        $img = $_SESSION['user']['image'];
    } else {
        $handle_upload = new upload($file);
        if ($handle_upload->uploaded) {
//            var_dump($_FILES);
            unlink($url_common . '/data/img/avatar/' . $_SESSION['user']['image']);  //xoa file avatar cu
            $handle_upload->file_new_name_body = 'avatarId' . $_SESSION['user']['id'];
            $handle_upload->process($url_common . '/data/img/avatar/');
            $img = $handle_upload->file_dst_name;
//            if ($handle->processed) {
//                echo 'image resized';
//                $handle->clean();
//            } else {
//                echo 'error : ' . $handle->error;
//                echo '111';die;
//            }
        } else {
            echo 'error : ' . $handle->error;
            die;
        }
//        $upload_result = uploadFile($file, $folder_to_upload, $allowType, $maxSize);
//        if (count($upload_result["error"]) > 0) {
//            $success = false;
//            foreach ($upload_result['error'] as $err) {
//                $flash['msg'] .= $err['msg'] . ".";
//            }
//        } else {
//            $img = $upload_result['path'];
//            if ($_SESSION['user']['image'] != '') unlink($_SESSION['user']['(image']);
//        }
    }

    if ($success) {
        $flash['msg'] = 'Successfully updated profile';
        $_SESSION['flash'] = $flash;
        $id = $_SESSION['user']['id'];

        $db = new Database();

//        $sql = "UPDATE member SET full_name= :full_name,role= :role, email = :email,image=:image WHERE id=:id";
        $sql = "UPDATE member SET full_name= :full_name,email = :email,image=:image WHERE id=:id";
        $db->query($sql);
        $db->bind([
            ':full_name' => $full_name,
//            ':role' => $role,
            ':email' => $email,
            ':image' => $img,
            ':id' => $id
        ]);
        $db->execute();

        $sql = "SELECT * FROM member WHERE id=:id";
        $db->query($sql);
        $db->bind([
            ':id' => $id
        ]);
        $_SESSION['user'] = $db->findOne();

        header('Location:http://' . HOST . '/admin/?m=user&a=profile');
        exit;
    } else {
        $flash['type'] = 'error';
        $_SESSION['flash'] = $flash;
        header('Location:http://' . HOST . '/admin/?m=user&a=profile');
        exit;
    }
} else {
    //show view
    $main_content = $url_common . '/app/backend/views/user/profile.php';
    $content_header = array(
        'module' => 'User',
        'action' => 'Profile'
    );

//    echo $main_content;
    include($url_common . '/app/backend/views/layout.php');
}
