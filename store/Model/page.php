<?php
    class page {
        // phương thức tính số tranng
        function findPage($count,$limit) {
            $page = (($count%$limit) ==0?($count/$limit):ceil($count/$limit));
            return $page;
        }

        // phương thức tính start dựa vào đường đãn trên url, tên biến trên url page
        function findStart($limit) {
            if(!isset($_GET['page']) || $_GET['page']==1) {
                $start = 0;
            }
            else {
                $start = ($_GET['page'] - 1)*$limit;
            }
            return $start;
        }
    }

?>