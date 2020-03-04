<?php
  include '../html/header.html';
  session_start();
?>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
<a class="navbar-brand" href="#">Fixed navbar</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarCollapse">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
      <a class="nav-link" href="getOperation.php">Home <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
      <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
    </li>
  </ul>
  <form class="form-inline mt-2 mt-md-0">
    <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
</div>
</nav>
</br> </br>
</br> </br>
<h2>Wybierz operacje</h2>
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
        <h3 class="card-title">'.$_SESSION['operation'.$i].'</h3>
        <hr>
        <form action="getOperationType.php" method="post">
          ';
          $op = $_SESSION['operation'.$i];
          echo'
          <button type="submit" name="op" value="'.$op.'">Wybierz</button>
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
