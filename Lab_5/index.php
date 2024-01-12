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
        $strona = '';
        if($_GET['idp'] == '') 
        {$strona = './html/glowna.html';}
        if($_GET['idp'] == 'loty-przestrzenne') 
        {$strona = './html/loty-przestrzenne.html';}
        if($_GET['idp'] == 'technologie-kosmiczne') 
        {$strona = './html/technologie-kosmiczne.html';}
        if($_GET['idp'] == 'astronauci') 
        {$strona = './html/astronauci.html';}
        if($_GET['idp'] == 'badania-kosmiczne') 
        {$strona = './html/badania-kosmiczne.html';}
        if($_GET['idp'] == 'kontakt') 
        {$strona = './html/kontakt.html';}
        if($_GET['idp'] == 'filmy')
        {$strona = './html/filmy.html';}
		if($_GET['idp'] == 'skrypty')
        {$strona = './html/skrypty.html';}


        if(file_exists($strona))
        {
        	include($strona);
        }
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
