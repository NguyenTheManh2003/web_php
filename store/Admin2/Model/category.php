<?php
    class category{
        function getCategory()
        {
            $db=new connect();
            $select="select * from category";
            $result=$db->getList($select);
            return $result;
        }
    }
?>