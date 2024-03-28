<?php
class nhanvien
{
    function getUserAdmin($user, $pass)
    {
        $db = new connect();
        $select = "select username,password from nhanvien where username='$user' and password='$pass'";
        $result = $db->getInstance($select);
        return $result;
    }

    function getUser()
    {
        $db = new connect();
        $select = "select * from user";
        $result = $db->getList($select);
        return $result;
    }

    function getNhanvien()
    {
        $db = new connect();
        $select = "select * from nhanvien";
        $result = $db->getList($select);
        return $result;
    }
}
