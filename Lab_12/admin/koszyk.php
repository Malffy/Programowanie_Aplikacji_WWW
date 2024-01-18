<link rel="stylesheet" href="../css/sklep_style.css">

<?php
session_start();  // inicjacja sesji
include('../cfg.php');  // załączenie pliku cfg.php

// funkcja addToCard() wyświetla formularz do dodawania produktów

function addToCard($id)
{
    global $link;

    if ($id == 0) {
        $query = "SELECT * FROM products ORDER BY id ASC";
        $result = mysqli_query($link, $query);
    } else {
        $query = "SELECT * FROM products WHERE id='$id' LIMIT 1";
        $result = mysqli_query($link, $query);
    }

    echo '<div class="naglowek"><b>DOSTĘPNE PRODUKTY</div>';

    if ($result) {
        $brak = 0;
        while ($row = mysqli_fetch_array($result)) {

            $cena = $row['cena_netto'] + $row['podatek_vat'];

            if ($row['status_dostepnosci'] == 1) {
                $brak = 1;
                echo ' 
				<div><center>
					<img src="data:image/jpeg;base64,' . base64_encode($row['zdjecie']) . '" width="150"/>
					<form method="post" action="koszyk.php?funkcja=dodaj&id=' . $row['id'] . '">
						<input type="hidden" name="idp" value=' . $row['id'] . ' />
						<input type="hidden" name="cena" value=' . $cena . ' />
						<table>
							<tr><td class="log_4t"><b>Nazwa:</b></td><td><b>' . $row['tytul'] . '</b></td></tr>
							<tr><td class="log_4t"><b>Cena:</b></td><td>' . $cena . '</td></tr>
							<tr><td class="log_4t"><b>Ilość:</b></td><td><input type="number" name="ilosc" value=1 required /></td></tr>
							<tr><td></td><td><input type="submit" name="dodawanie_koszyk" value="Dodaj" /></td></tr>
						</table>
					</form>
				</div></center>
			';
            }
        }
        if ($brak == 0) {
            echo '<center>Brak dostępnych produktów</center>';
        }
        echo '</div>';
    } else {
        echo '<center>Brak produktów</center>';
    }

    if (isset($_POST['dodawanie_koszyk']) && isset($_GET['id']) && isset($_GET['funkcja'])) {
        if ($_GET['funkcja'] == 'dodaj') {
            // ustawienie licznika ilości produktów

            if (!isset($_SESSION['count'])) {
                $_SESSION['count'] = 1;
            } else {
                $_SESSION['count']++;
            }

            // nadanie numeru dla produktu w koszyku i innych pól

            $nr = $_SESSION['count'];
            $id_prod = $_POST['idp'];
            $cena = $_POST['cena'];
            $ile_sztuk = $_POST['ilosc'];

            $query = "SELECT * FROM products WHERE id='$id_prod' LIMIT 1";
            $result = mysqli_query($link, $query);
            $row = mysqli_fetch_array($result);

            // zapisanie danych produktów w tablicy 2 wymiarowej - resztę pobierzemy po id_prod z bazy danych

            $prod[$nr]['id_prod'] = $id_prod;
            $prod[$nr]['ile_sztuk'] = $ile_sztuk;
            $prod[$nr]['data'] = time();
            $prod[$nr]['tytul'] = $row['tytul'];
            $prod[$nr]['cena_jednostkowa'] = $cena;
            $prod[$nr]['cena_łączna'] = $cena * $prod[$nr]['ile_sztuk'];
            $prod[$nr]['obraz'] = $row['zdjecie'];

            // stworzenie dwuwymiarowej numeracji - dla jednowymiarowej tablicy

            $nr_0 = $nr . '_0';
            $nr_1 = $nr . '_1';
            $nr_2 = $nr . '_2';
            $nr_3 = $nr . '_3';
            $nr_4 = $nr . '_4';
            $nr_5 = $nr . '_5';
            $nr_6 = $nr . '_6';
            $nr_7 = $nr . '_7';

            // zapisanie w tablicy sesji danych produktów

            $_SESSION[$nr_0] = $nr;
            $_SESSION[$nr_1] = $prod[$nr]['id_prod'];
            $_SESSION[$nr_2] = $prod[$nr]['ile_sztuk'];
            $_SESSION[$nr_6] = $prod[$nr]['cena_łączna'];
            $_SESSION[$nr_3] = $prod[$nr]['data'];
            $_SESSION[$nr_4] = $prod[$nr]['tytul'];
            $_SESSION[$nr_5] = $prod[$nr]['cena_jednostkowa'];
            $_SESSION[$nr_7] = $prod[$nr]['obraz'];

            // przekierowywujemy do koszyk.php

            echo "<script>window.location.href='koszyk.php';</script>";
        }
    }
}

