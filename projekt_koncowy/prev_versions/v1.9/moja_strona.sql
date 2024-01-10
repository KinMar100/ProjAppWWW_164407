-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2023 at 07:53 PM
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
CREATE DATABASE IF NOT EXISTS `moja_strona` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `moja_strona`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `parent` int DEFAULT 0,
  `name` varchar(255) NOT NULL UNIQUE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent`, `name`) VALUES
(1, 0, 'Owoce');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `page_list`
--

CREATE TABLE `page_list` (
  `id` int(11) NOT NULL,
  `page_title` varchar(255) DEFAULT NULL,
  `page_content` text DEFAULT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `page_list`
--

INSERT INTO `page_list` (`id`, `page_title`, `page_content`, `status`) VALUES
(1, 'glowna', '<header>Hodowla żółwia wodnego</header>\r\n<p><b>Żółw wodny</b> to popularne zwierzę w domowych hodowlach.\r\n    Wodny, stanowi wspaniały obiekt obserwacji\r\n    – może godzinami wygrzewać się najlepiej w promieniach słońca,\r\n    a międzyczasie wspaniale pływa. Piękne terrarium może być niezwykłą\r\n    ozdobą każdego domu.</p>\r\n<p>Jak dbać o żółwia wodnego?\r\n    Żółw wodny nie jest trudny w hodowli i aby zapewnić mu zdrowe,\r\n    szczęśliwe życie wystarczą odpowiednie warunki bytowe oraz zdrowa,\r\n    dostosowana do żółwia dieta. Żółw nie potrzebuje czułości i raczej trudno\r\n    z nim się komunikować,ale z pewnością obserwacja tego wyjątkowego zwierzęcia\r\n    dostarczy opiekunom dużo radości i satysfakcji.</p>\r\n<h1><span class=\"highlighted-text\">Terrarium dla żółwia wodnego</span></h1>\r\n<p>\r\n    <u>Akwarium dla żółwia powinno mieć dość duże wymiary.</u>\r\n    Przyjmuje się, że minimalna długość to pięciokrotne wymiary żółwia,\r\n    szerokość to trzykrotne wymiary żółwia i jak największa wysokość.\r\n    Poziom wody w akwarium dla żółwia powinien wynosić minimum dwa razy tyle,\r\n    co wysokość żółwia. <b>W akwarium powinna się znaleźć wyspa zajmująca powierzchnię około 1/4 akwarium,\r\n    na której żółw będzie mógł się wygrzewać pod żarówką grzewczą. </b> Ponadto terrarium musi być wyposażone\r\n    w wydajny filtr oraz świetlówkę UVB, zastępujące naturalne światło.\r\n    Dno takiego zbiornika powinno być gładkie, bez żwiru i kamieni, dla ułatwienia utrzymania czystości.\r\n    Wyspę można ozdobić kamieniami, korzeniami i kawałami kory. Można również posadzić rośliny,\r\n    ale trzeba mieć na uwadze, że żółwie często je niszczą.\r\n\r\n    Temperatura części lądowej powinna w dzień wynosić 25- 28°C, a nocą po wyłączeniu lampy, spadać do około 18°C.\r\n    Temperatura wody w basenie powinna wynosić około 23-25°C - w małych i średnich akwariach nie jest konieczne\r\n    używanie grzałki, wystarczy lampa nad wyspą. W dużych konieczne może okazać się dogrzewanie za pomocą zwykłej,\r\n    akwariowej grzałki.\r\n\r\n    <i>W miarę możliwości należy zapewniać żółwiowi częste kąpiele słoneczne w naturalnym słońcu.</i>\r\n    Żółwiowi wodnemu można także urządzić przestrzeń w ogrodzie – ogrodzony i osłonięty wybieg z oczkiem wodnym.</p>\r\n<table style=\"background-color: skyblue\"  >\r\n    <tr>\r\n        <td><img src=\"img/zolw1.jpg\" alt=\"żółw1\" width=\"250\" height=\"300\"></td>\r\n        <td><img src=\"img/zolw2.jpg\" alt=\"żółw2\" width=\"250\" height=\"300\"></td>\r\n        <td><img src=\"img/zolw3.jpg\" alt=\"żółw3\" width=\"250\" height=\"300\"></td>\r\n        <td><img src=\"img/aqua_turtle.jpg\" alt=\"żółw4\" width=\"250\" height=\"300\"></td>\r\n    </tr>\r\n    <tr>\r\n        <td><img src=\"img/zolw4.jpg\" alt=\"żółw5\" width=\"250\" height=\"300\"></td>\r\n        <td><img src=\"img/zolw5.jpg\" alt=\"żółw6\" width=\"250\" height=\"250\"></td>\r\n        <td><img src=\"img/zolw6.jpg\" alt=\"żółw7\" width=\"250\" height=\"300\"></td>\r\n        <td><img src=\"img/zolw7.jpg\" alt=\"żółw8\" width=\"250\" height=\"300\"></td>\r\n    </tr>\r\n</table>\r\n<div>\r\n    <h2><span class=\"highlighted-text\">Co jedzą żółwie?</span></h2>\r\n    <p>\r\n        Podstawę diety powinny stanowić żywe ryby, żaby, pijawki,\r\n        ślimaki, larwy zwierząt wodnych, skorupiaki oraz wszelkie\r\n        rośliny wodne. Urozmaiceniem diety mogą być dżdżownice,\r\n        niewielkie owady, rośliny łąkowe. Żółwie muszą połykać pokarm w wodzie,\r\n        gdyż z powodu braku mięśnia poruszającego językiem nie mają jak go\r\n        przesuwać.<img src=\"img/pet-turtle.png\" alt=\"maly_zolw\" style=\"float:right\" width=\"300\" height=\"200\">\r\n        Jako uzupełnienie diety można żółwią podawać gotowe mieszanki karmy\r\n        dla żółwia wodnego, ale nie powinno to stanowić jej podstawy.\r\n        Ponieważ jedną z najgroźniejszych chorób spotykanych u żółwi\r\n        jest krzywica, wynikająca z niedoboru wapnia w organizmie wskazane\r\n        jest podawanie żółwiom wapna dla żółwi.\r\n        Żółwiom nie należy podawać mięsa ssaków, podrobów i ptaków,\r\n        jak również owoców i warzyw.\r\n        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam lacus dolor, scelerisque vestibulum est sit amet,\r\n        vehicula tempor velit. Donec feugiat auctor arcu, nec dapibus mi gravida vel. Phasellus rutrum quis sem quis dapibus.\r\n        Sed fringilla nisl sapien, vel elementum tortor lobortis sed. Nam vestibulum id orci id rhoncus. Ut arcu leo,\r\n        fermentum vel ante et, vestibulum elementum velit. Vestibulum nec justo id nibh hendrerit rutrum sed ac enim.\r\n        Donec non urna dignissim, molestie ex nec, interdum tortor. Orci varius natoque penatibus et magnis dis\r\n        parturient montes, nascetur ridiculus mus. Morbi posuere tempus maximus. Ut at purus quis ligula malesuada\r\n        posuere. Nunc ullamcorper vitae libero eget ornare. Pellentesque venenatis, magna vel ultrices elementum,\r\n        massa leo semper sapien, ut venenatis ante sem tincidunt ex.</p>\r\n</div>\r\n<div>\r\n    <form>  <h1>Kontakt</h1>\r\n        <label for=\"name\">Imię/Nazwisko:</label>\r\n        <input type=\"text\" id=\"name\" name=\"name\" required><br>\r\n\r\n        <label for=\"email\">E-mail:</label>\r\n        <input type=\"email\" id=\"email\" name=\"email\" required><br>\r\n\r\n        <label for=\"message\">Wiadomość:</label>\r\n        <textarea id=\"message\" name=\"message\" rows=\"2\" required></textarea><br>\r\n\r\n        <input type=\"submit\" value=\"wyślij\">\r\n        <button><a href=\"mailto:164407@student.uwm.edu.pl\">My email</a></button>\r\n    </form>\r\n</div>', 1),
(2, 'zolw_blotny', '<header>Żółw błotny</header>\r\n<p>Objęty całkowitą ochroną gatunek żółwia występujący w Polsce. Ochrona obejmuje nawet zakaz fotografowania,\r\n    filmowania i obserwacji mogących powodować płoszenie lub niepokojenie! Osiąga długość około 19 cm.\r\n    Karapaks ma oliwkowo – zielony z żółtymi znaczeniami, skórę ciemnozieloną pokrytą żółtymi plamkami.\r\n    Z uwagi na zagrożenie wyginięciem nie jest dozwolona hodowla tego żółwia w domu.</p>\r\n<img src=\"img/european_pond_turtle_blotny.jpg\" alt=\"żółw błotny 1\" width=\"500\" height=\"600\">\r\n<img src=\"img/zolw_blotny.jpg\" alt=\"żółw błotny 2\" width=\"500\" height=\"600\">', 1),
(3, 'zolw_czerwonolicy', '<header>Żółw czerwonolicy</header>\r\n<p>Jeden z najpopularniejszych żółwi wodnych w polskich hodowlach zwany również żółwiem ozdobnym lub żółwiem\r\n    czerwonouchym. W naturze występuje w Ameryce Północnej, Środkowej i na północy Ameryki Południowej.\r\n    Pojedyncze osobniki pojawiają się także w naturze w Polsce, stanowiąc konkurencję dla rodzimego żółwia błotnego.\r\n    Osiąga długość 12,5 – 29 cm. Posiada pancerz oliwkowo-zielonej barwy. Po bokach zielonej głowy występują\r\n    rozszerzające się do tyłu czerwone paski, a poniżej paski jasnożółte. W Polsce żółw czerwonolicy jest uznawany\r\n    są za gatunek inwazyjny i jest zabroniona jego sprzedaż.\r\n</p>\r\n<img src=\"img/red_eared_slider_czerwonolicy.jpg\" alt=\"zolw czerwonolicy 1\" width=\"500\" height=\"600\">\r\n<img src=\"img/zolw_czerwonolicy.jpg\" alt=\"żółw czerwonolicy 2\" width=\"500\" height=\"600\">', 1),
(4, 'zolw_zoltobrzuchy', '<body class=\"with_background\">\r\n<header>Żółw żółtobrzuchy</header>\r\n<p>\r\n    Posiada karapaks barwy od zielonej, poprzez oliwkową, do czarnej u dorosłych żółwi i żółty plastron.\r\n    Skórę zielono – oliwkową z kremowymi lub żółtymi pasami. Samiec osiąga około 30 cm, samica 43 cm.\r\n</p>\r\n<img src=\"img/yellow-bellied-slider-turtle_zoltobrzuchy.jpg\" alt=\"zolw zoltobrzuchy 1\" width=\"500\" height=\"600\">\r\n<img src=\"img/zolw_zoltobrzuchy.jpg\" alt=\"żółw żółtobrzuchy 2\" width=\"500\" height=\"600\">', 1),
(5, 'zolw_zoltolicy', '<header>Żółw żółtolicy</header>\r\n<p>Zwany również <b>żółtouchym</b> to podobnie jak w przypadku żółwia czerwonolicego podgatunek żółwia ozdobnego.\r\n    Również ma oliwkowo-zielony karapaks, ale wyróżniają go żółte paski po bokach zielonej głowy.\r\n    Osiągają długość do 30 cm. Są uznawane za inwazyjne i zagrażające żółwiowi błotnemu w środowisku naturalnym,\r\n    więc potrzebne jest zezwolenie na ich hodowlę.</p>\r\n<img src=\"img/cumberland_zoltolicy.jpg\" alt=\"żółw żółtolicy 1\" width=\"500\" height=\"600\">\r\n<img src=\"img/zolw_zoltolicy.jpg\" alt=\"żółw żółtolicy 2\" width=\"500\" height=\"600\">', 1),
(6, 'info', '<img src=\"img/info_sign.jpg\" width=\"300\" height=\"300\" alt=\"info\">\r\n<h3>W budowie</h3>', 1),
(7, 'funkcje', '<body onload=\"startclock()\" id=\"zmiana\">\r\n<header>Funkcje z js</header>\r\n\r\n<form method=\"post\" name=\"background\">\r\n    <p class=\"highlighted-text\">Wybierz kolor tła:</p>\r\n    <input type=\"button\" value=\"zółty\" onclick=\"changeBackground(\'#FFF000\')\">\r\n    <input type=\"button\" value=\"czarny\" onclick=\"changeBackground(\'#000000\')\">\r\n    <input type=\"button\" value=\"biały\" onclick=\"changeBackground(\'#ffffff\')\">\r\n    <input type=\"button\" value=\"zielony\" onclick=\"changeBackground(\'#00FF00\')\">\r\n    <input type=\"button\" value=\"niebieski\" onclick=\"changeBackground(\'#0000FF\')\">\r\n    <input type=\"button\" value=\"pomarańczowy\" onclick=\"changeBackground(\'#FF8000\')\">\r\n    <input type=\"button\" value=\"szary\" onclick=\"changeBackground(\'c0c0c0\')\">\r\n    <input type=\"button\" value=\"czerwony\" onclick=\"changeBackground(\'#FF0000\')\">\r\n</form>\r\n\r\n<div id=\"clock\"></div>\r\n<div id=\"data\"></div>\r\n\r\n<table>\r\n    <th>\r\n    <th><div id=\"animacjaTestowa1\" class=\"test-block\">Kliknij, aby powiększyć >></div>\r\n\r\n        <script>\r\n            $(\"#animacjaTestowa1\").on(\"click\", function () {\r\n                $(this).animate(\r\n                    {\r\n                        width: \"500px\",\r\n                        opacity: 0.4,\r\n                        fontSize: \"3em\",\r\n                        borderWidth:\"10px\"\r\n                    },1500);\r\n            });\r\n        </script>\r\n    </th>\r\n    <th>\r\n        <div id=\"animacjaTestowa2\" class=\"test-block\">Najedź kursorem, aby powiększyć >></div>\r\n\r\n        <script>\r\n            $(\"#animacjaTestowa2\").on(\r\n                {\r\n                    \"mouseover\": function () {\r\n                        $(this).animate(\r\n                            {\r\n                                width: 300\r\n                            }, 800\r\n                        );\r\n                    },\r\n                    \"mouseout\" : function () {\r\n                        $(this).animate(\r\n                            {\r\n                                width: 200\r\n                            }, 800\r\n                        )\r\n                    }\r\n                }\r\n            );\r\n        </script>\r\n    </th>\r\n\r\n    <th>\r\n        <div id=\"animacjaTestowa3\" class=\"test-block\"> Kliknij, aby powiększyć bardziej >></div>\r\n\r\n        <script>\r\n            $(\"#animacjaTestowa3\").on(\"click\", function () {\r\n                if (!$(this).is(\":animated\")) {\r\n                    $(this).animate({\r\n                        width: \"+=\" + 50,\r\n                        height: \"+=\" + 10,\r\n                        opacity: \"-=\" + 0.1,\r\n                        duration: 3000\r\n                    });\r\n                }\r\n            });\r\n        </script>\r\n    </th>\r\n</table>\r\n<div>\r\n    <form> <h1>Kontakt</h1>\r\n        <label for=\"name\">Imię/Nazwisko:</label>\r\n        <input type=\"text\" id=\"name\" name=\"name\" required><br>\r\n\r\n        <label for=\"email\">E-mail:</label>\r\n        <input type=\"email\" id=\"email\" name=\"email\" required><br>\r\n\r\n        <label for=\"message\">Wiadomość:</label>\r\n        <textarea id=\"message\" name=\"message\" rows=\"2\" required></textarea><br>\r\n\r\n        <input type=\"submit\" value=\"wyślij\">\r\n        <button><a href=\"mailto:164407@student.uwm.edu.pl\">My email</a></button>\r\n    </form>\r\n</div>', 1),
(8, 'filmy', '<h2 class=\"highlighted-text\"> FILMY:</h2<table><tr><th><iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/vXgUtu3Rxyw?si=-2PKL3P-A-e46X4P\" title=\"YouTube video player\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe></th></tr><tr><th><iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/gbn-Ky4RplU?si=QwUpcGGXveOCnBl4\" \r\ntitle=\"YouTube video player\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe></th></tr><tr><th><iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/r43RmAE9U18?si=THYBTOBx7icLD0co\" title=\"YouTube video player\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe></th></tr></table>', 1);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `categories`
--
ALTER TABLE `categories`
  ADD UNIQUE KEY `unique_name_constraint` (`name`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Database: `moja_stronaa`
--
CREATE DATABASE IF NOT EXISTS `moja_stronaa` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `moja_stronaa`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `parent` int(11) DEFAULT 0,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent`, `name`) VALUES
(5, 0, 'Owoc'),
(6, 0, 'Warzywa');
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) NOT NULL DEFAULT '',
  `user` varchar(255) NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) NOT NULL,
  `col_name` varchar(64) NOT NULL,
  `col_type` varchar(64) NOT NULL,
  `col_length` text DEFAULT NULL,
  `col_collation` varchar(64) NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) DEFAULT '',
  `col_default` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `column_name` varchar(64) NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `transformation` varchar(255) NOT NULL DEFAULT '',
  `transformation_options` varchar(255) NOT NULL DEFAULT '',
  `input_transformation` varchar(255) NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) NOT NULL,
  `settings_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL,
  `export_type` varchar(10) NOT NULL,
  `template_name` varchar(64) NOT NULL,
  `template_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

