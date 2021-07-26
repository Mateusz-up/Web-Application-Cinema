<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
if(isset($_SESSION['id'])) $id_uzytkownika = $_SESSION['id']; 
		
    } 
include("connect.php");


$id_seans1=$_POST['id_seans'];
$id_filmu1=$_POST['id_filmu'];


 foreach($_POST['s'] as $c){
              $seat = explode("v",$c);
             
			  
 }
 if(isset($_SESSION['id'])!=""){
 
 
 $rzada=''.$seat[0].'';
 $miejsca=''.$seat[1].'';
 
 $zapytanie="insert into rezerwacja(id_godziny_seansu,rzad,miejsce,id_uzytkownika,data) values($id_seans1,$rzada,$miejsca,$id_uzytkownika,NOW())";
				$sql=mysqli_query($link,$zapytanie) or die ("Żle sformułowane zadanie danych");
				
			
				header('Location: wyswietlanie_koszyka.php');
 }
 else
 {
	 
	 header('Location: logowanie.php');
 }
 
 
?>
