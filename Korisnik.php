<?php
include("konekcija.php");
class Korisnik{
	public $ime;
	public $prezime;
	public $opstina;
	public $user;
	public $pass;
	public function __construct($ime, $prezime, $opstina, $user, $pass){
		$this->ime = $ime;
		$this->prezime = $prezime;
		$this->opstina = $opstina;
		$this->user = $user;
		$this->pass = $pass;
		
	}
	 public function ubacivanjeKorisnika(){
          global $mysqli;
          $sqlInsert = "INSERT INTO korisnik(ime, prezime, opstina, email, username, password)VALUES ('".$this->ime."','".$this->prezime."', '".$this->opstina."','".$this->user."','".$this->pass."')";
          $rezultat = $mysqli->query($sqlInsert);
          if($mysqli->affected_rows == 0){
           echo "<h1 style='text-align:center'>Neuspesno ubacivanje korisnika u bazu</h1>";
    }
    else{
        echo "<h1 style='text-align:center'>Uspesno ste ubacili korisnika u bazu</h1>";
    }
     }
	 
	 public static function proveraDuzineSifre($duzina){
         
         if(strlen($duzina) < 5){
             echo "1";
        }
        else{
            echo "0";
         }  
     }
	 
	 
}
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 

?>