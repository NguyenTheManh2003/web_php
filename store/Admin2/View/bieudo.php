<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 20px;
        padding: 0;
    }

    .chart-container {
        width: 80%;
        margin: 0 auto;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        margin-bottom: 30px;
    }

    #chart_div,
    #chart_div_sanpham {
        height: 400px;
    }

    .chart-title {
        padding: 10px;
        background-color: #f5f5f5;
        border-radius: 5px 5px 0 0;
        font-weight: bold;
    }
</style>

    <div class="chart-container">
        <div class="chart-title">Biểu đồ doanh thu và số lượng bán theo ngày</div>
        <div id="chart_div"></div>
    </div>

    <div class="chart-container">
        <div class="chart-title">Thống kê sản phẩm</div>
        <div id="chart_div_sanpham"></div>
    </div>

<?php
// Assuming Connect() and other necessary functions/classes are properly defined
$db = new Connect();

// Mảng lưu trữ dữ liệu thống kê theo năm
$thongke_nam = array();

// Tạo dữ liệu mẫu từ năm 2015 đến năm 2024
for ($year = 2015; $year <= 2024; $year++) {
    // Tạo dữ liệu mẫu cho mỗi năm
    $thongke_nam[$year] = array();

    // Dữ liệu mẫu cho thống kê ngày
    $thongke_ngay = array();
    for ($month = 1; $month <= 12; $month++) {
        $ngaydat = "$year-$month-01";
        // Giả sử số lượng và tổng tiền được tạo ngẫu nhiên
        $soluong = rand(10, 30);
        $tongtien = $soluong * 5000;
        $thongke_ngay[] = array(
            "ngaydat" => $ngaydat,
            "soluong" => $soluong,
            "tongtien" => $tongtien
        );
    }
    $thongke_nam[$year]["thongke_ngay"] = $thongke_ngay;

    // Dữ liệu mẫu cho thống kê loại
    $thongke_loai = array();
    for ($i = 1; $i <= 5; $i++) {
        $tenloai = "Loại $i";
        // Giả sử số lượng và tổng tiền được tạo ngẫu nhiên
        $soluong = rand(20, 40);
        $tongtien = $soluong * 5000;
        $thongke_loai[] = array(
            "tenloai" => $tenloai,
            "soluong" => $soluong,
            "tongtien" => $tongtien
        );
    }
    $thongke_nam[$year]["thongke_loai"] = $thongke_loai;
}

// Chuyển đổi mảng thành JSON
$thongke_namJSON = json_encode($thongke_nam);

// // In ra dữ liệu JSON
// echo $thongke_namJSON;

?>
<script type="text/javascript">
    // Load visualization library
    google.load('visualization', '1.0', {
        'packages': ['corechart']
    });
    google.setOnLoadCallback(drawChart);

    // PHP data
    var thongke_namJSON = <?php echo $thongke_namJSON; ?>;

    // Draw chart function
    function drawChart() {
        // Chart for thongke data
        var dataTable = new google.visualization.DataTable();
        dataTable.addColumn('string', 'Ngày');
        dataTable.addColumn('number', 'Doanh thu');
        dataTable.addColumn('number', 'Số lượng bán');

        // Add data to the chart for thongke
        for (var year in thongke_namJSON) {
            var thongke_ngay = thongke_namJSON[year]["thongke_ngay"];
            for (var i = 0; i < thongke_ngay.length; i++) {
                dataTable.addRow([
                    thongke_ngay[i].ngaydat,
                    parseFloat(thongke_ngay[i].tongtien),
                    parseInt(thongke_ngay[i].soluong)
                ]);
            }
        }

        // Chart options for thongke
        var options = {
            title: 'Biểu đồ doanh thu và số lượng bán theo ngày',
            hAxis: {
                title: 'Ngày'
            },
            vAxis: {
                title: 'Doanh thu (VNĐ) và Số lượng bán'
            },
            backgroundColor: '#f9f9f9',
            tooltip: {
                isHtml: true
            },
            colors: ['#3366cc', '#dc3912']
        };

        // Draw chart for thongke
        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(dataTable, options);

        // Chart for thongke_loai data
        var data_loai = new google.visualization.DataTable();
        data_loai.addColumn('string', 'Tên loại sản phẩm');
        data_loai.addColumn('number', 'Số lượng bán');
        data_loai.addColumn('number', 'Tổng doanh thu');

        // Add data to the chart for thongke_loai
        for (var year in thongke_namJSON) {
            var thongke_loai = thongke_namJSON[year]["thongke_loai"];
            for (var i = 0; i < thongke_loai.length; i++) {
                data_loai.addRow([
                    thongke_loai[i].tenloai,
                    parseInt(thongke_loai[i].soluong),
                    parseFloat(thongke_loai[i].tongtien)
                ]);
            }
        }

        // Chart options for thongke_loai
        var options_loai = {
            title: 'Thống kê sản phẩm theo loại',
            hAxis: {
                title: 'Tên loại sản phẩm',
                titleTextStyle: {
                    color: '#333'
                }
            },
            vAxis: {
                minValue: 0
            },
            backgroundColor: '#f9f9f9'
        };

        // Draw chart for thongke_loai
        var chart_loai = new google.visualization.ColumnChart(document.getElementById('chart_div_sanpham'));
        chart_loai.draw(data_loai, options_loai);
    }
</script>
