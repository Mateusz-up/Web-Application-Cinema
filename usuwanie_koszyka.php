<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 

			
	if(isset($_SESSION['id'])) $id_uzytkownika = $_SESSION['id']; 
    } 
include("connect.php");


$idee4=$_POST['idzik4'];



function usuwanieKosza($idee4)
{
	
	global $link;
					
		
		
$zapytanie3 = "delete from rezerwacja where id=$idee4";
$sql3 = mysqli_query($link,$zapytanie3) or die ("Źle sformułowane żądanie danych2");

header('Location: wyswietlanie_koszyka.php');
		
}

	usuwanieKosza($idee4);
?>