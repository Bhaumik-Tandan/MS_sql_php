<?php
function make_class($name,$print,...$heading)
{
    include 'print_table.php';
    $warehouse = new Data_table($name,$print,$heading);
    $warehouse->print_table();
}
?>