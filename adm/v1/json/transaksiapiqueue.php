<?php
require_once("../../../config/auth.php");
require "../../../config/Connection.php";

        $conn = new Connection();
        $sql = "select * from transaction where status = 0 and Date(order_time) = '".date('Y-m-d')."'";
        $result = mysqli_query($conn->getconnect(), $sql);
        $array = array();
        while($row = mysqli_fetch_assoc($result)){
            $array['order_number'] = $row['order_number'];
            $array['order_detail'] = $row['order_detail'];
            $array['operate'] = "";

            $json[] = $array;
        }
        $encode = json_encode($json);
        
        if($json == "")
        echo "[]";
        else
        echo $encode;