<?php
session_start();
require_once 'connect.php';

$connection = @new mysqli($host, $db_user, $db_password, $db_name);

if($connection->connect_errno!=0)
  {
    echo "ERROR: ".$connection->connect_errno;
  }
else {
  $query = "SELECT DISTINCT tool_name FROM list ORDER BY tool_name";
  $result = $connection->query($query);
  if($result!=null)
  {
    $_SESSION['flagList']=1;
    $numOfItems = $result->num_rows;
    $_SESSION['numOfItems'] = $numOfItems;
    for ($i=0; $i<$numOfItems ; $i++) {
      if($numOfItems>0)
      {
        $rows = $result->fetch_assoc();
        foreach ($rows as $row) {
          $_SESSION['item'.$i]=$row;
        }
      }
      else {
        header('Location: index.php');
      }
    }
    $result->free_result();
  }
  else {
    $_SESSION['flagList']=0;
  }
  header('Location: list.php');
  $connection->close();
}
 ?>
