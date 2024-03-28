<div class="container">
    <div class="row">
        <div class="col-2">
            <h1>Give You Workout<br> A New Style!</h1>
            <p>Success isn't always about greatness. It's about consistency. Consistebt hard work gains success.
                Greatness will come.</p>
            <a href="" class="btn">Explore Now &#8594;</a>
        </div>
        <div class="col-2">
            <img src="images/image1.png" alt="">
        </div>
    </div>
</div>

<!-- featured categories -->
<div class="categories">
    <div class="small-container">
        <div class="row">
            <div class="col-3">
                <img src="images/category-1.jpg" alt="">
            </div>
            <div class="col-3">
                <img src="images/category-2.jpg" alt="">
            </div>
            <div class="col-3">
                <img src="images/category-3.jpg" alt="">
            </div>
        </div>
    </div>
</div>

<!-- featured products -->
<div class="small-container">
    <h2 class="title-products">Featured Products</h2>
    <div class="row">
    <?php
        $hhnew = new hanghoa();
        $result = $hhnew->getHangEvaluate();
        while ($set = $result->fetch()) :
    ?>
        <a class="col-4" href="index.php?action=product_detail&id=<?php echo $set['id'] ?>">
            <img src="images/<?php echo $set['thumbnail'] ?>" alt="">
            <h4  style=" overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">
                <?php echo $set['title'] ?>
            </h4>
            <div class="rating">
             <?php 
            $rating = $set['Evaluate'];
             // Lặp qua từng sao
            for ($i = 1; $i <= 5; $i++) {
            // Nếu số sao hiện tại nhỏ hơn hoặc bằng rating, hiển thị sao đầy
            if ($i <= $rating) {
                echo '<i class="fa-solid fa-star"></i>';
            } else {
                // Ngược lại, hiển thị sao rỗng
                echo '<i class="fa-regular fa-star"></i>';
            }
        }
            ?>
            </div>
            <p><?php echo $set['price'] ?></p>
        </a>
        <?php
            endwhile;
        ?>
    </div>

    <h2 class="title-products">latest Products</h2>
    <div class="row">
        <?php
        $hhnew = new hanghoa();
        $result = $hhnew->getHanHoaNew();
        while ($set = $result->fetch()) :
        ?>
            <a class="col-4" href="index.php?action=product_detail&id=<?php echo $set['id'] ?>">
                <img src="images/<?php echo $set['thumbnail'] ?>" alt="">
                <h4 style=" overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><?php echo $set['title'] ?></h4>
                <div class="rating">
                <?php 
                    $rating = $set['Evaluate'];
                    // Lặp qua từng sao
                    for ($i = 1; $i <= 5; $i++) {
                        // Nếu số sao hiện tại nhỏ hơn hoặc bằng rating, hiển thị sao đầy
                        if ($i <= $rating) {
                            echo '<i class="fa-solid fa-star"></i>';
                        } else {
                            // Ngược lại, hiển thị sao rỗng
                            echo '<i class="fa-regular fa-star"></i>';
                        }
                    }
                    ?>
                </div>
                <p><?php echo number_format($set['price']) ?></p>
            </a>
        <?php
        endwhile
        ?>
    </div>
</div>
<!-- offter(Cung cấp) -->
<div class="offter">
    <div class="small-container">
        <div class="row">
            <div class="col-2">
                <img src="images/exclusive.png" class="offer-img" alt="">
            </div>
            <div class="col-2">
                <p>exclusive Available on RedStore</p>
                <h1>Smart Brand 4</h1>
                <small>The Mi Smart Brand 4 feature a 39.9% larger (than mi brand 3) Amoled color full-touch display
                    with adjustable brightness, so everything is clear as can be</small>
                <a href="" class="btn">Buy Now &#8594;</a>
            </div>
        </div>
    </div>
</div>

<!-- testimonial (cam kết)-->
<div class="testimonial">
    <div class="small-container">
        <div class="row">
            <div class="col-3">
                <i class="fa-solid fa-quote-left"></i>
                <p>lorem Ipsum in simply dummy text of the printing and typeseting industry. Lorem Ipsum has been the
                    industry's standard dummy text everr</p>
                <div class="rating">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <img src="./images/user-1.png" alt="">
                <h3>Sean Parker</h3>
            </div>

            <div class="col-3">
                <i class="fa-solid fa-quote-left"></i>
                <p>lorem Ipsum in simply dummy text of the printing and typeseting industry. Lorem Ipsum has been the
                    industry's standard dummy text everr</p>
                <div class="rating">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <img src="./images/user-2.png" alt="">
                <h3>Obama js</h3>
            </div>

            <div class="col-3">
                <i class="fa-solid fa-quote-left"></i>
                <p>lorem Ipsum in simply dummy text of the printing and typeseting industry. Lorem Ipsum has been the
                    industry's standard dummy text everr</p>
                <div class="rating">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <img src="./images/user-3.png" alt="">
                <h3>Manh The</h3>
            </div>

        </div>
    </div>
</div>

<!-- ----------------------brand------------------ -->

<div class="brands">
    <div class="small-container">
        <div class="row">
            <div class="col-5">
                <img src="images/logo-godrej.png" alt="">
            </div>
            <div class="col-5">
                <img src="images/logo-coca-cola.png" alt="">
            </div>
            <div class="col-5">
                <img src="images/logo-oppo.png" alt="">
            </div>
            <div class="col-5">
                <img src="images/logo-paypal.png" alt="">
            </div>
            <div class="col-5">
                <img src="images/logo-philips.png" alt="">
            </div>
        </div>
    </div>
</div>