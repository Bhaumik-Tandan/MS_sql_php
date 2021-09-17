<style type="text/css">
  table,
  th,
  td {
    border: 1px solid black;
    text-align: center;
  }
</style>

<?php
include 'database.php';
class Data_table extends Database
{
  private $table_name;
  private $name;
  private $heading;
  function __construct($table_name, $name, $heading)
  {
    $this->table_name = $table_name;
    $this->name = $name;
    $this->heading = $heading;
  }
  function print_table()
  {
    $this->connect();
    $this->query_string="select * from $this->table_name";
    $this->query();

    echo "<center><h1>$this->name</h1><table>";

    $this->print_heading();
    $this->print_rows();

    echo "</table></center>";
  }
  function print_heading()
  {
    echo "<tr>";
    foreach ($this->heading as $h)
      echo "<th>$h</th>";
    echo "</tr>";
  }
  
  function print_rows()
  {
    while ($row = sqlsrv_fetch_array($this->stmt, SQLSRV_FETCH_ASSOC)) {
      echo "<tr>";
      foreach ($row as $r)
        echo "<td>" . $r . "</td>";
      echo "</tr>";
    }
  }
}

?>