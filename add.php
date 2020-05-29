<!DOCTYPE html>

<html>
<?php session_start(); ?>
 <link rel="stylesheet" type="text/css" href="style.css">
<?php
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>
 
<html>
<head>
			<title>Napravi plan</title>
</head>
 
<body>
<script type="text/javascript" src="jquery-1.10.2.js"></script>
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



</body>
</html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">


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



</div>
<div class="bg">
<div style="overflow:auto">
<div class="menu">
  
  </div>

  <div class="main">
   <div class="hero-text">
   <a href="view.php">Pogledaj raspored</a> | <a href="logout.php">Logout</a>
    <br/><br/>
    
    <form action="add.php" method="post" name="form1">
        <table width="75%" border="0">
            <tr> 
                <td class = "opcije" width="30%">Prvi trening</td>
                <td><select type="text" name="trening1" id = "trening1" autocomplete="off">
				<option value=""></option>
				<option value="Cage Fitness">Cage Fitness</option>
				<option value="Gluteus 30">Gluteus 30</option>
				<option value="E-SPINNING">E-SPINNING</option>
				<option value="Yoga">Yoga</option>
				<option value="Pilates">Pilates</option>
				<option value="Zumba">Zumba</option>
				<option value="E-CORE">E-CORE</option>
				<option value="Les Mills Body Step">Les Mills Body Step</option>
				<option value="Les Mills Body Attack">Les Mills Body Attack</option>
				<option value="Les Mills Body Combat">Les Mills Body Combat</option>		  
				
            </tr>
			
			
			
            <tr> 
                <td class = "opcije" width="30%">Drugi trening</td>
                <td><select type="text" name="trening2" id = "trening2" autocomplete="off">
				<option value=""></option>
				<option value="Cage Fitness">Cage Fitness</option>
				<option value="Gluteus 30">Gluteus 30</option>
				<option value="E-SPINNING">E-SPINNING</option>
				<option value="Yoga">Yoga</option>
				<option value="Pilates">Pilates</option>
				<option value="Zumba">Zumba</option>
				<option value="E-CORE">E-CORE</option>
				<option value="Les Mills Body Step">Les Mills Body Step</option>
				<option value="Les Mills Body Attack">Les Mills Body Attack</option>
				<option value="Les Mills Body Combat">Les Mills Body Combat</option>
				
				
            </tr>
            <tr> 
                <td class = "opcije" width="30%">Treci trening</td>
				
                <td><select type="text" name="trening3" id = "trening3" autocomplete="off">
				<option value=""></option>
				<option value="Cage Fitness">Cage Fitness</option>
				<option value="Gluteus 30">Gluteus 30</option>
				<option value="E-SPINNING">E-SPINNING</option>
				<option value="Yoga">Yoga</option>
				<option value="Pilates">Pilates</option>
				<option value="Zumba">Zumba</option>
				<option value="E-CORE">E-CORE</option>
				<option value="Les Mills Body Step">Les Mills Body Step</option>
				<option value="Les Mills Body Attack">Les Mills Body Attack</option>
				<option value="Les Mills Body Combat">Les Mills Body Combat</option>
				
            </tr>
			<tr> 
                <td class = "opcije" width="10%">Datum</td>
                <td><input type="date" name= "testDate"></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Dodaj"></td>
				
            </tr>
        </table>
</form>
<?php
//including the database connection file
include_once("konekcija.php");
 if(isset($_POST['Submit'])) {    
    $trening1 = $_POST['trening1'];
    $trening2 = $_POST['trening2'];
    $trening3 = $_POST['trening3'];
    $loginId = $_SESSION['id'];
    $date = $_POST['testDate'];
	$danas = date("Y-m-d");
   
    if(empty($trening1) && empty($trening2) && empty($trening3)) {                
        
        
        echo "<font color='red'>Morate uneti bar jedan trening.</font><br/>";
    }else if(empty($date)) {
			
            echo "<font color='red'>Morate uneti datum.</font><br/>"; 
			
        }else if($date < $danas){
			 echo "<font color='red'>Uneti datum je prosao.</font><br/>"; 
		
	}else { 
        // if all the fields are filled (not empty) 
            
        //insert data to database    
        $result = mysqli_query($mysqli, "INSERT INTO trening(trening1, trening2, trening3, login_id, datum) VALUES('$trening1','$trening2','$trening3', '$loginId','$date')");
        
        //display success message
        echo "<font color='green'>Raspored je napravljen.";
        echo "<br/><a href='view.php'>Pogledaj raspored</a>";
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