<?php  
set_error_handler("anyError", E_ALL);

$error="Varaus suoritettu";

$initials=parse_ini_file(".ht_db_inifile.ini");
$database=$initials["databasename"];
$user=$initials["username"];
$passwd=$initials["password"];

 



 
    $nimi=$_POST["nimi"];
    $email=$_POST["email"];
    $maara=$_POST["maara"];
    $pvm=$_POST["pvm"];
    $lisatiedot=$_POST["lisatiedot"];


if (!isset($nimi) || !isset($email) || !isset($maara) || !isset($pvm) || !isset($lisatiedot) || empty($nimi) || empty($email) || empty($maara)|| empty($pvm)|| empty($lisatiedot)){
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
$sql="insert into ryhmä5_varaukset(nimi, email, maara, pvm, lisatiedot) values(?,?,?,?,?)";
$stmt=mysqli_prepare($yhteys, $sql);
if (!$stmt){
    $error="SQL-lauseen valmistelu epäonnistui";
    print $error;
    return;
}
$ok=mysqli_stmt_bind_param($stmt, "ssiss", $nimi, $email, $maara, $pvm, $lisatiedot);
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