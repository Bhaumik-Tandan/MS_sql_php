<?php
include 'print_table.php';

class join_hash extends Data_table
{

function __construct($table_name, $name, $heading,$fields=array("*"),$key,$value)
  {
    parent::__construct($table_name, $name, $heading,$fields);
    $this->key=$key;
    $this->value=$value;
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
    $this->make_hash();
    $this->print_hash();
    echo "</table></center>";
  }

  function make_hash()
  {
    $this->map=array();

    while ($row = sqlsrv_fetch_array($this->stmt, SQLSRV_FETCH_ASSOC)) 
    {
        if(empty($this->map[$row[$this->key]]))
        $this->map[$row[$this->key]]=array();

        array_push($this->map[$row[$this->key]],$row[$this->value]);
    }
  }

  function print_hash()
  {
    foreach ($this->map as  $f => $r) 
    {
        $len=count($r);

         echo "<tr>"."<td rowspan='$len'>".$f."</td>"."<td>".$r[0]."</td>"."</tr>";

         for($x=1;$x<$len;$x++)
         echo "<tr><td>".$r[$x]."</td></tr>";

    }
  }
}
?>