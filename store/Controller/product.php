<?php
include_once './View/product.php';

if (isset($_GET['action']) && $_GET['action'] == 'product') {
    // Check if 'act' is set in the URL
    if (isset($_GET['act'])) {
        // Switch based on the value of 'act'
        switch ($_GET['act']) {
            case 'product1':
                $sp = 1;
                // $count = $product->getHangHoacountproductCAT1()->rowCount();

                break;
            case 'product2':
                $sp = 2;
                $cate = 2;
                // $count = $product->getHangHoacountproductCAT2()->rowCount();
                break;
            case 'product3':
                $sp = 3;
                $cate = 3;
                // $count = $product->getHangHoacountproductCAT3()->rowCount();
                break;
            case 'product4':
                $sp = 4;
                $cate = 4;
                // $count = $product->getHangHoacountproductCAT4()->rowCount();
                break;
            case 'product': // If 'act' is 'product', set default values
                $sp = 0;
                // $count = $product->getHangHoaALL()->rowCount();
                break;
        }
    }
}
?>

