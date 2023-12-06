<?php
require_once (__DIR__.'/../controller/connection.php');
session_start();
if (!isset($_SESSION["Tour_add_error"])){
		$_SESSION["Tour_add_error"]="";
	
}
$sql1 ="select * from category";
$rs1 = $conn->query($sql1);
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>CC</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
        <script src="/js/TextArea.js"></script>
        <script>function checkFile() {
            var fileInput = document.getElementById('imageTour');
            // Kiểm tra xem có file nào được chọn hay không
            if (fileInput.files.length < 0) {
                alert('Vui lòng chọn ânh tour');
            }
        }
        </script>
    </head>

    <body>
        <alert class="container container-fluid "><?php echo $_SESSION["Tour_add_error"] ?></alert>
        <h1 class="container text-primary text-center"> THÊM TOUR</h1>
        <div class="row">
            <div class="col-sm-10"></div>
            <a href="/../website/tour_view.php?TourName=" class="col-sm-1 btn btn-secondary">Trở Về</a>
        </div>
        <form method="post" action="/../controller/tour_add_action.php" class="container container-fluid" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="TourName" class="form-label">Tên Tour</label>
                <input type="text" class="form-control" id="TourName" name="TourName">
            </div>
            <div class="mb-3">
                <label for="TourDesc" class="form-label">Mô Tả</label>
                <textarea id="myTextarea" name="TourDesc"></textarea>
            </div>
            <div class="mb-3">
                <label for="imageTour" class="form-label">Ảnh Tour</label>
                <input class="form-control" type="file" id="imageTour" name="imageTour[]" multiple>
            </div>
            <div class="mb-3">
                <label for="TourPriceAd" class="form-label">Giá/Người Lớn</label>
                <input type="number" class="form-control" id="TourPriceAd" name="TourPriceAd" min=0>
            </div>
            <div class="mb-3">
                <label for="TourPriceCh" class="form-label">Giá/Trẻ Em</label>
                <input type="number" class="form-control" id="TourPricech" name="TourPriceCh" min=0>
            </div>
            <div class="mb-3">
                <label for="dateStart" class="form-label">Ngày Khởi Hành</label>
                <input type="date" class="form-control" id="dateStart" name="dateStart" multiple>
            </div>
            <div class="mb-3">
                <label for="TourDayNum" class="form-label">Số Ngày</label>
                <input type="number" class="form-control" id="TourDayNum" name="TourDayNum" min=0>
            </div>
            <div class="mb-3">
                <label for="TourNightNum" class="form-label">Số Đêm</label>
                <input type="number" class="form-control" id="TourNightNum" name="TourNightNum" min=0>
            </div>
            <div class="mb-3">
                <label for="TourItinerary" class="form-label">Hành Trình Tour</label>
                <textarea id="TourItinerary" name="TourItinerary"></textarea>
            </div>
            <div class="mb-3">
                <label for="TourTransportation" class="form-label">Phương Tiện</label>
                <input type="text" class="form-control" id="TourTransportation" name="TourTransportation">
            </div>
            <div class="mb-3">
                <label for="TourDeparture" class="form-label">Điểm Khởi Hành</label>
                <input type="text" class="form-control" id="TourDeparture" name="TourDeparture">
            </div>
            <div class="mb-3">
                <label for="TourMaxPeople" class="form-label">Chỗ</label>
                <input type="number" class="form-control" id="TourMaxPeople" name="TourMaxPeople">
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="TourStatus" id="TourStatus" checked>
                <label class="form-check-label" for="TourStatus">
              Hoạt Động
            </label>
            </div>
            <div class="mb-3"><select class="form-select" aria-label="Default select example" name="CateName">
            <option selected>Chọn Loại Tour</option>
            <?php
            if ($rs1->num_rows > 0) {
                while ($row = $rs1->fetch_assoc()) {
                    echo "<option value='" . $row['CateName'] . "'>" . $row['CateName'] . "</option>";
                }
            } else {
                echo "<option value=''>Không có dữ liệu</option>";
            }
            ?>
                        
        </select></div>

            <div class="row">
                <div class="col-11"></div>
                <button type="submit" class="btn btn-success col-1">Thêm</button>
            </div>
        </form>
    </body>
    <?php 
	$_SESSION["Tour_add_error"]="";
?>
    </html>