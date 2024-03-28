<?php
class user
{
    // phương thức insert vào data
    function insertKhachHang($username, $password, $email)
    {
        $db = new connect();
        $query = "INSERT INTO user (id, fullname,email,password) VALUES (NULL, '$username', '$email','$password')";
        $result = $db->exec($query);
        return $result;
    }

    // kiểm tra trung tên khách hàng và trùng tên email

    function checkKhachHang($user, $email)
    {
        $db = new connect();
        $select = "SELECT * FROM `user` WHERE fullname = '$user' or email ='$email'";
        $result = $db->getInstance($select);
        return $result;
    }

    // login khach hang
    
    function logKhachhang($user,$pass) {
        $db = new connect();
        $select = "SELECT id, fullname, password, email FROM `user` WHERE fullname = '$user' and password = '$pass'";
        $result = $db->getInstance($select);
        return $result;
    }

    function checkEmail($email) {
        $db = new connect();
        $select = "select * from user where email ='$email'";
        $result = $db->getList($select);
        return $result;
    }
}

?>