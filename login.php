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
   $("#user").html("Username postoji u bazi").css("color", "green");
   }
   if (data == 1 && !$("#username").val() == ""){
	    $("#user").html("Takav username ne postoji u bazi").css("color", "red");;
		$("#username").focus();
  
  
    
    
    
   } 
   });
});
});
</script>

</div>
 <div class="bg">
<div style="overflow:auto">
  <div class="menu">
  
  </div>

  <div class="main">
   <div class="hero-text">
   <?php
	if(isset($_SESSION['valid'])){
		include('konekcija.php');
		$result = mysqli_query($mysqli, "SELECT * FROM korisnik");
		
	
?>
<?php
	include('konekcija.php');
	$result1 = mysqli_query($mysqli, "SELECT * FROM korisnik WHERE id=".$_SESSION['id']." ORDER BY id DESC");
		if($res = mysqli_fetch_array($result1)) {    

?>
	
       <div class="opcije">Dobro došao/la, <?php echo $_SESSION['ime'] ?></div>
		<?php
        echo "<button class='button'><a href=\"menjaj.php?id=$res[id]\"><span>Izmeni</span></a></button>  <button class='button'><a href=\"brisi.php?id=$res[id]\" onClick=\"return confirm('Da li zaista želite da obrišete nalog?')\"><span>Obriši</span></a></button>";        
    }
	
	?>
	
	<button class="button"><a href ='logout.php'><span>Izloguj se</span></a></button>
	<button class="button"><a href ='view.php'><span>Ogranizuj</span></a></button>
	
		
	
	
	
	<br/><br/>
   <?php
	}
else{

?>
    <p class="reg"><font size="+7">Login</font></p>
    <form name="form1" method="post" action="">
        <table width="75%" border="0">
            <tr> 
                <td class="opcije" width="10%">Username</td>
                <td><input type="text" name="username" id = "username">
				<div id="user"></div></td>
            </tr>
            <tr> 
                <td class="opcije">Password</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr> 
                <td>&nbsp;</td>
                <td><input type="submit" name="submit1" value="Submit"></td>
            </tr>
        </table>
    </form>
<?php
}
include("konekcija.php");
 
if(isset($_POST['submit1'])) {
    $user = mysqli_real_escape_string($mysqli, $_POST['username']);
    $pass = mysqli_real_escape_string($mysqli, $_POST['password']);
 
    if($user == "" || $pass == "") {
        echo "Nedostaje username ili password.";
        echo "<br/>";
     
    } else {
        $result = mysqli_query($mysqli, "SELECT * FROM korisnik WHERE username='$user' AND password=md5('$pass')")
        or die("Could not execute the select query.");
        
        $row = mysqli_fetch_assoc($result);
        
        if(is_array($row) && !empty($row)) {
            $validuser = $row['username'];
            $_SESSION['valid'] = $validuser;
            $_SESSION['ime'] = $row['ime'];
            $_SESSION['id'] = $row['id'];
        } else {
            echo "Pogresan username ili password.";
            echo "<br/>";
            
        }
 
        if(isset($_SESSION['valid'])) {
            header('Location: index.php');            
        }
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