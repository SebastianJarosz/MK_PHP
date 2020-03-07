<?php
session_start();
require_once 'connect.php';

$connection = @new mysqli($host,$db_user,$db_password,$db_name);

if ($connection->connect_errno!=0)
  {
    echo "ERROR".$connection->connect_errno;
  }
else
  {
    $qsql = "SELECT op_name FROM operations";
    $result = @$connection->query($qsql);
    $numOfUser=$result->num_rows;
    $_SESSION['numOfOp']=$numOfUser;
    echo $numOfUser;
    for ($i=0; $i <$numOfUser ; $i++){
      if($numOfUser>0)
      {
        $rows = $result->fetch_assoc();
        foreach ($rows as $row ) {
                  $_SESSION['operation'.$i] = $row;
        }
      }
      else {
        header('Location: index.php');
      }
    }
    $result->free_result();
    header('Location: operation.php');
    $connection->close();
  }
 ?>
