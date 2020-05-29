<!DOCTYPE html>
<?php session_start(); ?>
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
  

        <p class="reg"><font size="+7">Registracija</font></p>
        <form name="form1" method="post" action="">
            <table width="75%" border="0">
                <tr> 
                  <td class = "opcije" width="10%">Ime</td>
                    <td><input type="text" name="ime"></td>
                </tr>
				 <tr> 
                    <td class = "opcije" width="10%">Prezime</td>
                    <td><input type="text" name="prezime"></td>
                </tr>
				 <tr> 
                    <td class = "opcije" width="10%">Opstina</td>
					
                    <td>
					
					<input type="text" name="opstina" id = "opstina" autocomplete="off">
					<div id="livesearch"></div><br/>
					<div id="prikaz_rezultata"></div>				
					</td>
					
					
                </tr>
                <tr> 
                    <td class = "opcije">Email</td>
                    <td><input type="text" name="email"></td>
                </tr>            
                <tr> 
                    <td class = "opcije">Username</td>
                    <td><input type="text" name="username" id = "username">
					<br>
					<div id="user"></div>
					</td>
					
                </tr>
                <tr> 
                    <td class = "opcije">Password</td>
                    <td><input type="password" name="password"></td>
                </tr>
                <tr> 
                    <td>&nbsp;</td>
                    <td><input type="submit" name="submit" value="Submit"></td>
                </tr>
            </table>
        </form>
    <?php
	    include("konekcija.php");
		include("Korisnik.php");
 
    if(isset($_POST['submit'])) {
        $ime = $_POST['ime'];
		 $prezime = $_POST['prezime'];
		  $opstina = $_POST['opstina'];
        $email = $_POST['email'];
        $user = $_POST['username'];
        $pass = $_POST['password'];
		if(!filter_var($email, FILTER_VALIDATE_EMAIL) || empty($email)){
		
		$emailErr = "Email format nije odgovarajuci"; 
		echo $emailErr;
	}
	if((strlen($pass) < 5) || empty($pass)){
		echo "Sifra treba da sadrzi vise od 5 karaktera.";
	}
	
	
        if(!empty($user) && !empty($pass) && !empty($ime) && !empty($prezime) && !empty($opstina)&& !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL) && !(strlen($pass) < 5 )){
          
        
            mysqli_query($mysqli, "INSERT INTO korisnik(ime, prezime, opstina, email, username, password) VALUES('$ime','$prezime', '$opstina', '$email', '$user', md5('$pass'))")
            or die("Could not execute the insert query.");
			 echo "<font color='green'>Vas nalog je napravljen.";
			echo "<br/><a href='login.php'></a>";
          ?>  
		<button class="button1"><a href ='login.php'><span>Login</span></a></button>
          
			<?php
	}else if(empty($user) || empty($pass) || empty($ime) || empty($prezime) || empty($opstina) || empty($email)){ 
				echo "Nisu popunjena sva polja";
			
	} 
		
	
	
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