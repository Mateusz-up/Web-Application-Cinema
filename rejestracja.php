<?php


session_start();
include("connect.php");
if(isset($_POST['email']))
{
	
	$check_bool=true;
	
	$nick=$_POST['nick'];
	
	
	if((strlen($nick)<3) ||(strlen($nick)>20))
	{
		
		$check_bool=false;
		$_SESSION['e_nick']="Imię musi posiadać od 3 do 20 znaków!";
		
	}
	
	if(ctype_alpha($nick)==false)
	{	
	
	$check_bool=false;
	$_SESSION['e_nick']="Imię może skladać sie tylko z liter!";
	
	}
	

	
	$email=$_POST['email'];
	$emailB=filter_var($email,FILTER_SANITIZE_EMAIL);
	
if((filter_var($emailB,FILTER_VALIDATE_EMAIL)==false) ||($emailB!=$email))
	
	{
		$check_bool=false;
		$_SESSION['e_email']="Podaj poprawny email";
		
		
	}
	
	
	$haslo1=$_POST['haslo1'];
	$haslo2=$_POST['haslo2'];
	
	if((strlen($haslo1)<8)||(strlen($haslo1)>20))
	{
		
		$check_bool=false;
		$_SESSION['e_haslo']="Hasło musi posiadać od 8 do 20 znaków";
		
		
	}
	
	if($haslo1!=$haslo2)
		
	
	{
		
		$check_bool=false;
		$_SESSION['e_haslo']="Podane hasła nie są identyczne";
		
		
	}
	$haslo_hash=password_hash($haslo1,PASSWORD_DEFAULT);
	
	
	if(!isset($_POST['regulamin']))
		
		{
			
			$check_bool=false;
		$_SESSION['e_regulamin']="Potwierdz akceptację regulaminu!";
		
			
			
		}

	
	
	$_SESSION['fr_nick']=$nick;
	$_SESSION['fr_email']=$email;
	$_SESSION['fr_haslo1']=$haslo1;
	$_SESSION['fr_haslo2']=$haslo2;
	if(isset($_POST['regulamin']))$_SESSION['fr_regulamin']=true;
	
	
	require_once "connect.php";
		mysqli_report(MYSQLI_REPORT_STRICT);
		
		try 
		{
			$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
			if ($polaczenie->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());
			}
			else
			{
				$rezultat = $polaczenie->query("SELECT id FROM uzytkownicy WHERE email='$email'");
				
				if (!$rezultat) throw new Exception($polaczenie->error);
				
				$ile_takich_maili = $rezultat->num_rows;
				if($ile_takich_maili>0)
				{
					$check_bool=false;
					$_SESSION['e_email']="Istnieje juz takie konto z emailem";
				}		

				
				
				
				if ($check_bool==true)
				{
					
					
					if ($polaczenie->query("INSERT INTO uzytkownicy VALUES (NULL, '$nick', '$haslo_hash', '$email',NOW())"))
					{
						$_SESSION['udanarejestracja']=true;
						header('Location: powitanie.php');
					}
					else
					{
						throw new Exception($polaczenie->error);
					}
					
				}
				
				$polaczenie->close();
			}
			
		}
		catch(Exception $e)
		{
			echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
			echo '<br />Informacja developerska: '.$e;
		}
		
	}

?>



<!DOCTYPE html>
<html lang="pl">

<head>
<meta charset="utf-8" />
<title>Kino Benex</title>
<meta name="description" content="Kino Benex"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="keywords" content="filmy,benex,kino" />
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="css/fontello.css" rel="stylesheet" type="text/css" />
<link href="style2.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script type="text/javascript" src="zegar.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Merriweather:400,900,900i" rel="stylesheet">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>



</head>




<body>



<div class="container-fluid">


<div class="jumbotron text-center" style="background-color:white">

<h1 style="color:steelblue">Kino Benex</h1>
  </div>


	


  <?php


