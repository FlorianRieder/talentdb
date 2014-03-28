<?php
error_reporting(E_ALL);
//Datenbank Verbindung
include ("db.php");

$ID = $_GET['ID'];
$Wertung =$_GET['Wertung'];
$Vorkomnis =$_GET['Vorkomnis'];
$Trainer = $_GET['Trainer'];

$format = "Y-m-d";
$Datum =  date ( $format);
	
	echo "ID:".$ID."<br>";
	echo "Trainer:".$Trainer."<br>";
	echo "Vorkomnis:".$Vorkomnis."<br>";
	echo "Wertung:".$Wertung."<br>";
	echo $Datum;
	$abfrage = "INSERT INTO Ereignisse (SpielerID, Datum, Wertung, Vorkomnis, GemeldetVon) 
										
				VALUES ( $ID, '$Datum', '$Wertung', '$Vorkomnis', $Trainer)";

	$ergebnis = mysql_query($abfrage);
	if(!$ergebnis){
		die('Ungültige Abfrage'. mysql_error());
	}
?>
