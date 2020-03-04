<?php
//
  session_start();
  require_once 'connect.php';

  $connection = @new mysqli($host,$db_user,$db_password,$db_name);

  if ($connection->connect_errno!=0)
    {
      echo "ERROR".$connection->connect_errno;
    }
  else
    {

      $user = $_POST['login'];
      $pass = $_POST['password'];

      $user = htmlentities($user, ENT_QUOTES,"UTF-8");
      $pass = htmlentities($pass, ENT_QUOTES,"UTF-8");

      if($result = @$connection->query(sprintf("SELECT * FROM uzytkownicy WHERE
         user = '%s' AND pass = '%s'", mysqli_real_escape_string($connection,$user),
          mysqli_real_escape_string($connection,$pass))))
      {
          $numOfUser=$result->num_rows;
          if($numOfUser>0)
            {

              $row = $result->fetch_assoc();
              $_SESSION['zalogowany']= true;
              $_SESSION['id']=$row['id'];
              $_SESSION['user'] = $row['user'];
              $_SESSION['drewno'] = $row['drewno'];
              $_SESSION['kamien'] = $row['kamien'];
              $_SESSION['zboze'] = $row['zboze'];
              $_SESSION['email'] = $row['email'];

              if(isset($_SESSION['fail']))
              {
                unset($_SESSION['fail']);
              }
              $result->free_result();
              header('Location: account.php');
            }
          else
            {
              $_SESSION['fail']='<span style="color: red">Blad nieprawidowy
               login lub haslo</span>';
              header('Location: log_in.php');
            }
        }
      $connection->close();
    }
 ?>
