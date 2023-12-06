<?php
    require_once("connection.php"); // ket noi CSDL
    session_start();
    $TourID = $_GET["TourID"];
    $sql2 = "delete from invoice WHERE TourID = '$TourID'";
    $conn->query($sql2);
    if($conn->error==""){
        $_SESSION["TourInvoice_add_error"] ="<div class=\"container container-fluid alert alert-success\" role=\"alert\">Xóa Thành Công</div>";
        header("Location:/../website/tourInvoice_view.php?TourName=");
    }else {
        $_SESSION["TourInvoice_add_error"] ="<div class=\"container container-fluid alert alert-warning\" role=\"alert\">LỖI</div>";
        header("Location:/../website/tourInvoice_view.php?TourName=");
    }

    
?>