// funkcja removeFromCard() usuwana produkt z koszyka

function removeFromCard()
{
    if (isset($_GET['nr'])) {
        $nr = $_GET['nr'];

        if ($nr == $_SESSION['count']) {
            // jeśli produkt jest na końcu koszyka

            unset($_SESSION[$nr . '_0']);
            unset($_SESSION[$nr . '_1']);
            unset($_SESSION[$nr . '_2']);
            unset($_SESSION[$nr . '_3']);
            unset($_SESSION[$nr . '_4']);
            unset($_SESSION[$nr . '_5']);
            unset($_SESSION[$nr . '_6']);
            unset($_SESSION[$nr . '_7']);
        } else {
            // jeśli produkt nie jest na końcu koszyka

            for ($x = $nr; $x < $_SESSION['count']; $x++) {
                $t = $x + 1;
                $_SESSION[$x . '_1'] = $_SESSION[$t . '_1'];
                $_SESSION[$x . '_2'] = $_SESSION[$t . '_2'];
                $_SESSION[$x . '_3'] = $_SESSION[$t . '_3'];
                $_SESSION[$x . '_4'] = $_SESSION[$t . '_4'];
                $_SESSION[$x . '_5'] = $_SESSION[$t . '_5'];
                $_SESSION[$x . '_6'] = $_SESSION[$t . '_6'];
                $_SESSION[$x . '_7'] = $_SESSION[$t . '_7'];
            }

            unset($_SESSION[$_SESSION['count'] . '_0']);
            unset($_SESSION[$_SESSION['count'] . '_1']);
            unset($_SESSION[$_SESSION['count'] . '_2']);
            unset($_SESSION[$_SESSION['count'] . '_3']);
            unset($_SESSION[$_SESSION['count'] . '_4']);
            unset($_SESSION[$_SESSION['count'] . '_5']);
            unset($_SESSION[$_SESSION['count'] . '_6']);
            unset($_SESSION[$_SESSION['count'] . '_7']);
        }

        // jeśli usunęliśmy jedyny produkt w koszyku

        $_SESSION['count']--;
        if ($_SESSION['count'] == 0) {
            unset($_SESSION['count']);
        }

        // przekierowanie do koszyk.php

        echo "<script>window.location.href='koszyk.php';</script>";
    }
}

// funkcja EdytujIlosc() wyświetla formularz do edytowania ilości produktu w koszyku

function EdytujIlosc()
{
    global $link;

    if (isset($_GET['nr'])) {
        $nr = $_GET['nr'];
        $id = $_SESSION[$nr . '_1'];

        // wyszukujemy w bazie danych produkt o id = $id

        $query = "SELECT * FROM products WHERE id='$id' LIMIT 1";
        $result = mysqli_query($link, $query);
        $row = mysqli_fetch_array($result);

        // wyświetlamy formularz

        echo '
		<div>
			<h1 class="naglowek"><b>EDYTUJ ILOŚĆ</b></h1>
				<form method="post" action="' . $_SERVER['REQUEST_URI'] . '">
                <center>
					<table>
						<tr><td log_4t><b>Ilość: </b></td><td><input type="number" name="ilosc" value="' . $_SESSION[$nr . '_2'] . '" required /></td></tr>
						<tr><td></td><td><input type="submit" name="edytowanie_ilosci" value="Edytuj" /></td></tr>
				</table>
                </center>
				</form>
		</div>
		';

        if (isset($_POST['edytowanie_ilosci']) && !empty($_GET['nr'])) {
            // jeśli ilość jest mniejsza od 1, to ustanawiamy na 1

            $ile =   $_POST['ilosc'];
            if ($ile < 1) {
                echo "<script>window.location.href='koszyk.php';</script>";
                exit();
            }

            // jeśli ilość jest większa od ilości sztuk w magazynie, to ustanawiamy na ilość sztuk w magazynie

            if ($ile > $row['ilosc_sztuk_w_magazynie']) {
                $ile = $row['ilosc_sztuk_w_magazynie'];
            }

            $_SESSION[$nr . '_2'] = $ile;
            $_SESSION[$nr . '_6'] = $_SESSION[$nr . '_5'] * $ile;

            // przekierowujemy do koszyk.php

            echo "<script>window.location.href='koszyk.php';</script>";
            exit();
        }
    }
}

