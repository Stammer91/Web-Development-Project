<?php   session_start();  ?>

<html>
  <head>
       <title> Home </title>
  </head>
  <body>
<?php
      if(!isset($_SESSION['use'])) // If session is not set then redirect to Login Page
       {
           header("Location:Kirjautuminen.php");  
       }

          echo $_SESSION['use'];

          echo "Login Success";

          echo "<a href='Kirjaudu_Ulos.php'> Logout</a> "; 
?>
</body>
</html>