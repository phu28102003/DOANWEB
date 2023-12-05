<!--#include file connection.php-->
<?php 
    require_once(__DIR__ . '/controller/connection.php');
    $sql = "SELECT * FROM tour WHERE TourId = 1";
    $result = $conn->query($sql);
    echo $conn->error;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Concac</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    .fakeimg {
    height: 200px;
    background: #aaa;
    }
    .table-content {
        max-width: 100%; /* Chiều rộng tối đa */
        word-wrap: break-word; /* Tự động xuống dòng khi cần */
    }
  }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
  <div class="container-fluid">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="navbar-brand" href="#">Logo</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="#">Active</a>
        </li>
    </ul>
  </div>
</nav>

<div class="container mt-5">
  <div class="row table-content">
    <div class="col-sm-9">
        <h1 class="text-primary">Tên Tour</h1>
        <div>đánh giá ở đây</div>
        <div id="carousel" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
                <button type="button" data-bs-target="#carousel" data-bs-slide-to="4" aria-label="Slide 5"></button>
                <button type="button" data-bs-target="#carousel" data-bs-slide-to="5" aria-label="Slide 6"></button>
                <button type="button" data-bs-target="#carousel" data-bs-slide-to="6" aria-label="Slide 7"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/img/tour/1/1.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="/img/tour/1/2.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="/img/tour/1/3.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item ">
                    <img src="/img/tour/1/4.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="/img/tour/1/5.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="/img/tour/1/6.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item ">
                    <img src="/img/tour/1/7.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
                <div>địa điêm khởi hành, thời gian, phương tiện, mã Tour</div>
        </div>
        <h2>Tổng quan</h2>
        <div></div>
        <h2>Chương trình tour</h2>
        <h2>Lịch Khỏi hành</h2>
        <h2>Hướng Dẫn Viên</h2>
        <h2>Chi Phí Dự kiến</h2>
        <h2>Đánh GIá của khách hàng</h2>
        <p>...</p>
      
    </div>
    <div class="col-sm-3" style="position: fixed-right fixed-right;">
      <div style="position: fixed">BÊN PHải</div>
    </div>
  </div> 
</div>

<div class="mt-5 p-4 bg-dark text-white text-center" style="height: 1000px;">
  <p >Footer</p>
</div>

</body>
</html>
