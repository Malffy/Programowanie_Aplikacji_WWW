<link rel="stylesheet" href="../css/admin_style.css">

<?php

session_start();  // inicjacja sesji
include('../cfg.php'); // załączenie pliku cfg.php

// funkcja FormularzLogowania() zwraca formularz logowania

function FormularzLogowania()
{
    $wynik = '
    <div id="logowanie">
        <h1 class="naglowek">Panel CMS</h1>
            <form method="post" enctype="multipart/form-data" action="' . $_SERVER['REQUEST_URI'] . '">
                <table class="">
                    <tr><td class="log4_t">Login: </td><td><input type="text" name="login"/></td></tr>
                    <tr><td class="log4_t">Hasło: </td><td><input type="password" name="pass"/></td></tr>
                    <tr><td>&nbsp;</td><td><input type="submit" name="logowanie" value="Zaloguj się" /></td></tr>
                </table>
            </form>
    </div>
    ';

    return $wynik;
}

// funkcja ListaPodstron() pobiera dane z bazy i wyświetla listę podstron
// w tym przypadku wyświetla listę podstron (id, tytuł) wraz z przyciskami usuń oraz edytuj
// wywołuję funkcje DodajNowaPodstrone()

function ListaPodstron()
{
    global $link;
    $query = "SELECT * FROM page_list ORDER BY id ASC";
    $result = mysqli_query($link, $query);

    echo '<h1 class="naglowek">Lista podstron</h1><center><table>';

    if ($result) {

        $brak = 0;
        while ($row = mysqli_fetch_array($result)) {
            $brak = 1;
            echo '
					<tr>
						<td class="tdid"><b>' . $row['id'] . '<b></td>
						<td class="tdnazwa"><b>' . $row['page_title'] . '<b></td>
						<td class="tdusun"><a href="admin.php?funkcja=usun&id=' . $row['id'] . '"><b>Usuń</b></a></td>
						<td class="tdedytuj"><a href="admin.php?funkcja=edytuj&id=' . $row['id'] . '"><b>Edytuj</b></a></td>
					</tr>
				';
        }

        echo '</table></center><br>';

        if ($brak == 0) {
            echo "<center>BRAK PODSTRON</center>";
        }
    } else {
        echo '<center>Wystąpił błąd podczas wyświetlania strony</center>';
    }

    // wywołanie funkcj UsunPodstrone()

    if (isset($_GET['funkcja']) && $_GET['funkcja'] == 'usun') {
        UsunPodstrone();
    }

    // wywołanie funkcji EdytujPodstrone()


    if (isset($_GET['funkcja']) && $_GET['funkcja'] == 'edytuj') {
        EdytujPodstrone();
    }

    // wywołanie funkcji DodajNowaPodstrone()

    DodajNowaPodstrone();
}

// funkcja EdytujPodstrone() wyświetla formularz do edycji podstrony
// edytuję daną podstronę zamieniając obecne dane na te wprowadzone przez użytkownika

function EdytujPodstrone()
{
    global $link;
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }
    $query = "SELECT * FROM page_list WHERE id='$id' LIMIT 1";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    echo '
    <div class="">
        <h1 class="naglowek"><b>Edytuj podstronę<b/></h1>
            <form method="post" enctype="multipart/form-data" action="' . $_SERVER['REQUEST_URI'] . '">
                <table>
                    <tr><td class="edit_4t"><b>Tytuł podstrony: <b/></td><td><input type="text" name="page_title" size="108" value=' . $row['page_title'] . ' /></td></tr>
                    <tr><td class="edit_4t"><b>Treść podstrony: <b/></td><td><textarea rows=20 cols=100 name="page_content"/>' . $row['page_content'] . '</textarea></td></tr>
                    <tr><td class="edit_4t"><b>Status podstrony: <b/></td><td><input type="checkbox" name="status" checked /></td></tr>
                    <tr><td>&nbsp;</td><td><input type="submit" name="edycja" value="Edytuj" /></td></tr>
                </table>
            </form>
    </div>
    ';

    // edycja podstrony

    if (isset($_POST['edycja']) && isset($_GET['id'])) {
        $id = $_GET['id'];
        $tytul = $_POST['page_title'];
        $tresc = $_POST['page_content'];
        $status = isset($_POST['status']) ? 1 : 0;

        if (!empty($id)) {
            $query = "UPDATE page_list SET page_title = '$tytul', page_content = '$tresc', status = $status WHERE id = $id LIMIT 1";

            $result = mysqli_query($link, $query);

            if ($result) {
                echo "<script>window.location.href='admin.php';</script>";
                exit();
            } else {
                echo "<center>Błąd podczas edycji: " . mysqli_error($link) . "</center>";
            }
        }
    }
}

