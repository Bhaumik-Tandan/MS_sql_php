<style type="text/css">
  table,
  th,
  td {
    border: 1px solid black;
    text-align: center;
  }
</style>

<?php
use parallel\Events\Event\Type;
include 'database.php';
class Data_table extends Database
{
  protected $table_name;
  protected $name;
  protected $heading;
  function __construct($table_name, $name, $heading,$fields=array("*"))
  {
    $this->table_name = $table_name;
    $this->name = $name;
    $this->heading = $heading;
    $this->fields = $fields;
  }

  function run_query()
  {
    $this->connect();
    $this->query_string = "select ".implode(",",$this->fields)." from $this->table_name";
    $this->query();
  }

  function print_table()
  {
    $this->run_query();

    echo "<center><h1>$this->name</h1>";
    
    if(!$this->stmt)
    {
      echo "<br><br><br><h4>Data not available</h4>";
      return;
    }
    echo "<table>";
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
      if(gettype($r)=="object")
      echo "<td>".$r->format('d-m-y')."</td>";
      else if ($r)
          echo "<td>" . $r . "</td>";
        else
          echo "<td>" . "Not Available" . "</td>";
      echo "</tr>";
    }
  }
}

?>