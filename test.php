<!DOCTYPE html>
<html lang="en">
<?php 
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $duong_dan_day_du = __DIR__."/img/tour/11221323/";
        // Tạo thư mục mới
        if (!file_exists($duong_dan_day_du)) {
            mkdir($duong_dan_day_du, 0777, true); // 0777 là quyền truy cập, true để tạo cả các thư mục cha nếu chưa tồn tại
            echo "Thư mục mới đã được tạo thành công.";
        } else {
            echo "Thư mục đã tồn tại.";
        }
        move_uploaded_file($_FILES['image']['tmp_name'],$duong_dan_day_du.$_FILES['image']['name']);
        echo $duong_dan_day_du.$_FILES['image']['name'] ;
    }
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="/js/TextArea.js"></script>

</head>

<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="formFile" class="form-label">Default file input example</label>
            <input class="form-control" type="file" id="formFile" name="image">
        </div>
        <button type="submit">sumit</button>
    </form>

    <form method="post" action="submit.php">
    <!-- Editor input -->
    <textarea id="myTextarea" name="editor_input"></textarea>

    <!-- Submit button -->
    <input type="submit" name="submit" value="Submit">
</form>
    <a href="/website/ThongTinTour.php?TourID=14" class="btn">tour</a>
</body>

</html>