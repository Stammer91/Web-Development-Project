<?php  session_start(); ?> 

<?php

if(isset($_SESSION['use']))   // Tarkistaa onko sessio
                              // Jos true ohjataan käyttäjä sivulle
 {
    header("Location:Käyttäjä.php"); 
 }
else
{
    include 'Kirjaudu.html';
}

if(isset($_POST['kirjaudu'])) //Tarkistaa painettiinko kirjaudu nappia
{
     $user = $_POST['Ktunnus'];
     $pass = $_POST['Sala'];

    if(isset($_POST["Ktunnus"]) && isset($_POST["Sala"])){
    $file = fopen('.htKäyttäjä.txt', 'r');
    $good=false;
    while(!feof($file)){
        $line = fgets($file);
        $array = explode(";",$line);
	if(trim($array[0]) == $_POST['Ktunnus'] && trim($array[1]) == $_POST['Sala']){
            $good=true;
            break;
        }
    }

    if($good){
	$_SESSION['use'] = $user;
        echo '<script type="text/javascript"> window.open("Käyttäjä.php","_self");</script>';    //Kirjautuminen onnistui niin käyttäjä sivulle
    }else{
        echo "Väärä Käyttäjätunnus tai Salasana";
    }
    fclose($file);
    }
    else{
        include 'Kirjaudu.html';
    }

}
?>