<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
if(isset($_SESSION['id'])) $id_uzytkownika = $_SESSION['id']; 
		
    } 
include("connect.php");

if(isset($id_uzytkownika)=="")
{
	header('Location: index.php');
}

?>


<!DOCTYPE html>
<html lang="pl">

<head>
<meta charset="utf-8" />
<title>Kino Benex</title><meta name="description" content="Kino Benex"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="keywords" content="filmy,benex,kino" />
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="style2.css" rel="stylesheet" type="text/css" />
<link href="css/fontello.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Merriweather:400,900,900i" rel="stylesheet">
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
	
	<br><br><br>
	
		<div class="row text-center" style="opacity: 0.9;">
			<div class="col bg-dark text-white">
		<div class="napisek010">
	
	<h67>
	 Informacje o zamówieniu</h67>
	
	</div>

			</div>
		</div>



		<br><br>
		
		<div class="card border-warning mb-3 text-center" style="max-width: 20rem;margin-right: auto;margin-left: auto; ">
		<div class="card-body bg-dark">
		<div class="row text-center">
			<div class="col">
		<div class="pow">
	<a href="panel_uzytkownika.php"> Powrót do panelu użytkownika</a>
	</div>
	</div>
	</div>

		</div>
		</div>
<br><br>


	
	<?php
	if(isset($_SESSION['id'])!="")
	{

wyswietl_zamowienie($id_uzytkownika);


	}
	?>



	<?php
	function wyswietl_zamowienie($id_uzytkownika)
	{
		
		global $link;
	
	if(isset($_SESSION['id'])!="")
		{
		$id_uzytkownika = $_SESSION['id'];
		$wyniki = mysqli_query($link,"Select * from zamowienia  where id_uzytkownika=$id_uzytkownika ") or die('Błąd zapytania'); 
	$i=0;
		$k=0;
	if(mysqli_num_rows($wyniki) > 0)
	{
		echo'<div class="card border-success mb-3 text-center" style="max-width: 25rem;margin-right: auto;margin-left: auto; ">';
		echo'<div class="card-body bg-light " >';
		echo'<div class="row text-center">';
		echo'<div class="col">';
		echo"<div class='pusto22'>";
		echo"<h45>";
		echo"Zawartość twojego zamówienia";
		echo"</h45>";
		echo"</div>";
		echo"</div>";
		echo"</div>";
		
		
		echo"</div>";
		echo"</div>";
		echo'<br><br>';
		
			while($re = mysqli_fetch_object($wyniki))
			{
				$data_zamowienia=$re->data;
				$imie=$re->name;
				$nazwisko=$re->surname;
				$ulica=$re->adress;
				$id_miasto=$re->miasto;
				$id_rzad=$re->rzad;
				$id_miejsce=$re->miejsce;
				$id_sala=$re->sala;
				$id_cena=$re->cena;
				$id_czasu=$re->time;
				$id_dzien=$re->day;
				$id_film=$re->film;
				
			$numeryTowarow[$i]=$re->name;
			if($numeryTowarow[$i]!= '')
		{
		$idkoszyka[$k]=$re->id;
		$i++;
		$k++;
	
		}


	echo'<div class="card text-white bg-success mb-3" style="width:100%; opacity:0.9;">';
	echo' <div class="card-header text-center">';
		echo"<div class='pusto3'>";
		echo"<h45>";
		echo"Bilet zotanie doręczony przez kuriera w ciągu 2-3 dni";
		echo"</h45>";
		echo"</div>";
	echo'</div>';

	echo'<div class="card-body">';
	echo'   <h5 class="card-title">';

	
	
	
				echo"<div class='wyswie12'>";
		echo"<h555>";
		echo'<div class="row text-center">';
	echo'<div class="col-sm-3">';
				echo ($i).".".$id_film."";
		

				echo'</div>';

		
		
		
					
				echo'<div class="col-sm-3">';
					
		
		 echo "Sala: ".$id_sala."";
		
			 

		 echo'</div>';
					
		 echo'<div class="col-sm-3">';
		
		 echo "Rząd: ".$id_rzad."";
		  echo "  Miejsce: ".$id_miejsce."";
		
			 
		  echo'</div>';
		  echo'<div class="col-sm-3">';
		
		
		 echo "Dzień: ".$id_dzien."";
		
		 echo'</div>';


		 echo'</div>';
			 
		echo'<br>';
		 echo'<div class="row text-center">';
		 echo'<div class="col-sm-4">';
		
	
		 echo "Godzina: ".$id_czasu."";
		
		 echo'</div>';



		 echo'<div class="col-sm-3">';
		
		 echo "Cena: ".$id_cena."zł";
		
		 echo'</div>';
			 
		 echo'<div class="col-sm-3">';
	
		 echo "Zamówiono: ".$data_zamowienia."";
							 
		 echo'</div>';
		 echo'</div>';

		 echo'<br>';
		 echo'<div class="row text-center">';
		 echo'<div class="col-sm-3">';
	
		 echo "Imię: ".$imie."";
							 
		 echo'</div>';
		
		 echo'<div class="col-sm-3">';
		 echo "Nazwisko: ".$nazwisko."";
							 

		 echo'</div>';

		 echo'<div class="col-sm-3">';
		
		 echo "Miasto: ".$id_miasto."";
							 

				
		 echo'</div>';

		 echo'<div class="col-sm-3">';
	
		 echo "Ulica: ".$ulica."";
					
		 
		 echo'</div>';
		 echo'</div>';
		 
		 echo'</h5>';
		echo"</h555>";
				echo"</div>";
				echo' </div>';
	echo'</div>';
	
	
	
			}
	
	}	
	
	else
	{
	    echo'<div class="card border-success mb-3 text-center" style="max-width: 25rem;margin-right: auto;margin-left: auto; ">';
		echo'<div class="card-body bg-primary text-info " >';
		echo'<div class="row text-center">';
		echo'<div class="col">';
		echo"<div class='pusto2'>";
		echo"<h45>";
		echo"Twoje zamówienia są puste";
		echo"</h45>";
		echo"</div>";
		echo"</div>";
		echo"</div>";
		echo"</div>";
		echo"</div>";
	}
	echo"<br><br>";
	
	
		}
	}
	
	?>
	


</div>


	
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