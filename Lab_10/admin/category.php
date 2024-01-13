<link rel="stylesheet" href="../css/category_style.css">

<?php

include('../cfg.php'); // załączenie pliku cfg.php

// funkcja DodajKategorie() wyświetla formularz do dodawania kategorii

function DodajKategorie()
{
    global $link;

    echo '
    <div>
        <div class="naglowek">DODAJ KATEGORIĘ</div>
            <form method="post" action="' . $_SERVER['REQUEST_URI'] . '">
                <table>
                    <tr><td class="add4_t">Nazwa kategorii:</td><td><input type="text" name="name" required /></td></tr>
                    <tr><td class="add4_t">Matka kategorii:</td><td><input type="text" name="mother" value=0 required /></td></tr>
                    <tr><td></td><td><input type="submit" name="dodanie" value="Dodaj" /></td></tr>
                </table>
            </form>
    </div>
    ';

    if (isset($_POST['dodanie'])) {
        $nazwa = $_POST['name'];
        $matka = $_POST['mother'];

        $query = "INSERT INTO categories (mother, name) VALUES ('$matka', '$nazwa')";
        $result = mysqli_query($link, $query);

        if ($result) {
            header("Location: category.php");
            exit();
        } else {
            echo "<center>Wystąpił błąd podczas dodawania kategorii: " . mysqli_error($link) . "</center>";
        }
    }
}

// funkcja Formularz_Usun_Kategorie() wyświetla formularz do usuwania kategorii

function Formularz_Usun_Kategorie()
{
    echo '
    <div>
        <div class="naglowek">USUŃ KATEGORIĘ</div>
            <form method="post" action="' . $_SERVER['REQUEST_URI'] . '">
                <table>
                    <tr><td class="add4_t">Id kategorii:</td><td><input type="text" name="id_usun" required /></td></tr>
                    <tr><td></td><td><input type="submit" name="usuwanie" value="Usuń" /></td></tr>
                </table>
            </form>
    </div>
    ';
}

// funkcja UsunKategorie($id) usuwa kategorie o wskazanym id,
// oraz wszystkie podkategorie

function UsunKategorie($id)
{
    global $link;

    $query = "SELECT id FROM categories WHERE mother = '$id'";
    $result = mysqli_query($link, $query);
    if ($result) {
        while ($row = mysqli_fetch_array($result)) {
            UsunKategorie($row['id']);
        }
    }

    $query1 = "DELETE FROM categories WHERE id = '$id' LIMIT 1";
    $result1 = mysqli_query($link, $query1);
    if (!$result1) {
        echo '<center>Wystąpił błąd podczas usuwania kategorii: <br><center>';
    }
}

// funkcja EdytujKategorie() wyświetla formularz do edycji kategorii

function EdytujKategorie()
{
    global $link;

    echo '
	<div>
		<div class="naglowek">EDYCJA KATEGORII</div>
			<form method="post" action="' . $_SERVER['REQUEST_URI'] . '">
				<table>
					<tr><td class="add4_t">Id kategorii:</td><td><input type="text" name="id_edytuj" required /></td></tr>
					<tr><td class="add4_t">Nazwa kategorii:</td><td><input type="text" name="name" /></td></tr>
					<tr><td class="add4_t">Matka kategorii:</td><td><input type="text" name="mother" /></td></tr>
					<tr><td></td><td><input type="submit" name="edytowanie" value="Edytuj" /></td></tr>
				</table>
			</form>
	</div>
	';

    if (isset($_POST["edytowanie"])) {
        $id = $_POST['id_edytuj'];
        $nazwa = $_POST['name'];
        $matka = $_POST['mother'];

        if (!empty($id)) {
            $query = "UPDATE categories SET name = '$nazwa', mother = '$matka' WHERE id = $id LIMIT 1";
            $result = mysqli_query($link, $query);

            if ($result) {
                header("Location: category.php");
                exit();
            } else {
                echo "Wystąpił błąd podczas aktualizacji kategorii " . mysqli_error($link);
            }
        } else {
            echo "Nieprawidłowe ID kategorii.";
        }
    }
}

// funkcja PokazKategorie($mother, $ile) wyświetla drzewo kategorii

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
            echo ' <b><span style="color:#ff006a;">' . $row['id'] . '</span> ' . $row['name'] . '</b><br><br>';
            PokazKategorie($row['id'], $ile + 1);
        }
        if ($brak == 0 && $ile == 0) {
            echo "</center><b>Brak kategorii<b/></center>";
        }
    }
}

// wywołanie funkcji PokazKategorie(), DodajKategorie(), Formularz_Usun_Kategorie()
// UsunKategorie() i EdytujKategorie()

echo '<div class="naglowek">LISTA KATEGORII</div>';
echo '<p style="margin-left: 45%;">';
PokazKategorie();
echo '</p>';
DodajKategorie();
Formularz_Usun_Kategorie();
if (isset($_POST['usuwanie'])) {
    $id = $_POST['id_usun'];
    UsunKategorie($id);
    header("Location: category.php");
    exit();
}
EdytujKategorie();

?>