-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 14 Gru 2023, 14:39
-- Wersja serwera: 10.4.24-MariaDB
-- Wersja PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `moja_strona`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `parent` int(11) DEFAULT 0,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `categories`
--

INSERT INTO `categories` (`id`, `parent`, `name`) VALUES
(5, 0, 'Owoc'),
(6, 0, 'Warzywa');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `page_list`
--

CREATE TABLE `page_list` (
  `id` int(10) UNSIGNED NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `page_content` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `page_list`
--

INSERT INTO `page_list` (`id`, `page_title`, `page_content`, `status`) VALUES
(1, 'glowna', '<header>Hodowla żółwia wodnego</header>\r\n<p><b>Żółw wodny</b> to popularne zwierzę w domowych hodowlach.\r\n    Wodny, stanowi wspaniały obiekt obserwacji\r\n    – może godzinami wygrzewać się najlepiej w promieniach słońca,\r\n    a międzyczasie wspaniale pływa. Piękne terrarium może być niezwykłą\r\n    ozdobą każdego domu.</p>\r\n<p>Jak dbać o żółwia wodnego?\r\n    Żółw wodny nie jest trudny w hodowli i aby zapewnić mu zdrowe,\r\n    szczęśliwe życie wystarczą odpowiednie warunki bytowe oraz zdrowa,\r\n    dostosowana do żółwia dieta. Żółw nie potrzebuje czułości i raczej trudno\r\n    z nim się komunikować,ale z pewnością obserwacja tego wyjątkowego zwierzęcia\r\n    dostarczy opiekunom dużo radości i satysfakcji.</p>\r\n<h1><span class=\"highlighted-text\">Terrarium dla żółwia wodnego</span></h1>\r\n<p>\r\n    <u>Akwarium dla żółwia powinno mieć dość duże wymiary.</u>\r\n    Przyjmuje się, że minimalna długość to pięciokrotne wymiary żółwia,\r\n    szerokość to trzykrotne wymiary żółwia i jak największa wysokość.\r\n    Poziom wody w akwarium dla żółwia powinien wynosić minimum dwa razy tyle,\r\n    co wysokość żółwia. <b>W akwarium powinna się znaleźć wyspa zajmująca powierzchnię około 1/4 akwarium,\r\n    na której żółw będzie mógł się wygrzewać pod żarówką grzewczą. </b> Ponadto terrarium musi być wyposażone\r\n    w wydajny filtr oraz świetlówkę UVB, zastępujące naturalne światło.\r\n    Dno takiego zbiornika powinno być gładkie, bez żwiru i kamieni, dla ułatwienia utrzymania czystości.\r\n    Wyspę można ozdobić kamieniami, korzeniami i kawałami kory. Można również posadzić rośliny,\r\n    ale trzeba mieć na uwadze, że żółwie często je niszczą.\r\n\r\n    Temperatura części lądowej powinna w dzień wynosić 25- 28°C, a nocą po wyłączeniu lampy, spadać do około 18°C.\r\n    Temperatura wody w basenie powinna wynosić około 23-25°C - w małych i średnich akwariach nie jest konieczne\r\n    używanie grzałki, wystarczy lampa nad wyspą. W dużych konieczne może okazać się dogrzewanie za pomocą zwykłej,\r\n    akwariowej grzałki.\r\n\r\n    <i>W miarę możliwości należy zapewniać żółwiowi częste kąpiele słoneczne w naturalnym słońcu.</i>\r\n    Żółwiowi wodnemu można także urządzić przestrzeń w ogrodzie – ogrodzony i osłonięty wybieg z oczkiem wodnym.</p>\r\n<table style=\"background-color: skyblue\"  >\r\n    <tr>\r\n        <td><img src=\"img/zolw1.jpg\" alt=\"żółw1\" width=\"250\" height=\"300\"></td>\r\n        <td><img src=\"img/zolw2.jpg\" alt=\"żółw2\" width=\"250\" height=\"300\"></td>\r\n        <td><img src=\"img/zolw3.jpg\" alt=\"żółw3\" width=\"250\" height=\"300\"></td>\r\n        <td><img src=\"img/aqua_turtle.jpg\" alt=\"żółw4\" width=\"250\" height=\"300\"></td>\r\n    </tr>\r\n    <tr>\r\n        <td><img src=\"img/zolw4.jpg\" alt=\"żółw5\" width=\"250\" height=\"300\"></td>\r\n        <td><img src=\"img/zolw5.jpg\" alt=\"żółw6\" width=\"250\" height=\"250\"></td>\r\n        <td><img src=\"img/zolw6.jpg\" alt=\"żółw7\" width=\"250\" height=\"300\"></td>\r\n        <td><img src=\"img/zolw7.jpg\" alt=\"żółw8\" width=\"250\" height=\"300\"></td>\r\n    </tr>\r\n</table>\r\n<div>\r\n    <h2><span class=\"highlighted-text\">Co jedzą żółwie?</span></h2>\r\n    <p>\r\n        Podstawę diety powinny stanowić żywe ryby, żaby, pijawki,\r\n        ślimaki, larwy zwierząt wodnych, skorupiaki oraz wszelkie\r\n        rośliny wodne. Urozmaiceniem diety mogą być dżdżownice,\r\n        niewielkie owady, rośliny łąkowe. Żółwie muszą połykać pokarm w wodzie,\r\n        gdyż z powodu braku mięśnia poruszającego językiem nie mają jak go\r\n        przesuwać.<img src=\"img/pet-turtle.png\" alt=\"maly_zolw\" style=\"float:right\" width=\"300\" height=\"200\">\r\n        Jako uzupełnienie diety można żółwią podawać gotowe mieszanki karmy\r\n        dla żółwia wodnego, ale nie powinno to stanowić jej podstawy.\r\n        Ponieważ jedną z najgroźniejszych chorób spotykanych u żółwi\r\n        jest krzywica, wynikająca z niedoboru wapnia w organizmie wskazane\r\n        jest podawanie żółwiom wapna dla żółwi.\r\n        Żółwiom nie należy podawać mięsa ssaków, podrobów i ptaków,\r\n        jak również owoców i warzyw.\r\n        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam lacus dolor, scelerisque vestibulum est sit amet,\r\n        vehicula tempor velit. Donec feugiat auctor arcu, nec dapibus mi gravida vel. Phasellus rutrum quis sem quis dapibus.\r\n        Sed fringilla nisl sapien, vel elementum tortor lobortis sed. Nam vestibulum id orci id rhoncus. Ut arcu leo,\r\n        fermentum vel ante et, vestibulum elementum velit. Vestibulum nec justo id nibh hendrerit rutrum sed ac enim.\r\n        Donec non urna dignissim, molestie ex nec, interdum tortor. Orci varius natoque penatibus et magnis dis\r\n        parturient montes, nascetur ridiculus mus. Morbi posuere tempus maximus. Ut at purus quis ligula malesuada\r\n        posuere. Nunc ullamcorper vitae libero eget ornare. Pellentesque venenatis, magna vel ultrices elementum,\r\n        massa leo semper sapien, ut venenatis ante sem tincidunt ex.</p>\r\n</div>\r\n<div>\r\n    <form>  <h1>Kontakt</h1>\r\n        <label for=\"name\">Imię/Nazwisko:</label>\r\n        <input type=\"text\" id=\"name\" name=\"name\" required><br>\r\n\r\n        <label for=\"email\">E-mail:</label>\r\n        <input type=\"email\" id=\"email\" name=\"email\" required><br>\r\n\r\n        <label for=\"message\">Wiadomość:</label>\r\n        <textarea id=\"message\" name=\"message\" rows=\"2\" required></textarea><br>\r\n\r\n        <input type=\"submit\" value=\"wyślij\">\r\n        <button><a href=\"mailto:164407@student.uwm.edu.pl\">My email</a></button>\r\n    </form>\r\n</div>', 1),
(2, 'zolw_1', '<header>Żółw błotny</header>\r\n<p>Objęty całkowitą ochroną gatunek żółwia występujący w Polsce. Ochrona obejmuje nawet zakaz fotografowania,\r\n    filmowania i obserwacji mogących powodować płoszenie lub niepokojenie! Osiąga długość około 19 cm.\r\n    Karapaks ma oliwkowo – zielony z żółtymi znaczeniami, skórę ciemnozieloną pokrytą żółtymi plamkami.\r\n    Z uwagi na zagrożenie wyginięciem nie jest dozwolona hodowla tego żółwia w domu.</p>\r\n<img src=\"img/european_pond_turtle_blotny.jpg\" alt=\"żółw błotny 1\" width=\"500\" height=\"600\">\r\n<img src=\"img/zolw_blotny.jpg\" alt=\"żółw błotny 2\" width=\"500\" height=\"600\">', 1),
(3, 'zolw_2', '<header>Żółw czerwonolicy</header>\r\n<p>Jeden z najpopularniejszych żółwi wodnych w polskich hodowlach zwany również żółwiem ozdobnym lub żółwiem\r\n    czerwonouchym. W naturze występuje w Ameryce Północnej, Środkowej i na północy Ameryki Południowej.\r\n    Pojedyncze osobniki pojawiają się także w naturze w Polsce, stanowiąc konkurencję dla rodzimego żółwia błotnego.\r\n    Osiąga długość 12,5 – 29 cm. Posiada pancerz oliwkowo-zielonej barwy. Po bokach zielonej głowy występują\r\n    rozszerzające się do tyłu czerwone paski, a poniżej paski jasnożółte. W Polsce żółw czerwonolicy jest uznawany\r\n    są za gatunek inwazyjny i jest zabroniona jego sprzedaż.\r\n</p>\r\n<img src=\"img/red_eared_slider_czerwonolicy.jpg\" alt=\"zolw czerwonolicy 1\" width=\"500\" height=\"600\">\r\n<img src=\"img/zolw_czerwonolicy.jpg\" alt=\"żółw czerwonolicy 2\" width=\"500\" height=\"600\">', 1),
(4, 'zolw_3', '<body class=\"with_background\">\r\n<header>Żółw żółtobrzuchy</header>\r\n<p>\r\n    Posiada karapaks barwy od zielonej, poprzez oliwkową, do czarnej u dorosłych żółwi i żółty plastron.\r\n    Skórę zielono – oliwkową z kremowymi lub żółtymi pasami. Samiec osiąga około 30 cm, samica 43 cm.\r\n</p>\r\n<img src=\"img/yellow-bellied-slider-turtle_zoltobrzuchy.jpg\" alt=\"zolw zoltobrzuchy 1\" width=\"500\" height=\"600\">\r\n<img src=\"img/zolw_zoltobrzuchy.jpg\" alt=\"żółw żółtobrzuchy 2\" width=\"500\" height=\"600\">', 1),
(5, 'zolw_4', '<header>Żółw żółtolicy</header>\r\n<p>Zwany również <b>żółtouchym</b> to podobnie jak w przypadku żółwia czerwonolicego podgatunek żółwia ozdobnego.\r\n    Również ma oliwkowo-zielony karapaks, ale wyróżniają go żółte paski po bokach zielonej głowy.\r\n    Osiągają długość do 30 cm. Są uznawane za inwazyjne i zagrażające żółwiowi błotnemu w środowisku naturalnym,\r\n    więc potrzebne jest zezwolenie na ich hodowlę.</p>\r\n<img src=\"img/cumberland_zoltolicy.jpg\" alt=\"żółw żółtolicy 1\" width=\"500\" height=\"600\">\r\n<img src=\"img/zolw_zoltolicy.jpg\" alt=\"żółw żółtolicy 2\" width=\"500\" height=\"600\">', 1),
(6, 'info', '<img src=\"img/info_sign.jpg\" width=\"300\" height=\"300\" alt=\"info\">\r\n<h3>W budowie</h3>', 1),
(7, 'funkcje', '<body onload=\"startclock()\" id=\"zmiana\">\r\n<header>Funkcje z js</header>\r\n\r\n<form method=\"post\" name=\"background\">\r\n    <p class=\"highlighted-text\">Wybierz kolor tła:</p>\r\n    <input type=\"button\" value=\"zółty\" onclick=\"changeBackground(\'#FFF000\')\">\r\n    <input type=\"button\" value=\"czarny\" onclick=\"changeBackground(\'#000000\')\">\r\n    <input type=\"button\" value=\"biały\" onclick=\"changeBackground(\'#ffffff\')\">\r\n    <input type=\"button\" value=\"zielony\" onclick=\"changeBackground(\'#00FF00\')\">\r\n    <input type=\"button\" value=\"niebieski\" onclick=\"changeBackground(\'#0000FF\')\">\r\n    <input type=\"button\" value=\"pomarańczowy\" onclick=\"changeBackground(\'#FF8000\')\">\r\n    <input type=\"button\" value=\"szary\" onclick=\"changeBackground(\'c0c0c0\')\">\r\n    <input type=\"button\" value=\"czerwony\" onclick=\"changeBackground(\'#FF0000\')\">\r\n</form>\r\n\r\n<div id=\"clock\"></div>\r\n<div id=\"data\"></div>\r\n\r\n<table>\r\n    <th>\r\n    <th><div id=\"animacjaTestowa1\" class=\"test-block\">Kliknij, aby powiększyć >></div>\r\n\r\n        <script>\r\n            $(\"#animacjaTestowa1\").on(\"click\", function () {\r\n                $(this).animate(\r\n                    {\r\n                        width: \"500px\",\r\n                        opacity: 0.4,\r\n                        fontSize: \"3em\",\r\n                        borderWidth:\"10px\"\r\n                    },1500);\r\n            });\r\n        </script>\r\n    </th>\r\n    <th>\r\n        <div id=\"animacjaTestowa2\" class=\"test-block\">Najedź kursorem, aby powiększyć >></div>\r\n\r\n        <script>\r\n            $(\"#animacjaTestowa2\").on(\r\n                {\r\n                    \"mouseover\": function () {\r\n                        $(this).animate(\r\n                            {\r\n                                width: 300\r\n                            }, 800\r\n                        );\r\n                    },\r\n                    \"mouseout\" : function () {\r\n                        $(this).animate(\r\n                            {\r\n                                width: 200\r\n                            }, 800\r\n                        )\r\n                    }\r\n                }\r\n            );\r\n        </script>\r\n    </th>\r\n\r\n    <th>\r\n        <div id=\"animacjaTestowa3\" class=\"test-block\"> Kliknij, aby powiększyć bardziej >></div>\r\n\r\n        <script>\r\n            $(\"#animacjaTestowa3\").on(\"click\", function () {\r\n                if (!$(this).is(\":animated\")) {\r\n                    $(this).animate({\r\n                        width: \"+=\" + 50,\r\n                        height: \"+=\" + 10,\r\n                        opacity: \"-=\" + 0.1,\r\n                        duration: 3000\r\n                    });\r\n                }\r\n            });\r\n        </script>\r\n    </th>\r\n</table>\r\n<div>\r\n    <form> <h1>Kontakt</h1>\r\n        <label for=\"name\">Imię/Nazwisko:</label>\r\n        <input type=\"text\" id=\"name\" name=\"name\" required><br>\r\n\r\n        <label for=\"email\">E-mail:</label>\r\n        <input type=\"email\" id=\"email\" name=\"email\" required><br>\r\n\r\n        <label for=\"message\">Wiadomość:</label>\r\n        <textarea id=\"message\" name=\"message\" rows=\"2\" required></textarea><br>\r\n\r\n        <input type=\"submit\" value=\"wyślij\">\r\n        <button><a href=\"mailto:164407@student.uwm.edu.pl\">My email</a></button>\r\n    </form>\r\n</div>', 1),
(8, 'filmy', '<h2 class=\"highlighted-text\"> FILMY: </h2>\r\n<table>\r\n    <tr>\r\n        <th>\r\n            <iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/vXgUtu3Rxyw?si=-2PKL3P-A-e46X4P\"\r\n                    title=\"YouTube video player\" allow=\"accelerometer; autoplay; clipboard-write;\r\n                    encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen>\r\n            </iframe>\r\n        </th>\r\n    </tr>\r\n    <tr>\r\n        <th>\r\n            <iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/gbn-Ky4RplU?si=QwUpcGGXveOCnBl4\"\r\n                    title=\"YouTube video player\" allow=\"accelerometer; autoplay; clipboard-write;\r\n                    encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen>\r\n            </iframe>\r\n        </th>\r\n    </tr>\r\n    <tr>\r\n        <th>\r\n            <iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/r43RmAE9U18?si=THYBTOBx7icLD0co\"\r\n                    title=\"YouTube video player\" allow=\"accelerometer; autoplay; clipboard-write;\r\n                    encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen>\r\n            </iframe>\r\n        </th>\r\n    </tr>\r\n</table>', 1);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indeksy dla tabeli `page_list`
--
ALTER TABLE `page_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `page_list`
--
ALTER TABLE `page_list`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
