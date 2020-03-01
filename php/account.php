<?php
  session_start();
  if(isset($_SESSION['zalogowany'])!=True)
  {
    header('Location: index.php');
  }
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      $user = $_SESSION['user'];
      echo 'Witaj,'.$user.'!'.'<a href="logout.php">  >>Log out<<</a>'.'</br>';
      echo 'Drewno:'.$_SESSION['drewno'].' szt. '.'</br>';
      echo 'Kamien: '.$_SESSION['kamien'].' szt.'.'</br>';
      echo 'Zboze: '.$_SESSION['zboze']." szt.".'</br>';
      echo $_SESSION['email'];
     ?>
  </body>
</html>
