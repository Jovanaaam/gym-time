<?php
if (!isset ($_GET["unos"])){
echo "Parametar Unos nije prosleđen!";
} else {
$pomocna=$_GET["unos"];
include "konekcija.php";
$sql="SELECT id,opstina1 FROM opstine WHERE opstina1 LIKE '$pomocna%'ORDER BY opstina1";
$rezultat = $mysqli->query($sql);
if ($rezultat->num_rows==0){
echo "U bazi ne postoji takva opstina " . $pomocna;
} else {

while($red = $rezultat->fetch_object()){
	
?>
<a href="#" onclick="place(this)"><?php  echo $red->opstina1;?></a>
<br/>
<?php
}
}
$mysqli->close();
}
?>
