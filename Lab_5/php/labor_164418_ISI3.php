<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <?php
            $nr_indeksu = '164418';
            $nrGrupy= 'ISI3';

            echo 'Michal Pietrzak '.$nr_indeksu.' grupa '.$nrGrupy.'<br/><br/>';
            echo 'Zastosowanie metody include()</br>';
            echo 'include - załącza coś do pliku w miejscu wystąpienia. W razie wystąpienia błędu jest to traktowane jako warning.</br>include_once - załącza coś do pliku w miejscu wystąpienia. W razie próby ponownego załączenia tych samych danych dyrektywa ta zostanie zignorowana. W razie wystąpienia błędu jest to traktowane jako warning.<br/><br/>';
            include 'consider.php';
            include 'consider.php';
            echo '<br/>';
            
            echo 'Zastosowanie metody require_once() na przykładzie pliku aneks.php <br/>';
            echo 'require - załącza coś do pliku w miejscu wystąpienia. Jako że dane są wymagane (required) w razie wystąpienia błędu jest to traktowane jako fatal error.</br>require_once - załącza coś do pliku w miejscu wystąpienia. W razie próby ponownego załączenia tych samych danych dyrektywa ta zostanie zignorowana. Jako że dane są wymagane (required) w razie wystąpienia błędu jest to traktowane jako fatal error.<br/><br/>';
            require_once 'must.php'; 
            require_once 'must.php';
            echo '<br/>';
            
            echo 'Zastosowanie if, else, elseif, switch <br/>';
            $a = 5;
            if ($a == 10)
            {
                echo 'a = 10 <br/>';
            }
            elseif ($a > 10)
            {
                echo 'a > 10';
            }
            else
            {
                echo 'a < 10 <br/>';
            }
            switch ($a) {
                case 1:
                    echo "a=1 <br/>";
                    break;
                case 2:
                    echo "a=2 <br/>";
                    break;
                default:
                    echo "a /= 1 i a /= 2 <br/>";
            }
            echo '<br/>';
            
            echo 'Zastosowanie pętli while() i for() <br/>';
            $i = 5;
            while($i >  0)
            {
                echo 'i = '.$i.'<br/>';
                $i-=1;
            }
            for($j=5; $j>0; $j--)
            {
                echo 'j = '.$j.'<br/>';
            }
            echo '<br/>';
            
            echo 'Zastosowanie typów zmiennych $_GET, $_POST, $_SESSION <br/>';
            echo '$_GET to tablica asocjacyjna zmiennych przekazywana do '
            . 'bieżącego skryptu poprzez parametry adresu URL '
            . '(metoda HTTP GET).<br/>';
            echo '$_POST to tablica asocjacyjna zmiennych przekazywana do '
            . 'bieżącego skryptu metodą żądania HTTP POST.<br/>';
            session_start();
            echo '$_SESSION to tablica asocjacyjna zawierająca zmienne sesji '
            . 'dostępne dla bieżącego skryptu.<br/>';
            $_SESSION['zmienna1']='wartosc1';
            echo 'zmienna1 = '.$_SESSION["zmienna1"].'<br/>';
            ?>
            </body>
        </html>
        