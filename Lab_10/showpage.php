<?php

// funkcja PokazPodstrone pobiera treści strony o określonym
// identyfikatorze ($id) z bazy danych o nazwie moja_strona

function PokazPodstrone($id)
{

	// tworzy połączenie z bazą danych MySQL, 
	// używając podanych danych dostępowych.

	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$baza = 'moja_strona';

	$link = mysqli_connect($dbhost, $dbuser, $dbpass, $baza);

	// oczyszcza wartość identyfikatora za pomocą funkcji htmlspecialchars 
	// w celu zapobieżenia atakom typu Cross-Site Scripting (XSS).

	$id_clear = htmlspecialchars($id);

	// wykonuje zapytanie SQL w celu pobrania rekordu z tabeli 
	// page_list o określonym identyfikatorze.

	$query = "SELECT * FROM page_list WHERE id='$id_clear' LIMIT 1";
	$result = mysqli_query($link, $query);

	// Pobiera pierwszy (limit 1) wiersz
	// wyników zapytania i zapisuje go w tablicy asocjacyjnej $row

	$row = mysqli_fetch_array($result);

	// Sprawdza, czy istnieje rekord o danym identyfikatorze w bazie danych.
	// Jeśli nie, ustawia zmienną $web na [nie_znaleziono_strony].
	// W przeciwnym razie, przypisuje wartość kolumny page_content do zmiennej $web.

	if (empty($row['id'])) {
		$web = '[nie_znaleziono_strony]';
	} else {
		$web = $row['page_content'];
	}

	// Funkcja zwraca treść strony

	return $web;
}
