<?php
  include '../html/header.html';
  session_start();
?>
<h2>Wybierz operacje</h2>
<hr></br>
<?php
  echo '<div class="row">';
  $leng=$_SESSION['numOfOp'];
  echo '<div class="row row-cols-1 row-cols-md-3">';
  for ($i=0; $i < $leng ; $i++) {
    if ($i%3==0){
      echo'</br>';
    }
      echo'<div class="col mb-4">
    <div class="card">
      <div class="card-body">
        <h3 class="card-title">'.ucfirst($_SESSION['operation'.$i]).'</h3>
        <hr>
        <form action="getOperationType.php" method="post">
          ';
          $op = $_SESSION['operation'.$i];
          echo'
          <button type="submit" class="btn btn-outline-success" name="op" value="'.$op.'">Wybierz</button>
        </form>
        </div>
    </div>
  </div>
  ';
  }
  echo '</div>';
 ?>
 <?php
      include '../html/footer.html';
  ?>
