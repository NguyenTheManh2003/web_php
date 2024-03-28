<?php
$act = "registration";
if (isset($_GET["act"])) {
    $act = $_GET["act"];
}
switch ($act) {
    case "registration":
        include_once "./View/account.php";
        break;
    case "dangky_action":
        // gửi qua đây những thông tin trên form
        $ten = "";
        $email = "";
        $mk = "";
        $sdt = "";
        if (isset($_POST['submit'])) {
            $ten = $_POST['tenkhachhang'];
            $email = $_POST['email'];
            $mk = $_POST['matkhau'];
            // mã hóa $pass
            $saltF = "G4335#";
            $saltL = "F5658!";
            $passnew = md5($saltF . $mk . $saltL);

            // controllre yêu cầu model insert vào data
            $kh = new user();

            // kiểm tra trùng tên eamil
            $check = $kh->checkKhachHang($ten, $email);

            if ($check) {
                echo '<script> alert("Tên hoặc email đã tồn tại. Vui lòng chọn tên hoặc email khác.")</script>';
                include_once "./View/account.php";
            } else {
                $kq = $kh->insertKhachHang($ten, $passnew, $email);
                if ($kq !== false) {
                    echo '<script> alert("đăng ký thành công")</script>';
                    include_once "./View/home.php";
                } else {
                    echo '<script> alert("đăng ký thất bại !")</script>';
                    include_once "./View/account.php";
                }
            }

        }
        break;
}

?>