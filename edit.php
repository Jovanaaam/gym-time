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
    
    $trening1 = $_POST['trening1'];
    $trening2 = $_POST['trening2'];
    $trening3 = $_POST['trening3'];  
	$date = $_POST['testDate'];	
    
    // checking empty fields
	
    if(!empty($trening1) || !empty($trening2) || !empty($trening3)) {                
                   
	
        
        //updating the table
        $result = mysqli_query($mysqli, "UPDATE trening SET trening1='$trening1', trening2='$trening2', trening3='$trening3', datum ='$date' WHERE id=$id");
        
        //redirectig to the display page. In our case, it is view.php
        header("Location: view.php");
	}
		
   
}

 
  $id = (isset($_GET['id']) ? $_GET['id'] : '');
 
//$id = $_GET['id'];



 
//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM trening WHERE id=$id");
 if($result){
while($res = mysqli_fetch_array($result))
{
	
	
    $name = $res['trening1'];
    $qty = $res['trening2'];
    $price = $res['trening3'];
	$date = $res['datum'];
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
     <a href="index.php">Home</a> | <a href="view.php">Pregled Treninga</a> | <a href="logout.php">Logout</a>
    <br/><br/>
    
    <form name="form1" method="post" action="edit.php">
        <table border="0" width="67%">
            <tr> 
                <td class = "opcije" width="20%">Trening 1</td>
                <td><select type="text" name="trening1" selected="selected">
				<option value=""></option>
				
				<option value="Cage Fitness"<?=$name == 'Cage Fitness' ? ' selected="selected"' : '';?>>Cage Fitness</option>
				<option value="Gluteus 30" <?=$name == 'Gluteus 30' ? ' selected="selected"' : '';?>>Cage Fitness</option>
				<option value="E-SPINNING" <?=$name == 'E-SPINNING' ? ' selected="selected"' : '';?>>E-SPINNING</option>
				<option value="Yoga" <?=$name == 'Yoga' ? ' selected="selected"' : '';?>>Yoga</option>
				<option value="Pilates" <?=$name == 'Pilates' ? ' selected="selected"' : '';?>>Pilates</option>
				<option value="Zumba" <?=$name == 'Zaumba' ? ' selected="selected"' : '';?>>Zumba</option>
				<option value="E-CORE" <?=$name == 'E-CORE' ? ' selected="selected"' : '';?>>E-CORE</option>
				<option value="Les Mills Body Step" <?=$name == 'Les Mills Body Step' ? ' selected="selected"' : '';?>>Les Mills Body Step</option>
				<option value="Les Mills Body Attack" <?=$name == 'Les Mills Body Attack' ? ' selected="selected"' : '';?>>Les Mills Body Attack</option>
				<option value="Les Mills Body Combat" <?=$name == 'Les Mills Body Combat' ? ' selected="selected"' : '';?>>Les Mills Body Combat</option>
				</td>
            </tr>
            <tr> 
                <td class = "opcije" width="20%">Trening 2</td>
                <td><select type="text" name="trening2" selected="selected">
				<option value=""></option>
				
				<option value="Cage Fitness"<?=$qty == 'Cage Fitness' ? ' selected="selected"' : '';?>>Cage Fitness</option>
				<option value="Gluteus 30" <?=$qty == 'Gluteus 30' ? ' selected="selected"' : '';?>>Cage Fitness</option>
				<option value="E-SPINNING" <?=$qty == 'E-SPINNING' ? ' selected="selected"' : '';?>>E-SPINNING</option>
				<option value="Yoga" <?=$qty == 'Yoga' ? ' selected="selected"' : '';?>>Yoga</option>
				<option value="Pilates" <?=$qty == 'Pilates' ? ' selected="selected"' : '';?>>Pilates</option>
				<option value="Zumba" <?=$qty == 'Zaumba' ? ' selected="selected"' : '';?>>Zumba</option>
				<option value="E-CORE" <?=$qty == 'E-CORE' ? ' selected="selected"' : '';?>>E-CORE</option>
				<option value="Les Mills Body Step" <?=$qty == 'Les Mills Body Step' ? ' selected="selected"' : '';?>>Les Mills Body Step</option>
				<option value="Les Mills Body Attack" <?=$qty == 'Les Mills Body Attack' ? ' selected="selected"' : '';?>>Les Mills Body Attack</option>
				<option value="Les Mills Body Combat" <?=$qty == 'Les Mills Body Combat' ? ' selected="selected"' : '';?>>Les Mills Body Combat</option>
				</td>
            </tr>
            <tr> 
                <td class = "opcije" width="20%">Trening 3</td>
                <td><select type="text" name="trening3" selected="selected">
				<option value=""></option>
				
				<option value="Cage Fitness"<?=$price == 'Cage Fitness' ? ' selected="selected"' : '';?>>Cage Fitness</option>
				<option value="Gluteus 30" <?=$price == 'Gluteus 30' ? ' selected="selected"' : '';?>>Gluteus 30</option>
				<option value="E-SPINNING" <?=$price == 'E-SPINNING' ? ' selected="selected"' : '';?>>E-SPINNING</option>
				<option value="Yoga" <?=$price == 'Yoga' ? ' selected="selected"' : '';?>>Yoga</option>
				<option value="Pilates" <?=$price == 'Pilates' ? ' selected="selected"' : '';?>>Pilates</option>
				<option value="Zumba" <?=$price == 'Zaumba' ? ' selected="selected"' : '';?>>Zumba</option>
				<option value="E-CORE" <?=$price == 'E-CORE' ? ' selected="selected"' : '';?>>E-CORE</option>
				<option value="Les Mills Body Step" <?=$price == 'Les Mills Body Step' ? ' selected="selected"' : '';?>>Les Mills Body Step</option>
				<option value="Les Mills Body Attack" <?=$price == 'Les Mills Body Attack' ? ' selected="selected"' : '';?>>Les Mills Body Attack</option>
				<option value="Les Mills Body Combat" <?=$price == 'Les Mills Body Combat' ? ' selected="selected"' : '';?>>Les Mills Body Combat</option>
				</td>
				</tr>
			 <tr> 
                <td class = "opcije" width="20%">Datum</td>
                <td><input type="date" name= "testDate" value="<?php echo $date;?>"></td>
            </tr>
            <tr>
                <td><input  type="hidden" name="id" id="id" value="<?php echo "$id";?> "></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
	<?php
	if(isset($_POST['update']))
{    
	if(empty($trening1) && empty($trening2) && empty($trening3)) {                
       
          echo "<font color='red'>Morate uneti bar jedan trening</font><br/>";
			
          
	}	
		if(empty($date)){
		echo "<font color='red'>Morate uneti datum</font><br/>";
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