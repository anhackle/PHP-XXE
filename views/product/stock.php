<?php
    include_once '../../includes/dbh.inc.php';

    libxml_disable_entity_loader(true);
    $xmlfile = file_get_contents('php://input');
    $dom = new DOMDocument();
    $dom->loadXML($xmlfile);
    $o = simplexml_import_dom($dom);
    $productId = (int)$o->productId;
    $storeId = (int)$o->storeId;
    libxml_clear_errors();
    if ($productId > 20 || $productId < 1){
        echo "Invalid product ".$o->productId;
    }
    else {
        $sql = "select * from xxe.stocks where product_id=".$productId." and stock_id=".$storeId.";";
        $result = mysqli_query($conn, $sql);
        $resultsCheck = mysqli_num_rows($result);
        if ($resultsCheck > 0){
            $row = mysqli_fetch_array($result);
            echo $row[3];
        }
    }
?>