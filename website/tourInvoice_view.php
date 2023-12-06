<?php
require_once (__DIR__.'/../controller/connection.php');
session_start();
if (!isset($_SESSION["TourInvoice_add_error"])){
    $_SESSION["TourInvoice_add_error"]="";

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
        <alert class="container container-fluid "><?php echo $_SESSION["TourInvoice_add_error"] ?></alert>
        <h1 class="container container-fluid text-primary text-center">Danh sách các hóa đơn</h1>
        <form class="row container container-fluid" method="GET" action="/website/tourInvoice_view.php?TourName=">
            <div class="mb-3 col-sm-2">
                <label for="TourName" class="form-label">Tên Tour</label>
                <input type="text" class="form-control" id="TourName" name="TourName">
            </div>
            <div class="mb-3 col-sm-1">
                <label for="TourName" class="form-label"></label>
                <button class="btn btn-primary form-control" type="submit">Tìm</button>
            </div>
        </form>
            
        <table class="container container-fluid table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Ngày Khởi Hành</th>
                    <th scope="col">Số lượng người lớn</th>
                    <th scope="col">Số lượng trẻ em</th>
                    <th scope="col">Tổng hóa đơn</th>
                    <th scope="col">Mã Tour</th>
                    <th scope="col">Tên Tour</th>
                    <th scope="col">Mã Thành Viên</th>
                    <th scope="col">Mã Phương Thức Thanh Toán</th>
                    <th scope="col">Trạng Thái</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                        $TourName = $_GET["TourName"];
                        $sql = "select i.*, t.TourName from invoice as i 
                        join tour as t on i.TourID = t.TourID
                        join member as m on i.MemID=m.MemID
                        join paymentmethod as p on i.PayID=p.PayID
                        where TourName like '%$TourName%' 
                        order by InID ";
                        $result = $conn->query($sql) or die("Can't get recordset");
                        if($result->num_rows>0){
                            while($row = $result->fetch_assoc()){
                                ?>
                    <tr>
                        <th scope="row">
                            <?php echo $row["InID"];?>
                        </th>
                        <td>
                            <?php echo $row["InDate"];?>
                        </td>
                        <td >
                            <?php echo $row["InQuantityAdu"]; ?>
                        </td>
                        <td><?php echo $row["InQuantityChd"];?>
                         </td>
                        <td>
                            <?php echo $row["InTotal"]; ?>
                        </td>
                        <td>
                            <?php echo $row["TourID"]; ?>
                        </td>
                        <td>
                            <?php echo $row["TourName"]; ?>
                        </td>
                        <td>
                            <?php echo $row["MemID"]; ?>
                        </td>
                        <td>
                            <?php echo $row["PayID"]; ?>
                        </td>
                        <td>
                            <?php if ($row["InStatus"]==1) echo "Hoạt Động"; else echo"Ngưng Hoạt Động";?>
                        </td>
                        <td>
                            <a href="/../controller/tourInvoice_remove_action.php?TourID=<?php echo $row["TourID"]; ?>" id="deleteBtn" class="btn btn-danger" onclick="confirmDelete()">Xóa</a>
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
$_SESSION["TourInvoice_add_error"]="";
?>
    </html>