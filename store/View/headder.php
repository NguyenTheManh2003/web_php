<style>
    /* Add some styling to the parent menu item */
    .header_navbar-menu-item {
        position: relative;
        padding: 10px;
        cursor: pointer;
    }

    /* Style for the submenu */
    .header_navbar-submenu {
        display: none;
        position: absolute;
        background: #fff;
        border: 1px solid #ddd;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        padding: 10px;
        z-index: 1;
        /* Ensure the dropdown is on top of other elements */
    }

    /* Style for the user image and name */
    .header_navbar-submenu-item {
        display: flex;
        align-items: center;
    }

    .header_navbar-user-img {
        width: 30px;
        /* Adjust as needed */
        height: 30px;
        border-radius: 50%;
        margin-right: 10px;
    }

    .header_navbar-user-img-name {
        font-weight: bold;
    }

    /* Show the dropdown when the parent menu item is hovered */
    .header_navbar-menu-item:hover .header_navbar-submenu {
        display: block;
    }
</style>
<div class="header">
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <a href="index.php?action=home"> <img src="images/logo.png" width="125px" alt=""></a>
            </div>

            <nav class="nav-header">
                <ul id="MenuItems">
                    <li><a href="index.php?action=home">Home</a></li>
                    <li><a href="index.php?action=product&act=product">Product</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="">Contact</a></li>
                    <li class="header_navbar-menu-item">
                        <a href="index.php?action=account" class="header_navbar-menu-link">Account</a>
                        <ul class="header_navbar-submenu">
                            <li class="header_navbar-submenu-item">
                                <?php
                                if (isset($_SESSION['makh'])) {
                                    echo '  <img src="images/user-1.png" alt="" class="header_navbar-user-img"> <span class="header_navbar-user-img-name">' . $_SESSION['tenkh'] . '</span> ';
                                } else {
                                    echo '<a href="index.php?action=login&act=login">Login</a>';
                                }
                                ?>
                            </li>
                            <!-- <li><a>Register</a></li> -->
                            <li><a href="index.php?action=login&act=logon">Logon</a></li>
                        </ul>
                    </li>

                </ul>
            </nav>

            <?php
            // Kiểm tra nếu session 'cart' tồn tại và không rỗng
            if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                // Đếm số lượng mục trong giỏ hàng
                $cartItemCount = count($_SESSION['cart']);
                // Hiển thị số lượng sản phẩm và tạo link tới trang giỏ hàng
                echo '<a href="index.php?action=giohang"><img src="images/cart.png" width="30px" height="30px" alt="">(' . $cartItemCount . ')</a>';
            } else {
                // Nếu giỏ hàng trống, hiển thị số lượng sản phẩm là 0 và tạo link tới trang giỏ hàng
                echo '<a href="index.php?action=giohang"><img src="images/cart.png" width="30px" height="30px" alt="">(0)</a>';
            }
            ?>

            <img src="./images/menu.png" class="menu-icon" alt="" onclick="menutoggle()">
        </div>
        <!-- end nav -->
    </div>
</div>