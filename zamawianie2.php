<?php

session_start();
if(isset($_SESSION['id'])) $id_uzytkownika = $_SESSION['id']; 
if(isset($_SESSION['email'])) $login = $_SESSION['email']; 
include("connect.php");

$id_cena=$_POST['idzik40'];
$id_rzad=$_POST['idzik41'];
$id_miejsce=$_POST['idzik42'];
$id_sale=$_POST['idzik43'];
$ide_czasu_seansu=$_POST['idzik44'];
$day_string=$_POST['idzik45'];
$id_rezerwacji=$_POST['idzik46'];
$imie=$_POST['imie'];
$nazwisko=$_POST['nazwisko'];
$miasto=$_POST['miasto'];
$ulica=$_POST['ulica'];
$film=$_POST['idzik47'];

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

<a id="button"></a>
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
<a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Wyloguj si??</a></div>';
			echo'<br>';
			echo'</div>';
			echo'</div>';
	echo'</div>';
	}
	
	

?>




<?php

	$wynik = mysqli_query($link,"Select * from sale") or die('B????d zapytania'); 
	
	

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
echo'    <a class="nav-link" href="index.php">Strona g????wna <span class="sr-only">(current)</span></a>';
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
	<br><br>
	

	<div class="row text-center" style="opacity: 0.9;">
		<div class="col bg-light text-success">
	<div class="napisek011">
	
	<h67>
	Zam??wienie zrealizowane</h67>
	
	</div>
	</div>
	</div>
	<br><br><br>
	
	<div class="card border-success mb-3 text-center" style="max-width: 28rem;margin-right: auto;margin-left: auto; ">
		<div class="card-body bg-dark ">
	<div class="row text-center">
		<div class="col">
	<div class="powrkosz"><a href="wyswietlanie_koszyka.php">Powr??t do koszyka</a></div>
	</div>
	<div class="col">
	<div class="powrkosz2"><a href="showzamowienie.php">Zobacz zam??wienie</a></div>
	</div>
	</div>
		</div>
	</div>
	
	<?php


function dodawanieZamowienia($id_cena,$id_rzad,$id_miejsce,$id_sale,$ide_czasu_seansu,$day_string,$imie,$nazwisko,$miasto,$ulica,$film)
{
	
	global $link;
	$data=date("Y-m-d H:i:s");
	
		$id_uzytkownika = $_SESSION['id']; 
					
		$zapytanie2 = "INSERT INTO `zamowienia` ( `id_uzytkownika`, `data`, `name`, `surname`, `adress`, `miasto`, `rzad`, `miejsce`, `sala`, `cena`, `time`, `day`,`film`) VALUES ( '$id_uzytkownika', '$data','$imie','$nazwisko','$ulica','$miasto','$id_rzad','$id_miejsce','$id_sale','$id_cena','$ide_czasu_seansu','$day_string','$film')";
		$sql2 = mysqli_query($link,$zapytanie2) or die ("??le sformu??owane ????danie danych");
	
	
		

		
}

		dodawanieZamowienia($id_cena,$id_rzad,$id_miejsce,$id_sale,$ide_czasu_seansu,$day_string,$imie,$nazwisko,$miasto,$ulica,$film);

?>
	
	
	<?php
	function usuwanieKosza($id_rezerwacji)
{
	
	global $link;
		
		$zapytanie3 = "delete from rezerwacja where id=$id_rezerwacji";
$sql3 = mysqli_query($link,$zapytanie3) or die ("??le sformu??owane ????danie danych2");

}


usuwanieKosza($id_rezerwacji);


?>

<br><br>
<div class="card border-info mb-3 text-center" style="max-width: auto;margin-right: auto;margin-left: auto; ">
		<div class="card-body bg-white">
	<div class="row text-center">
	<div class="col">
	<p style="font-size: 25px; color:darkcyan">Dzi??kujemy za dokonanie zakupu biletu!
	</p>
	<p style="font-size: 25px; color:darkcyan">
	Status zam??wienia biletu mo??esz sprawdzi?? w panelu u??ytkownika.</p>
	</div>
	</div>
		</div>
</div>
	<br><br>
</div>

	
<div class="jumbotron text-center" style="margin-bottom:0">

<div class="row ">
    <div class="col-sm-4">
		
      <h3>Dla klient??w</h3>
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