<?php
    require_once("connection.php"); // ket noi CSDL
    session_start();
    $TourID = $_GET["TourID"];
    $imagesTour = array();
    foreach ($_FILES["imageTour"]["name"] as $name) {
        array_push($imagesTour, "/../img/tour/".$TourID."/".$name);
    }
    $imagesTour = json_encode($imagesTour);
    $TourName=$_POST["TourName"];
    $TourDesc=$_POST["TourDesc"];
    $TourPriceAd=$_POST["TourPriceAd"];
    $TourPriceCh=$_POST["TourPriceCh"];
    $dateStart=$_POST["dateStart"];
    $TourDayNum=$_POST["TourDayNum"];
    $TourNightNum=$_POST["TourNightNum"];
    $TourItinerary=$_POST["TourItinerary"];
    $TourTransportation=$_POST["TourTransportation"];
    $TourDeparture=$_POST["TourDeparture"];
    $TourMaxPeople=$_POST["TourMaxPeople"];
    $CateName=$_POST["CateName"];
    $CateID = null;
    if($_POST['TourStatus'] =="on"){
        $TourStatus = 1;
    }else {
        $TourStatus=0;
    }
    
        $CateName=$_POST["CateName"];
        $sql2 = "select CateID from category where CateName = '$CateName'";
        $result2 = $conn->query($sql2);
        // lay id category
        if($result2->num_rows>0){
            $row = $result2->fetch_assoc();
            $CateID =$row['CateID'];
        }

        $sql = "UPDATE Tour 
        SET 
            TourName = '$TourName',
            TourDesc = '$TourDesc',
            TourImage = '$imagesTour',
            TourPriceAd = '$TourPriceAd',
            TourPriceCh = '$TourPriceCh',
            TourStartDate = '$dateStart',
            TourDayNum = '$TourDayNum',
            TourNightNum = '$TourNightNum',
            TourItinerary = '$TourItinerary',
            TourTransportation = '$TourTransportation',
            TourDeparture = '$TourDeparture',
            TourMaxPeople = '$TourMaxPeople',
            TourStatus = '$TourStatus',
            CateID = '$CateID'
        WHERE 
            TourID = '$TourID'";
        $conn->query($sql);
        if($conn->error==""){
            $duong_dan_day_du = __DIR__."/../img/tour/$TourID"."/";
            // Tạo thư mục mới
            if (!file_exists($duong_dan_day_du)) {
                mkdir($duong_dan_day_du, 0777, true); // 0777 là quyền truy cập, true để tạo cả các thư mục cha nếu chưa tồn tại
                for($i=0; $i< count($_FILES["imageTour"]["name"]); $i++){
                    move_uploaded_file($_FILES['imageTour']['tmp_name'][$i],$duong_dan_day_du.$_FILES["imageTour"]["name"][$i]);
                }
            }else{
                $files = glob($duong_dan_day_du . '*');
                foreach ($files as $file) {
                    // Kiểm tra xem là file không phải là thư mục
                    if (is_file($file)) {
                        // Sử dụng hàm unlink để xóa file
                        if (unlink($file)) {
                            echo 'File ' . basename($file) . ' đã được xóa thành công.<br>';
                        } else {
                            echo 'Không thể xóa file ' . basename($file) . '.<br>';
                        }
                    }
                }
                for($i=0; $i< count($_FILES["imageTour"]["name"]); $i++){
                    move_uploaded_file($_FILES['imageTour']['tmp_name'][$i],$duong_dan_day_du.$_FILES["imageTour"]["name"][$i]);
                }
            }

            $_SESSION["Tour_add_error"] ="<div class=\"container container-fluid alert alert-success\" role=\"alert\">Sửa Thành Công</div>";
            header("Location:/../website/tour_view.php?TourName=");
        } else {
            $_SESSION["Tour_add_error"] ="<div class=\"container container-fluid alert alert-warning\" role=\"alert\">LỖI</div>";
            header("Location:/../website/tour_view.php?TourName=");
        }

    
?>