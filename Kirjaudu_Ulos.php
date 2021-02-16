<?php
 session_start();

  echo "Kirjautuminen ulos onnistui ";
  session_destroy();   //Session poistoa varten
  header("Location: Kirjaudu.php");
?>
