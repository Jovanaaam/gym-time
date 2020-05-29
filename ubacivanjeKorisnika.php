<html>

<?php
    
    include "Korisnik.php";



    include "konekcija.php";
    $ime = mysqli_real_escape_string($mysqli,$_POST["ime"]);
    $prezime = mysqli_real_escape_string($mysqli,$_POST["prezime"]);
    $opstina = mysqli_real_escape_string($mysqli,$_POST["opstina"]);
    $user = mysqli_real_escape_string($mysqli,$_POST["username"]);
    $pass = mysqli_real_escape_string($mysqli,$_POST["password"]);
    
   
    

    
    $noviKorisnik = new Korisnik($ime,$prezime,$opstina,$user,$pass);
    $noviKorisnik->ubacivanjeKorisnika();

   




?>
    </body>
</html>
