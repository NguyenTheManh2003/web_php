<!-- --------------single Products details------------- -->

<div class="small-container single-product">
    <form action="index.php?action=giohang&act=giohang_action" method="post">
        <div class="row">
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id']; // view đòi hỏi cần có thông tin của ma hang hóa tg ứng
                $hh = new hanghoa();
                $sp = $hh->getHangHoaId($id); // trả về một thằng nên không cần fetc
                $tenhh = $sp['title'];
                $mota = $sp['description'];
                $giagoc = $sp['price'];
                $giagiam = $sp['discount'];
                $anh = $sp['thumbnail'];
            }
            ?>
            <div class="col-2">
                <img src="images/<?php echo $anh ?>" width="100%" id="ProductImg">

                <div class="small-img-row">
                    <div class="small-img-col">
                        <img src="images/gallery-1.jpg" width="100%" alt="" class="smallimg">
                    </div>
                    <div class="small-img-col">
                        <img src="images/gallery-2.jpg" width="100%" alt="" class="smallimg">
                    </div>
                    <div class="small-img-col">
                        <img src="images/gallery-3.jpg" width="100%" alt="" class="smallimg">
                    </div>
                    <div class="small-img-col">
                        <img src="images/gallery-4.jpg" width="100%" alt="" class="smallimg">
                    </div>
                </div>
            </div>
            <div class="col-2">
                <p>Home / T-Shirt</p>
                <input type="hidden" name="mahh" value="<?php echo $id ?>">
                <h2><?php echo $tenhh ?></h2>
                <div style="display:flex;font-size:20px;color:black">
                    <p style="margin-right: 20px;  text-decoration: line-through;"><?php echo number_format($giagoc) ?></p>
                    <p style="color:black"><?php echo number_format($giagiam) ?></p>
                </div>
                <div class="" style="display:flex;font-size:20px;color:black">
                    <select name="mau" id="">
                        <?php
                        $result = $hh->getColorid($id);
                        while ($set = $result->fetch()) :
                        ?>
                            <option value="<?php echo $set['color'] ?>">
                                <?php echo $set['color'] ?>
                            </option>
                        <?php endwhile ?>
                    </select>

                    <select name="size" id="" style="margin-right: 20px;">
                        <?php
                        $size = $hh->getSizeid($id);
                        while ($set = $size->fetch()) :
                        ?>
                            <option value="<?php echo $set['size'] ?>">
                                <?php echo $set['size'] ?>
                            </option>
                        <?php
                        endwhile
                        ?>
                    </select>

                </div>

                <input type="number" name="soluong" id="" value="1">
                <input type="submit" name="add_to_cart" value="Add to Cart" class="submit">
                <h3>Product Details <i class="fa fa-indent"></i></h3>
                <br>
                <p><?php echo $mota ?></p>


            </div>
        </div>
    </form>
</div>
<!-- ----------------title---------------- -->
<div class="small-container">
    <div class="row row-2">
        <h2>Related Products</h2>
        <p>View More</p>
    </div>
</div>

<!-- featured products -->
<div class="small-container">
    <div class="row">
        <div class="col-4">
            <img src="images/product-1.jpg" alt="">
            <h4>red Printed T-Shirt</h4>
            <div class="rating">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-regular fa-star"></i>
            </div>
            <p>$50.000</p>
        </div>

        <div class="col-4">
            <img src="images/product-2.jpg" alt="">
            <h4>red Printed T-Shirt</h4>
            <div class="rating">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-regular fa-star"></i>
            </div>
            <p>$50.000</p>
        </div>

        <div class="col-4">
            <img src="images/product-3.jpg" alt="">
            <h4>red Printed T-Shirt</h4>
            <div class="rating">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-regular fa-star"></i>
            </div>
            <p>$50.000</p>
        </div>

        <div class="col-4">
            <img src="images/product-4.jpg" alt="">
            <h4>red Printed T-Shirt</h4>
            <div class="rating">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-regular fa-star"></i>
            </div>
            <p>$50.000</p>
        </div>
        <div class="col-4">
            <img src="images/product-5.jpg" alt="">
            <h4>red Printed T-Shirt</h4>
            <div class="rating">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-regular fa-star"></i>
            </div>
            <p>$50.000</p>
        </div>

        <div class="col-4">
            <img src="images/product-6.jpg" alt="">
            <h4>red Printed T-Shirt</h4>
            <div class="rating">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-regular fa-star"></i>
            </div>
            <p>$50.000</p>
        </div>

        <div class="col-4">
            <img src="images/product-7.jpg" alt="">
            <h4>red Printed T-Shirt</h4>
            <div class="rating">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-regular fa-star"></i>
            </div>
            <p>$50.000</p>
        </div>

        <div class="col-4">
            <img src="images/product-8.jpg" alt="">
            <h4>red Printed T-Shirt</h4>
            <div class="rating">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-regular fa-star"></i>
            </div>
            <p>$50.000</p>
        </div>
        <div class="col-4">
            <img src="images/product-9.jpg" alt="">
            <h4>red Printed T-Shirt</h4>
            <div class="rating">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-regular fa-star"></i>
            </div>
            <p>$50.000</p>
        </div>
        <div class="col-4">
            <img src="images/product-10.jpg" alt="">
            <h4>red Printed T-Shirt</h4>
            <div class="rating">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-regular fa-star"></i>
            </div>
            <p>$50.000</p>
        </div>
        <div class="col-4">
            <img src="images/product-11.jpg" alt="">
            <h4>red Printed T-Shirt</h4>
            <div class="rating">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-regular fa-star"></i>
            </div>
            <p>$50.000</p>
        </div>
        <div class="col-4">
            <img src="images/product-12.jpg" alt="">
            <h4>red Printed T-Shirt</h4>
            <div class="rating">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-regular fa-star"></i>
            </div>
            <p>$50.000</p>
        </div>
    </div>

    <div class="page-btn">
        <span>1</span>
        <span>2</span>
        <span>3</span>
        <span>4</span>
        <span>&#8594</span>
    </div>
</div>