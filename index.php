<?
include ("db.php");

echo"Hallo Welt finally" . "<br>";
$abfrage = "SELECT * FROM Test";
$ergebnis = mysql_query($abfrage);
while($row = mysql_fetch_assoc($ergebnis))
   {
   echo "$row[ID], $row[Test2] <br>";
   
   }



?>

