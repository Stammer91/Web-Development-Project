<?php  session_start(); ?>  // session starts with the help of this function 

<?php

if(isset($_SESSION['use']))   // Checking whether the session is already there or not if 
                              // true then header redirect it to the home page directly 
 {
    header("Location:Käyttäjä.php"); 
 }
else
{
    include 'Kirjautuminen.html';
}

if(isset($_POST['Kirjaudu']))   // it checks whether the user clicked login button or not 
{
     $user = $_POST['Käyttäjä'];
     $pass = $_POST['SalasanaTru'];

    if(isset($_POST["Käyttäjä"]) && isset($_POST["SalasanaTru"])){
    $file = fopen('Käyttäjät.txt', 'r');
    $good=false;
    while(!feof($file)){
        $line = fgets($file);
        $array = explode(";",$line);
	if(trim($array[0]) == $_POST['Käyttäjä'] && trim($array[1]) == $_POST['SalasanaTru']){
            $good=true;
            break;
        }
    }

    if($good){
	$_SESSION['use'] = $user;
        echo '<script type="text/javascript"> window.open("Käyttäjä.php","_self");</script>';            //  On Successful Login redirects to home.php
    }else{
        echo "invalid UserName or Password";
    }
    fclose($file);
    }
    else{
        include 'Kirjautuminen.html';
    }

}
?>