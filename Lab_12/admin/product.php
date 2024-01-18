<link rel="stylesheet" href="../css/product_style.css">

<?php

include('../cfg.php');  // załączenie pliku cfg.php

// funkcja DodajProdukt() wyświetla formularz do dodawania produktu

function DodajProdukt()
{
    global $link;

    echo '
    <div>
        <div class="naglowek">DODAJ PRODUKT</div>
            <form method="post" enctype="multipart/form-data" action="' . $_SERVER['REQUEST_URI'] . '">
                <table>
                    <tr><td class="add5_t">Tytuł: </td><td><input type="text" name="tytuł" required /></td></tr>
					<tr><td class="add5_t">Opis: </td><td><textarea rows=1 cols=10 name="opis"></textarea></td></tr>
					<tr><td class="add5_t">Data wygaśnięcia: </td><td><input type="date" name="data" required /></td></tr>
					<tr><td class="add5_t">Cena netto: </td><td><input type="text" name="cena" required /></td></tr>
					<tr><td class="add5_t">Podatek VAT: </td><td><input type="text" name="vat" required /></td></tr>
					<tr><td class="add5_t">Ilość sztuk w magazynie: </td><td><input type="text" name="ilosc" required /></td></tr>
					<tr><td class="add5_t">Kategoria: </td><td><input type="text" name="kategoria" required /></td></tr>
					<tr><td class="add5_t">Gabaryt produktu:</td><td><input type="text" name="gabaryt" required /></td></tr>
					<tr><td class="add5_t">Zdjęcie: </td><td><input type="file" name="zdjęcie" accept="img/*" required /></td></tr>
                    <tr><td></td><td><input type="submit" name="dodanie_produktu" value="Dodaj" /></td></tr>
                </table>
            </form>
    </div>
    ';

    if (isset($_POST['dodanie_produktu'])) {
        $tytuł = $_POST['tytuł'];
        $opis = $_POST['opis'];
        $data_u = date('Y-m-d');
        $data_m = date('Y-m-d');
        $data_w = $_POST['data'];
        $cena = $_POST['cena'];
        $vat = $_POST['vat'];
        $ilosc = $_POST['ilosc'];
        if ($ilosc > 0 && $data_w >= date('Y-m-d')) {
            $status_dostepnosci = 1;
        } else {
            $status_dostepnosci = 0;
        }
        $kategoria = $_POST['kategoria'];
        $gabaryt = $_POST['gabaryt'];
        $zdjecie = addslashes(file_get_contents($_FILES['zdjęcie']['tmp_name']));
        
        // dodawanie produktu do bazy danych

        $query = "INSERT INTO products (tytul, opis, data_utworzenia, data_modyfikacji, data_wygasniecia, cena_netto,
					podatek_vat, ilosc_sztuk_w_magazynie, status_dostepnosci, kategoria, gabaryt_produktu, zdjecie) 
					VALUES ('$tytuł', '$opis',  '$data_u', '$data_m', '$data_w', '$cena',
					'$vat', '$ilosc', '$status_dostepnosci', '$kategoria', '$gabaryt', '$zdjecie')";
        $result = mysqli_query($link, $query);

        if ($result) {
            echo "<script>window.location.href='product.php';</script>";
            exit();
        } else {
            echo "<center>Wystąpił błąd podczas dodawania produktu: " . mysqli_error($link) . "</center>";
        }
    }
}

// funkcja UsunProdukt() usuwa produkt o danym id

function UsunProdukt()
{
    global $link;

    if (isset($_GET['id'])) {

        // usuwanie produktu o danym ID

        $id = $_GET['id'];
        $query = "DELETE FROM products WHERE id = '$id' LIMIT 1";
        $result = mysqli_query($link, $query);

        if ($result) {
            echo "<script>window.location.href='product.php';</script>";
            exit();
        } else {
            echo "<center>Wystąpił błąd podczas usuwania produktu: " . mysqli_error($link) . "</center>";
        }
    }
}

// funkcja EdytujProdukt() wyświetla formularz do edytowania produktu

