<?php
 session_start();

  echo "Kirjautuminen ulos onnistui ";
  session_destroy();   // function that Destroys Session 
  header("Location: Kirjautuminen.php");
?>