if(isset($id_uzytkownika)!="")

	{
		echo'<div class="jumbotron text-center" style="background-color:whitesmoke;opacity:0.9;position: relative; bottom:0.89cm; ">';
		echo'<div class="row">';
		echo'<div class="col-sm-3">';
		echo"<div class='powitanie'>Witaj ".$_SESSION['user']."</div>";
		
		echo'<br>';
		echo'</div>';
		echo'<div class="col-sm-3">';
			echo "<div class='powEmail'>Email: ".$_SESSION['email'],"</div>";
			echo'<br>';
			echo'</div>';
		
			echo'<div class="col-sm-3">';
			if($id_uzytkownika!=5){
				
		echo'<div class="Konto"><a href="panel_uzytkownika.php"><i class="fa fa-user" aria-hidden="true"></i>  Twoje konto</a></div>';
		
			}
			else{
				echo'<div class="Konto"><a href="panel_admina.php">Panel admina</a></div>';
			}
			echo'</div>';
			echo'<br><br>';
			echo'<div class="col-sm-3">';
			echo'<div class="Wylogowanie">
<a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Wyloguj się</a></div>';
			echo'<br>';
			echo'</div>';
			echo'</div>';
	echo'</div>';
	}
	
	

?>




<?php

	$wynik = mysqli_query($link,"Select * from sale") or die('Błąd zapytania'); 
	
	

echo'<nav class="navbar navbar-expand-md bg-dark navbar-dark">';
echo'<div class=" ">
        <a class="navbar-brand mx-auto" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>';


echo'<div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">';
echo'  <ul class="navbar-nav mr-auto">';
echo'    <li class="nav-item ">';
echo'    <a class="nav-link" href="index.php">Strona główna <span class="sr-only">(current)</span></a>';
echo'   </li>';

echo'  <li class="nav-item">';
echo'   <a class="nav-link " href="repertuar.php">Repertuar</a>';
echo' 	</li>';


echo' 	  <li class="nav-item dropdown">';
echo'     <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">';
echo'       Sale';
echo'      </a>';
echo'     <div class="dropdown-menu  navbar-expand-md bg-dark navbar-dark">';
if(mysqli_num_rows($wynik) > 0) { 
	while($r = mysqli_fetch_object($wynik)) { 
	$id=$r->id;
	$nazwa=$r->nazwa;
	
echo"       <a class='dropdown-item' href='show_seans.php?seans_id=$id'>".$r->nazwa."</a>";
	}}
echo'     </div>';
echo'   </li>';
	
echo'  <li class="nav-item">';
echo'   <a class="nav-link " href="kontakt.php">Kontakt</a>';
echo' 	</li>';

echo'  <li class="nav-item">';
echo'   <a class="nav-link " href="Regulamin.php">Regulamin</a>';
echo' 	</li>';
echo'</ul>';
echo'</div>';


echo'<div class="navbar-collapse collapse w-100 order-3 dual-collapse2">';
echo'<ul class="navbar-nav ml-auto">';
echo'  <li class="nav-item">';
echo'   <a class="nav-link " href="wyswietlanie_koszyka.php">  
<i class="fa fa-shopping-cart"  data-toggle="tooltip" data-placement="bottom" title="Koszyk" style="font-size:24px;color:white; padding:1px"></i></a>';
echo' 	</li>';
if(isset($id_uzytkownika)!="")
	{}
	else{
echo'  <li class="nav-item">';
echo'   <a class="nav-link " href="rejestracja.php">Rejestracja</a>';
echo' 	</li>';

echo'  <li class="nav-item ">';
echo'   <a class="nav-link " href="logowanie.php">Logowanie</a>';
echo' 	</li>';
}

echo'</ul>';


echo'  </div>';
echo' </nav>';
?>

<div class="row text-center">
	<div class="col">
<a id="button"></a>
	</div>
</div>


<div class="row text-center" style="opacity: 0.9;">
<div class="col bg-info text-white">

	<div class="napisek08">
	
	<h67>
	Rejestracja</h67>
	
	</div>
