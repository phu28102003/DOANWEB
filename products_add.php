<?php
    session_start();
    if(!isset($_SESSION["products_add_error"])){
        $_SESSION["products_add_error"] ="";
    }
?>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h1 align=center>Add new product</h1>
        <center>
            <font color=red>
                <?php echo $_SESSION["products_add_error"]?>
            </font>
        </center>
        <form action="products_add_action.php" method="POST">
            <table border="0" cellspacing=5 cellpadding=5 align="center">
                <tr>
                    <td>Product Name:</td>
                    <td><input type=text name="txtPname"></td>
                </tr>
                <tr>
                    <td>Product Description:</td>
                    <td><textarea cols=20 rows=6 name=taPdesc></textarea></td>
                </tr>
                <tr>
                    <td>Product Image:</td>
                    <td><input type="txt" name="txtPimage"></td>
                </tr>
                <tr>
                    <td>Product Order:</td>
                    <td><input type="txt" name="txtPorder"></td>
                </tr>
                <tr>
                    <td>Product Insertdate:</td>
                    <td><input type="date" name="datePinsertdate"></td>
                </tr>
                <tr>
                    <td>Product Updatedate:</td>
                    <td><input type="date" name="datePupdatedate"></td>
                </tr>
                
                <tr>
                    <td>Product Price:</td>
                    <td><input type="text" name="txtPprice"></td>
                </tr>
                <tr>
                    <td>Product Quantity:</td>
                    <td><input type="text" name="txtPquantity"></td>
                </tr>
                <tr>
                    <td>Product Cid:</td>
                    <td><input type="text" name="txtPcid"></td>
                </tr>

                <tr>
                    <td>Product Status:</td>
                    <td>
                        <input type="radio" name="rdPstatus" value="1" checked>Hoat dong
                        <input type="radio" name="rdPstatus" value="0">Khong hoat dong
                    </td>
                </tr>
                <tr>
                    <td align="right"><input type="submit" value="Gui di"></td>
                    <td><input type="reset" value="Huy bo"></td>
                </tr>
            </table>
        </form>
    </body>
</html>
<?php
    $_SESSION["products_add_error"] = "";  
?>



