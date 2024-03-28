<?php
$act = "hanghoa";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'hanghoa':
        include_once "./View/hanghoa.php";
        break;
    case 'hanghoachitiet':
        include_once "./View/listproduct_detail.php";
        break;
    case 'add_hanghoa':
        include_once "./View/addhanghoa.php";
        break;
    case 'insert_action':
        // kiểm tra và nhận thông tin
        if (isset($_POST['submitadd'])) {
            $tenhh = $_POST['title'];
            $anh = $_FILES['img']['name'];
            $gia = $_POST['gia'];
            $giamgia = $_POST['giamgia'];
            $mota = $_POST['mota'];
            $cate = $_POST['cate'];
            // Hiển thị giá trị của các biến qua hàm alert()
            $hh = new hanghoa();
            $check = $hh->insertProduct($tenhh, $gia, $giamgia, $anh, $mota, $cate);
            if ($check !== false) {
                echo '<script> alert("Thêm dữ liệu thành công")</script>';
                echo '<meta http-equiv=refresh content="0;url=../admin2/index.php?action=hanghoa"/>';
            } else {
                echo '<script> alert("Thêm dữ liệu ko thành công")</script>';
            }
        }
        break;
    case 'update_hanghoa':
        include_once "./View/edithanghoa.php";
        break;
    case "update_action":
        // nhận thông tin
        if (isset($_POST['submitedit'])) {
            $id = $_POST['id'];
            $tenhh = $_POST['title'];
            $gia = $_POST['gia'];
            $giamgia = $_POST['giamgia'];
            $mota = $_POST['$mota'];
            $cate = $_POST['cate'];
            $thumbnail = $_FILES['img']['name']; // Get the name of the uploaded file
            // $thumbnail_temp = $_FILES['img']['tmp_name']; // Get the temporary file path on the server
            // Move the uploaded file to its destination
            // link up hinh vo file
            // move_uploaded_file($thumbnail_temp, 'D:\sever\htdocs\php2\store\images' . $thumbnail);
            // dem thông tin update vao database
            $hh = new hanghoa();
            $kt = $hh->updatetProduct($id, $tenhh, $gia, $giamgia, $thumbnail, $mota, $cate);
            if ($kt !== false) {
                echo '<script> alert("Update dữ liệu thành công")</script>';
                echo '<meta http-equiv=refresh content="0;url=../admin2/index.php?action=hanghoa"/>';
            } else {
                echo '<script> alert("Update dữ liệu ko thành công")</script>';
            }
        }
        break;
    case 'delete_hanghoa':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $hh = new hanghoa();
            $result = $hh->deleteProduct($id);
            if ($result !== false) {
                echo '<script>alert("Xóa sản phẩm thành công")</script>';
                echo '<meta http-equiv=refresh content="0;url=../admin2/index.php?action=hanghoa"/>';
            } else {
                echo '<script>alert("Xóa sản phẩm không thành công")</script>';
            }
        } else {
            echo '<script>alert("ID sản phẩm không được cung cấp")</script>';
        }
        break;
    case'bieudo':
        include_once "./View/bieudo.php";
        break;

}
