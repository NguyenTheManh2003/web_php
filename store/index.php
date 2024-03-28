<?php
session_start();
include_once 'Model/class.phpmailer.php';
set_include_path(get_include_path() . PATH_SEPARATOR . "Model");
spl_autoload_extensions('.php');
spl_autoload_register();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;1,100;1,200;1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/style/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/24595262d5.js" crossorigin="anonymous"></script>
    <title>SPORT</title>
</head>


<body>
    <!-- <?php $db = new connect(); ?> -->
    <!-- header  -->
    <?php
    include_once "View/headder.php";
    ?>
    <!-- hiên thi noi dung -->


    <?php
    // session_destroy();
    $ctrl = "home";
    // index điều phối những controller khác qua một biến action
    if (isset($_GET['action'])) {
        $ctrl = $_GET['action'];
    }
    // print_r($ctrl);
    include_once "Controller/$ctrl.php";
    ?>
    <!-- hiên thị footer -->
    <?php
    include_once "View/footer.php";

    ?>
    <script src='assets/script/script.js'></script>
</body>