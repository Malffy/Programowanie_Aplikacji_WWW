<!DOCTYPE html>

<?php

error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);

?>

<html>

<head>
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Language" content="pl" />
    <meta name="Author" c+ontent="Michał Pietrzak" />
    <link rel="stylesheet" href="css/style.css"> 
    <title>Historia Lotów Kosmicznych</title>
</head>

<body>
    <div id="container">
	
		<div id="logo">
			<div id="avatar"><img src="img/avatar.png" /></div>
            <div id="podpis">Michał <br/>Pietrzak </div>
            <div id="tytul">Historia lotów kosmicznych</div>
            <div style="clear:both;"></div>
		</div>
		
		<div id="menu">
			<div class="option"><a href="index.php?idp="><b>Start</b></a></div>
			<div class="option"><a href="index.php?idp=loty-przestrzenne"><b>Loty Przestrzenne</b></a></div>
			<div class="option"><a href="index.php?idp=technologie-kosmiczne"><b>Technologie Kosmiczne</b></a></div>
			<div class="option"><a href="index.php?idp=astronauci"><b>Astronauci</b></a></div>
			<div class="option"><a href="index.php?idp=badania-kosmiczne"><b>Badania Kosmiczne</b></a></div>
			<div class="option"><a href="index.php?idp=kontakt"><b>Kontakt</b></a></div>
			<div class="option"><a href="index.php?idp=filmy"><b>Filmy</b></a></div>
			<div class="option"><a href="index.php?idp=skrypty"><b>Skrypty</b></a></div>
			<div style="clear:both;"></div>
		</div>

		<?php
		include('cfg.php');
		include('showpage.php');
        if($_GET['idp'] == '') 
        {echo PokazPodstrone(1);}
        if($_GET['idp'] == 'loty-przestrzenne') 
        {echo PokazPodstrone(2);}
        if($_GET['idp'] == 'technologie-kosmiczne') 
        {echo PokazPodstrone(3);}
        if($_GET['idp'] == 'astronauci') 
        {echo PokazPodstrone(4);}
        if($_GET['idp'] == 'badania-kosmiczne') 
        {echo PokazPodstrone(5);}
        if($_GET['idp'] == 'kontakt') 
        {echo PokazPodstrone(6);}
        if($_GET['idp'] == 'filmy')
        {echo PokazPodstrone(7);}
		if($_GET['idp'] == 'skrypty')
        {echo PokazPodstrone(8);}
        ?>

        <div id="lab5">
		<?php
		 $nr_indeksu = '164418';
		 $nrGrupy= 'ISI3';
		 echo 'Michal Pietrzak '.$nr_indeksu.' grupa '.$nrGrupy.'<br/><br/>';
		?>
        </div>
		
		<div id="footer">
        	Programowanie aplikacji WWW - Michał Pietrzak GRUPA 3ISI &copy; Wszelkie prawa są potłuczone.
    	</div>

	</div>
	

</body>

</html>
