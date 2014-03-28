<?php

//Datenbank Verbindung
include ("db.php");
$ID = $_GET['id'];

?>
<html>

<head></head>
<body>
<?php
//Spielerinformationen 
echo"Detailansicht " . "<br>";


?> <b>Spielerinformation</b><br>
<table border="0" bordercolor="#000000" style="background-color:#FFFF66" width="50%" cellpadding="3" cellspacing="3">
<?php /*SPIELER INFO*/
$abfrage = "SELECT * FROM Spielerinformationen WHERE ID = $ID";
$ergebnis = mysql_query($abfrage);
while($row = mysql_fetch_assoc($ergebnis))
   {
   echo "<tr><td>ID:</td><td>$row[ID]</td></tr><tr><td>Name:</td><td>$row[Name]</td></tr><tr><td>Vorname</td><td>$row[Vorname]</td></tr><tr><td>Geburtstag:</td><td>$row[Geburtsdatum]</td>
		<tr><td collspan='2'>Durchschnittswerte:</td></tr>
		<tr><td>Potential:</td><td>$row[Potential]</td></tr>
		<tr><td>Technik:</td><td>$row[Technik]</td></tr>
		<tr><td>Intelligenz:</td><td>$row[Intelligenz]</td></tr>
		<tr><td>Persönlichkeit:</td><td>$row[Personlichkeit]</td></tr>
		<tr><td>Schnelligkeit:</td><td>$row[Schnelligkeit]</td></tr>
		";
   }
?>
</table>
<a href="addBewertung.php?id=<?php echo "$ID";?>">Bewertung hinzufügen</a>
<table border="1" bordercolor="#000000" style="background-color:#FFFF66" width="100%" cellpadding="3" cellspacing="3">
<th>Bewertet von:</th><th>Datum</th><th>Position</th><th>Potential</th><th>Technik</th><th>Intelligenz</th><th>Persönlichkeit</th><th>Schnelligkeit</th></b>

<?php 
/*SPIELER Bewertung*/
$abfrage = "SELECT *, Trainer.Name, Trainer.Vorname FROM Trainer INNER JOIN Bewertung ON Trainer.ID = Bewertung.BewertetVon WHERE SpielerID= $ID";
$ergebnis = mysql_query($abfrage);
while($row = mysql_fetch_row($ergebnis))
   {
   echo "<tr><td>$row[1] $row[2]</td><td>$row[5]</td><td>$row[7]</td><td>$row[8]</td><td>$row[9]</td><td>$row[10]</td><td>$row[11]</td><td>$row[12]</td></tr>";
   
   }

  ?>
</table>

<table border="1" bordercolor="#000000" style="background-color:#FFFF66" width="100%" cellpadding="3" cellspacing="3">
<th>ID</th><th>Datum</th><th>Bewertung</th><th>Ereigniss</th><th>Erfasst von</th></b>


<?php 
/*SPIELER EREIGNISSE*/
$abfrage = "SELECT Ereignisse.ID, Ereignisse.Datum, Ereignisse.SpielerID, Ereignisse.Wertung, Ereignisse.Vorkomnis, Ereignisse.Konsequenzen, Trainer.Name, Trainer.Vorname
FROM Trainer INNER JOIN Ereignisse ON Trainer.ID = Ereignisse.GemeldetVon WHERE Ereignisse.SpielerID = $ID";
$ergebnis = mysql_query($abfrage);

//Tabelle mit Bewertungen erzeugen
while($row = mysql_fetch_assoc($ergebnis))
   {
   echo "<tr><td>$row[ID]</td><td>$row[Datum]</td><td>$row[Wertung]</td><td>$row[Vorkomnis]</td><td>$row[Name] $row[Vorname]</td></tr>";
   
   }
?>
</table>

 <?php
 /*
     Spider Graf erzeugen
 */

 // Standard inclusions   
 include("pChart/pData.class");
 include("pChart/pChart.class");

 // Dataset definition 
 $DataSet = new pData;
 $DataSet->AddPoint(array("Potential","Technik","Intelligenz","Persönlichkeit","Schnelligkeit"),"Label");
 $abfrage = "SELECT *, Trainer.Name, Trainer.Vorname FROM Trainer INNER JOIN Bewertung ON Trainer.ID = Bewertung.BewertetVon WHERE SpielerID= $ID";
 $ergebnis = mysql_query($abfrage);
while($row = mysql_fetch_row($ergebnis))
   {

    $DataSet->AddPoint(array($row[8],$row[9],$row[10],$row[11],$row[12]),"".$row[1]);

	$DataSet->AddSerie("".$row[1]);
	$DataSet->SetSerieName("".$row[1]." ".$row[2],"".$row[1]);
   }
	$DataSet->SetAbsciseLabelSerie("Label");
 
 

 // Initialise the graph
 $Test = new pChart(400,400);
 $Test->setFontProperties("Fonts/tahoma.ttf",8);
 $Test->drawFilledRoundedRectangle(7,7,393,393,5,240,240,240);
 $Test->drawRoundedRectangle(5,5,395,395,5,230,230,230);
 $Test->setGraphArea(30,30,370,370);
 $Test->drawFilledRoundedRectangle(30,30,370,370,5,255,255,255);
 $Test->drawRoundedRectangle(30,30,370,370,5,220,220,220);

 // Draw the radar graph
 $Test->drawRadarAxis($DataSet->GetData(),$DataSet->GetDataDescription(),TRUE,20,120,120,120,230,230,230);
 $Test->drawFilledRadar($DataSet->GetData(),$DataSet->GetDataDescription(),50,20);

 // Finish the graph
 $Test->drawLegend(15,15,$DataSet->GetDataDescription(),255,255,255);
 $Test->setFontProperties("Fonts/tahoma.ttf",10);
 $Test->drawTitle(0,22,"Bewertungen",50,50,50,400);
 $Test->Render("Spider.png");
 //Spider Graph anzeigen
 echo "<img src=Spider.png>";
?>
 
 
 
 