<?php
session_start();
require_once 'connect.php';
$op_name =$_POST['op'];

$connection = @new mysqli($host,$db_user,$db_password,$db_name);

if ($connection->connect_errno!=0)
  {
    echo "ERROR".$connection->connect_errno;
  }
else
  {
    $qsql = "SELECT id_op FROM operations WHERE op_name ='$op_name'";

    $result = @$connection->query($qsql);
    $numOfUser = $result->num_rows;
    $_SESSION['numOfEntry'] = $numOfUser;

    for ($i=0; $i <$numOfUser ; $i++){
      if($numOfUser>0)
      {
        $rows = $result->fetch_assoc();
        foreach ($rows as $row ) {
                $id = $row;
        }
      }
      else {
        header('Location: index.php');
      }
      $result->free_result();
      $qsql = "SELECT opt_name FROM operationtyps WHERE id_op =$id";
      $result = @$connection->query($qsql);
      $numOfUser = $result->num_rows;
      $_SESSION['numOfEntry'] = $numOfUser;
      for ($i=0; $i <$numOfUser ; $i++){
        if($numOfUser>0)
        {
          $rows = $result->fetch_assoc();
          foreach ($rows as $row ) {
            $_SESSION['opt'.$i] = $row;
          }
        }
        else {
          header('Location: index.php');
        }

    }
    $qsql = "SELECT id_opt FROM operationtyps WHERE id_op =$id";
    $result = @$connection->query($qsql);
    $numOfUser = $result->num_rows;
    $_SESSION['numOfEntry'] = $numOfUser;
    for ($i=0; $i <$numOfUser ; $i++){
      if($numOfUser>0)
      {
        $rows = $result->fetch_assoc();
        foreach ($rows as $row ) {
          $_SESSION['idopt'.$i] = $row;
        }
      }
      else {
        header('Location: index.php');
      }

  }
    $result->free_result();
    header('Location: operationtype.php');
    $connection->close();
  }
}
?>
