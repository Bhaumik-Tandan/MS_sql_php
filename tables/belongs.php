<?php
include '../join_hash.php';
$last="belongs b join raw_material r on b.rname=r.rname inner join factory f on f.fid=b.fid order by f.fname;";
$manufacture = new join_hash($last,"Manufactures", array("actory Name","Raw Material"),$fields=array("r.rname","f.fname"),"fname","rname");
$manufacture->print_table();
?>