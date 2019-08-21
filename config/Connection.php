<?php

Class Connection
{
    function getconnect()
    {
        $con = mysqli_connect("127.0.0.1","root","your_password","bakery_app");

        return $con;
    }
}
?>