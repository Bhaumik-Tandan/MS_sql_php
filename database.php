<?php
function connect()
{
    $connectionInfo = array("UID" => "abc", "pwd" => "azure@123", "Database" => "Inventory_Management", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
    $serverName = "tcp:da-1.database.windows.net,1433";
    $GLOBALS['conn'] = sqlsrv_connect($serverName, $connectionInfo);
}

function query($s)
{
    return sqlsrv_query($GLOBALS['conn'],$s);
}
?>