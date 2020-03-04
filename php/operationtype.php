$qsql = "SELECT id_op FROM operations WHERE op_name = '$op_name'";
$result = @$connection->query($qsql);
$numOfUser = $result->num_rows;
$_SESSION['numOfEntry']=$numOfUser;
echo $numOfUser;
for ($i=0; $i <$numOfUser ; $i++){
  if($numOfUser>0)
  {
    $rows = $result->fetch_assoc();
    foreach ($rows as $row ) {
            echo  $_SESSION['operation'.$i] = $row;
    }
  }
  else {
    echo 'LOL';
  }
