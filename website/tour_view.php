<?php
require_once (__DIR__.'/../controller/connection.php');
session_start();
if (!isset($_SESSION["Tour_add_error"])){
    $_SESSION["Tour_add_error"]="";

}
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>CC</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            function confirmDelete() {
            // Hiển thị hộp thoại xác nhận và lưu kết quả vào biến userConfirmed
                var userConfirmed = confirm("Bạn có chắc chắn muốn xóa không?");
                // Nếu người dùng chọn "OK" (đồng ý), chuyển đến đường dẫn href
                if (!userConfirmed) {
                    // Hủy bỏ mặc định chuyển đến href
                    event.preventDefault();
                }
            }
        </script>
    </head>

    <body>
        <alert class="container container-fluid "><?php echo $_SESSION["Tour_add_error"] ?></alert>
        <h1 class="container container-fluid text-primary text-center">Danh sách các Tour</h1>
        <form class="row container container-fluid" method="GET" action="/website/tour_view.php">
            <div class="mb-3 col-sm-2">
                <label for="TourName" class="form-label">Tên Tour</label>
                <input type="text" class="form-control" id="TourName" name="TourName">
            </div>
            <div class="mb-3 col-sm-1">
                <label for="TourName" class="form-label"></label>
                <button class="btn btn-primary form-control" type="submit">Tìm</button>
            </div>
            <div class="col-sm-7"></div>
            <div class="mb-3 col-sm-2">
                <label for="TourName" class="form-label"></label>
                <a class="col-sm-1 btn btn-success form-control" href="/website/tour_add.php">Thêm Tour</a>
            </div>
        </form>
            
        <table class="container container-fluid table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tên Tour</th>
                    <th scope="col" >Mô tả</th>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Giá/Người lớn</th>
                    <th scope="col">Giá/Trẻ em</th>
                    <th scope="col">Ngày Khởi Hành</th>
                    <th scope="col">Số Ngày</th>
                    <th scope="col">Số Đêm</th>
                    <th scope="col">Chương Trình Tour</th>
                    <th scope="col">Phương Tiện</th>
                    <th scope="col">Địa Điểm Khởi Hành</th>
                    <th scope="col">Chỗ</th>
                    <th scope="col">Trạng Thái</th>
                    <th scope="col">Loại Tour</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                        $TourName = $_GET["TourName"];
                        $sql = "SELECT t.*,c.CateName 
                        FROM Tour AS t join category as c on t.CateID = c.CateID
                        where TourName like '%$TourName%' 
                        order by TourID ";
                        $result = $conn->query($sql) or die("Can't get recordset");
                        if($result->num_rows>0){
                            while($row = $result->fetch_assoc()){
                                ?>
                    <tr>
                        <th scope="row">
                            <?php echo $row["TourID"];?>
                        </th>
                        <td>
                            <?php echo $row["TourName"];?>
                        </td>
                        <td >
                            <?php echo $row["TourDesc"]; ?>
                        </td>
                        <td><?php echo $row["TourImage"];?>
                         </td>
                        <td>
                            <?php echo $row["TourPriceAd"]; ?>
                        </td>
                        <td>
                            <?php echo $row["TourPriceCh"]; ?>
                        </td>
                        <td>
                            <?php echo $row["TourStartDate"]; ?>
                        </td>
                        <td>
                            <?php echo $row["TourDayNum"]; ?>
                        </td>
                        <td>
                            <?php echo $row["TourNightNum"]; ?>
                        </td>
                        <td>
                            <?php echo $row["TourItinerary"]; ?>
                        </td>
                        <td>
                            <?php echo $row["TourTransportation"]; ?>
                        </td>
                        <td>
                            <?php echo $row["TourDeparture"]; ?>
                        </td>
                        <td>
                            <?php echo $row["TourMaxPeople"]; ?>
                        </td>
                        <td>
                            <?php if ($row["TourStatus"]==1) echo "Hoạt Động"; else echo"Ngưng Hoạt Động";?>
                        </td>
                        <td>
                            <?php echo $row["CateName"]; ?>
                        </td>
                        <td>
                            <a href="tour_edit.php?TourID=<?php echo $row["TourID"]; ?>" class="btn btn-primary">Sửa</a>
                        </td>
                        <td>
                            <a href="/../controller/tour_remove_action.php?TourID=<?php echo $row["TourID"]; ?>" id="deleteBtn" class="btn btn-danger" onclick="confirmDelete()">Xóa</a>
                        </td>
                    </tr>
                    <?php 
                            }
                        }
                        $conn->close();
                    ?>
            </tbody>
        </table>
    </body>
<?php 
$_SESSION["Tour_add_error"]="";
?>
    </html>