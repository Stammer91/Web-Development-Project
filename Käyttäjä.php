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
//Varaukset
<?php
set_error_handler("anyError", E_ALL);

 
$initials=parse_ini_file(".ht_db_inifile.ini");
$database=$initials["databasename"];
$user=$initials["username"];
$passwd=$initials["password"];


$nimi=$_POST["tilaaja_nimi"];
$email=$_POST["tilaaja_mail"];
$maara=$_POST["tilaaja_maara"];
$pvm=$_POST["tilaaja_aika"];
$lisatiedot=$_POST["tilaaja_msg"];

$yhteys=mysqli_connect("localhost", $user, $passwd);

if (!$yhteys){
    $error="Yhteys tietokantapalvelimeen epäonnistui";
    print $error;
    return;
}
$ok=mysqli_select_db($yhteys, $database);
if (!$ok){
    $error="Tietokannan valinta epäonnistui";
    print $error;
    return;
}
$tulos=mysqli_query($yhteys, "select * from ryhmä5_varaukset");
while ($rivi = mysqli_fetch_object($tulos)){
  print "$rivi->id $rivi->nimi $rivi->email $rivi->maara $rivi->pvm $rivi->lisatiedot";
}
?>
//Palautteet
<?php
set_error_handler("anyError", E_ALL);

 
$initials=parse_ini_file(".ht_db_inifile.ini");
$database=$initials["databasename"];
$user=$initials["username"];
$passwd=$initials["password"];

$nimi=$_POST["nimi"];
$email=$_POST["email"];
$viesti=$_POST["viesti"];

$yhteys=mysqli_connect("localhost", $user, $passwd);

if (!$yhteys){
    $error="Yhteys tietokantapalvelimeen epäonnistui";
    print $error;
    return;
}
$ok=mysqli_select_db($yhteys, $database);
if (!$ok){
    $error="Tietokannan valinta epäonnistui";
    print $error;
    return;
}
$tulos=mysqli_query($yhteys, "select * from ryhma5_palautteet");
while ($rivi = mysqli_fetch_object($tulos)){
  print "$rivi->id $rivi->nimi $rivi->email $rivi->viesti";
}

?>
</body>
</html>