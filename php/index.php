<?php
  session_start();

  if (isset($_SESSION['zalogowany']) && $_SESSION['zalogowany']==true)
    {
      header('Location: account.php');
      exit();
    }
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

  <h1>Zaloguj sie</h1>

    <form action="login.php" method="post">
      Login: </br>
      <input type="text" name="login"/>
      </br>
      Password: </br>
      <input type="password" name="password">
    </br>
      <input type="submit" value="Log in">
    </form>
    <?php
      if(isset($_SESSION['fail']))
      {
        echo $_SESSION['fail'];
      }
     ?>
  </body>
</html>