// funkcja DodajNowaPodstrone() wyświetla formularz do dodania nowej podstrony
// tworzy ona nową podstronę na bazie wprowadzonych przez użytkownika danych

function DodajNowaPodstrone()
{
    global $link;
    echo '
    <div class="">
        <h1 class="naglowek"><b>Dodaj podstronę<b/></h1>
            <form method="post" name="AddForm" enctype="multipart/form-data" action="' . $_SERVER['REQUEST_URI'] . '">
                <table class="dodaj">
                    <tr><td class="add_4t"><b>Tytuł podstrony: <b/></td><td><input type="text" name="page_title_add" size="108"/></td></tr>
                    <tr><td class="add_4t"><b>Treść podstrony: <b/></td><td><textarea rows=20 cols=100 name="page_content_add" /></textarea></td></tr>
                    <tr><td class="add_4t"><b>Status podstrony: <b/></td><td><input type="checkbox" name="status_add" checked /></td></tr>
                    <tr><td>&nbsp;</td><td><input type="submit" name="dodawanie" class="dodaj" value="Dodaj" /></td></tr>
                </table>
            </form>
    </div>
    ';

    // dodawanie podstrony

    if (isset($_POST['dodawanie'])) {
        $tytul = $_POST['page_title_add'];
        $tresc = $_POST['page_content_add'];
        $status = isset($_POST['status_add']) ? 1 : 0;

        $query = "INSERT INTO page_list (page_title, page_content, status) VALUES ('$tytul', '$tresc', $status)";
        $result = mysqli_query($link, $query);

        if ($result) {
            echo "<script>window.location.href='admin.php';</script>";
            exit();
        } else {
            echo "<center>Wystąpił błąd podczas dodawania podstrony: " . mysqli_error($link) . "</center>";
        }
    }
}


//funkcja UsunPodstrone() usuwa podstronę o danym id

function UsunPodstrone()
{
    global $link;
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $query = "DELETE FROM page_list WHERE id = $id LIMIT 1";
        $result = mysqli_query($link, $query);

        if ($result) {
            echo "<script>window.location.href='admin.php';</script>";
            exit();
        } else {
            echo "<center>Wystapił błąd podczas usuwania podstrony: " . mysqli_error($link) . "</center>";
        }
    }
}

// sprawdzenie czy użytkownik jest zalogowany
// wyswietlanie odpowiedniego komunikatu po zalogowaniu
// wywołanie funckji ListaPodstron()
// przekierwowania do panelu Kontakt, Kategorie oraz Produkty
// wyświetla napis "Wyloguj się", umożliwiający wylogowanie się z serwisu

if (isset($_SESSION['status_logowania']) && $_SESSION['status_logowania'] == 1) {
    echo '<center><br>Jesteś zalogowany i masz dostęp do metod administracyjnych. <br><br></center>';
    ListaPodstron();
    echo '<h2 class="naglowek"><a class="linki" href="contact.php">Kontakt</a><br></h2>';
    echo '<h2 class="naglowek"><a class="linki" href="category.php">Zarządzaj kategoriami</a><br></h2>';
    echo '<h2 class="naglowek"><a class="linki" href="product.php">Zarządzaj produktami</a><br></h2>';
    echo '<h2 class=naglowek><a href="wyloguj.php">Wyloguj się</a></h2>';
} else {
    echo FormularzLogowania();
}

// sprawdzenie poprawności wpisanych w formularzu logowania danych
// wyświetlenie odpowieniego komunikatu przy wprowadzeniu nieprawidłowych danych

if (isset($_POST['login']) && isset($_POST['pass'])) {
    if ($_POST['login'] == $login && $_POST['pass'] == $pass) {
        $_SESSION['status_logowania'] = 1;
        echo "<script>window.location.href='admin.php';</script>";
    } else {
        echo '<center><br><br><br><br><br>Wprowadzono niepoprawne dane! <br><br>Spróbuj zalogować się ponownie.</center>';
    }
}


?>