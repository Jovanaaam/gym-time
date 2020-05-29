<!DOCTYPE html>
<?php session_start(); ?>
<?php
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>
<script type="text/javascript" src="jquery-1.10.2.js"></script>
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
 
<?php

include_once("konekcija.php");
 
if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $opstina = $_POST['opstina'];  
	$email = $_POST['email'];
	$username = $_POST['username'];	
	$password = $_POST['password'];		
    
    
    if(!empty($ime) && !empty($prezime) && !empty($opstina) && !empty($email) && !empty($username) && !empty($password)) {                
    
        
        $result = mysqli_query($mysqli, "UPDATE korisnik SET ime='$ime', prezime='$prezime', opstina='$opstina', email ='$email', username = '$username', password = md5('$password') WHERE id=$id");
        
       
        header("Location: index.php");
    }
}
?>
<?php
//getting id from url
//$id = $_GET['id'];
$id = (isset($_GET['id']) ? $_GET['id'] : '');
 
//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM korisnik WHERE id=$id");
 if($result){
while($res = mysqli_fetch_array($result))
{
	
    $ime = $res['ime'];
    $prezime = $res['prezime'];
    $opstina = $res['opstina'];
	$email = $res['email'];
	$username = $res['username'];
	$password = $res['password'];
}
 }
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
     <a href="view.php">Raspored</a> | <a href="logout.php">Izloguj se</a>
    <br/><br/>
    <p class="reg"><font size="+7">Izmeni podatke</font></p>
    <form name="form1" method="post" action="menjaj.php">
        <table border="0" width="65%">
            <tr> 
                <td class = "opcije" width="10%">Ime:</td>
                <td><input type="text" name="ime" id ="" value="<?php echo $ime;?>"></td>
            </tr>
            <tr> 
                <td class = "opcije">Prezime:</td>
                <td><input type="text" name="prezime" value="<?php echo $prezime;?>"></td>
            </tr>
            <tr> 
                <td class = "opcije">Opstina:</td>
                <td><input type="text" name="opstina" id = "opstina" autocomplete = "off" value="<?php echo $opstina;?>">
				<div id="livesearch"></div><br/>
				<div id="prikaz_rezultata"></div></td>
				
					
            </tr>
			 <tr> 
                <td class = "opcije">E-mail:</td>
                <td><input type="text" name= "email" id= "email" value="<?php echo $email;?>">
				
				</td>
            </tr>
			  <td class = "opcije" >Username:</td>
                    <td><input type="text" name="username" id = "username" value="<?php echo $username;?>">
					<br>
					<div id="user"></div>
					</td>
			 <tr> 
                <td class = "opcije">Password:</td>
                <td><input type="password" name= "password" value="<?php echo $password;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value="<?php echo "$id";?>"></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
	<?php 
	 if(empty($ime)) {
            echo "<font color='red'>Polje ime je prazno.</font><br/>";
        }
		 else if(empty($prezime)) {
            echo "<font color='red'>Polje prezime je prazno.</font><br/>";
        }
		 else if(empty($opstina)) {
            echo "<font color='red'>Polje opstina je prazno.</font><br/>";
        }   
		else if(empty($email)) {
            echo "<font color='red'>Polje e-mail je prazno.</font><br/>";
        }
        
		else if(empty($username)) {
            echo "<font color='red'>Polje username je prazno.</font><br/>";
        }
        
		else if(empty($password)) {
            echo "<font color='red'>Polje password je prazno.</font><br/>";
        }
	
	?>
	
	
	

    
  </div>
    <h2></h2>
    <p></p>
  </div>

  <div class="right">
		<form action="welcome.php" method="post">
				<h1>Odaberi treninge</h1>
				<p>Zahvaljujući planeru na našoj stranici opredelite se za neke od grupnih treninga!</P>
				
 
		</form>
  </div>
</div>
</div>


</body>
</html>