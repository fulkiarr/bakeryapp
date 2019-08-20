<?php
require_once("../../../config/auth.php");
require "../../../config/Connection.php";

        $conn = new Connection();
        $sql = "select * from categories";
        $result = mysqli_query($conn->getconnect(), $sql);
        $array = array();
        while($row = mysqli_fetch_assoc($result)){
            $array['id'] = $row['id'];
            $array['category_name'] = $row['category_name'];
            $array['operate'] = "";

            $json[] = $array;
        }
        $encode = json_encode($json);
        
        if($json == "")
        echo "[]";
        else
        echo $encode;