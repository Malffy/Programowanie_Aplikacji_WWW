<link rel="stylesheet" href="../css/product_style.css">

<?php

include('../cfg.php');  // załączenie pliku cfg.php

// funkcja PokazKategorie() wyświetla kategorie oraz umożliwia wywołanie funkcji PrzegladajKategorie()

function PokazKategorie($mother = 0, $ile = 0)
{
    global $link;

    $query = "SELECT * FROM categories WHERE mother = '$mother'";
    $result = mysqli_query($link, $query);

    if ($result) {
        $brak = 0;
        while ($row = mysqli_fetch_array($result)) {
            $brak = 1;
            for ($i = 0; $i < $ile; $i++) {
                echo '&nbsp;&nbsp;&nbsp;<span style="color: #c300ff;">=====</span>';
            }
            echo ' <b><span style="color:#ff006a;">' . $row['id'] . '</span> ' . $row['name'] . '</b>';

            // sprawdzenie czy istnieją produkty z danej kategorii

            $idk = $row['id'];
            $query1 = "SELECT * FROM products WHERE kategoria='$idk'";
            $result1 = mysqli_query($link, $query1);

            if ($row1 = mysqli_fetch_array($result1)) {
                echo '<a href="sklep.php?funkcja=przegladaj&id=' . $row['id'] . '">PRZEGLĄDAJ</a>';
            }

            echo '<br><br>';

            // wywołanie funkcji PokazKategorie() dla podkategorii

            PokazKategorie($row['id'], $ile + 1);
        }
        if ($brak == 0 && $ile == 0) {
            echo "<center>BRAK KATEGORII</center>";
        }
    } else {
        echo "<center>Wystąpił błąd podczas wyświetlania kategorii</center>";
    }
}

// funkcja PrzegladajKategorie() wyświetla produkty z danej kategorii

function PrzegladajKategorie($id)
{
    global $link;
    $query =  "SELECT * FROM products WHERE kategoria='$id'";
    $result = mysqli_query($link, $query);

    echo '<div class="naglowek">LISTA PRODUKTÓW</div><center><table>';

    if ($result) {
        $brak = 0;

        // sprawdzenie czy istnieją produkty z danej kategorii

        while ($row = mysqli_fetch_array($result)) {
            if ($brak == 0) {
                // wyświetlamy nagłówki

                echo '
                <tr>
                <th class="add5_t">Id</th>
                <th class="add5_t">Nazwa</th>
                <th class="add5_t">Opis</th>
                <th class="add5_t">Ilość</th>
                <th class="add5_t">Dostępność</th>
                <th class="add5_t">Cena</th>
                </tr>';
            }

            $brak = 1;

            // ustalamy cenę brutto produktu

            $cena = $row['cena_netto'] + $row['podatek_vat'];

            // wyświetlamy produkt z możliwością jego pokazania

            echo '
					<tr>
						<td class="add4_t">' . $row['id'] . '</td>
						<td class="add4_t">' . $row['tytul'] . '</td>
                        <td class="add4_t">' . $row['opis'] . '</td>
                        <td class="add4_t">' . $row['ilosc_sztuk_w_magazynie'] . '</td>
                        <td class="add4_t">' . $row['status_dostepnosci'] . '</td>
						<td class="add4_t">' . $cena . '</td>
					</tr>
				';
        }
        if ($brak == 0) {
            echo '<center>Brak produktów</center>';
        } else {
            echo '</table></center><br>';
        }
    } else {
        echo '<center>Błąd podczas wyświetlania produktów</center>';
    }
}

echo '<br><h1 class="naglowek">WITAMY W SKLEPIE!</h1><br>';
echo '<h2 class="naglowek">PRZEGLĄDAJ KATEGORIE</h2><p style="margin-left: 44%;">';

// wywołujemy funkcję PokazKategorie()

PokazKategorie();

echo '</p>';

// jeśli zmienna $_GET['funkcja'] jest ustawiona i ma wartość równą 'przegladaj',
// to wywołujemy funkcję PrzegladajKategorie z argumentem $id

if (isset($_GET['funkcja']) && $_GET['funkcja'] == 'przegladaj') {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        PrzegladajKategorie($id);
        echo '<p><center><a href="sklep.php">UKRYJ LISTĘ</a></p></center>';
    }
}

echo '<h2 class="naglowek"><a href="koszyk.php">PRZEJDŹ DO KOSZYKA</a></h2>';
echo '<h2 class="naglowek"><a href="../index.php">POWRÓT DO STRONY GŁÓWNEJ</a></h2>';

?>