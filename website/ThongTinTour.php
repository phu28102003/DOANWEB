<?php 
    require_once(__DIR__ . "/../controller/ThongTinTourCtrl.php");
    $TourImagePath = json_decode($TourImage, true);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Concac</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        
    </script>
    <style>
        .table-content {
            max-width: 100%; /* Chiều rộng tối đa */
            word-wrap: break-word; /* Tự động xuống dòng khi cần */
        }
        .fixed-content {
            position: sticky;
            top: 0;
            background-color: white; /* Màu nền cho phần tử con */
            padding: 10px; /* Padding cho phần tử con */
            height:750px;
            }
    </style>
</head>

<body class="bg-light">
    <ul class="nav nav-pills bg-primary" style="width:100%;">
        <li class="nav-item col-sm-1 border border-top-0">
            <a class="nav-link text-white" aria-current="page" href="#">HOME</a>
        </li>
        <li class="nav-item col-sm-1 border border-top-0 bg-light">
            <a class="nav-link active bg-light text-dark" href="#" id="Tour">TOUR</a>
        </li>
        <li class="nav-item col-sm-8 border border-top-0">
            <a></a>
        </li>
        <li class="nav-item col-sm-2 border border-top-0">
            <a class="nav-link" href="# ">Link</a>
        </li>
    </ul>

    <div class="container mt-5 ">
        <div class="row table-content">
            <div class="col-sm-8">
                <h1 class="text-primary pb-5">
                    <?php echo $TourName ?>
                </h1>
                <div id="carousel" class="carousel slide">
                    <div class="carousel-indicators">
                        <?php
                    echo "<button type=\"button\" data-bs-target=\"#carousel\" data-bs-slide-to=\"0\" class=\"active\" aria-current=\"true\" aria-label=\"Slide 1\"></button>";
                    for($i=1; $i < count($TourImagePath); $i++){
                        $j = $i +1;
                        echo "<button type=\"button\" data-bs-target=\"#carousel\" data-bs-slide-to=\"$i\" aria-label=\"Slide $j\"></button>";
                    } 
                 ?>
                    </div>
                    <div class="carousel-inner">
                        <?php echo "<div class=\"carousel-item active\">
                    <img src=\"$TourImagePath[0]\" class=\"d-block w-100\" >
                </div>" ?>
                        <?php 
                    for($i=1; $i < count($TourImagePath); $i++){
                        echo "<div class=\"carousel-item \">
                    <img src=\"$TourImagePath[$i]\" class=\"d-block w-100\" > </div>";
                    } 
                ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
                    <div class="container container-fluid text-primary ">địa điêm khởi hành:
                        <?php echo $TourDeparture?>, thời gian:
                        <?php echo $TourStartDate?>, phương tiện:
                        <?php echo $TourTransportation?>
                    </div>
                </div>
                <h2 class="pt-3 p-1 text-primary">Tổng quan</h2>
                <div class="container border" style="background-color: white">
                    <?php echo $TourDesc ?>
                </div>
                <h2 class="pt-3 p-1 text-primary">Chương trình tour</h2>
                <div class="container border" style="background-color: white">
                    <?php echo $TourItinerary ?>
                </div>
                <h2 class="pt-3 p-1 mt-3 text-primary">Đánh giá khách hàng về
                    <?php echo $TourName ?>
                </h2>
                <div class="container container-fluid border" style="background-color: white;max-width: 100%; ">
                    <table class="container container-fluid table" style="max-width: 100%;">
                        <tbody>
                            <?php
                                $sql1 = "select m.MemName, c.ComContent, c.ComDate  from comment as c 
                                join tour as t on c.TourID = t.TourID 
                                join member as m on c.MemID = m.MemID 
                                where c.TourID=".$_GET["TourID"];
                                $result1 = $conn->query($sql1) or die("Can't get recordset");
                                if($result1->num_rows>0){
                                    while($row1 = $result1->fetch_assoc()){
                                    ?>
                                <tr>
                                    <th class="text-primary" scop="row">
                                        <?php echo $row1["MemName"]  ?>
                                    </th>
                                    <td style="max-width: 600px;">
                                        <?php echo $row1["ComContent"] ?>
                                    </td>
                                    <td class="text-secondary">
                                        <?php echo $row1["ComDate"] ?>
                                    </td>
                                </tr>

                                <?php 
                                    }
                                }
                                $conn->close();
                            ?>
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="col-sm-4" style="position: relative">
                <div class="container fixed-content border">
                    <h3 class="text-primary">Lịch Khởi Hành & Giá</h3>
                    <p>Chọn Ngày Khởi Hành:</p>
                    <div class="">
                    <?php 
                        foreach ($DateTours as $TourStartDate) {
                            echo "<div class=\"col-sm-4 btn btn-primary border p-2\" style=\"font-size: 18px;\">$TourStartDate</div>";
                        }
                    ?>
                    <input class="form-control mt-2 pt-4 pb-4" type="date">
                    <div class="container row pt-3">
                        <p class="col-sm-4">Người Lớn</p> 
                        <?php echo "<h6 class=\"text-warning col-sm-4\">x$TourPriceAd</h6>" ?>
                        <input class="form-control mt-2 col-sm-4" style="width:110px" type="number" min=0>
                    </div>
                    <div class="container row pt-3">
                        <p class="col-sm-4">Trẻ Em</p> 
                        <?php echo "<h6 class=\"text-warning col-sm-4\">x$TourPriceAd</h6>" ?>
                        <input class="form-control mt-2 col-sm-4" style="width:110px" type="number" min=0>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-5 p-4 bg-dark text-white text-center" style="height: 1000px;">
        <p>Footer</p>
    </div>

</body>

</html>