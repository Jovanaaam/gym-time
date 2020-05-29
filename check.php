<?php
if (!isset ($_GET["username"])){
echo "Parametar username nije prosleđen!";
} else {
$username=$_GET["username"];
include "konekcija.php";

$sql="SELECT * FROM korisnik WHERE username='$username'";
$rezultat = $mysqli->query($sql);
if ($rezultat->num_rows!=0){
echo "0";
} else {
echo "1";
}
$mysqli->close();
}
?>