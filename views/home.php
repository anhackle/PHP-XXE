<?php
    include_once '../includes/dbh.inc.php'
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="../css/homestyle.css" rel="stylesheet" type="text/css">
    <title>XXE</title>
</head>
<body>
    <div theme="ecommerce">
        <section class="maincontainer">
            <div class="container">
                <header class="navigation-header">
                    <section class="top-links">
                    </section>
                </header>
                <section class="ecoms-pageheader">
                    <img src="../images/banner.jpg">
                </section>
                <section class="container-list-tiles">
                    <?php 
                        $sql = "select * from xxe.products;";
                        $result = mysqli_query($conn, $sql);
                        $resultsCheck = mysqli_num_rows($result);
                        if ($resultsCheck > 0){
                            $count = 1;
                            while ($row = mysqli_fetch_array($result)){
                                echo "<div>"."\n";
                                echo "<img src=\"../".$row[1]."\">"."\n";
                                echo "<img src=\"../".$row[2]."\">"."\n";
                                echo "<a class=\"button\" href=\"product.php?productID=".$count."\"".">Viewdetails</a>"."\n";
                                echo "</div>"."\n";
                                ++$count;
                            }
                        } 
                    ?>
                </section>
            </div>
        </section>
    </div>
</body>

</html>