</div>
</div>
		


	<div class="row text-center">
	<div class="col " >

	<div id="container2">

		<form method="post">
			
			<input type="text" placeholder="Imie" onfocus="this.placeholder=''" onblur="this.placeholder='Imie'" required value="<?php
			if(isset($_SESSION['fr_nick']))
			{
				
				echo$_SESSION['fr_nick'];
				unset($_SESSION['fr_nick']);
			}
			
			
			?>" name="nick" />
			 
			
			<?php
			
			
			if(isset($_SESSION['e_nick']))
			{
				
				echo'<div class="error">'.$_SESSION['e_nick'].'</div>';
				unset($_SESSION['e_nick']);
			}
			
			?>
			
			
		<input type="text" placeholder="Email" onfocus="this.placeholder=''" onblur="this.placeholder='Email'" required value="<?php
			if(isset($_SESSION['fr_email']))
			{
				
				echo$_SESSION['fr_email'];
				unset($_SESSION['fr_email']);
			}
			
			
			?>" name="email" />
		
		
		
		<?php
			if(isset($_SESSION['e_email']))
			{
				
				echo'<div class="error">'.$_SESSION['e_email'].'</div>';
				unset($_SESSION['e_email']);
			}
			
			?>
		
		
		
			
			<input type="password" placeholder="Twoje hasło" onfocus="this.placeholder=''" onblur="this.placeholder='Twoje hasło'" required value="<?php
			if(isset($_SESSION['fr_haslo1']))
			{
				
				echo$_SESSION['fr_haslo1'];
				unset($_SESSION['fr_haslo1']);
			}
			
			
			?>" name="haslo1" />
			
			
			<?php
			if(isset($_SESSION['e_haslo']))
			{
				
				echo'<div class="error">'.$_SESSION['e_haslo'].'</div>';
				unset($_SESSION['e_haslo']);
			}
			
			?>
		
			
			
			
			<input type="password" placeholder="Powtórz hasło" onfocus="this.placeholder=''" onblur="this.placeholder='Powtórz hasło'" required value="<?php
			if(isset($_SESSION['fr_haslo2']))
			{
				
				echo$_SESSION['fr_haslo2'];
				unset($_SESSION['fr_haslo2']);
			}
			
			
			?>" name="haslo2" />
			
			
			<br><br><br>
		
			
			
		
			<input class='btn3' type="checkbox" required name="regulamin" <?php
			if(isset($_SESSION['fr_regulamin']))
				
				{
					
					echo"checked";
					unset($_SESSION['fr_regulamin']);
				}
			
			?>/><a href="regulamin.php" target="_blank"><b><font color="black">Akceptuję regulamin<a/></b></font>
			
			
			
					<?php
			if(isset($_SESSION['e_regulamin']))
			{
				
				echo'<div class="error">'.$_SESSION['e_regulamin'].'</div>';
				unset($_SESSION['e_regulamin']);
			}
			
			?>
			
			
			
			
		<br><br><br>
			<input type="submit" class="btn btn-info" value="Zarejestruj się">

	</form>
	<a></a>
	</div>
		
	</div>
	</div>

		</div>
<br><br><br>

		<div class="jumbotron text-center" style="margin-bottom:0">

<div class="row ">
    <div class="col-sm-4">
      <h3>Dla klientów</h3>
      <br>
<a href="regulamin.php" style="text-decoration: none; color:chocolate">Regulamin</a>
<br><br>
<a href="kontakt.php" style="text-decoration: none; color:chocolate"> Kontakt</a>
    </div>
    
    <div class="col-sm-4">
      <h3>Infolinia</h3>
      <br>
<p style="color: green;">832 492 921</p>
</div>
<div class="col-sm-4">
    <h3> Godziny otwarcia</h3>
<br>
	<p style="color: darkblue;">pn - pt od 9:30 do 19:00
	<br>
	sob - nd od 9:30 do 17:00</p>
</div>
    
  </div>


		<script src="jquery-3.4.1.min.js"></script>

<script>
var btn = $('#button');

$(window).scroll(function() {
if ($(window).scrollTop() > 200) {
btn.addClass('show');
} else {
btn.removeClass('show');
}
});

btn.on('click', function(e) {
e.preventDefault();
$('html, body').animate({scrollTop:0}, '300');
});

</script>

</body>
</html>