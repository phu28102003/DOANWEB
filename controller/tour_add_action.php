<?php
    require_once("connection.php"); // ket noi CSDL
    session_start();
    $sql = "select MAX(TourID) from tour ";
    $result = $conn->query($sql);
    if($result->num_rows>0){
        $row = $result->fetch_assoc();
        //print_r($row);
        $NewID = $row["MAX(TourID)"] + 1; 
    }
    $imagesTour = array();
    foreach ($_FILES["imageTour"]["name"] as $name) {
        array_push($imagesTour, "/../img/tour/".$NewID."/".$name);
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

        $sql = "INSERT INTO Tour (TourName, TourDesc, TourImage, TourPriceAd, TourPriceCh, TourStartDate, TourDayNum, TourNightNum, TourItinerary, TourTransportation, TourDeparture, TourMaxPeople, TourStatus, CateID)
        VALUES ('$TourName','$TourDesc', '$imagesTour','$TourPriceAd','$TourPriceCh','$dateStart','$TourDayNum', '$TourNightNum','$TourItinerary' ,'$TourTransportation','$TourDeparture','$TourMaxPeople','$TourStatus','$CateID')";
        $conn->query($sql) or die($conn->error);
        
        if($conn->error==""){
            $duong_dan_day_du = __DIR__."/../img/tour/$NewID"."/";
            // Tạo thư mục mới
            if (!file_exists($duong_dan_day_du)) {
                mkdir($duong_dan_day_du, 0777, true); // 0777 là quyền truy cập, true để tạo cả các thư mục cha nếu chưa tồn tại
                foreach ($_FILES["imageTour"]["name"] as $imagesTour) {
                    
                }
                for($i=0; $i< count($_FILES["imageTour"]["name"]); $i++){
                    move_uploaded_file($_FILES['imageTour']['tmp_name'][$i],$duong_dan_day_du.$_FILES["imageTour"]["name"][$i]);
                }
            }

            $_SESSION["Tour_add_error"] ="<div class=\"container container-fluid alert alert-success\" role=\"alert\">Thêm Thành Công</div>";
            header("Location:/../website/tour_view.php");
        } else {
            $_SESSION["Tour_add_error"] ="<div class=\"container container-fluid alert alert-warning\" role=\"alert\">Lỗi Khi Thêm</div>";
            header("Location:/../website/tour_add.php");
        }

    
?>