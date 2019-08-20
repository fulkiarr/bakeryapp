<?php

Class Connection
{
    function getconnect()
    {
        $con = mysqli_connect("127.0.0.1","root","belakalaka99","bakery_app");

        return $con;
    }
}
?>