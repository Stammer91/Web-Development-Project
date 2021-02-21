<?php
set_error_handler("anyError", E_ALL);

reguire_once 'Käyttäjä.php';
 
$initials=parse_ini_file(".ht_db_inifile.ini");
$database=$initials["databasename"];
$user=$initials["username"];
$passwd=$initials["password"];

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
$id = '';
if(!empty($_GET['id'])){
   $id = $GET['id'];
}
$sql = "DELETE FROM ryhmä5_varaukset WHERE id = $id" ;
            mysql_select_db('trtkp20a3');
            $retval = mysql_query( $sql, $conn );
            
            if(! $retval ) {
               die('Could not delete data: ' . mysql_error());
            }
header(string:"Location: /Käyttäjä.php");
die;

echo "Deleted data successfully\n";
            
mysql_close($conn);
?>