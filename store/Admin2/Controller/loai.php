<?php
    $act="loai";
    if(isset($_GET['act']))
    {
        $act=$_GET['act'];
    }
    switch ($act) {
        case 'loai':
            include_once "./View/import_category.php";
            break;
        case 'loai_action':
            if($_SERVER['REQUEST_METHOD']=="POST")
            {
                //b1: lấy về, từ Server $_FILE
                $file=$_FILES['file']['tmp_name'];
                // b2: thay thế những ký tự đặc biệt xEF,xBB,xBF
                file_put_contents($file,str_replace("\xEF\xBB\xBF","",file_get_contents($file)));
                //b3: mở file ra
                $file_open=fopen($file,"r");
                //b4: đọc nội dung của file
                while(($csv=fgetcsv($file_open,1000,","))!==false)
                {
                    $maloai=$csv[0];//null
                    $tenloai=$csv[1];//Mắt kính trẻ em
                    $db=new connect();
                    $query="insert into category(id,name) values ($maloai,'$tenloai')";
                    $db->exec($query);
                }
                echo '<script> alert("Import thành công")</script>';
                echo '<meta http-equiv=refresh content="0;url=./index.php?action=loai"/>';
            }
            break;
        
    }
    
 
?>