function EdytujProdukt()
{
    global $link;

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }
    $query = "SELECT * FROM products WHERE id='$id' LIMIT 1";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);

    echo '
    <div>
        <div class="naglowek">EDYTUJ PRODUKT</div>
            <form method="post" enctype="multipart/form-data" action="' . $_SERVER['REQUEST_URI'] . '">
                <table>
                    <tr><td class="add5_t">Tytuł: </td><td><input type="text" name="tytuł" value="' . $row['tytul'] . '" required /></td></tr>
					<tr><td class="add5_t">Opis: </td><td><textarea rows=1 cols=10 name="opis">' . $row['opis'] . '</textarea></td></tr>
					<tr><td class="add5_t">Data wygaśnięcia: </td><td><input type="date" name="data" value="' . $row['data_wygasniecia'] . '" required /></td></tr>
					<tr><td class="add5_t">Cena netto: </td><td><input type="text" name="cena" value="' . $row['cena_netto'] . '" required /></td></tr>
					<tr><td class="add5_t">Podatek VAT: </td><td><input type="text" name="vat" value="' . $row['podatek_vat'] . '" required /></td></tr>
					<tr><td class="add5_t">Ilość sztuk w magazynie: </td><td><input type="text" name="ilosc" value="' . $row['ilosc_sztuk_w_magazynie'] . '" required /></td></tr>
					<tr><td class="add5_t">Kategoria:</td><td><input type="text" name="kategoria" value="' . $row['kategoria'] . '" required /></td></tr>
					<tr><td class="add5_t">Gabaryt produktu: </td><td><input type="text" name="gabaryt" value="' . $row['gabaryt_produktu'] . '" required /></td></tr>
					<tr><td class="add5_t">Zdjęcie: </td><td><input type="file" name="zdjęcie" accept="img/*" required/></td></tr>
                    <tr><td class="add5_t"></td><td><input type="submit" name="edytowanie_produktu" value="Edytuj" /></td></tr>
                </table>
            </form>
    </div>
    ';

    if (isset($_POST['edytowanie_produktu']) && isset($_GET['id'])) {
        $id = $_GET['id'];
        $tytuł = $_POST['tytuł'];
        $opis = $_POST['opis'];
        $data_m = date('Y-m-d');
        $data_w = $_POST['data'];
        $cena = $_POST['cena'];
        $vat = $_POST['vat'];
        $ilosc = $_POST['ilosc'];
        if ($ilosc > 0 && $data_w >= date('Y-m-d')) {
            $status_dostepnosci = 1;
        } else {
            $status_dostepnosci = 0;
        }
        $kategoria = $_POST['kategoria'];
        $gabaryt = $_POST['gabaryt'];
        $zdjecie = addslashes(file_get_contents($_FILES['zdjęcie']['tmp_name']));

        if (!empty($id)) {

            // edycja produktu w bazie danych

            $query = "UPDATE products SET tytul = '$tytuł', opis = '$opis', data_modyfikacji = '$data_m', data_wygasniecia = '$data_w',
						cena_netto = '$cena', podatek_vat = '$vat', ilosc_sztuk_w_magazynie = '$ilosc', kategoria = '$kategoria',
						gabaryt_produktu = '$gabaryt', zdjecie = '$zdjecie' WHERE id = '$id' LIMIT 1";
            $result = mysqli_query($link, $query);

            if ($result) {
                echo "<script>window.location.href='product.php';</script>";
                exit();
            } else {
                echo "<center>Wystąpił błąd podczas edycji produktu: " . mysqli_error($link) . "</center>";
            }
        }
    }
}

// funkcja PokazObraz() wyświetla obraz produktu o danym id

function PokazObraz()
{
    global $link;

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }

    $query = "SELECT * FROM products WHERE id='$id' LIMIT 1";
    $result = mysqli_query($link, $query);

    if ($result) {
        while ($row = mysqli_fetch_array($result)) {
            echo '<center><p>Produkt:  <b>' . $row['tytul'] . ' - ' . $row['opis'] . '</b></p><img src="data:img/jpeg;base64,' . base64_encode($row['zdjecie']) . '"/></center>';
        }
    } else {
        echo "<center>Wystąpił błąd podczas wyświetlania obrazu: " . mysqli_error($link) . "</center>";
    }
}

// funkcja PokazProdukty() wyświetla tablicę produktów oraz umożliwia wywołanie
// funkcji EdytujProdukt(), UsunProdukt() oraz PokazObraz()

function PokazProdukty()
{
    global $link;

    $query = "SELECT * FROM products ORDER BY id ASC";
    $result = mysqli_query($link, $query);

    if ($result) {
        echo '<div class="naglowek">LISTA PRODUKTÓW</div><center>
        <table>
			<tr>
            <th class="add4_t">Id</th>
            <th class="add4_t">Tytuł</th>
            <th class="add4_t">Opis</th>
            <th class="add4_t">Data utworzenia</th>
            <th class="add4_t">Data modyfikacji</th>
			<th class="add4_t">Data wygaśnięcia</th>
            <th class="add4_t">Cena netto</th>
            <th class="add4_t">Podatek VAT</th>
            <th class="add4_t">Ilość sztuk w magazynie</th>
			<th class="add4_t">Status dostępności</th>
            <th class="add4_t">Kategoria</th>
            <th class="add4_t">Gabaryt</th>
            </tr>';

        while ($row = mysqli_fetch_array($result)) {
            echo '
					<tr>
						<td class="log_4t">' . $row['id'] . '</td>
						<td class="log_4t">' . $row['tytul'] . '</td>
						<td class="log_4t">' . $row['opis'] . '</td>
						<td class="log_4t">' . $row['data_utworzenia'] . '</td>
						<td class="log_4t">' . $row['data_modyfikacji'] . '</td>
						<td class="log_4t">' . $row['data_wygasniecia'] . '</td>
						<td class="log_4t">' . $row['cena_netto'] . '</td>
						<td class="log_4t">' . $row['podatek_vat'] . '</td>
						<td class="log_4t">' . $row['ilosc_sztuk_w_magazynie'] . '</td>
						<td class="log_4t">' . $row['status_dostepnosci'] . '</td>
						<td class="log_4t">' . $row['kategoria'] . '</td>
						<td class="log_4t">' . $row['gabaryt_produktu'] . '</td>
						<td class="normal"><a href="product.php?funkcja=obraz&id=' . $row['id'] . '"><b>Obraz</b></a></td>	
						<td class="normal"><a href="product.php?funkcja=usun&id=' . $row['id'] . '"><b>Usuń</b></a></td>
						<td class="normal"><a href="product.php?funkcja=edytuj&id=' . $row['id'] . '"><b>Edytuj</b></a></td>
					</tr>
				';
        }
        echo '</table></center><br>';
    } else {
        echo "<center>Brak produktów</center>";
    }

    if (isset($_GET['funkcja']) && $_GET['funkcja'] == 'obraz') {
        PokazObraz();
    }
    if (isset($_GET['funkcja']) && $_GET['funkcja'] == 'usun') {
        UsunProdukt();
    }
    if (isset($_GET['funkcja']) && $_GET['funkcja'] == 'edytuj') {
        EdytujProdukt();
    }
}

// wywołujemy funkcję PokazProdukty() i DodajProdukt()

PokazProdukty();
DodajProdukt();

?>