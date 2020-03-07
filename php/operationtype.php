<?php
  include '../html/header.html';
  session_start();
?>
<h2>Typ operacji</h2>
<hr></br>
<?php
  echo '<div class="row">';
  $leng=$_SESSION['numOfEntry'];
  echo '<div class="row row-cols-1 row-cols-md-3">';
  for ($i=0; $i < $leng ; $i++) {
    if ($i%3==0){
      echo'</br>';
    }
      echo'<div class="col mb-4">
    <div class="card">
      <div class="card-body">
        <h3 class="card-title">'.ucfirst($_SESSION['opt'.$i]).'</h3>
        <hr>
        <form action="addTool.php" method="post">
          ';
          $idopt = $_SESSION['idopt'.$i];
          echo'
          <button type="submit" class="btn btn-outline-success" name="idopt" value="'.$idopt.'">Wybierz</button>
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
