<?php   session_start();  ?>

<html>
  <head>
       <title>Käyttäjä | Ravintola Hämpton Diner</title>
       <link rel="Stylesheet" href="Css/Style.Css">
  </head>
  <body>
  <header>
    <div class="container">
      <img class="logo" src="Images/Logo 1.png">
      <nav>
        <ul>
          <li><a href="http://127.0.0.1/Web-Development-Project/Kirjaudu_Ulos.php">Kirjaudu Ulos</a></li>
        </ul>
      </nav>
    </div>
  </header>
<?php
      if(!isset($_SESSION['use']))
       {
           header("Location:Kirjaudu.php");  
       }

          echo $_SESSION['use'];

          echo " Kirjautuminen onnistui"; 
?>
</body>
</html>