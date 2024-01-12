-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sty 12, 2024 at 02:10 AM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moja_strona`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `page_list`
--

CREATE TABLE `page_list` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_title` varchar(255) DEFAULT NULL,
  `page_content` text DEFAULT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `page_list`
--

INSERT INTO `page_list` (`id`, `page_title`, `page_content`, `status`) VALUES
(1, 'glowna', '<!DOCTYPE html>\r\n<html>\r\n  <head>\r\n    <title>Historia Lotów Kosmicznych</title>\r\n    <link rel=\"stylesheet\" href=\"./css/style.css\" />\r\n  </head>\r\n\r\n  <div class=\"rectangle\">\r\n    <div class=\"recL1\"><img src=\"img/img1.jpg\" /></div>\r\n    <div class=\"recR1\">\r\n      <span class=\"bigtitle\">Wprowadzenie</span>\r\n      <div style=\"height: 15px\"></div>\r\n      Rozpoczniemy naszą podróż przez historię lotów kosmicznych, odkrywając\r\n      fascynujące momenty, niezwykłe osiągnięcia i trudności, z jakimi ludzkość\r\n      musiała się zmierzyć, aby osiągnąć gwiazdy.\r\n      <br /><br />\r\n      Loty kosmiczne to podróże ludzkości w przestrzeń kosmiczną. Są one możliwe\r\n      dzięki wykorzystaniu rakiet, które pozwalają na osiągnięcie prędkości\r\n      niezbędnych do opuszczenia atmosfery Ziemi.\r\n    </div>\r\n    <div style=\"clear: both\"></div>\r\n  </div>\r\n\r\n  <div class=\"rentangle\">\r\n    <div class=\"recL2\">\r\n      <span class=\"bigtitle\">Początki</span>\r\n      <div style=\"height: 15px\"></div>\r\n      Pierwsze pomysły na podróże kosmiczne pojawiły się już w starożytności. W\r\n      mitologii greckiej można znaleźć legendy o podróżach do gwiazd. W\r\n      średniowieczu natomiast pojawiły się pierwsze teoretyczne prace na temat\r\n      możliwości lotów kosmicznych\r\n      <br /><br />\r\n      W średniowieczu, wraz z rozwojem nauki i filozofii, pojawiły się pierwsze\r\n      teoretyczne prace na temat możliwości lotów kosmicznych. Średniowieczni\r\n      uczonych, inspirując się starożytną mitologią, zaczęli zastanawiać się nad\r\n      fizycznymi aspektami podróży poza granice atmosfery Ziemi.\r\n    </div>\r\n    <div class=\"recR2\"><img src=\"img/img4.jpg\" /></div>\r\n    <div style=\"clear: both\"></div>\r\n  </div>\r\n\r\n  <div class=\"rectangle\">\r\n    <div class=\"recL1\"><img src=\"img/img3.jpg\" /></div>\r\n    <div class=\"recR1\">\r\n      <span class=\"bigtitle\">Pierwsze sukcesy</span>\r\n      <div style=\"height: 15px\"></div>\r\n      Pierwszym udanym lotem w przestrzeń kosmiczną była misja radzieckiej sondy\r\n      Sputnik 1, która została wystrzelona 4 października 1957 roku. Sputnik 1\r\n      był pierwszym sztucznym satelitą na orbicie Ziemi.\r\n      <br /><br />\r\n      W 1961 roku Jurij Gagarin został pierwszym człowiekiem, który poleciał w\r\n      kosmos. Gagarin wystartował na pokładzie radzieckiego statku kosmicznego\r\n      Wostok 1 i dokonał jednego okrążenia wokół Ziemi.\r\n    </div>\r\n    <div style=\"clear: both\"></div>\r\n  </div>\r\n\r\n  <div class=\"rentangle\">\r\n    <div class=\"recL2\">\r\n      <span class=\"bigtitle\">Obecnie</span>\r\n      <div style=\"height: 15px\"></div>\r\n      Obecnie loty kosmiczne są powszechne. Do przestrzeni kosmicznej wysyłane\r\n      są satelity, które służą do celów komunikacyjnych, naukowych czy\r\n      wojskowych. W kosmosie pracują również stacje kosmiczne, które są\r\n      wykorzystywane do prowadzenia badań naukowych.\r\n      <br /><br />\r\n      Stacje kosmiczne, krążące w odległej przestrzeni, stają się kolejnymi\r\n      bastionami ludzkiej wiedzy. Pełniąc funkcję zaawansowanych laboratoriów,\r\n      pozwalają na prowadzenie badań w warunkach mikrograwitacyjnych,\r\n      nieosiągalnych na powierzchni Ziemi.\r\n    </div>\r\n    <div class=\"recR2\"><img src=\"img/img2.jpg\" /></div>\r\n    <div style=\"clear: both\"></div>\r\n  </div>\r\n</html>\r\n', 1),
(2, 'loty-przestrzenne', '<!DOCTYPE html>\r\n\r\n<head>\r\n  <title>Historia lotów kosmicznych</title>\r\n  <link rel=\"stylesheet\" href=\"./css/style.css\" />\r\n</head>\r\n\r\n<div class=\"headingL\">LOTY PRZESTRZENNE - PRZYSZŁOŚĆ TRANSPORTU</div>\r\n<div class=\"wallM\">\r\n  <div class=\"headingS\">PRZYSZŁOŚĆ TRANSPORTU</div>\r\n  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam fringilla\r\n  tortor sed arcu ornare, at feugiat dui fringilla. Vestibulum dolor arcu,\r\n  ultricies at felis sed, varius iaculis lorem. Donec nec massa ullamcorper,\r\n  fermentum lectus dictum, placerat erat. Vestibulum rhoncus nunc nisi, et\r\n  feugiat eros rutrum non. Cras ac ex dapibus nisi eleifend consequat in nec ex.\r\n  Aenean ultricies, orci sit amet pulvinar elementum, leo purus sollicitudin\r\n  odio, sit amet maximus purus magna at libero. Integer neque lectus, euismod eu\r\n  facilisis non, imperdiet vulputate sapien. In lacinia dui ante, ac placerat\r\n  ipsum consequat quis. Curabitur tempus tortor sit amet tincidunt vehicula.\r\n  Praesent vel nisl ac diam scelerisque dictum. In imperdiet nibh vitae purus\r\n  sollicitudin molestie. Nulla porta nisi sit amet magna mollis pretium sit amet\r\n  et ligula. Etiam mattis eros id velit ornare, sed sagittis neque commodo.\r\n  Donec quis ultricies mauris, sit amet rutrum augue.\r\n</div>\r\n<div class=\"wallL\"><img src=\"./img/img5.jpg\" /></div>\r\n<div class=\"wallM\">\r\n  <div class=\"headingS\">TRANSPORT TOWARÓW</div>\r\n  Praesent in tincidunt erat. In hac habitasse platea dictumst. Cras purus quam,\r\n  pretium eget est quis, convallis molestie magna. Orci varius natoque penatibus\r\n  et magnis dis parturient montes, nascetur ridiculus mus. Curabitur turpis\r\n  elit, efficitur et leo a, fermentum dictum magna.\r\n  <br /><br />\r\n  <div class=\"headingS\">TURYSTYKA KOSMICZNA</div>\r\n  Donec scelerisque imperdiet diam, eu posuere nisi molestie sed. Etiam pharetra\r\n  dui et est facilisis vestibulum. Nulla rhoncus velit ut viverra bibendum.\r\n  Fusce dictum ante non tempus tincidunt. Mauris ac dictum magna. Morbi sit amet\r\n  aliquam nisi, sed mattis risus. Phasellus et sapien nulla. Curabitur cursus\r\n  elit non sem rhoncus finibus. Vivamus bibendum arcu sit amet nisi porta, id\r\n  laoreet ligula finibus. Aliquam viverra, tortor mollis sollicitudin pulvinar,\r\n  justo urna finibus nibh, et lobortis ex risus eu neque.\r\n</div>\r\n', 1),
(3, 'technologie-kosmiczne', '<!DOCTYPE html>\r\n\r\n<head>\r\n  <title>Historia lotów kosmicznych</title>\r\n  <link rel=\"stylesheet\" href=\"./css/style.css\" />\r\n</head>\r\n\r\n<div class=\"headingL\">TECHNOLOGIE KOSMICZNE - KLUCZ DO PRZYSZŁOŚCI</div>\r\n\r\n<div class=\"rectangle\">\r\n  <div class=\"recL1\"><img src=\"./img/img8.png\" /></div>\r\n  <div class=\"recR1\">\r\n    <span class=\"bigtitle\">Wprowadzenie</span>\r\n    <div style=\"height: 15px\"></div>\r\n    Rozpoczniemy naszą podróż przez historię lotów kosmicznych, odkrywając\r\n    fascynujące momenty, niezwykłe osiągnięcia i trudności, z jakimi ludzkość\r\n    musiała się zmierzyć, aby osiągnąć gwiazdy.\r\n    <br /><br />\r\n    Loty kosmiczne to podróże ludzkości w przestrzeń kosmiczną. Są one możliwe\r\n    dzięki wykorzystaniu rakiet, które pozwalają na osiągnięcie prędkości\r\n    niezbędnych do opuszczenia atmosfery Ziemi.\r\n  </div>\r\n  <div style=\"clear: both\"></div>\r\n</div>\r\n\r\n<div class=\"wallM\">\r\n  <div class=\"headingS\">TRANSPORT TOWARÓW</div>\r\n  Praesent in tincidunt erat. In hac habitasse platea dictumst. Cras purus quam,\r\n  pretium eget est quis, convallis molestie magna. Orci varius natoque penatibus\r\n  et magnis dis parturient montes, nascetur ridiculus mus. Curabitur turpis\r\n  elit, efficitur et leo a, fermentum dictum magna.\r\n  <br /><br />\r\n  <div class=\"headingS\">TURYSTYKA KOSMICZNA</div>\r\n  Donec scelerisque imperdiet diam, eu posuere nisi molestie sed. Etiam pharetra\r\n  dui et est facilisis vestibulum. Nulla rhoncus velit ut viverra bibendum.\r\n  Fusce dictum ante non tempus tincidunt. Mauris ac dictum magna. Morbi sit amet\r\n  aliquam nisi, sed mattis risus. Phasellus et sapien nulla.\r\n</div>\r\n\r\n<div class=\"wallL\"><img src=\"./img/img6.jpg\" /></div>\r\n\r\n<div class=\"wallM\">\r\n  <div class=\"headingS\">PRZYSZŁOŚĆ TRANSPORTU</div>\r\n  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam fringilla\r\n  tortor sed arcu ornare, at feugiat dui fringilla. Vestibulum dolor arcu,\r\n  ultricies at felis sed, varius iaculis lorem. Donec nec massa ullamcorper,\r\n  fermentum lectus dictum, placerat erat. Vestibulum rhoncus nunc nisi, et\r\n  feugiat eros rutrum non. Cras ac ex dapibus nisi eleifend consequat in nec ex.\r\n  Aenean ultricies, orci sit amet pulvinar elementum, leo purus sollicitudin\r\n  odio, sit amet maximus purus magna at libero. Integer neque lectus, euismod eu\r\n  facilisis non, imperdiet vulputate sapien. In lacinia dui ante, ac placerat\r\n  ipsum consequat quis. Curabitur tempus tortor sit amet tincidunt vehicula.\r\n  Praesent vel nisl ac diam scelerisque dictum.\r\n</div>\r\n\r\n<div class=\"rentangle\">\r\n  <div class=\"recL2\">\r\n    <span class=\"bigtitle\">Początki</span>\r\n    <div style=\"height: 15px\"></div>\r\n    Pierwsze pomysły na podróże kosmiczne pojawiły się już w starożytności. W\r\n    mitologii greckiej można znaleźć legendy o podróżach do gwiazd. W\r\n    średniowieczu natomiast pojawiły się pierwsze teoretyczne prace na temat\r\n    możliwości lotów kosmicznych\r\n    <br /><br />\r\n    W średniowieczu, wraz z rozwojem nauki i filozofii, pojawiły się pierwsze\r\n    teoretyczne prace na temat możliwości lotów kosmicznych. Średniowieczni\r\n    uczonych, inspirując się starożytną mitologią, zaczęli zastanawiać się nad\r\n    fizycznymi aspektami podróży poza granice atmosfery Ziemi.\r\n  </div>\r\n  <div class=\"recR2\"><img src=\"./img/img9.jpg\" /></div>\r\n  <div style=\"clear: both\"></div>\r\n</div>\r\n', 1),
(4, 'astronauci', '<!DOCTYPE html>\r\n\r\n<head>\r\n  <title>Historia lotów kosmicznych</title>\r\n  <link rel=\"stylesheet\" href=\"./css/style.css\" />\r\n</head>\r\n\r\n<table class=\"galery\">\r\n  <tr>\r\n    <td class=\"name\">Jurij Gagarin</td>\r\n    <td class=\"name\">Neil Armstrong</td>\r\n    <td class=\"name\">John Glenn</td>\r\n  </tr>\r\n  <tr>\r\n    <td class=\"portrait\"><img src=\"./img/gagarin.jpg\" /></td>\r\n    <td class=\"portrait\"><img src=\"./img/neil.jpg\" /></td>\r\n    <td class=\"portrait\"><img src=\"./img/glenn.jpg\" /></td>\r\n  </tr>\r\n  <tr>\r\n    <td class=\"quote\">\"I see the earth! It is beautiful!\"</td>\r\n    <td class=\"quote\">\"One small step for man, one giant leap for mankind.\"</td>\r\n    <td class=\"quote\">\"Zero G and I feel fine.\"</td>\r\n  </tr>\r\n</table>\r\n\r\n<table class=\"galery\">\r\n  <tr>\r\n    <td class=\"name\">Buzz Aldrin</td>\r\n    <td class=\"name\">Sally Ride</td>\r\n    <td class=\"name\">Chris Hadfield</td>\r\n  </tr>\r\n  <tr>\r\n    <td class=\"portrait\"><img src=\"./img/aldrin.jpg\" /></td>\r\n    <td class=\"portrait\"><img src=\"./img/ride.jpg\" /></td>\r\n    <td class=\"portrait\"><img src=\"./img/hadfield.jpg\" /></td>\r\n  </tr>\r\n  <tr>\r\n    <td class=\"quote\">\r\n      \"If we can conquer space, we can conquer childhood hunger.\"\r\n    </td>\r\n    <td class=\"quote\">\r\n      \"The stars don\'t look bigger, but they do look brighter.\"\r\n    </td>\r\n    <td class=\"quote\">\r\n      \"Every decision you make,turns you into who you are tomorrow, and the day\r\n      after that.\"\r\n    </td>\r\n  </tr>\r\n</table>\r\n', 1),
(5, 'badania-kosmiczne', '<!DOCTYPE html>\r\n\r\n<head>\r\n  <title>Historia lotów kosmicznych</title>\r\n  <link rel=\"stylesheet\" href=\"./css/style.css\" />\r\n</head>\r\n\r\n<div class=\"headingL\">Badania Kosmiczne - Odkrywanie Tajemnic Wszechświata</div>\r\n\r\n<div style=\"text-align: justify\">\r\n  <img src=\"./img/ten1.jpg\" style=\"float: left; margin-right: 10px\" />Lorem\r\n  ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ligula erat,\r\n  hendrerit sed volutpat ac, malesuada ut turpis. Morbi non quam ullamcorper,\r\n  tristique ex at, condimentum ex. Praesent tincidunt nunc vitae neque pretium\r\n  iaculis. Nam tincidunt nunc magna, nec tempus lectus dapibus in. Etiam\r\n  hendrerit diam nec lectus pretium, nec vulputate ligula vestibulum. Mauris\r\n  tristique nunc nisi, vitae porttitor arcu blandit egestas. Morbi quis ipsum\r\n  sed lectus rhoncus posuere in mattis dolor. Integer et lorem consectetur,\r\n  convallis lectus quis, tempus lorem. Nulla eget vehicula justo, non\r\n  pellentesque metus. Aenean pharetra ante eget ipsum lacinia aliquam. Sed sed\r\n  blandit libero. Curabitur congue tortor nec mi tincidunt tincidunt. Nullam vel\r\n  pulvinar turpis. Nunc placerat, nisl lobortis maximus porta, magna ipsum\r\n  tempus leo, eget feugiat sem ex a dui. Integer scelerisque elit sit amet augue\r\n  efficitur interdum. Integer mauris nulla, facilisis sed elementum nec,\r\n  elementum dictum lectus. Quisque aliquet condimentum nunc. Interdum et\r\n  malesuada fames ac ante ipsum primis in faucibus. Integer varius commodo\r\n  consequat. Sed lorem lorem, cursus sit amet dictum et, egestas at diam. Class\r\n  aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos\r\n  himenaeos. Cras vestibulum sapien et eros sodales, pulvinar mollis enim\r\n  dapibus.\r\n  <img src=\"./img/ten2.jpg\" style=\"float: right; margin-left: 10px\" /> Class\r\n  aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos\r\n  himenaeos. Nullam id porta urna, eleifend tincidunt quam. Pellentesque lacus\r\n  nunc, interdum sit amet turpis non, pellentesque varius leo. Duis at dolor\r\n  scelerisque, ultricies urna nec, dapibus odio. Duis sollicitudin lobortis dui,\r\n  a semper libero molestie et. Curabitur aliquam tellus vitae risus luctus, eget\r\n  mollis ligula lacinia. Phasellus iaculis felis a mauris eleifend, in\r\n  pellentesque quam dignissim. Donec nibh diam, sollicitudin eget imperdiet non,\r\n  sollicitudin sed lorem. Aenean nec neque at eros vehicula ultricies sit amet\r\n  pharetra nunc. In hac habitasse platea dictumst. Vestibulum ante ipsum primis\r\n  in faucibus orci luctus et ultrices posuere cubilia curae; Cras fringilla,\r\n  quam et condimentum volutpat, eros elit gravida velit, ac luctus quam magna in\r\n  libero. Suspendisse massa justo, semper eget odio ac, sagittis viverra dolor.\r\n</div>\r\n<div style=\"clear: both\"></div>\r\n', 1),
(6, 'kontakt', '<!DOCTYPE html>\r\n\r\n<head>\r\n  <title>Historia lotów kosmicznych</title>\r\n  <link rel=\"stylesheet\" href=\"./css/style.css\" />\r\n</head>\r\n\r\n<div class=\"headingL\">NAPISZ DO NAS !</div>\r\n\r\n<div id=\"contact\">\r\n  <form action=\"mailto:noszplatek@o2.pl\" method=\"post\" enctype=\"text/plain\">\r\n    <input type=\"email\" name=\"E-mail\" placeholder=\"Podaj swój E-mail\" />\r\n    <p>Treść wiadomości:</p>\r\n    <textarea name=\"body\" rows=\"10\" cols=\"100\"></textarea>\r\n    <div style=\"clear: both\"></div>\r\n    <input type=\"submit\" value=\"Wyślij\" />\r\n  </form>\r\n</div>\r\n', 1),
(7, 'filmy', '<head>\r\n  <title>Historia Lotów Kosmicznych</title>\r\n  <link rel=\"stylesheet\" href=\"./css/style.css\" />\r\n</head>\r\n\r\n<div class=\"headingL\">CODZIENNOŚĆ NA STACJI KOSMICZNEJ</div>\r\n\r\n<div id=\"filmy\">\r\n  <iframe\r\n    width=\"900\"\r\n    height=\"600\"\r\n    src=\"https://www.youtube.com/embed/AZx0RIV0wss\"\r\n    title=\"Space Kitchen\"\r\n    frameborder=\"0\"\r\n    allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\"\r\n    allowfullscreen\r\n  ></iframe>\r\n  <br />\r\n  <iframe\r\n    width=\"900\"\r\n    height=\"600\"\r\n    src=\"https://www.youtube.com/embed/3bCoGC532p8\"\r\n    title=\"Brushing Teeth in Space\"\r\n    frameborder=\"0\"\r\n    allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\"\r\n    allowfullscreen\r\n  ></iframe>\r\n  <br />\r\n  <iframe\r\n    width=\"900\"\r\n    height=\"600\"\r\n    src=\"https://www.youtube.com/embed/UyFYgeE32f0\"\r\n    title=\"Sleeping in Space\"\r\n    frameborder=\"0\"\r\n    allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\"\r\n    allowfullscreen\r\n  ></iframe>\r\n</div>\r\n', 1),
(8, 'skrypty', '<!DOCTYPE html>\r\n\r\n<head>\r\n  <script src=\"./js/kolorujtlo.js\" type=\"text/javascript\"></script>\r\n  <script src=\"./js/timedate.js\" type=\"text/javascript\"></script>\r\n  <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js\"></script>\r\n  <link rel=\"stylesheet\" href=\"./css/style.css\" />\r\n  <title>Historia Lotów Kosmicznych</title>\r\n  <style>\r\n    body {\r\n      background-image: none;\r\n    }\r\n  </style>\r\n</head>\r\n\r\n<body onload=\"startclock()\">\r\n  <div id=\"lab2\">\r\n    <br /><br /><br /><br /><br />\r\n    <h1>Wybierz kolor tła na tej podstronie:</h1>\r\n    <br />\r\n    <form method=\"POST\" name=\"background\">\r\n      <input\r\n        type=\"button\"\r\n        value=\"żółty\"\r\n        ONCLICK=\"changeBackground(\'#FFF000\')\"\r\n      />\r\n      <input\r\n        type=\"button\"\r\n        value=\"czarny\"\r\n        ONCLICK=\"changeBackground(\'#000000\')\"\r\n      />\r\n      <input\r\n        type=\"button\"\r\n        value=\"biały\"\r\n        ONCLICK=\"changeBackground(\'#FFFFFF\')\"\r\n      />\r\n      <input\r\n        type=\"button\"\r\n        value=\"zielony\"\r\n        ONCLICK=\"changeBackground(\'#00FF00\')\"\r\n      />\r\n      <input\r\n        type=\"button\"\r\n        value=\"niebieski\"\r\n        ONCLICK=\"changeBackground(\'#0000FF\')\"\r\n      />\r\n      <input\r\n        type=\"button\"\r\n        value=\"pomarańczowy\"\r\n        ONCLICK=\"changeBackground(\'#FF8000\')\"\r\n      />\r\n      <input\r\n        type=\"button\"\r\n        value=\"szary\"\r\n        ONCLICK=\"changeBackground(\'#c0c0c0\')\"\r\n      />\r\n      <input\r\n        type=\"button\"\r\n        value=\"czerwony\"\r\n        ONCLICK=\"changeBackground(\'#FF0000\')\"\r\n      />\r\n    </form>\r\n    <br />\r\n    <h1>Czas & data:</h1>\r\n    <div id=\"zegarek\"></div>\r\n    <div id=\"data\"></div>\r\n  </div>\r\n\r\n  <center>\r\n    <div id=\"animacjaTestowa1\" class=\"test-block\">Kliknij, a się powiększę</div>\r\n\r\n    <script>\r\n      $(\"#animacjaTestowa1\").on(\"click\", function () {\r\n        $(this).animate(\r\n          {\r\n            width: \"500px\",\r\n            opacity: 0.4,\r\n            fontSize: \"3em\",\r\n            borderwidth: \"10px\",\r\n          },\r\n          1500\r\n        );\r\n      });\r\n    </script>\r\n\r\n    <br /><br /><br /><br /><br />\r\n    <div id=\"animacjaTestowa2\" class=\"test-block\">\r\n      Najedź kursorem, a się powiększe\r\n    </div>\r\n\r\n    <script>\r\n      $(\"#animacjaTestowa2\").on({\r\n        mouseover: function () {\r\n          $(this).animate(\r\n            {\r\n              width: 300,\r\n            },\r\n            800\r\n          );\r\n        },\r\n        mouseout: function () {\r\n          $(this).animate(\r\n            {\r\n              width: 200,\r\n            },\r\n            800\r\n          );\r\n        },\r\n      });\r\n    </script>\r\n\r\n    <br /><br /><br /><br /><br />\r\n    <div id=\"animacjaTestowa3\" class=\"test-block\">Kikaj, abym urósł</div>\r\n\r\n    <script>\r\n      $(\"#animacjaTestowa3\").on(\"click\", function () {\r\n        if (!$(this).is(\":animated\")) {\r\n          $(this).animate({\r\n            width: \"+=\" + 50,\r\n            height: \"+=\" + 10,\r\n            upacity: \"-=\" + 0.1,\r\n            duration: 3000,\r\n          });\r\n        }\r\n      });\r\n    </script>\r\n  </center>\r\n</body>\r\n', 1);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `page_list`
--
ALTER TABLE `page_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `page_list`
--
ALTER TABLE `page_list`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
