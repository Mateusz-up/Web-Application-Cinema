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


	
	

	



<section>
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://img.hulu.com/user/v3/artwork/f82b95f5-13da-4acd-b378-7d3f6864919f?base_image_bucket_name=image_manager&base_image=4b2d95d2-c41b-4ed2-b9d1-cc0f8f80e0a2&region=US&format=jpeg&size=952x536" width="350px" height="500px" class="d-block w-100" alt="Spider-Man">
            </div>
            <div class="carousel-item">
                <img src="https://live.staticflickr.com/2377/2451433325_cc299ef845_b.jpg" width="350px" height="500px" class="d-block w-100" alt="Batman">
            </div>
            <div class="carousel-item">
                <img src="https://d-pt.ppstatic.pl/kadry/k/r/1/7d/eb/55c1e1d319547_o.jpg?1441268065" width="350px" height="500px" class="d-block w-100" alt="F&F 7">
            </div>
            
        </div>
        <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>

<br><br>
<div class="row text-center">
	<div class="col">
<div class="napisek01 bg-info text-white">
	
	<h67>
	Nowości</h67>
	
	</div>
	</div>
	</div>
	<br><br><br>

    <?php
	


	

	$wyniki = mysqli_query($link,"Select * from seanse") 
or die('Błąd zapytania'); 

$k=0;
$day_array = array(1=>'Poniedziałek', 'Wtorek', 'Środa', 'Czwartek', 'Piątek', 'Sobota', 'Niedziela');
	if(mysqli_num_rows($wyniki) > 0) { 
	while($r = mysqli_fetch_object($wyniki))
	{
		
		$ide3=$r->id;
$nazwa=$r->nazwa;
$url=$r->url_zdjec;
$id_opisu_zdjec=$r->id_opisu_zdj;
$opis=$r->opis;
$czas_trwania=$r->czas_trwania;
$cena=$r->cena;
$od_kiedy=$r->since_day;
$idik=nl2br($r->id_opisu_zdj);
$id_sali=$r->id_sala;


$dacik2=strtotime($od_kiedy);

$obecna_data = date("Y-m-d");
$pozostalo = strtotime($obecna_data);

if($pozostalo < $dacik2)
{
	$k++;


  
 
 

  
  $wyniki222 = mysqli_query($link,"select * from sale where id =$id_sali ")or die('Błąd zapytania');
					
					
                 while($re = mysqli_fetch_object($wyniki222)){
					 
					 
					$sala=$re->nazwa;
					echo'	<div class="card  bg-dark mb-3" style="width: 100%; opacity:0.8; ">';
  
					echo' <div class="card-body">';

					echo'<div class="row text-center">';


  					echo'<div class="col-sm-4">';
					  

					  print '<figcaption>'.$r->nazwa.'</figcaption>';
					  echo'</div>';
					  echo'</div>';


					  echo'<div class="row text-center">';
					  echo'<div class="col-sm-4">';

				
                print '<img src="'.$r->url_zdjec.'"  class="rounded"  width="200" height"200" alt="plakat"/>';
			
                
				echo'</div>';
               

                echo'<div class="col-sm-8">';
               print '<div class="opis"><p>'.$r->opis.'</br></br>Czas trwania: '.$r->czas_trwania.'</br></br>Cena: '.$r->cena. ' zł </br></br>Premiera: '.$r->since_day. ' </br></br>Sala: '.$re->nazwa. ' </p></div>';
			   echo'</div>';
			   echo'</div>';
			   echo'</div>';
			   echo'</div>';
			   echo'<br><br>';
}


}
	}
	
	if($k > 0 ){

	}
	else{
		
		echo'<div class="row text-center bg-dark text-white">';
	echo'<div class="col">';
		echo"<div class='koinfo2'>";
			echo"<h28>";
			echo"Brak nowych premier filmów";
			echo"</h28>";
			echo"</div>";
			echo"</div>";
			echo"</div>";
			echo'<br><br>';
		
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