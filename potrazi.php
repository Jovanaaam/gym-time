<?php

$pomocna=$_GET["opstina"];
include "konekcija.php";
$sql="SELECT opstina1 FROM opstine WHERE opstina1 LIKE '$pomocna%'";
$rezultat = $mysqli->query($sql);
if ($rezultat->num_rows==0){
echo "U bazi ne postoji država koja počinje na " . $pomocna;
} else {
while($red = $rezultat->fetch_object()){
?>
<a href="#" onclick="place(this)"><?php  echo $red->opstina1;?></a>
<br/>
<?php
}
}
$mysqli->close();

?>
