<?php
if (!isset ($_GET["name"])){
echo "Parametar Naziv nije prosleđen!";
} else {
$pomocna=$_GET["name"];
include "konekcija.php";

$sql="SELECT * FROM ponuda WHERE naziv_treninga='".$pomocna."'";
$rezultat = $mysqli->query($sql);

echo "<table border='1'>
<tr>
<th>Vecinski narod</th>
<th>Broj stanovnika</th>
<th>Glavni grad</th>
<th>Kontinent</th>
</tr>";

while($red = mysqli_fetch_array($rezultat1)){
 echo "<tr>";
 echo "<td>" . $red->narod . "</td>";
 echo "<td>" . $red->brstanovnika . "</td>";
 echo "<td>" . $red->glgrad . "</td>";
 echo "<td>" . $red->kontinent . "</td>";
 echo "</tr>";
 }
echo "</table>";

$mysqli->close();
}
?>