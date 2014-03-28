<?php
	include ("db.php");
	$abfrage=mysql_query("SELECT COUNT(*) FROM Spielerinformationen");
	
	$count = mysql_fetch_row($abfrage);
	
	$ID= 1;

while ($ID < $count[0] +1 ){

//Spieler Durchschnitt aktualisieren
$update = "UPDATE  `Spielerinformationen` 
SET Potential=(SELECT AVG(Bewertung.Potential) FROM Bewertung WHERE SpielerID=$ID)
,Technik=(SELECT AVG(Bewertung.Technik) FROM Bewertung WHERE SpielerID=$ID),
Intelligenz=(SELECT AVG(Bewertung.Intelligenz) FROM Bewertung WHERE SpielerID=$ID),
Personlichkeit=(SELECT AVG(Bewertung.Personlichkeit) FROM Bewertung WHERE SpielerID=$ID),
Schnelligkeit=(SELECT AVG(Bewertung.Schnelligkeit) FROM Bewertung WHERE SpielerID=$ID)
WHERE ID = $ID";
mysql_query($update);
	$ID++;
}

	
?>