--
-- Dumping data for table `pma__export_templates`
--

INSERT INTO `pma__export_templates` (`id`, `username`, `export_type`, `template_name`, `template_data`) VALUES
(1, 'root', 'server', 'moja_strona', '{\"quick_or_custom\":\"quick\",\"what\":\"sql\",\"db_select[]\":[\"moja_strona\",\"moja_stronaa\",\"phpmyadmin\",\"test\"],\"aliases_new\":\"\",\"output_format\":\"sendit\",\"filename_template\":\"@SERVER@\",\"remember_template\":\"on\",\"charset\":\"utf-8\",\"compression\":\"none\",\"maxsize\":\"\",\"codegen_structure_or_data\":\"data\",\"codegen_format\":\"0\",\"csv_separator\":\",\",\"csv_enclosed\":\"\\\"\",\"csv_escaped\":\"\\\"\",\"csv_terminated\":\"AUTO\",\"csv_null\":\"NULL\",\"csv_columns\":\"something\",\"csv_structure_or_data\":\"data\",\"excel_null\":\"NULL\",\"excel_columns\":\"something\",\"excel_edition\":\"win\",\"excel_structure_or_data\":\"data\",\"json_structure_or_data\":\"data\",\"json_unicode\":\"something\",\"latex_caption\":\"something\",\"latex_structure_or_data\":\"structure_and_data\",\"latex_structure_caption\":\"Struktura tabeli @TABLE@\",\"latex_structure_continued_caption\":\"Struktura tabeli @TABLE@ (continued)\",\"latex_structure_label\":\"tab:@TABLE@-structure\",\"latex_relation\":\"something\",\"latex_comments\":\"something\",\"latex_mime\":\"something\",\"latex_columns\":\"something\",\"latex_data_caption\":\"Content of table @TABLE@\",\"latex_data_continued_caption\":\"Content of table @TABLE@ (continued)\",\"latex_data_label\":\"tab:@TABLE@-data\",\"latex_null\":\"\\\\textit{NULL}\",\"mediawiki_structure_or_data\":\"data\",\"mediawiki_caption\":\"something\",\"mediawiki_headers\":\"something\",\"htmlword_structure_or_data\":\"structure_and_data\",\"htmlword_null\":\"NULL\",\"ods_null\":\"NULL\",\"ods_structure_or_data\":\"data\",\"odt_structure_or_data\":\"structure_and_data\",\"odt_relation\":\"something\",\"odt_comments\":\"something\",\"odt_mime\":\"something\",\"odt_columns\":\"something\",\"odt_null\":\"NULL\",\"pdf_report_title\":\"\",\"pdf_structure_or_data\":\"data\",\"phparray_structure_or_data\":\"data\",\"sql_include_comments\":\"something\",\"sql_header_comment\":\"\",\"sql_use_transaction\":\"something\",\"sql_compatibility\":\"NONE\",\"sql_structure_or_data\":\"structure_and_data\",\"sql_create_table\":\"something\",\"sql_auto_increment\":\"something\",\"sql_create_view\":\"something\",\"sql_create_trigger\":\"something\",\"sql_backquotes\":\"something\",\"sql_type\":\"INSERT\",\"sql_insert_syntax\":\"both\",\"sql_max_query_size\":\"50000\",\"sql_hex_for_binary\":\"something\",\"sql_utc_time\":\"something\",\"texytext_structure_or_data\":\"structure_and_data\",\"texytext_null\":\"NULL\",\"yaml_structure_or_data\":\"data\",\"\":null,\"as_separate_files\":null,\"csv_removeCRLF\":null,\"excel_removeCRLF\":null,\"json_pretty_print\":null,\"htmlword_columns\":null,\"ods_columns\":null,\"sql_dates\":null,\"sql_relation\":null,\"sql_mime\":null,\"sql_disable_fk\":null,\"sql_views_as_tables\":null,\"sql_metadata\":null,\"sql_drop_database\":null,\"sql_drop_table\":null,\"sql_if_not_exists\":null,\"sql_simple_view_export\":null,\"sql_view_current_user\":null,\"sql_or_replace_view\":null,\"sql_procedure_function\":null,\"sql_truncate\":null,\"sql_delayed\":null,\"sql_ignore\":null,\"texytext_columns\":null}');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db` varchar(64) NOT NULL DEFAULT '',
  `table` varchar(64) NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `item_type` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

--
-- Dumping data for table `pma__navigationhiding`
--

INSERT INTO `pma__navigationhiding` (`username`, `item_name`, `item_type`, `db_name`, `table_name`) VALUES
('root', 'page_list', 'table', 'moja_strona', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"moja_strona\",\"table\":\"categories\"},{\"db\":\"moja_stronaa\",\"table\":\"categories\"},{\"db\":\"moja_strona\",\"table\":\"page_list\"},{\"db\":\"mysql\",\"table\":\"user\"}]');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) NOT NULL DEFAULT '',
  `master_table` varchar(64) NOT NULL DEFAULT '',
  `master_field` varchar(64) NOT NULL DEFAULT '',
  `foreign_db` varchar(64) NOT NULL DEFAULT '',
  `foreign_table` varchar(64) NOT NULL DEFAULT '',
  `foreign_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `search_name` varchar(64) NOT NULL DEFAULT '',
  `search_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `display_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `prefs` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text NOT NULL,
  `schema_sql` text DEFAULT NULL,
  `data_sql` longtext DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2023-12-20 18:53:27', '{\"Console\\/Mode\":\"collapse\",\"lang\":\"pl\"}');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) NOT NULL,
  `tab` varchar(64) NOT NULL,
  `allowed` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) NOT NULL,
  `usergroup` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indeksy dla tabeli `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indeksy dla tabeli `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indeksy dla tabeli `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indeksy dla tabeli `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indeksy dla tabeli `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indeksy dla tabeli `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indeksy dla tabeli `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indeksy dla tabeli `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indeksy dla tabeli `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indeksy dla tabeli `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indeksy dla tabeli `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indeksy dla tabeli `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indeksy dla tabeli `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indeksy dla tabeli `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indeksy dla tabeli `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indeksy dla tabeli `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indeksy dla tabeli `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
