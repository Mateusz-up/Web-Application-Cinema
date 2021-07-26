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
	
	<div class="row text-center" style="opacity: 0.8;">
<div class="col bg-success ">
	<div class="napisek04">
	
	<h67>
	Rezerwacja miejsc</h67>
	
	</div>
</div>
</div>
	
<br><br>
	
	<?php
	
	function showSeans($id)
{
	global $link;
	
	$wyniki = mysqli_query($link,"Select * from godziny_seansu  where id=$id ") 
or die('Błąd zapytania'); 

	$day_array = array(1=>'Poniedziałek', 'Wtorek', 'Środa', 'Czwartek', 'Piątek', 'Sobota', 'Niedziela');
	if(mysqli_num_rows($wyniki) > 0) 
	{ 
	while($r = mysqli_fetch_object($wyniki))
	{
	$ide_godz_seansu=$r->id;
	$ide_seansu=$r->id_seansu;
	$ide_zapowiedzi=$r->id_zapowiedzi;
	$ide_czasu_seansu=$r->time2;
	$ide_czasu_seansu=substr($ide_czasu_seansu,0,strlen($ide_czasu_seansu)-3);
	$ide_dzien_seansu=$r->day;
	$day_array = array(1=>'Poniedziałek', 'Wtorek', 'Środa', 'Czwartek', 'Piątek', 'Sobota', 'Niedziela');
	$day_string=$day_array[$ide_dzien_seansu];
	
	
	
	
	$wyniki2 = mysqli_query($link,"select * from seanse where id =$ide_seansu")or die('Błąd zapytania');
	 while($re = mysqli_fetch_object($wyniki2)){
	
	$ide_filmu= $re->id;
	$ide_sala=$re->id_sala;	
	$ide_nazwa_filmu=$re->nazwa;

	$wyniki3 = mysqli_query($link,"select * from sale where id =$ide_sala")or die('Błąd zapytania');
	 while($ra = mysqli_fetch_object($wyniki3))
	{
	
	$ide_nazwa_sali=$ra->nazwa;
	$ide_rzedy=$ra->rzedy;
	$ide_miejsca=$ra->miejsca;
	
		echo'<div class="row text-center">';
		echo'<div class="col">';

		echo'<div class="opis_rezerwacji">';
                
           echo"  Sala: <b>$ide_nazwa_sali</b>";
           echo"    | Film: <b>$ide_nazwa_filmu</b>";
           echo"  | <b>$day_string :</b>";
           echo"  <b>$ide_czasu_seansu</b>";
		  
		   echo'</div>';
		   echo'</div>';
	  	echo'</div>';


	  echo'<div class="row text-center" >';
	  echo'<div class="col">';
		  echo'<div class="sala">';
		  echo'</div>';
		  

		  
		  
		  
              echo'  <div id="ekran">EKRAN</div> ';
			  echo'</div>';
			 echo'</div>';

			 echo'<div class="row text-center" >';
	  echo'<div class="col ">';
			
			  print '<form action="rezerwacja.php" method="post">';
			
			 print '<input type="hidden" name="id_seans" value="'.$r->id.'">';
			 print '<input type="hidden" name="id_filmu" value="'.$re->id.'">';
			
			  
			 for ($i = 1; $i <= $ide_rzedy; $i++){
				 
				
				
			 print '<div id="lp">'.$i.'</div>';	 
			 
			 

			  for ($l = 1; $l <= $ide_miejsca; $l++){
						 
						 $wyniki5 =mysqli_query($link,"select * from rezerwacja where rzad =$i and miejsce = $l and id_godziny_seansu =$ide_godz_seansu"  )or die('Błąd zapytania beka');
			
			
			 if(mysqli_num_rows($wyniki5) > 0){
                         
                            

                                print '<input class="btn2" type="checkbox" id="'.$i.$l.'" name="s[]" value="'.$i.'v'.$l.'" disabled><label for="'.$i.$l.'" title="Zarezerwowane"><span>'.$l.'</span></label>';
                              }
                               else{
                                 print '<input class="btn2"  type="checkbox" id="'.$i.$l.'"  name="s[]" value="'.$i.'v'.$l.'" /><label for="'.$i.$l.'"><span>'.$l.'</span></label>';
                               }
			 
			
			
			 }
	print '</br>';
			 
			 }
			 
			 echo'</div>';
			 echo'</div>';
			 
			
			
			 echo'<div class="row text-center">';
			 echo'<div class="col">';
			 echo'<br>';
			 if(isset($_SESSION['id'])==""){
			echo" <input class='btn btn-warning' type='submit'value='Rezerwuj' id='checkBtn' data-toggle=tooltip data-placement='bottom 'title='Musisz być zalogowanym aby dodać rezerwacje do koszyka!'/>";
			 }
			 else{
				echo" <input class='btn btn-warning' type='submit'value='Rezerwuj' id='checkBtn' '/>";
			 }
			echo"</form>";
			echo'</div>';
			echo'</div>';

		
			
			
		
				 
		
	
	
	  
	 $k=0;	 
$wyniki6 =mysqli_query($link,"select * from rezerwacja where id_godziny_seansu =$ide_godz_seansu"  )or die('Błąd zapytania beka');
while($re55 = mysqli_fetch_object($wyniki6)){
	
	
	$k++;
	
	
	
	
	
}
echo'<br>';
	echo'<div class="row justify-content-md-center">';
	echo'<div class="col col-md-auto">';

	echo'<div class="card border-info mb-3 text-center" style="max-width: 18rem;margin-right: auto;margin-left: auto; ">';
	echo'<div class="card-header" style="font-size:25px;">Dostępność miejsc</div>';
	
	echo'<div class="card-body text-info">';


	
  	$ilosc_miejsc=$ide_rzedy*$ide_miejsca;
 	$zajete_miejsca=$k;
 	$wolne_miejsca=$ilosc_miejsc-$zajete_miejsca;
 
	echo'<h81>';
 	echo"Ilość miejsc siedzących w sali: $ilosc_miejsc";
	echo'<br><br>';
 	echo'</h81>';
 
	echo'<h82>';
	echo"Ilość miejsc zajętych w sali: $zajete_miejsca";
	echo'</h82>';
	echo'<br><br>';
	echo'<h83>';
	echo"Ilość miejsc wolnych w sali: $wolne_miejsca";
	echo'</h83>';
	
	echo'</div>';
	echo'</h5>';

	echo'</div>';
	echo'</div>';

	echo'</div>';
	echo'</div>';
	

 

	
	
	
	}	 
	
	 }
	
	}
	
	}
	
}
	
	if(isset($_GET['id_seans']))
{
	showSeans($_GET['id_seans']);
	
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


<script type="text/javascript">
$(document).ready(function () {
    $('#checkBtn').click(function() {
      checked = $("input[type=checkbox]:checked").length;

      if(!checked) {
        alert("Wybierz miejsce siedzące do rezerwacji ");
        return false;
      }

    });
});

</script>



	
</body>

</html>