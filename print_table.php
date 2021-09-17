<style type="text/css">
    table, th, td {
  border: 1px solid black;
  text-align: center;
}
    </style>

<?php
include 'database.php';

function print_table($table_name,$name,$heading)
{
  if(empty($GLOBALS['conn']))
  connect();
$stmt=query("select * from $table_name");
echo "<center><h1>$name</h1><table>";

print_heading($heading);
print_rows($stmt);

echo "</table></center>";
}
function print_rows($stmt)
{
  while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
  echo "<tr>";
  foreach ($row as $r) 
    echo "<td>".$r."</td>";
  echo "</tr>";
  }
}
function print_heading($heading)
{
  echo "<tr>";
  foreach ($heading as $h) 
    echo "<th>$h</th>";  
  echo "</tr>";
}
?>
