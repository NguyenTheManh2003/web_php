

<style>
/* styles.css */

.pagination {
    display: flex;
    list-style: none;
    padding: 0;
    margin: 20px 0;
}

.pagination .page {
    margin: 0 5px;
}

.pagination .page a {
    text-decoration: none;
    padding: 8px 12px;
    border: 1px solid #ccc;
    color: #333;
    border-radius: 5px;
}

.pagination .page a:hover {
    background-color: #eee;
}

.pagination .page a.active {
    background-color: var(--primary-color);
    color: #333;
    border-color: #007bff;
}

.search-container {
  display: flex;
  align-items: center;
}

.search-input {
  outline: auto;
  text-transform: lowercase;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  transition: border-color 0.3s ease;
  width: 200px;
}

.submit-btn {
  padding: 10px 20px; /* Adjust padding as needed */
  border: 1px solid #ccc;
  border-radius: 5px;
  background-color: #f0f0f0; /* Change background color as needed */
  cursor: pointer;
  transition: background-color 0.3s ease;
  margin-left: 5px; /* Adjust margin as needed */
  width: 80px;
  text-align: center;
  line-height: 1; /* Add this line */
  border: 1px solid #ccc;
  border-radius: 5px;
  transition: border-color 0.3s ease;   
  outline: auto;
  background-color: #ff523b;
  color: white;
}


.submit-btn:hover {
  background-color: #e0e0e0; /* Change hover background color as needed */
}

</style>

<?php
$dataget = new hanghoa();

if (isset($_GET['action']) && $_GET['action'] == 'product') {
    // Check if 'act' is set in the URL
    if (isset($_GET['act'])) {
        // Switch based on the value of 'act'
        switch ($_GET['act']) {
            case 'product1':
                $product = 1;
                $count = $dataget->getHangHoacountproductCAT1()->rowCount();
                break;
            case 'product2':
                $product = 2;

                $count = $dataget->getHangHoacountproductCAT2()->rowCount();
                break;
            case 'product3':
                $product = 3;

                $count = $dataget->getHangHoacountproductCAT3()->rowCount();
                break;
            case 'product4':
                $product = 4;

                $count = $dataget->getHangHoacountproductCAT4()->rowCount();
                break;
            case 'product': // If 'act' is 'product', set default values
                $product = 0;
                $count = $dataget->getHangHoaALL()->rowCount();
                break;
        }
    }
} // Đếm số lượng sản phẩm
$limit = 10; // Đặt giới hạn số sản phẩm hiển thị trên mỗi trang
$trang = new page();
$page = $trang->findPage($count, $limit); // Tính tổng số trang dựa trên số lượng sản phẩm và giới hạn
$start = $trang->findStart($limit); // Tìm điểm bắt đầu để lấy sản phẩm dựa trên trang hiện tại
$current_page = isset($_GET["page"]) ? $_GET["page"] : 1; // Lấy trang hiện tại từ tham số URL

?>

    <div class="small-container">
        <div class="search-container">
            <form action="" method="GET">
                <input name="texttimkiem" type="text" placeholder="Search product" class="search-input">
                <input name="timkiem" type="submit" value="Submit" class="submit-btn">
            </form>
        </div>
        <form action="index.php?action=product" method="post">
            <div class="row row-2" style="margin-top:0 ;">
                <h2 id="selectedOption" id="selectedValue">All Products</h2>
                <div class="dropdown">
                    <button class="dropbtn"><a href="index.php?action=product&act=product" class="dropbtn" >Sorting</a> </button>
                    <div class="dropdown-content" id="dropdownList">
                        <?php
                        $cate = new hanghoa();
                        $result = $cate->getCate();
                        while ($set = $result->fetch()) :
                        ?>
                            <a href="index.php?action=product&act=product<?php echo $set['id'] ?>" onclick="updateHeading('<?php echo $set['name'] ?>', this); return false;">
                                <?php echo $set['name'] ?>
                            </a>

                        <?php
                        endwhile;
                        ?>
                    </div>
                </div>

            </div>
        <div class="row">
            <?php
            $db = new hanghoa();
            // // Lấy sản phẩm dựa trên phân trang
            // $result  = $product->getHangHoaAll();
            // while ($set = $result->fetch()) :
            // print_r($set);
            if ($product == 0) {
                $resultdb = $db->getHangHoaAllPage($start, $limit);
            } elseif ($product == 1) {
                $resultdb = $db->getHangHoaCATE1($start, $limit);
            } elseif ($product == 2) {
                $resultdb = $db->getHangHoaCATE2($start, $limit);
            } elseif ($product == 3) {
                $resultdb = $db->getHangHoaCATE3($start, $limit);
            } elseif ($product == 4) {
                $resultdb = $db->getHangHoaCATE4($start, $limit);
            }
            while ($set = $resultdb->fetch()) :
                // print_r($se
            ?>
                <a class="col-4" href="index.php?action=product_detail&id=<?php echo $set['id'] ?>">

                    <img src="images/<?php echo $set['thumbnail'] ?>" alt="">
                    <h4 style=" overflow: hidden;
                    text-overflow: ellipsis;
                    white-space: nowrap;">
                        <?php echo $set['title'] ?>
                    </h4>
                    <div class="rating">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>
                    <p><?php echo number_format($set['price']) ?></p>

                </a>
            <?php
            endwhile;
            ?>
        </div>
        <ul class="pagination home-product__pagination">
                    <?php
                    // Previous Page Button
                    if ($current_page > 1) {
                        echo '<li class="page"><a class="page-node" href="?action=product&act=' . $_GET['act'] . '&page=' . ($current_page - 1) . '" class="page-link"> <- </a></li>';
                    }
                    // Page Links
                    for ($i = 1; $i <= $page; $i++) {
                        $activeClass = ($i == $current_page) ? 'active current-page' : '';
                        echo '<li class="page"><a class="page-node page-link ' . $activeClass . '" href="?action=product&act=' . $_GET['act'] . '&page=' . $i . '">' . $i . '</a></li>';
                    }
                    // Next Page Button
                    if ($current_page < $page) {
                        echo '<li class="page"><a class="page-node" href="?action=product&act=' . $_GET['act'] . '&page=' . ($current_page + 1) . '" class="page-link">-> </a></li>';
                    }
                    ?>
        </ul>
        </form>
    </div>

<script>
    var defaultOption = "All Products"; // Giá trị mặc định

    function updateHeading(value, linkElement) {
        var selectedHeading = document.getElementById("selectedOption");

        // Lấy giá trị đã chọn hoặc giá trị mặc định nếu chưa chọn
        var displayOption = value ? value : defaultOption;

        // Cập nhật nội dung của thẻ h2
        selectedHeading.innerText = displayOption;

        // Navigate to the specified link
        window.location.href = linkElement.getAttribute('href');
    }
</script>