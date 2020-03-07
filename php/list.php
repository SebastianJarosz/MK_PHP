<?php
  session_start();
  include '../html/header.html';

echo <<<TAB
 <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Narzedzia</th>
    </tr>
  </thead>
  <tbody>
TAB;
  if ($_SESSION['flagList']==1) {
    for ($i=0; $i < $_SESSION['numOfItems'] ; $i++) {
      $lp =$i+1;
      echo '<tr>
        <th scope="row">'.$lp.'</th>
        <td>'.$_SESSION['item'.$i].'</td>
      </tr>';
    }
  }
  else{
    echo '<tr>
      <th scope="row">1</th>
      <td>Brak narzedzi</td>
    </tr>';
  }
echo '</tbody>
</table>';
  include '../html/footer.html';
 ?>
