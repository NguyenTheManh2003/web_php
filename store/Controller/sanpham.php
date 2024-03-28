<?php
$act = "product";

if (isset($_GET['act'])) {
    $act = $_GET['act'];
}

switch ($act) {
    case 'product':
        include_once './View/product.php';
        break;
    case 'cate1':  
    case 'product2':
    case 'product3':
    case 'product4':
    case 'product5':
        case 'product6':
        include_once './View/product.php';
        break;


    
    // case 'productinfor':
    //     include_once './View/productinfor.php';
    //     break;
}



?>