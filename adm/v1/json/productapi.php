<?php
require_once("../../../config/auth.php");
require "../../../config/Connection.php";

        $conn = new Connection();
        $sql = "select product.id, product.product_name,product.product_price, product.category_id,product.product_detail, categories.category_name from product left join categories on product.category_id = categories.id";
        $result = mysqli_query($conn->getconnect(), $sql);
        $array = array();
        while($row = mysqli_fetch_assoc($result)){
            $array['id'] = $row['id'];
            $array['product_name'] = $row['product_name'];
            $array['category_name'] = $row['category_name'];
            $array['product_price'] = $row['product_price'];
            $array['product_detail'] = $row['product_detail'];
            $array['category_id'] = $row['category_id'];
            $array['operate'] = "";

            $json[] = $array;
        }
        $encode = json_encode($json);
        
        if($json == "")
        echo "[]";
        else
        echo $encode;