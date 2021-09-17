<?php
$connectionInfo = array("UID" => "abc", "pwd" => "azure@123", "Database" => "Inventory_Management", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:da-1.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);
// print_r(sqlsrv_fetch_array(sqlsrv_query($conn, "select * from customer"),SQLSRV_FETCH_ASSOC)); 
$stmt=sqlsrv_query($conn, "select * from customer");
while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
    echo $row["s_id"]."<br>";
}
?>
