<?php
$act = "login";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'login':
        include_once "./View/account.php";
        break;
    case 'login_action':
        $user = "";
        $pass = "";
        if (isset($_POST['submit'])) {
            $user = $_POST['user'];
            $pass = $_POST['pass'];
            // mã hóa $pass
            $saltF = "G4335#";
            $saltL = "F5658!";
            $passnew = md5($saltF . $pass . $saltL);
            // đem thông tin đi truy vấn nếu có thì đăng nhập thành công
            $kk = new user();
            $logkh = $kk->logKhachhang($user, $passnew);
            // đem thông tin nãy truy vấn nếu có thì đnagư nhập thành công
            // print_r($logkh);
            if ($logkh) {
                // luu gia tri vao trong sesion
                $_SESSION['makh'] = $logkh['id'];
                $_SESSION['tenkh'] = $logkh['fullname'];
                // In giá trị
                // print_r($_SESSION['makh']);
                // print_r($_SESSION['tenkh']);
                
                echo '<script> alert(" đăng nhập thành công")</script>';
                echo '<meta http-equiv="refresh" content="0,url=../store/index.php?action=home"/>';
            } else {
                echo '<script> alert(" đăng nhập thất bại")</script>';
                // print_r($_SESSION['makh']);
                // print_r($_SESSION['tenkh']);
                echo '<meta http-equiv="refresh" content="0,url=../store/index.php?action=login"/>';
            }
        }
        break;

    case 'logon':
        unset($_SESSION['makh']);
        unset($_SESSION['tenkh']);
        echo '<meta http-equiv="refresh" content="0;url=../store/index.php?action=home"/>';
        break;
}

?>