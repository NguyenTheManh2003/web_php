<?php
class giohang
{
    // add sp vào gio hang
    function addToCart($mahh, $soluong, $mau, $size)
    {
        $sp = new hanghoa();
        $idsp = $sp->getHangHoaId($mahh);
        $hinh = $idsp['thumbnail'];
        $gia = $idsp['discount'];
        $mota = $idsp['description'];
        $ten = $idsp['title'];
        $tong = (intval($soluong) * floatval($gia));

        $item = array(
            'mahh' => $mahh,
            'hinh' => $hinh,
            'ten' => $ten,
            'gia' => $gia,
            'soluong' => $soluong,
            'size' => $size,
            'mau' => $mau,
            'total' => $tong,
        );

        // Tìm vị trí của sản phẩm trong giỏ hàng (nếu đã tồn tại cùng size)
        $position = $this->findProductPosition($mahh, $size);

        if ($position !== false) {
            // Nếu sản phẩm đã tồn tại trong giỏ hàng cùng size, cập nhật thông tin của sản phẩm đó
            $_SESSION['cart'][$position]['soluong'] += $soluong;
            $_SESSION['cart'][$position]['total'] = $_SESSION['cart'][$position]['soluong'] * $_SESSION['cart'][$position]['gia'];
        } else {
            // Nếu sản phẩm chưa tồn tại trong giỏ hàng cùng size, thêm vào giỏ hàng
            $_SESSION['cart'][] = $item;
        }
    }

    

    // Phương thức tìm vị trí của sản phẩm trong giỏ hàng dựa trên mã hàng và size
    private function findProductPosition($mahh, $size)
    {
        $position = false;

        // Lặp qua các sản phẩm trong giỏ hàng để tìm vị trí của sản phẩm cùng mã hàng và size
        foreach ($_SESSION['cart'] as $key => $item) {
            if ($item['mahh'] == $mahh && $item['size'] == $size) {
                $position = $key;
                break; // Thoát khỏi vòng lặp khi tìm thấy sản phẩm cùng mã hàng và size
            }
        }

        return $position;
    }


    // phuong thuc tinh thanh tien cua gio hang
    function sub_Total()
    {
        $subtotal = 0;
        foreach ($_SESSION['cart'] as $item) {
            $subtotal += $item['total'];
        }
        $subtotal = number_format($subtotal, 2);
        return $subtotal;
    }
    // 
    function calculateItemTotal($mahh)
    {
        $total = 0;

        // Lặp qua các sản phẩm trong giỏ hàng để tìm sản phẩm có mã hàng hóa tương ứng
        foreach ($_SESSION['cart'] as $item) {
            if ($item['mahh'] == $mahh) {
                $total = $item['soluong'] * $item['gia'];
                return number_format($total, 2);
            }
        }

        return number_format($total, 2); // Trả về 0 nếu không tìm thấy sản phẩm
    }
}
