<?php include "header.php"; ?>
<?php include "slider.php"; ?>


    <div class="admin-content_right">
        <div class="admin-content_right-category_list">
            <h1>Biểu đồ thống kê</h1>
            <p>Thống kê theo: <span id="text-date"></span></p>
            <select class="select-date" id="">
                <option value="365ngay">365 ngày</option>
                <option value="90ngay">90 ngày</option>
                <option value="28ngay">28 ngày</option>
                <option value="7ngay">7 ngày</option>
            </select>

            <div id="chart-container" style="height: 250px;"></div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script>
    $(document).ready(function () {
        thongke();

        var chart = new Morris.Area({
            element: 'chart-container',
            xkey: 'date',
            ykeys: ['order', 'sales', 'quantity'],
            labels: ['Đơn hàng', 'Doanh Thu', 'Số lượng đơn']
        });

        $('.select-date').change(function () {
            var thoigian = $(this).val();
            if(thoigian == "7ngay") {
                var text = "7 ngày qua";
            } else if (thoigian == "28ngay") {
                var text = "28 ngày qua";
            } else if (thoigian == "90ngay") {
                var text = "90 ngày qua";
            } else if (thoigian == "365ngay") {
                var text = "365 ngày qua";
            }

            $.ajax({
                url: './thongke.php',
                method: "POST",
                dataType: "json",
                data: {thoigian:thoigian},
                success: function (data) {
                    console.log(data);
                    chart.setData(data);
                    $('#text-date').text(text);
                }
            })
        })

        function thongke() {
            var text = "365 ngày qua";
            $.ajax({
                url: './thongke.php',
                method: "POST",
                dataType: "json",
                success: function (data) {
                    console.log(data);
                    chart.setData(data);
                    $('#text-date').text(text);
                }
            });
        }
    });
</script>
</html>
