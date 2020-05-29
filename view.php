<!DOCTYPE html>
<?php session_start(); ?>
<?php
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>
 
<?php
//including the database connection file
include_once("konekcija.php");
 
//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM trening WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");
?>
<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body style="font-family:Verdana;color:#aaaaaa;">



<div style="background-color:white;padding:15px;text-align:center;">
	
</head>
<body>

<div class="topnav" id="myTopnav">
  <a href="index.php" class="active">Početna</a>
  <a href="register.php">Registracija</a>
  <a href="login.php">Uloguj se</a>
 
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>




<script>
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>
<script type="text/javascript" src="jquery-1.10.2.js"></script>

	
<script type="text/javascript">
$(document).ready(function () {
$("#username").blur(function(){
var vrednost = $("#username").val();
 if ($("#username").val() == "") {
       // alert("input_A is required");
		$("#user").html("Polje username je prazno!").css("color", "red");		
    }
$.get("check.php", { username: vrednost },
   function(data){
   if (data == 0 && !$("#username").val() == ""){
   $("#user").html("Takav username vec postoji u bazi").css("color", "red");;
   $("#username").focus();
   }
   if (data == 1 && !$("#username").val() == ""){
   $("#user").html("Username je dostupan").css("color", "green");
  
    
    
    
   } 
   });
});
});
</script>
<script type="text/javascript">
$(document).ready(function () {
$("#opstina").keyup(function(){
	
var vrednost = $("#opstina").val();
$.get("provera.php", { unos: vrednost },
   function(data){
   
	if($("#opstina").val() != ""){
		 $("#livesearch").show();
		$("#livesearch").html(data);
	} else {
		$("#livesearch").hide();
	}
	
   });
 
});

});

function place(ele){
	$("#opstina").val(ele.innerHTML);
	$("#livesearch").hide();
}
</script>


</div>
 <div class="bg">
<div style="overflow:auto">
  <div class="menu">
  
  </div>

  <div class="main">
   <div class="hero-text">
    
	<a href="add.php">Dodaj treninge</a> | <a href="logout.php">Izloguj se</a>
<br/><br/>
    
<table width='80%' border=0>
    <tr bgcolor='#CCCCCC'>
        <td>Trening1</td>
        <td>Trening2</td>
        <td>Trening3</td>
		<td>Datum</td>
        <td>Update</td>
    </tr>
    <?php
    while($res = mysqli_fetch_array($result)) {        
        echo "<tr>";
        echo "<td>".$res['trening1']."</td>";
        echo "<td>".$res['trening2']."</td>";
        echo "<td>".$res['trening3']."</td>";   
		echo "<td>".$res['datum']."</td>";    		
        echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Da li ste sigurni da zelite da obrisete trening?')\">Delete</a></td>";        
    }
    ?>
</table>    
	
	

    
  </div>
    <h2></h2>
    <p></p>
  </div>

  <div class="right">
		<form action="welcome.php" method="post">
				<h1>Organizuj se!</h1>
				<p>Zahvaljujući planeru na našoj stranici opredelite se za neke od grupnih treninga i organizujte svoje vreme!</P>
				
 
		</form>
  </div>
</div>
</div>


</body>
</html>