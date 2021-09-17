<?php
include '../join_hash.php';
$last="contain c join product p on p.pid=c.pid inner join store s on c.s_id=s.s_id order by s.sname";
$shop = new join_hash($last,"Stock", array("Shop Name","Product Name"),$fields=array("s.sname","p.pname"),"sname","pname");
$shop->print_table();
?>