<?php
  session_start();
  require_once "connect.php";

  $connection = @new mysqli($host,$db_user,$db_password,$db_name);

  $id_opt =$_POST['idopt'];
  if($connection->connect_errno!=0)
  {
    echo "ERROR".$connection->connect_errno;
  }
  else{
    $qsql = "SELECT tool_name FROM tools NATURAL JOIN relationOperationTools WHERE id_opt = $id_opt";
    $isql = "SELECT 1 FROM list ";
    $result = @$connection->query($qsql);
    $check = @$connection->query($isql);

    if($check == null){
    $creatSql = "CREATE TABLE list
                (id int NOT NULL AUTO_INCREMENT,
                tool_name varchar(50),
                PRIMARY KEY (id))";
    $creatSql = @$connection->query($creatSql);
    }
    $numOfResp = $result->num_rows;
    for ($i=0; $i <$numOfResp ; $i++) {
      if($numOfResp>0)
      {
        $rows = $result ->fetch_assoc();
        foreach ($rows as $row) {
          $insertSql = "INSERT INTO list (tool_name) VALUE ('$row')";
          @$connection->query($insertSql);
        }
      }
    }
    $result->free_result();
    $connection->close();
    header("Location: operationtype.php");
  }
 ?>
