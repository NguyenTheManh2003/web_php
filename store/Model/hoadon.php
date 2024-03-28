<?php
class hoadon
{
    function insertHoaDon($makh)
    {
        $db = new connect();
        $date = new DateTime('now');
        $ngay = $date->format('Y-m-d'); // vi data dinh dang la ymd
        $query = "insert into orders(id,mskh,order_date,total) values (Null,$makh,'$ngay',0)";
        $db->exec($query);
        // luc nay da insert duoc hoa don vua mua 
        // cần lấy hóa đơn vừa mua
        $select = "SELECT id FROM orders ORDER BY id DESC LIMIT 1";
        $sohd = $db->getInstance($select);
        return $sohd[0];
    }


    // inser vào bảng cthd
    function insertCTHoaDon($order_id, $product_id, $quantity, $color, $size, $total_amount)
    {
        $db = new connect();
        $query = "insert into order_detail(order_id,product_id,quantity,color,size,total_amount,status) values($order_id,$product_id,$quantity,'$color','$size',$total_amount,0)";

        $db->exec($query);
    }

    function updateHoaDon($id, $mskh, $tongtien)
    {
        $db = new connect();
        $query = "update orders set mskh=$id, total=$mskh where id=$tongtien";
        $db->exec($query);
    }

    // phương thức hiển thị thông tin khách hàng mua hóa đơn
    function getKhachHangHd($mshd)
    {
        $db = new connect();
        $select = "SELECT a.id ,a.order_date,b.fullname,b.email FROM orders a, user b WHERE a.mskh = b.id and a.id = $mshd";
        $result =  $db->getInstance($select);
        return $result;
    }

    // phương thức lấy ra hàng hóa trên hóa đơn
    function gethangHoaHD($masohd)
    {
        $db = new connect();
        $select = "SELECT DISTINCT a.order_id,c.title,a.color,a.size,a.total_amount,a.quantity FROM order_detail a, chitiethanghoa b, product c
        WHERE a.product_id = b.product_id and c.id = b.product_id and a.order_id = $masohd";
        $result =  $db->getList($select);
        return $result;
    }
}
