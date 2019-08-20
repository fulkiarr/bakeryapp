<?php
require_once("../../../config/auth.php");
require "../../../config/Connection.php";

        $conn = new Connection();
        $sql = "select * from transaction order by order_time desc";
        $result = mysqli_query($conn->getconnect(), $sql);
        $array = array();
        while($row = mysqli_fetch_assoc($result)){
            $array['order_number'] = $row['order_number'];
            $array['order_detail'] = $row['order_detail'];
            $array['total_price'] = $row['total_price'];
            $array['order_time'] = $row['order_time'];
            $array['status'] = $row['status'];
            $json[] = $array;
        }
        $encode = json_encode($json);
        
        if($json == "")
        echo "[]";
        else
        echo $encode;