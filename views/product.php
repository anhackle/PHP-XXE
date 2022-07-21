<?php
    include_once '../includes/dbh.inc.php'
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="../css/productstyle.css" rel="stylesheet">
    <title>XXE</title>
</head>

<body>
    <div theme="ecommerce">
        <section class="maincontainer">
            <div class="container is-page">
                <section class="product">
                    <?php
                        $sql = "select * from xxe.products where id=".$_GET['productID'].";";
                        $result = mysqli_query($conn, $sql);
                        $resultsCheck = mysqli_num_rows($result);
                        if ($resultsCheck > 0){
                            $row = mysqli_fetch_array($result);
                            echo "<img src=\"../".$row[1]."\">"."\n";
                            echo "<img src=\"../".$row[2]."\">"."\n";
                        }
                    ?>
                    <form id="stockCheckForm" action="product/stock.php" method="POST">
                        <?php
                            echo "<input required=\"\" type=\"hidden\" name=\"productId\" value=\"".$_GET['productID']."\">"."\n"
                        ?>
                        <select name="storeId">
                            <option value="1">London</option>
                            <option value="2">Paris</option>
                            <option value="3">Milan</option>
                        </select>
                        <button type="submit" class="button">Check stock</button>
                    </form>
                    <span id="stockCheckResult"></span>
                    <script
                        src="../js/stockCheck.js">
                    </script>
                    <script
                        src="">
                    </script>
                    <div class="is-linkback">
                        <a href="home.php">Return to list</a>
                    </div>
                </section>
            </div>
        </section>
    </div>


</body>

</html>