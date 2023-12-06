<?php
    require_once("connection.php"); // ket noi CSDL
    session_start();
    $TourID = $_GET["TourID"];
        $sql = "delete from comment WHERE TourID = '$TourID'";
        $conn->query($sql) or die($conn->error);
        if($conn->error==""){
            $sql1 = "delete from Invoice WHERE TourID = '$TourID'";
            $conn->query($sql1);

            $sql2 = "delete from tour WHERE TourID = '$TourID'";
            $conn->query($sql2);
            if($conn->error==""){
                $_SESSION["Tour_add_error"] ="<div class=\"container container-fluid alert alert-success\" role=\"alert\">Xóa Thành Công</div>";
                header("Location:/../website/tour_view.php?TourName=");
            }else {
                $_SESSION["Tour_add_error"] ="<div class=\"container container-fluid alert alert-warning\" role=\"alert\">LỖI</div>";
                header("Location:/../website/tour_view.php?TourName=");
            }
        }

    
?>