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

<form action="storeBewertung.php" methode="GET">

<input type="hidden" name="ID" <?php echo"value=$ID"?>>

<table border="1" bordercolor="#000000" style="font-size:14px; font-family:Arial,sans-serif; " width="70%" cellpadding="3" cellspacing="3">
    <tr>
		<td>
			Position
		</td>	
		<td>
		<input type="text"  name="Position">
		</td>
	</tr>
	<tr>
		
      <td align="right">Potential:</td> 
      <td>
		<input type="radio" name="Potential"  value="1"> 1 
		<input type="radio" name="Potential"  value="2"> 2 
		<input type="radio" name="Potential"  value="3"> 3 
		<input type="radio" name="Potential"  value="4"> 4 </td>
    </tr>
    <tr>
      <td align="right">Technik:</td>
      <td>
		<input type="radio" name="Technik"  value="1"> 1 
		<input type="radio" name="Technik"  value="2"> 2 
		<input type="radio" name="Technik"  value="3"> 3 
		<input type="radio" name="Technik"  value="4"> 4 
		</td>
    </tr>
     <tr>
      <td align="right">Intelligenz: </td>
      <td>
		<input type="radio" name="Intelligenz"  value="1"> 1 
		<input type="radio" name="Intelligenz"  value="2"> 2 
		<input type="radio" name="Intelligenz"  value="3"> 3 
		<input type="radio" name="Intelligenz"  value="4"> 4 
		</td>
    </tr>
	 <tr>
      <td align="right">Persönlichkeit: </td>
      <td>
		<input type="radio" name="Personlichkeit"  value="1"> 1 
		<input type="radio" name="Personlichkeit"  value="2"> 2 
		<input type="radio" name="Personlichkeit"  value="3"> 3 
		<input type="radio" name="Personlichkeit"  value="4"> 4 
</tr>
	 <tr>
      <td align="right">Schnelligkeit: </td>
      <td>
		  <input type="radio" name="Schnelligkeit"  value="1"> 1 
		  <input type="radio" name="Schnelligkeit"  value="2"> 2 
		  <input type="radio" name="Schnelligkeit"  value="3"> 3 
		  <input type="radio" name="Schnelligkeit"  value="4"> 4 
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
 

