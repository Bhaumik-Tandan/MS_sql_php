<?php
include 'print_table.php';
$heading= array("Warehouse Id", "Address", "Phone Number");
$warehouse = new Data_table("warehouse","Warehouse",$heading);
$warehouse->print_table();
?>