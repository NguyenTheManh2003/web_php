<?php
class connect
{
    // thuộc tính
    var $db = null;
    // hàm tạo
    function __construct()
    {
        // database
        $dsn = "mysql:host=localhost;dbname=php_web";
        $user = "root";
        $pass = "";
        // tạo sự kết nối bằng pdo
        $this->db = new PDO($dsn, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        // try {
        //     $this->db = new PDO($dsn, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        //     echo "kết nối thành công";
        // } catch (\Throwable $th) {
        //     echo "kết nối thất bại";
        //     echo $th;
        // }
    }

    // phương thức lấy về nhiều dl nhiều row table
    function getList($select)
    {
        // nơi chứa
        $result = $this->db->query($select);
        return $result;
        /**trả về 1 table  */
    }
    //  phương thức lấy về chỉ 1 row
    function getInstance($select)
    {
        // nơi chứa
        $results = $this->db->query($select);
        // trả về 1 dòng thì fetch luôn để lấy kq
        $result = $results->fetch();
        return $result;
    }
    // truy vấn bằng insert, update, delete =>exe
    function exec($query)
    {
        $results = $this->db->exec($query);
        return $results;
    }
    // prepare
    function execP($query)
    {
        $stantement = $this->db->prepare($query);
        return $stantement;
    }
}
