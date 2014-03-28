<?php
error_reporting(E_ALL);
//Datenbank Verbindung
include ("db.php");
$ID = $_GET['id'];
echo "SPIELDER ID: ".$ID;
?>
<html>

<head></head>
<body>

<form action="storeEreignisse.php" methode="GET">

<input type="hidden" name="ID" <?php echo"value=$ID"?>>

<table border="1" bordercolor="#000000" style="font-size:14px; font-family:Arial,sans-serif; " width="70%" cellpadding="3" cellspacing="3">
    <tr>
		<td>
			Wertung
		</td>	
		<td>
		<select name="Wertung">
		<option value="Positiv">Positiv</option>
		<option value="Negativ">Negativ</option>
		</td>
	</tr>
	<tr>
		<td>
			Vorkomnis
		</td>	
		<td>
		<textarea cols="50" rows="10"  name="Vorkomnis" size="30"></textarea>
		</td>
	</tr>
	
	 <tr>
      <td align="right">Trainer: </td>
      <td><select name="Trainer" type="text" size="1" maxlength="40" >
	  <?php 
	  error_reporting(E_ALL);
	  /*Dropdown für Trainer generieren*/
		$abfrage = "SELECT * FROM Trainer";

		$ergebnis = mysql_query($abfrage);
		while($row = mysql_fetch_assoc($ergebnis))
			{
			$Trainer = $row[Vorname]." ".$row[Name];
			echo "$Trainer";
			echo "  <option value='$row[ID]'>$Trainer</option>";
			}	  
	  ?>
	  </td>
    </tr>
	<tr>
		<td colspan="2">
		<input type="submit" value=" Absenden ">
        <input type="reset" value=" Abbrechen">
		</form>
		<form action="PlayerDetail.php?$ID"> <input type="submit" value=" Zurück "> </form>
      	</td>
	</tr>
 </table>
 

