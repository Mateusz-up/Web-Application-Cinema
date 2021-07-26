<?php

session_start();
if(isset($_SESSION['id'])) $id_uzytkownika = $_SESSION['id']; 
if(isset($_SESSION['email'])) $login = $_SESSION['email']; 
include("connect.php");



?>

<!DOCTYPE html>
<html lang="pl">

<head>
<meta charset="utf-8" />
<title>Kino Benex</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Kino Benex"/>
<meta name="keywords" content="filmy,benex,kino" />
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="css/fontello.css" rel="stylesheet" type="text/css" />
<link href="style2.css" rel="stylesheet" type="text/css" />
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
	
<br>

	<div class="row text-center" style="opacity: 0.9;">
		<div class="col bg-primary text-white">
	<div class="napisek07">
	
	<h67> Informacje o koszyku</h67>
	
	</div>
	</div>
	</div>

<br><br>
	
	<div class="row text-center">
		<div class="col">


	
	<?php
	if(isset($_SESSION['id'])!="")
	{

wyswietl_koszyk($id_uzytkownika);


	}
	
	else
		
		{
			echo'<br><br>';
			echo'<div class="card border-warning mb-3 text-center" style="max-width: 40rem;margin-right: auto;margin-left: auto; ">';
			echo'<div class="card-body bg-dark">';
			echo"<div class='pusto2'>";
			echo"<h45>";
			echo"Musisz być zalogowanym, aby wyświetlić zawartość koszyka.";
			echo"</h45>";
			echo"</div>";
			echo"</div>";
			echo"</div>";
			echo'<br><br><br><br><br><br>';
			
		}
	
	
	
	
	
	?>

	</div>
	</div>
	
	

	
	
	<?php


	function wyswietl_koszyk($id_uzytkownika)
	{
		echo'<br>';

		
		echo'<div class="card border-light mb-3 text-center" style="max-width: 20rem;margin-right: auto;margin-left: auto; ">';
		echo'<div class="card-body bg-dark ">';
		echo'<div class="row text-center">';
		echo'<div class="col ">';
		
		echo'<div class="pow">';
		
	echo'<a href="panel_uzytkownika.php"> Powrót do panelu użytkownika</a>';
	echo'</div>';
	echo'</div>';
	echo'</div>';
	echo'</div>';
	echo'</div>';

echo'<br><br>';
		global $link;
		$day_array = array(1=>'Poniedziałek', 'Wtorek', 'Środa', 'Czwartek', 'Piątek', 'Sobota', 'Niedziela');
		if(isset($_SESSION['id'])!="")
		{
		$id_uzytkownika = $_SESSION['id'];
		$wyniki = mysqli_query($link,"Select * from rezerwacja  where id_uzytkownika=$id_uzytkownika ") or die('Błąd zapytania'); 
		$i=0;
		$k=0;
	if(mysqli_num_rows($wyniki) > 0)
	{
		echo'<div class="card border-light mb-3 text-center" style="max-width: 20rem;margin-right: auto;margin-left: auto; ">';
		echo'<div class="card-body bg-success ">';
		echo'<div class="row text-center">';
		echo'<div class="col">';
		echo"<div class='pusto2'>";
		echo"<h45>";
		echo"Zawartość twojego koszyka";
		echo"</h45>";
		echo"</div>";
		echo"</div>";
		echo"</div>";
		echo"</div>";
		echo"</div>";


		echo'<div class="row text-center">';
		echo'<div class="col">';

	echo"<div class='color'>";
	
		echo "Rezerwacja biletu dostępna 3 godziny, po tym czasie zostanie usunięta z koszyka.";
	
		echo"</div>";
		
		echo"</div>";
		
		echo"</div>";
		
		
			
		while($re = mysqli_fetch_object($wyniki))
			{
				$id_rezerwacji=$re->id;
				$id_rzad=$re->rzad;
				$id_miejsce=$re->miejsce;
				$id_godz_seansu=$re->id_godziny_seansu;
				$data_dodania=$re->data;
		
			
			
			
			$numeryTowarow[$i]=$re->id_godziny_seansu;
			if($numeryTowarow[$i]!= '')
		{
		$idkoszyka[$k]=$re->id;
		$i++;
		$k++;
	
		}
				
			
				
			
			
		
		
		
			
				
				$wyniki3 = "select * from godziny_seansu where id =$id_godz_seansu";
					$sql3 = mysqli_query($link,$wyniki3) or die ("Źle sformułowane żądanie danych");
			$ra = mysqli_fetch_object($sql3);
			
				 
					 
					 $ide_dzien_seansu=$ra->day;
					$day_array = array(1=>'Poniedziałek', 'Wtorek', 'Środa', 'Czwartek', 'Piątek', 'Sobota', 'Niedziela');
				$day_string=$day_array[$ide_dzien_seansu];
					 $ide_czasu_seansu=$ra->time2;
				$ide_czasu_seansu=substr($ide_czasu_seansu,0,strlen($ide_czasu_seansu)-3);
				$id_seansu=$ra->id_seansu;
				$wyniki5 = "Select * from seanse  where id=$id_seansu ";
					 $sql4 = mysqli_query($link,$wyniki5) or die ("Źle sformułowane żądanie danych");
			$rb = mysqli_fetch_object($sql4);
			
				 
			
				
					 $nazwa_filmu=$rb->nazwa;
					 $id_filmu=$rb->id;
					 $id_sale=$rb->id_sala;
					 $id_cena=$rb->cena;
					echo'<br><br><br>';
					
					
					$wyniki6 = "Select * from sale  where id=$id_sale ";
					 $sql5 = mysqli_query($link,$wyniki6) or die ("Źle sformułowane żądanie danych");
			$rbe = mysqli_fetch_object($sql5);
				
				 
					  
					  $nazwa_sali=$rbe->nazwa;
					  
				echo'<br><br>';
				echo"<div class='wyswie12'>";
				echo"<h555>";

				echo'<div class="card bg-info mb-3" style="width:100%; opacity:0.9;">';

 			 echo'<div class="card-body">';
   
    		echo'<p class="card-text">';


					  echo'<div class="row text-center">';
					  echo'<div class="col-sm-3">';
				 
		
	
		
		
				echo ($i).".".$nazwa_filmu."";
				echo'</div>';
		
		
					
			 echo'<div class="col-sm-3">';
					
					
	
		 echo "Sala: ".$id_sale."";
		
			 

				echo"</div>";
				
				echo'<div class="col-sm-3">';


						
		
		
		 echo "Rząd: ".$id_rzad."";
		  echo "  Miejsce: ".$id_miejsce."";
		

				
				echo"</div>";

				echo'<div class="col-sm-3">';

				
		
		 echo "Dzień: ".$day_string."";
		
		
			 

				
				echo"</div>";

				echo"</div>";
				
				echo'<br><br>';

				echo'<div class="row text-center">';
				echo'<div class="col-sm-3">';
				
	
		 echo "Godzina: ".$ide_czasu_seansu."";
		
		
			 

				
				echo"</div>";

				echo'<div class="col-sm-3">';
				
			
		
		 echo "Cena: ".$id_cena."zł";
		
		
			 
	
				echo"</div>";
			
				
				echo'<div class="col-sm-4">';

		
		
		 echo "Dodano do koszyka: ".$data_dodania."";
		
		
			 
	
				echo"</div>";
		
				
				echo"</div>";

		
		
	
				echo'<div class="row text-center">';
				echo'<div class="col-sm-11">';
		
		echo"<form action='usuwanie_koszyka.php' method='post'>";
		echo"<input type='hidden' name='idzik4' value='$id_rezerwacji'>";
		echo"<input type='image' title='Kliknij aby usunąć rezerwacje' class='kosz' id='szukan2' alt='szukan'  src='images/kosz.jpg' width='45' height'45'>";
	
		
		
		echo"</form>";
	
		
		
	
		echo"<form action='zamawianie.php' method='post'>";
						 
		echo"<input type='hidden' name='idzik20' value='$id_cena'>";
		echo"<input type='hidden' name='idzik27' value='$nazwa_filmu'>";
		echo"<input type='hidden' name='idzik21' value='$id_rzad'>";
		echo"<input type='hidden' name='idzik22' value='$id_miejsce'>";
		echo"<input type='hidden' name='idzik23' value='$id_sale'>";
		echo"<input type='hidden' name='idzik24' value='$ide_czasu_seansu'>";
		echo"<input type='hidden' name='idzik25' value='$day_string'>";
		echo"<input type='hidden' name='idzik26' value='$id_rezerwacji'>";
		echo'<input type="submit" class="btn btn-dark" style="position: relative;top:0.6cm;position: relative;left:0.4cm;"value="Zamów">';
		
	echo"</form>";		
	echo"</h555>";
	echo"</div>";
	echo"</div>";
	
		
	
				echo"</div>";

			
				
				echo'</p>';
		   
				
			
	
		
	echo"</div>";
			
	echo"</div>";
					 
		
			
			
			$zapytanie36 = "DELETE FROM rezerwacja WHERE data < NOW() - INTERVAL 3 HOUR";
		$sql33 = mysqli_query($link,$zapytanie36) or die ("Źle sformułowane żądanie danych2");

		
	}
			
	}
	else
	{
		echo'<div class="card border-warning mb-3 text-center" style="max-width: 20rem;margin-right: auto;margin-left: auto; ">';
		echo'<div class="card-body bg-info">';
		echo"<div class='pusto2'>";
		echo"<h45>";
		echo"Twój koszyk jest pusty";
		echo"</h45>";
		echo"</div>";
		echo"</div>";
		echo"</div>";
	}
	echo"<br><br>";
		
	
		
		
		
		
		
		
		
	}
		
	
		
	}	
	
	
	?>
		
		

</div>

<div class="jumbotron text-center" style="margin-bottom:0; ">

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

<script>
function flash(id, kolor, czas, kolor2, czas2)
{
	document.getElementById(id).style.color = kolor;
	setTimeout('flash("' + id + '","' + kolor2 + '",' + czas2 + ',"' + kolor + '",' + czas + ')', czas);
}
</script>


	
</body>

</html>