<?php
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array(); // tao gio hang de chua hang, moi mon hang la 2 oj
}

$act = "giohang";

if (isset($_GET['act'])) {
    $act = $_GET['act'];
}

switch ($act) {
    case 'giohang':
        include_once "./View/cart.php";
        break;
    case 'giohang_action':
        // nhận thông tin 1 món hàng
        // mã hàng , số lượng, size, màu
        $id = 0;
        $soluong = 0;
        $mau = "";
        $size = "";
        if (isset($_POST['mahh'])) {
            $id = $_POST['mahh'];
            $mau = $_POST['mau'];
            $size = $_POST['size'];
            $soluong = $_POST['soluong'];
            // đem thông tin add vào giỏ hàng
            $cart = new giohang();
            $cart->addToCart($id, $soluong, $mau, $size);
            // session_destroy();
            echo '<meta http-equiv="refresh" content="0,url=../store/index.php?action=giohang"/>';
        }
        break;
}
