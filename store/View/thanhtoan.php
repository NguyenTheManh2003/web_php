<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600&display=swap');

    /* .thanhtoan{
  display: flex;
  justify-content: center;
  align-items: center;
  padding:25px;
  min-height: 100vh;
  background: linear-gradient(90deg, #2ecc71 60%, #27ae60 40.1%);
} */

    .thanhtoan form {
        padding: 20px;
        width: 100%;
        background: #fff;
        box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
    }

    .thanhtoan form .row {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
    }

    .thanhtoan form .row .col {
        flex: 1 1 250px;
    }

    .thanhtoan form .row .col .title {
        font-size: 20px;
        color: #333;
        padding-bottom: 5px;
        text-transform: uppercase;
    }

    .thanhtoan form .row .col .inputBox {
        margin: 15px 0;
    }

    .thanhtoan form .row .col .inputBox span {
        margin-bottom: 10px;
        display: block;
    }

    .thanhtoan form .row .col .inputBox input {
        width: 100%;
        border: 1px solid #ccc;
        padding: 10px 15px;
        font-size: 15px;
        text-transform: none;
    }

    .thanhtoan form .row .col .inputBox input:focus {
        border: 1px solid #000;
    }

    .thanhtoan form .row .col .flex {
        display: flex;
        gap: 15px;
    }

    .thanhtoan form .row .col .flex .inputBox {
        margin-top: 5px;
    }

    .thanhtoan form .row .col .inputBox img {
        height: 34px;
        margin-top: 5px;
        filter: drop-shadow(0 0 1px #000);
    }

    .thanhtoan form .submit-btn {
        width: 200px;
        height: 50px;
        padding: 12px;
        font-size: 17px;
        background: #27ae60;
        color: #fff;
        margin-top: 5px;
        cursor: pointer;
        text-align: center;
        align-items: center;
        display: block;
        margin: 0 auto;
        
    }

    .thanhtoan form .submit-btn:hover {
        background: #2ecc71;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    th {
        background-color: #f2f2f2;
    }
    tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    tfoot {
        background-color: #f2f2f2;
        font-weight: bold;
    }
    tfoot td {
        text-align: right;
    }
</style>

<div class="small-container">

    <?php
    if (!isset($_SESSION['makh'])) {
        echo '<script> alert("Bạn cần phải đăng nhập")</script>';
        echo '<meta http-equiv=refresh content="0; url=../store/index.php?action=account"/>';
    }
    ?>
            <?php
            if (isset($_SESSION['masohd']))
                $mashd = $_SESSION['masohd'];
            $hd = new hoadon();
            $khhd = $hd->getKhachHangHd($mashd);
            $tenkh = $khhd['fullname'];
            // $emailkh = $khhd['email'];
            $ngay = $khhd['order_date'];
            // 
            ?>

    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Product detail</th>
                <th>Tùy chọn của bạn</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <?php
        $j = 0;
        $sp = $hd->gethangHoaHD($mashd);
        while ($set = $sp->fetch()) :
            $j++
        ?>
            <tbody>
                <tr>
                    <td><?php echo $j ?></td>
                    <td><?php echo $set['title'] ?></td>
                    <td>Màu: <?php echo $set['color'] ?> Size: <?php echo $set['size'] ?></td>
                    <td>Đơn giá: <?php echo number_format($set['total_amount']) ?> - Số lượng: <?php echo $set['quantity'] ?></td>
                </tr>
            </tbody>
        <?php
        endwhile;
        ?>
        <tfoot>
            <tr>
                <td colspan="3">
                    <b>Tổng tiền</b>
                </td>
                <td>
                    <b>
                        <?php
                        $gh = new giohang();
                        echo $gh->sub_Total();
                        ?><sup><u>đ</u></sup>
                    </b>
                </td>
            </tr>
        </tfoot>
    </table>

    <div class="thanhtoan">
        <form action="">
            <div class="row">
                <div class="col">
                    <h3 class="title">billing address</h3>
                    <div class="inputBox">
                        <span>full name : <?php echo $tenkh; ?></span>
                        <input type="text" placeholder="john deo">
                    </div>
                    <div class="inputBox">
                        <span>email :</span>
                        <input type="email" placeholder="example@example.com">
                    </div>
                    <div class="inputBox">
                        <span>address :</span>
                        <input type="text" placeholder="room - street - locality">
                    </div>
                    <div class="inputBox">
                        <span>city :</span>
                        <input type="text" placeholder="mumbai">
                    </div>

                    <div class="flex">
                        <div class="inputBox">
                            <span>state :</span>
                            <input type="text" placeholder="india">
                        </div>
                        <div class="inputBox">
                            <span>zip code :</span>
                            <input type="text" placeholder="123 456">
                        </div>
                    </div>

                </div>
                <div class="col">
                    <h3 class="title">payment</h3>
                    <div class="inputBox">
                        <span>cards accepted :</span>
                        <img src="images/card_img.png" alt="">
                    </div>
                    <div class="inputBox">
                        <span>name on card :</span>
                        <input type="text" placeholder="mr. john deo">
                    </div>
                    <div class="inputBox">
                        <span>credit card number :</span>
                        <input type="number" placeholder="1111-2222-3333-4444">
                    </div>
                    <div class="inputBox">
                        <span>exp month :</span>
                        <input type="text" placeholder="january">
                    </div>

                    <div class="flex">
                        <div class="inputBox">
                            <span>exp year :</span>
                            <input type="number" placeholder="2022">
                        </div>
                        <div class="inputBox">
                            <span>CVV :</span>
                            <input type="text" placeholder="1234">
                        </div>
                    </div>
                </div>
            </div>
            <input type="submit" value="proceed to checkout" class="submit-btn">
        </form>
    </div>
</div>