// funkcja showCard() wyświetla zawartość koszyka
// umożliwia usunięcię i zmianę ilości produktu
// wyczyszczenie całego koszyka oraz złożenie zamówienia zakończające sesje

function showCard()
{
    $suma = 0; // suma cen z koszyka

    echo '<div class="naglowek">KOSZYK</div>';

    if (isset($_SESSION['count'])) {

        echo '
			<table>
                <tr>
                <th></th>
                <th class="add4_t">Nazwa</th>
                <th class="add4_t">Ilość</th>
                <th class="add4_t">Cena</th>
                <th class="add4_t">Razem</th>
                </tr>';

        $x = 1;

        while ($x <= $_SESSION['count']) {
            // obliczamy wartość zmiennej $suma

            $suma += $_SESSION[$x . '_6'];

            echo '
					<tr>				
						<td><img src="data:image/jpeg;base64,' . base64_encode($_SESSION[$x . '_7']) . '"width="100"/></td>
						<td class="add6_t">' . $_SESSION[$x . '_4'] . '</td>
						<td class="add6_t">' . $_SESSION[$x . '_2'] . '</td>
						<td class="add6_t">' . $_SESSION[$x . '_5'] . '</td>
						<td class="add6_t">' . $_SESSION[$x . '_6'] . '</td>
						<td><a href="koszyk.php?funkcja=usun&nr=' . $_SESSION[$x . '_0'] . '"><b>Usuń</b></a></td>
						<td><a href="koszyk.php?funkcja=edytuj&nr=' . $_SESSION[$x . '_0'] . '"><b>Ilość</b></a></td>
					</tr>
				';

            $x++;
        }

        echo '
				<tr>	
					<td></td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td class="add5_t"><b>Suma: </b></td>
					<td class="add5_t">' . $suma . '</td>
					<td><a href="koszyk.php?funkcja=wyczysc"><b>Wyczyść</b></a></td>
					<td><a href="koszyk.php?funkcja=zamowienie"><b>Zamów</b></a></td>
					<td></td><td></td>			
				</tr>				
				</table></center><br>
			';

        if (isset($_GET['funkcja']) && $_GET['funkcja'] == 'edytuj') {
            EdytujIlosc();
        }
        echo '</div>';
    } else {
        echo 'Brak produktów w koszyku</center></div>';
    }
}

echo '<div class="row">';

// wywołanie funkcji addToCard()

if (isset($_GET['dostepne_produkty']) && !empty($_GET['dostepne_produkty'])) {
    $iddp = $_GET['dostepne_produkty'];
    addToCard($iddp);
} else {
    addToCard(0);
}

showCard(); // wywołanie funkcji showCard()

// wywołanie funkcji removeFromCard()

if (isset($_GET['funkcja']) && $_GET['funkcja'] == 'usun') {
    removeFromCard();
}

// wyczyszczenie koszyka

if (isset($_GET['funkcja']) && $_GET['funkcja'] == 'wyczysc') {
    session_destroy();
    echo "<script>window.location.href='koszyk.php';</script>";
    exit();
}

// złożenie zamówienie i zakończenie sesji

if (isset($_GET['funkcja']) && $_GET['funkcja'] == 'zamowienie') {
    session_destroy();
    echo "<script>window.location.href='zatwierdzenie.php';</script>";
    exit();
}

echo '<br><div class="naglowek"><a href="sklep.php">POWRÓT DO SKLEPU</a></div>';
echo '</div>';

?>