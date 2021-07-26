<?php 
session_start();
require_once"connect.php";

if((!isset($_POST['email']))||(!isset($_POST['haslo'])))
{
	header('Location:logowanie.php',  true,  301 );  exit;
	exit();
	
}




$polaczenie=new mysqli($host,$db_user,$db_password,$db_name);
	if($polaczenie->connect_errno!=0)
	{
		echo"Error:".$polaczenie->connect_erno;

	}
	else

	{
		$email=$_POST['email'];
		$haslo=$_POST['haslo'];
		
		$email=htmlentities($email,ENT_QUOTES, "UTF-8");
		
		
		
		
		if($rezultat=$polaczenie->query(sprintf("SELECT*FROM uzytkownicy WHERE email='%s'",
		mysqli_real_escape_string($polaczenie,$email))))
		{
			$ilu_userow=$rezultat->num_rows;
			if($ilu_userow>0)
			{
				$wiersz=$rezultat->fetch_assoc();
				
				if(password_verify($haslo,$wiersz['pass']))
				{
															
							$_SESSION['zalogowany']=true;
							
							$_SESSION['id']=$wiersz['id'];
							$_SESSION['user']=$wiersz['user'];
							$_SESSION['email']=$wiersz['email'];
							$id_uzytkownika = $_SESSION['id'];
							
							unset($_SESSION['blad']);
							
							$rezultat->free_result();
							if($id_uzytkownika!=5)
							{
							
							header('Location:panel_uzytkownika.php');  
							}
							else
							{header('Location:panel_admina.php');
							}
				}
			
			else
			{
				
				$_SESSION['blad']='<span style="color:red">Nieprawidłowy email lub hasło!</span>';
							   header('Location:logowanie.php',  true,  302 );  exit;
			  
			
			}
			
			}
			else{
				
				$_SESSION['blad']='<span style="color:red">Nieprawidłowy email lub hasło!</span>';
			
			header('Location:logowanie.php',  true,  301 );  exit;
			
			}
			
		}
		$polaczenie->close();
	}?>