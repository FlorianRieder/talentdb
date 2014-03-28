<?php
error_reporting(E_ALL);
//Datenbank Verbindung
include ("db.php");

$ID = $_GET['ID'];
$Position = $_GET['Position'];
$Potential = $_GET['Potential'];
$Technik = $_GET['Technik'];
$Intelligenz = $_GET['Intelligenz'];
$Personlichkeit = $_GET['Personlichkeit'];
$Schnelligkeit = $_GET['Schnelligkeit'];
$Trainer = $_GET['Trainer'];

$format = "Y-m-d";
$Datum =  date ( $format);
	
	echo $Datum;
	echo "ID:".$ID."<br>";
	echo "Position:".$Position."<br>";
	echo "Potential:".$Potential."<br>";
	echo "Technik:".$Technik."<br>";
	echo "Intelligenz:".$Intelligenz."<br>";
	echo "Persönlichkeit:".$Personlichkeit."<br>";
	echo "Schnelligkeit:".$Schnelligkeit."<br>";
	echo "Trainer:".$Trainer."<br>";
	
	$abfrage = "INSERT INTO Bewertung (SpielerID, Datum, BewertetVon, 
										Position, Potential, Technik, Intelligenz, 
										Personlichkeit, Schnelligkeit) 
										
				VALUES ( 				$ID, '$Datum' , $Trainer, 
										'$Position', $Potential, $Technik, $Intelligenz, 
										$Personlichkeit, $Schnelligkeit)
				";
	
	$ergebnis = mysql_query($abfrage);
	if(!$ergebnis){
		die('Ungültige Abfrage'. mysql_error());
	}
?>
