<?php   session_start();  ?>

<html>
  <head>
       <title>KÃ¤yttÃ¤jÃ¤ | Ravintola HÃ¤mpton Diner</title>
       <link rel="Stylesheet" href="Css/Style.Css">
  </head>
  <body>
  <header>
    <div class="container">
      <img class="logo" src="Images/Logo 1.png">
      <nav>
        <ul>
          <li><a href="http://shell.hamk.fi/~oskari20104/Web-Development-Project/Kirjaudu_Ulos.php">Kirjaudu Ulos</a></li>
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

          echo " Kirjautuminen onnistui<br>";
?>

<?php
echo "<br>Varaukset";
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
print "<table border='1'>";
print "<tr><th>ID<th>Nimi<th>Email<th>Lukumaara<th>Pvm<th>Lisatiedot<th>Toimenpide<th>";
while ($rivi = mysqli_fetch_object($tulos)){
print "<tr><td>$rivi->id <td>$rivi->nimi <td>$rivi->email <td>$rivi->maara <td>$rivi->pvm <td>$rivi->lisatiedot <td><a href='Poista.php?id=<?php echo $tulos->id;?>'>Poista</a></td>";
print "</table>";
}
?>

<?php
echo "<br>Palautteet";

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
  print "<table border='1'>";
  print "<tr><th>ID<th>Nimi<th>Email<th>Viesti<th>Toimenpide<th>";

print "<tr><td>$rivi->id <td>$rivi->nimi <td>$rivi->email <td>$rivi->viesti <td><a href='Poista.php'>Poista</a></td>";
print "</table>";
}
?>
</body>
</html>