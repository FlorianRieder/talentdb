<?php
include ("db.php");
include ("updateDurchschnitt.php");
?>
<html>

<head></head>
<body>
<table border="0" bordercolor="#FFCC00" style="background-color:#FFF734" width="70%" cellpadding="3" cellspacing="3">
	<tr>
		<td><p style="font-family:Arial,sans-serif; font-size:30px;">FCA TalentDB</p></td>
		<td><img src="logo.jpg" height="80" align="right"></td>
	</tr>
</table>



<?php


$Vorname = $_GET['Vorname'];
$Nachname = $_GET['Nachname'];
$alter1 = $_GET['alter1'];
$alter2= $_GET['alter2'];
$alter1Fill = $_GET['alter1'];
$alter2Fill= $_GET['alter2'];
if(empty($alter1)){
	$alter1= "2050"; 
}
if(empty($alter2)){
	$alter2= "1900"; 
}		

$alter1.="-01-01";
$alter2.="-01-01";





$sort = $_GET['sort'];

if(empty($sort)){
	$sort = "Geburtsdatum DESC"; 
}
$sort = "ORDER BY ".$sort;
?>



<form action="showPlayer.php" methode="GET">
<table border="1" bordercolor="#000000" style="font-size:14px; font-family:Arial,sans-serif; " width="70%" cellpadding="3" cellspacing="3">
    <tr>

      <td align="right">Vorname:</td> 
      <td><input name="Vorname" type="text" size="30" maxlength="30" <?echo "value='$Vorname'"?></td>
    </tr>
    <tr>
      <td align="right">Nachname:</td>
      <td><input name="Nachname" type="text" size="30" maxlength="40" <?echo "value='$Nachname'"?>></td>
    </tr>
     <tr>
      <td align="right">Älter als </td>
      <td><input name="alter1" type="text" size="30" maxlength="40" <?echo "value='$alter1Fill'"?>>Nur Jahrgang für alle die älter sind als z.B. 1998</td>
    </tr>
	 <tr>
      <td align="right">Jünger als </td>
      <td><input name="alter2" type="text" size="30" maxlength="40" <?echo "value='$alter2Fill'"?>>Nur Jahrgang für alle die jünger sind als z.B. 1998 </td>
  
  </tr>
  <tr>
      <td align="right">Sortieren nach</td>
      <td> <select name="sort" size="3">
				<option value="Name"> Nachname </option>
				<option> Vorname </option>
				<option value="Geburtsdatum DESC"> AlterAuf </option>
				<option value="Geburtsdatum ASC"> AlterAb </option>
			</select>	
				
	  </td>
  
  </tr>
    <tr>
      <td align="right">Formular:</td>
      <td>
        <input type="submit" value=" Absenden ">
        <input type="reset" value=" Abbrechen">
      </td>
    </tr>
  </table>
<form>
<table border="1" bordercolor="#000000" style="font-family:Arial,sans-serif; background-color:#FFFF66" width="70%" cellpadding="3" cellspacing="3">
<th>ID</th><th>Name </th><th>Vorname</th><th>Geburtsdatum</th><th>Potential</th><th>Technik</th><th>Intelligenz</th><th>Persönlichkeit</th><th>Schnelligkeit</th><th>Details</th></b>

<?php 

/*$abfrage = "SELECT * FROM Spielerinformationen";*/

	$abfrage = "SELECT * FROM Spielerinformationen WHERE Vorname LIKE '%".$Vorname."%' AND Name LIKE '%".$Nachname."%' AND Geburtsdatum <= '$alter1' AND Geburtsdatum >= '$alter2' $sort";

$ergebnis = mysql_query($abfrage);
while($row = mysql_fetch_assoc($ergebnis))
   {
   echo "<tr><td>$row[ID] </td><td>$row[Name]</td><td>$row[Vorname]</td><td>$row[Geburtsdatum]</td><td>$row[Potential]</td><td>$row[Technik]</td><td>$row[Intelligenz]</td><td>$row[Personlichkeit]</td><td>$row[Schnelligkeit]</td><td><a href=http://saas-adlerhorst.ch/TalentDB/PlayerDetail.php?id=$row[ID]>Detail</a></td>";
   
   }
?>

</table>
