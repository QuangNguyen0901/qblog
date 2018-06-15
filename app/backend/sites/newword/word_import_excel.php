<?php
$url_common = $_SERVER['DOCUMENT_ROOT'];
//Nhúng file PHPExcel
require_once($url_common . '/libs/Classes/PHPExcel.php');
require_once($url_common . '/libs/Database.class.php');
require_once($url_common . '/libs/bootstrap.php');

if (isset($_POST['btnImport'])) {
    $file = $_FILES['file']['tmp_name'];
//    echo $file;die;

}

try {

//Đường dẫn file
//$file = 'import_word .xlsx';
//Tiến hành xác thực file
    $objFile = PHPExcel_IOFactory::identify($file);
    $objData = PHPExcel_IOFactory::createReader($objFile);

//Chỉ đọc dữ liệu
    $objData->setReadDataOnly(true);

// Load dữ liệu sang dạng đối tượng
    $objPHPExcel = $objData->load($file);

//Lấy ra số trang sử dụng phương thức getSheetCount();
// Lấy Ra tên trang sử dụng getSheetNames();

//Chọn trang cần truy xuất
    $sheet = $objPHPExcel->setActiveSheetIndex(0);

//Lấy ra số dòng cuối cùng
    $Totalrow = $sheet->getHighestRow();
//Lấy ra tên cột cuối cùng
    $LastColumn = $sheet->getHighestColumn();

//Chuyển đổi tên cột đó về vị trí thứ, VD: C là 3,D là 4
    $TotalCol = PHPExcel_Cell::columnIndexFromString($LastColumn);

//Tạo mảng chứa dữ liệu
    $data = [];

//Tiến hành lặp qua từng ô dữ liệu
//----Lặp dòng, Vì dòng đầu là tiêu đề cột nên chúng ta sẽ lặp giá trị từ dòng 2
    for ($i = 2; $i <= $Totalrow; $i++) {
        //----Lặp cột
        for ($j = 0; $j < $TotalCol; $j++) {
            // Tiến hành lấy giá trị của từng ô đổ vào mảng
            $data[$i - 2][$j] = $sheet->getCellByColumnAndRow($j, $i)->getValue();;
        }
    }
//Hiển thị mảng dữ liệu
    echo '<pre>';
    $value_data = '';
//var_dump($data[0][2]);
//var_dump($data);die;

    $book_id = $_POST['book_id'];
    $date = date('Y/m/d H:i:s');

    foreach ($data as $key1 => $record) {
        $value_data = $value_data . '(';
        foreach ($record as $key2 => $val) {
            if ($key2 != 0) {
                if ($key2 == 1) {
                    $value_data = $value_data . "'" . $val . "'," . "'" . $book_id . "'";
                } else {
                    $value_data = $value_data . "'" . $val . "'";
                }
                if ($key2 != count($record) - 1) {
                    $value_data = $value_data . ',';
                } else {
                    $value_data = $value_data . ',' . "'" . $date . "'" . ",'" . $date . "'";
                }
            };

        }
        $value_data = $value_data . ')';
        if ($key1 != count($data) - 1) {
            $value_data = $value_data . ',';
        }
    }
//echo $value_data;die;


    $db = new Database();
    $sql = "INSERT INTO newword (`word`,`book_id`,`mean`,`description`,`image`,`updated`,`created`) VALUES " . $value_data;
//echo $sql;die;
    $db->query($sql);
//$db->bind([
//    ':word' => $word,
//    ':book_id' => $_POST['book_id'],
//    ':mean' => $mean,
//    ':description' => $_POST['description'],
//    ':image' => $_POST['image'],
//    ':created' => $date,
//    ':updated' => $date
//]);
    $db->execute();

    header('Location:http://' . HOST . '/admin/?m=newword&a=word_list&book_id=' . $_POST['book_id']);
    exit;
}
catch (Exception $e){
    header('Location:http://' . HOST . '/admin/?m=newword&a=word_list&book_id=' . $_POST['book_id'].'&import_err');
    exit;
}

