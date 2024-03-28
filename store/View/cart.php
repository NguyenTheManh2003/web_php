<style>
    p {
        white-space: nowrap;
        /* Ngăn chữ xuống dòng */
        overflow: hidden;
        /* Ẩn phần chữ vượt quá kích thước của phần tử */
        text-overflow: ellipsis;
        /* Hiển thị dấu chấm ba chấm (...) khi chữ vượt quá kích thước */
        max-width: 200px;
        /* Đặt kích thước tối đa cho phần tử */
    }
</style>
<!-- --------------------cart item details---------------- -->
<div class="small-container cart-page">
    <?php
    if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {

    ?>
        <form action='' method="post">
            <table>
                <tr>
                    <th>STT</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>

                <?php
                $j = 0;
                foreach ($_SESSION['cart'] as $key => $item) {
                    $j++;
                    // print_r($item)
                ?>
                    <tr>
                        <td><?php echo $j ?></td>
                        <td>
                            <div class="cart-info">
                                <img src="images/<?php echo $item['hinh'] ?>" alt="">
                                <div class="">
                                    <p style=""><?php echo $item['ten'] ?></p>
                                    <small> <?php echo number_format($item['gia'], 0, ',', '.') ?> VND - </small>
                                    <small>Size:<?php echo $item['size'] ?> - </small>
                                    <small>Màu <?php echo $item['mau'] ?></small><br>
                                    <a href="">Remove</a>
                                </div>
                            </div>
                        </td>
                        <td>
                            <input type="number" value="<?php echo $item['soluong'] ?>">
                        </td>
                        <td>
                            <?php
                            $cart = new giohang();
                            $itemTotal = $cart->calculateItemTotal($item['mahh']);
                            echo $itemTotal;
                            ?>
                        </td>
                    </tr>
                <?php
                }
                ?>

            </table>

            <div class="total-price">
                <table>
                    <tr>
                        <td>Subtotal</td>
                        <td>
                            <?php
                            $cart = new giohang();
                            $tong = $cart->sub_Total();
                            echo $tong;
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Tax</td>
                        <td>$35.000</td>
                    </tr>
                    <tr>
                        <td> <a href="index.php?action=thanhtoan">Thanh Toán</a></td>

                    </tr>
                </table>
            </div>
        </form>
    <?php
    } else {
        echo '<script> alert("giỏ hang chưa có sản phẩm") </script>';
        echo '<meta http-equiv="refresh" content="0,url=../store/index.php?action=home"/>';
    }
    ?>

</div>