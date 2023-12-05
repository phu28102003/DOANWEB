<?php 
    require_once ('connection.php');
    $TourName =null;
    $TourDesc =null;
    $TourImage =null;
    $TourPriceAd =null;
    $TourPriceCh =null;
    $TourStartDate =null;
    $TourDayNum =null;
    $TourNightNum =null;
    $TourItinerary =null;
    $TourTransportation =null;
    $TourDeparture =null;
    $TourMaxPeople =null;
    $TourStatus =null;
    $CateID =null;
    $CateName =null;
    $CateStatus =null;
    $sql = "SELECT * FROM tour as t join category as c on t.CateID = c.CateID WHERE TourId =".$_GET["TourID"];
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $TourName = $row['TourName'];
        $TourDesc = $row['TourDesc'];
        $TourImage = $row['TourImage'];
        $TourPriceAd = $row['TourPriceAd'];
        $TourPriceCh = $row['TourPriceCh'];
        $TourStartDate = $row['TourStartDate'];
        $TourDayNum = $row['TourDayNum'];
        $TourNightNum = $row['TourNightNum'];
        $TourItinerary = $row['TourItinerary'];
        $TourTransportation = $row['TourTransportation'];
        $TourDeparture = $row['TourDeparture'];
        $TourMaxPeople = $row['TourMaxPeople'];
        $TourStatus = $row['TourStatus'];
        $CateID = $row['CateID'];
        $CateName = $row['CateName'];
        $CateStatus = $row['CateStatus'];
    }
    
        $sql1 = "SELECT TourStartDate FROM tour WHERE TourName = \"$TourName\" and month(TourStartDate) = month(curdate()) limit 3";
                    $result1 = $conn->query($sql1);
                    $DateTours = array();
                    if ($result1->num_rows > 0) {
                        While($row1 = $result1->fetch_assoc()){
                            $dateTime = new DateTime($row1["TourStartDate"]);
                            $formattedDate = $dateTime->format('d/m');
                            $DateTours[] = $formattedDate;
                        }
                    }
                    

    
?>