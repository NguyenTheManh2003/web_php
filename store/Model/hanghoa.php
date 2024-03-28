<?php
class hanghoa
{
 
    //  get hnag hoa all
    function getHangHoaAll()
    {
        $db = new connect();
        $select = "SELECT * FROM product";
        $result = $db->getList($select);
        return $result;
    }

    
    function getHanHoaNew()
    {
        $db = new connect();
        $select = "SELECT * FROM Product ORDER BY created_at DESC";
        $result = $db->getList($select);
        return $result;
    }
     

    // lấy sản phẩm có rating trên 4 sao
    function getHangEvaluate()
    {
        $db = new connect();
        $select = "SELECT * FROM product WHERE Evaluate > 4";
        $result = $db->getList($select);
        return $result;
    }
    //
    function getHangHoaAllPage($start, $limit)
    {
        // ket noi data base
        $db = new Connect();
        // truy van du lieu tu data
        $select = "SELECT  `id`,`title`,`price`,`discount`,`thumbnail`,`description`,`category_id`
        FROM `product` WHERE `category_id`  ORDER BY `id` DESC LIMIT " . $start . "," . $limit;
        $resultGetDataProductAll = $db->getList($select);
        return $resultGetDataProductAll;
    }

    // phân trang theo dât
    function getHangHoaCATE1($start, $limit)
    {
        // ket noi data base
        $db = new Connect();
        // truy van du lieu tu data
        $select = "SELECT * FROM Product WHERE category_id = 1  ORDER BY `id` DESC LIMIT " . $start . "," . $limit;
        $resultGetDataProductAll = $db->getList($select);
        return $resultGetDataProductAll;
    }
    function getHangHoaCATE2($start, $limit)
    {
        // ket noi data base
        $db = new Connect();
        // truy van du lieu tu data
        $select = "SELECT * FROM Product WHERE category_id = 2  ORDER BY `id` DESC LIMIT " . $start . "," . $limit;
        $resultGetDataProductAll = $db->getList($select);
        return $resultGetDataProductAll;
    }
    function getHangHoaCATE3($start, $limit)
    {
        // ket noi data base
        $db = new Connect();
        // truy van du lieu tu data
        $select = "SELECT  `id`,`title`,`price`,`discount`,`thumbnail`,`description`,`category_id`
        FROM `product` WHERE `category_id` = 3  ORDER BY `id` DESC LIMIT " . $start . "," . $limit;
        $resultGetDataProductAll = $db->getList($select);
        return $resultGetDataProductAll;
    }
    function getHangHoaCATE4($start, $limit)
    {
        // ket noi data base
        $db = new Connect();
        // truy van du lieu tu data
        $select = "SELECT * FROM Product WHERE category_id = 4 ORDER BY `id` DESC LIMIT " . $start . "," . $limit;
        $resultGetDataProductAll = $db->getList($select);
        return $resultGetDataProductAll;
    }


    // đếm số sản phẩm trong data
    function getHangHoacountproductCAT1()
    {
        // ket noi data base
        $db = new Connect();
        // truy van du lieu tu data
        $select = "SELECT  `id`,`title`,`price`,`discount`,`thumbnail`,`description`,`category_id`
        FROM `product` WHERE `category_id` = 1";
        $resultGetDataProductAll = $db->getList($select);
        return $resultGetDataProductAll;
    }
    function getHangHoacountproductCAT2()
    {
        // ket noi data base
        $db = new Connect();
        // truy van du lieu tu data
        $select = "SELECT * FROM Product WHERE category_id = 2";
        $resultGetDataProductAll = $db->getList($select);
        return $resultGetDataProductAll;
    }
    function getHangHoacountproductCAT3()
    {
        // ket noi data base
        $db = new Connect();
        // truy van du lieu tu data
        $select = "SELECT * FROM Product WHERE category_id = 3";
        $resultGetDataProductAll = $db->getList($select);
        return $resultGetDataProductAll;
    }
    function getHangHoacountproductCAT4()
    {
        // ket noi data base
        $db = new Connect();
        // truy van du lieu tu data
        $select = "SELECT * FROM Product WHERE category_id = 4";
        $resultGetDataProductAll = $db->getList($select);
        return $resultGetDataProductAll;
    }


    // lấy thông tin của 1 sp qua id
    function getHangHoaId($id)
    {
        $db = new connect();
        $select = "SELECT  * FROM product WHERE id = $id";
        $result = $db->getInstance($select); // trả về một row 
        return $result;
    }

    function getCate()
    {
        $db = new connect();
        $select = 'SELECT * FROM `category`';
        $result = $db->getList($select); // trả về một row 
        return $result;
    }

    function getSizeid($id)
    {
        $db = new connect();
        $select = "SELECT b.size FROM `chitiethanghoa` a JOIN `size` b ON a.size_id = b.id WHERE a.product_id = $id";
        $result = $db->getList($select);
        return $result;
    }
    

    function getColorid($id)
    {
        $db = new connect();
        $select = "SELECT DISTINCT b.color FROM `chitiethanghoa` a JOIN `color` b ON a.color_id = b.id WHERE a.product_id = $id";
        $result = $db->getList($select);
        return $result;
    }

    
}
