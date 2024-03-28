<?php
// view cần thông tin của hóa đơn cthh mới hiển thị lên 
if (isset($_SESSION['makh'])) {
    $makh = $_SESSION['makh'];
    // Check if $_SESSION['cart'] is set and is an array
    if (isset($_SESSION['cart'])) {
        $hd = new hoadon();
        $sohd = $hd->insertHoaDon($makh);
        $_SESSION['masohd'] = $sohd;
        $total = 0;
        
        foreach ($_SESSION['cart'] as $key => $item) {
            // yêu cầu insert cthd
            $hd->insertCTHoaDon($sohd, $item['mahh'], $item['soluong'], $item['mau'], $item['size'], $item['total']);

            $total += $item['total'];
            // Cập nhật lại cthh về số lượng tồn
        }
        // sau khi insert vào bảng cthd thì cập nhật lại tổng tiền cho bảng hóa đơn
        $hd->updateHoaDon($sohd, $makh, $total);
    } else {
        echo "Cart is not set or is not an array.";
    }
}
include_once('./View/thanhtoan.php');
unset($_SESSION['cart']);
?>
