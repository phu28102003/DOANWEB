<?php 
   print_r($_POST);
   die();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Total Price</title>
</head>
<body>

<div class="row mt-2 pt-4 pb-4 border border-start-0 border-end-0">
    <p class="col-sm-4">Người Lớn</p> 
    <?php echo "<h5 class=\"text-warning col-sm-4\">x$TourPriceAd</h5>" ?>
    <input class="form-control mt-2 col-sm-4" style="width:110px" name="NumOfAd" type="number" min="0" onchange="updateTotalPrice()">
</div>

<div class="row mt-2 pt-4 pb-4 border border-start-0 border-end-0">
    <p class="col-sm-4">Trẻ Em</p> 
    <?php echo "<h5 class=\"text-warning col-sm-4\">x$TourPriceCh</h5>" ?>
    <input class="form-control mt-2 col-sm-4" style="width:110px" name="NumOfCh" type="number" min="0" onchange="updateTotalPrice()">
</div>

<div class="row mt-2 pt-4">
    <h5 class="col-sm-6">Tổng cộng:
        <?php echo "<h5 class=\"text-warning col-sm-6\" id=\"TotalPrice\"> </h5>" ?>
    </h5>
</div>

<script>
    
</script>

</body>
</html>
