<?php
Class Errors {
    function checkConnection()
    {
        $DBobj = new Connection();
        return $DBobj->getconnect();
    }
}
?>
This is 404