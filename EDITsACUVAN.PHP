<!DOCTYPE html>
<?php session_start(); ?>
<?php
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>
 
<?php
// including the database connection file
include_once("konekcija.php");
 
if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    
    $name = $_POST['name'];
    $qty = $_POST['qty'];
    $price = $_POST['price'];  
$date = $_POST['testDate'];	
    
    // checking empty fields
    if(empty($name) || empty($qty) || empty($price)) {                
        if(empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($qty)) {
            echo "<font color='red'>Quantity field is empty.</font><br/>";
        }
        
        if(empty($price)) {
            echo "<font color='red'>Price field is empty.</font><br/>";
        }      
	}	
     else {    
        //updating the table
        $result = mysqli_query($mysqli, "UPDATE trening SET trening1='$name', trening2='$qty', trening3='$price', datum ='$date' WHERE id=$id");
        
        //redirectig to the display page. In our case, it is view.php
        header("Location: view.php");
    }
}
?>
<?php


$id = $_GET['id'];


 
//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM trening WHERE id=$id");
 
while($res = mysqli_fetch_array($result))
{
	
    $name = $res['trening1'];
    $qty = $res['trening2'];
    $price = $res['trening3'];
	$date = $res['datum'];
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
  <a href="#home" class="active">Home</a>
  <a href="#news">News</a>
  <a href="#contact">Contact</a>
  <a href="#about">About</a>
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



</div>
 <div class="bg">
<div style="overflow:auto">
  <div class="menu">
  
  </div>

  <div class="main">
   <div class="hero-text">
     <a href="index.php">Home</a> | <a href="view.php">View Products</a> | <a href="logout.php">Logout</a>
    <br/><br/>
    
    <form name="form1" method="post" action="edit.php">
        <table border="0" width="67%">
            <tr> 
                <td class = "opcije" width="20%">Trening 1</td>
                <td><select type="text" name="name">
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
				</td>
            </tr>
            <tr> 
                <td class = "opcije" width="20%">Trening 2</td>
                <td><select type="text" name="qty" value="<?php echo $qty;?>">
				<option value=""></option>
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
				</td>
            </tr>
            <tr> 
                <td class = "opcije" width="20%">Trening 3</td>
                <td><select type="text" name="price" value="<?php echo $price;?>">
				<option value=""></option>
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
				</td>
				</tr>
			 <tr> 
                <td class = "opcije" width="20%">Datum</td>
                <td><input type="date" name= "testDate" value="<?php echo $date;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
	
	
	

    
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