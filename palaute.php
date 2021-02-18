<?php
set_error_handler("anyError", E_ALL);

 

$error="Lähetetty!";

$initials=parse_ini_file(".ht_db_inifile.ini");
$database=$initials["databasename"];
$user=$initials["username"];
$passwd=$initials["password"];

 

$nimi=$_POST["nimi"];
$email=$_POST["email"];
$viesti=$_POST["viesti"];


if (!isset($nimi) || !isset($email) || !isset($viesti) || empty($nimi) || empty($email) || empty($viesti)){
    $error="Ei sopivaa dataa";
    print $error;
    return;
}

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
$sql="insert into ryhma5_palautteet(nimi, email, viesti) values(?,?,?)";
$stmt=mysqli_prepare($yhteys, $sql);
if (!$stmt){
    $error="SQL-lauseen valmistelu epäonnistui";
    print $error;
    return;
}
$ok=mysqli_stmt_bind_param($stmt, "sss", $nimi, $email, $viesti);
if (!$ok){
    $error="Tietojen liittäminen sql-lauseeseen epäonnistui";
    print $error;
    return;
}
$ok=mysqli_stmt_execute($stmt);
if (!$ok){
    $error="Tallennus epäonnistui";
    print $error;
    return;
}
print $error;
?>

 

<?php
function anyError($level, $message){
    print "ERROR: ".$message."<br>";
}
?> 