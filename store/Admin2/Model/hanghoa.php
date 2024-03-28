<?php
class hanghoa
{
    function getHangHoa()
    {
        $db = new connect();
        $select = "select * from product";
        $result = $db->getList($select);
        return $result;
    }

    function getHangHoaDetail()
    {
        $db = new connect();
        $select = "select * from chitiethanghoa";
        $result = $db->getList($select);
        return $result;
    }
    function insertProduct($tenhh, $gia, $giamgia, $anh, $mota, $cate)
    {
        $db = new connect();
        $query = "INSERT INTO product (id, title, price, discount, thumbnail, description, category_id)
        VALUES (Null, '$tenhh', $gia, $giamgia, '$anh', '$mota', $cate)";
        $result = $db->exec($query);
        return $result;
    }

    // phường thức lấy thông tin dựa vào id
    function getHangHoaID($id)
    {
        $db = new connect();
        $select = "select * from product where id=$id";
        $result = $db->getInstance($select);
        return $result;
    }
    // update
    function updatetProduct($id, $tenhh, $gia, $giamgia,  $thumbnail, $mota, $cate)
    {
        $db = new connect();
        $discountValue = isset($giamgia) && !empty($giamgia) ? $giamgia : 0;
        $query = "UPDATE product set title ='$tenhh', price = $gia, discount = $giamgia, thumbnail='$thumbnail', description='$mota', category_id=$cate
        where id =$id";
        $result = $db->exec($query);
        return $result;
    }
    // delete
    function deleteProduct($id)
    {
        $db = new connect();
        $query = "DELETE FROM product WHERE id = $id";
        $result = $db->exec($query);
        return $result;
    }
}
