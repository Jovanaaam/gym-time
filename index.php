<!DOCTYPE html>
<?php session_start(); ?>
<html>
<script type="text/javascript" src="jquery-1.10.2.js"></script>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="style1.css">

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
	} else {
		
		?> 
		<h2 class="pob">Već ste član? Ulogujte se. Niste član? Šta čekate? Pžurite i registrujte se! </h1>
   
		<button class="button"><a href ='login.php'><span>Uloguj se</span></a></button>
		
			
		<button class="button"><a href ='register.php'><span>Registracija</span></a></button>
		

		
			
		<?php
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

