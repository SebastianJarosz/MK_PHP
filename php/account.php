<?php
  session_start();
  if(isset($_SESSION['zalogowany'])!=True)
  {
    header('Location: log_in.php');
  }
  include '../html/header.html';

  $user = $_SESSION['user'];
  echo 'Witaj,'.$user.'!'.'<a href="logout.php">  >>Log out<<</a>'.'</br>';
  echo 'Drewno:'.$_SESSION['drewno'].' szt. '.'</br>';
  echo 'Kamien: '.$_SESSION['kamien'].' szt.'.'</br>';
  echo 'Zboze: '.$_SESSION['zboze']." szt.".'</br>';
  echo $_SESSION['email'];

  include '../html/footer.html';
  ?>
