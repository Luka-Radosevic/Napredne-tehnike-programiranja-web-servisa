-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2021 at 11:02 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vijesti`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `ime` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `korisnicko_ime` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `lozinka` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `razina` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vijesti`
--

CREATE TABLE `vijesti` (
  `id` int(11) NOT NULL,
  `datum` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `naslov` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sazetak` text COLLATE utf8_unicode_ci NOT NULL,
  `tekst` text COLLATE utf8_unicode_ci NOT NULL,
  `slika` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `kategorija` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `arhiva` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vijesti`
--

INSERT INTO `vijesti` (`id`, `datum`, `naslov`, `sazetak`, `tekst`, `slika`, `kategorija`, `arhiva`) VALUES
(1, '29.5.2021', 'Wer in dieses Land reisen will, muss demnächst Eintritt zahlen', 'Deutsches Ipsum Dolor id latine danke complectitur pri, mea meliore denique Hallo id. Elitr expetenda nam an, Deutsche Mark ei reque euismod assentior. Odio Köln iracundia ex pri. Ut vel Bildung mandamus, quas natum adversarium ei Hörspiele diam minim honestatis eum nos', 'Deutsches Ipsum Dolor id latine danke complectitur pri, mea meliore denique Hallo id. Elitr expetenda nam an, Deutsche Mark ei reque euismod assentior. Odio Köln iracundia ex pri. Ut vel Bildung mandamus, quas natum adversarium ei Hörspiele diam minim honestatis eum no quo Käsefondue posidonium at, adhuc laboramus sadipscing Grimms Märchen at, in mei ullum gloriatur.\r\nId Anwendungsprogrammierschnittstelle assum argumentum, te melius erroribus schnell Nec ut amet causae iriure, Hochzeit gloriatur mea ut. Dicunt virtute Frohsinn per no. At nemore scaevola Aufenthaltsgenehmigung An regione malorum efficiendi iusd\r\nDeutsches Ipsum Dolor quo lucilius genau at, adhuc laboramus sadipscing per Glühwein in mei ullum gloriatur. Id Rubin auf Schienen recteque accommodare sed. Id nec Knappwurst argumentum, te melius erroribus vix. Dicunt virtute suscipit Aufschnitt no. At nemore scaevola eum. Tollit argumentum ius an. Guten Tag lobortis elaboraret per ne, nam Landjaeger probatus pertinax, impetus eripuit aliquando Sprechen Sie deutsch sea. Diam scripserit no vis, Schadenfreude meis suscipit ea. Eam ea über eleifend, ad blandit voluptatibus sed, Bretzel eius consul sanctus vix.\r\nDeutsches Ipsum Dolor deserunt dissentias Guten Tag et.', 'slika1.JPG', 'putovanje', 0),
(2, '30.5.2021', 'Sexuelle Belästigung bei Flugbegleitern - das Ergebnis überrascht', 'Deutsches Ipsum Dolor quo lucilius Schweinsteiger at, adhuc laboramus sadipscing per Grossbritannien in mei ullum gloriatur. Id Hockenheim recteque accommodare sed. Id nec Milchreis argumentum, te melius erroribus vix. Stuttgart ut amet causae iriure, prodesset Die Toten Hosen mea ut. Dicunt virtute suscipit Käsefondue no. At nemore scaevola eum. Guten Tag regione malorum efficiendi ius', 'Deutsches Ipsum Dolor quo lucilius Schweinsteiger at, adhuc laboramus sadipscing per Grossbritannien in mei ullum gloriatur. Id Hockenheim recteque accommodare sed. Id nec Milchreis argumentum, te melius erroribus vix. Stuttgart ut amet causae iriure, prodesset Die Toten Hosen mea ut. Dicunt virtute suscipit Käsefondue no. \r\nAt nemore scaevola eum. Guten Tag regione malorum efficiendi ius sit amet, zu spät adipiscing elit, sed do eiusmod Reise incididunt ut labore et dolore Bahnhof aliqua. Ut enim ad minim Milka quis nostrud exercitation ullamco laboris Bahnhof ut aliquip ex ea commodo Honigkuchenpferd Duis aute irure dolor in Donaudampfschiffahrtsgesellschaftskapitän in voluptate velit esse cillum Reinheitsgebot eu fugiat nulla pariatur. Excepteur Kaftfahrzeug-Haftpflichtversicherung occaecat cupidatat non proident, sunt Juttensack culpa qui officia deserunt mollit Käsefondue id est laborum\r\nDeutsches Ipsum Dolor deserunt dissentias Schmetterling et. Tollit argumentum ius an. Deutschland lobortis elaboraret per ne, nam Danke probatus pertinax, impetus eripuit aliquando Warmduscher sea. Diam scripserit no vis, Weihnachten meis suscipit ea. Eam ea Lukas Podolski eleifend, ad blandit voluptatibus sed, Berlin eius consul sanctus vix. Cu Schweinsteiger legimus veritus vim.', 'slika2.JPG', 'putovanje', 0),
(3, '31.5.2021', 'ausgewählte Leserreisen zu prima Preisen', 'Deutsches Ipsum Dolor deserunt dissentias Die Toten Hosen et. Tollit argumentum ius an. Prost lobortis elaboraret per ne, nam Frau Professor probatus pertinax, impetus eripuit aliquando Welt sea. Diam scripserit no vis, Die unendliche Geschichte meis suscipit ea. Eam ea Schnaps eleifend, ad blandit voluptatibus sed, Brezel eius consul sanctus vix. Cu Mercedes Benz legimus veritus vim', 'Tollit argumentum ius an. Prost lobortis elaboraret per ne, nam Frau Professor probatus pertinax, impetus eripuit aliquando Welt sea. Eam ea Schnaps eleifend, ad blandit voluptatibus sed, Brezel eius consul sanctus vix. Cu Mercedes Benz legimus veritus vim id latine indoctum Ampelmännchen pri, mea meliore denique nominavi Hamburg Elitr expetenda nam an, his Sauerkraut reque euismod assentior. Odio principes Lukas Podolski ex pri. Ut vel solum Spezi quas natum adversarium ei ius, Stuttgart minim honestatis eum no\r\nDeutsches Ipsum Dolor meliore persecuti Honigkuchenpferd mel. Te oratio utamur vix. Sprechen Sie deutsch eloquentiam eu per. Principes complectitur Hackfleisch no. His illud moderatius ut, Gesundheit pro omnis minim epicurei, natum Hallo mel ei. Sea purto singulis Handtasche latine indoctum complectitur pri, mea Köln denique nominavi id. Jürgen Klinsmann vel solum mandamus, quas natum Schwarzwälder Kirschtorte ei ius, diam minim honestatis Handtasche no\r\nDeutsches Ipsum Dolor sit amet, Bezirksschornsteinfegermeister adipiscing elit, sed do eiusmod Meerschweinchen incididunt ut labore et dolore bitte aliqua. Ut enim ad minim Fernweh quis nostrud exercitation ullamco laboris Aufschnitt ut aliquip ex ea commodo Umsatzanalyse Duis aute irure dolor in Grossbritannien in voluptate velit esse cillum Schwarzwälder Kirschtorte eu fugiat nulla pariatur. Excepteur Rubin auf Schienen occaecat cupidatat non proident, sunt Die unendliche Geschichte culpa qui officia deserunt mollit Goethe id est laborum\r\n', 'slika3.JPG', 'putovanje', 0),
(4, '1.6.2021', 'Deshalb sind diese Kennzeichen in Deutschland verboten', 'Deutsches Ipsum Dolor id latine Mertesacker complectitur pri, mea meliore denique Hackfleisch id. Elitr expetenda nam an, Sauerkraut ei reque euismod assentior. Odio Spezi iracundia ex pri. Ut vel Helmut Kohl mandamus, quas natum adversarium ei Brezel diam minim honestatis eum no', 'Deutsches Ipsum Dolor id latine Mertesacker complectitur pri, mea meliore denique Hackfleisch id. Elitr expetenda nam an, Sauerkraut ei reque euismod assentior. Odio Spezi iracundia ex pri. Ut vel Helmut Kohl mandamus, quas natum adversarium ei Brezel diam minim honestatis eum no\r\nsit Umsatzanalyse consectetur adipiscing elit, sed do Bier tempor incididunt ut labore et Handschuh magna aliqua. Ut enim ad Meerschweinchen veniam, quis nostrud exercitation ullamco schnell nisi ut aliquip ex ea Meerschweinchen consequat. Siebentausendzweihundertvierundfünfzig reprehenderit in voluptate velit esse Die Toten Hosen dolore eu fugiat nulla pariatur. Spezi sint occaecat cupidatat non proident, Wiener Schnitzel in culpa qui officia deserunt Turnbeutel anim id est laborum. Ohrwurm lobortis elaboraret per ne, nam Welt probatus pertinax, impetus eripuit aliquando Angela Merkel sea. Diam scripserit no vis, Bezirksschornsteinfegermeister meis suscipit ea. Cu Audi legimus veritus vim\r\nDeutsches Ipsum Dolor meliore persecuti Brezel mel. Te oratio utamur vix. Bretzel eloquentiam eu per. His illud moderatius ut, Danke pro omnis minim epicurei, natum Guten Tag mel ei.\r\nDeutsches Ipsum Dolor meliore persecuti Vorsprung durch Technik mel. Te oratio utamur vix. Milchreis eloquentiam eu per. Principes complectitur Schmetterling no. Sea purto singulis Erbsenzähler', 'slika4.JPG', 'financije', 0),
(5, '2.6.2021', 'Millionen Liter Olivenöl gefälscht - was wirklich in den Flaschen steckte', 'Deutsches Ipsum Dolor id latine Mertesacker complectitur pri, mea meliore denique Hackfleisch id. Elitr expetenda nam an, Sauerkraut ei reque euismod assentior. Odio Spezi iracundia ex pri. Ut vel Helmut Kohl mandamus, quas natum adversarium ei Brezel diam minim honestatis eum no', 'Deutsches Ipsum Dolor meliore persecuti Doppelscheren-Hubtischwagen mel. Te oratio utamur vix. Stuttgart eloquentiam eu per. Principes complectitur Bier no. His illud moderatius ut, Mettwurst pro omnis minim epicurei, natum Bezirksschornsteinfegermeister mel ei. Sea purto singulis Doppelscheren-Hubtischwagen\r\nDeutsches Ipsum Dolor deserunt dissentias Fernweh et. Tollit argumentum ius an. Audi lobortis elaboraret per ne, nam Weihnachten probatus pertinax, impetus eripuit aliquando Mertesacker sea. Diam scripserit no vis, Ich habe fertig meis suscipit ea. Eam ea Schweinsteiger eleifend, ad blandit voluptatibus sed, Guten Tag eius consul sanctus vix. Cu Erbsenzähler legimus veritus vim\r\n\r\nsit amet, consectetur Anwendungsprogrammierschnittstelle elit, sed do eiusmod tempor Schweinsteiger ut labore et dolore magna Ampelmännchen Ut enim ad minim veniam, Schadenfreude nostrud exercitation ullamco laboris nisi Ich habe fertig aliquip ex ea commodo consequat. Mesut Özil aute irure dolor in reprehenderit Faust voluptate velit esse cillum dolore Die Ärzte fugiat nulla pariatur. Excepteur sint Die unendliche Geschichte cupidatat non proident, sunt in Doppelscheren-Hubtischwagen qui officia deserunt.\r\nDeutsches Ipsum Dolor id latine schnell complectitur pri, mea meliore denique Hamburg id.', 'slika5.JPG', 'financije', 0),
(6, '3.6.2021', 'Arbeiten wir bald alle nach Stechuhr?', 'Deutsches Ipsum Dolor id latine Herr Doktor complectitur pri, mea meliore denique Bahnhof id. Elitr expetenda nam an, genau ei reque euismod assentior. Odio Angela Merkel iracundia ex pri. Ut vel Hörspiele mandamus, quas natum adversarium ei Frohsinn diam minim honestatis eum no', 'Deutsches Ipsum Dolor id latine Herr Doktor complectitur pri, mea meliore denique Bahnhof id. Elitr expetenda nam an, genau ei reque euismod assentior. Odio Angela Merkel iracundia ex pri. Ut vel Hörspiele mandamus, quas natum adversarium ei Frohsinn diam minim honestatis eum no\r\n\r\nsit Mozart consectetur adipiscing elit, sed do Prost tempor incididunt ut labore et Ich bin ein Berliner magna aliqua. Ut enim ad bitte veniam, quis nostrud exercitation ullamco Anwendungsprogrammierschnittstelle nisi ut aliquip ex ea Audi consequat. Duis aute irure dolor Ich habe fertig reprehenderit in voluptate velit esse Kirschkerne dolore eu fugiat nulla pariatur. zu spät sint occaecat cupidatat non proident, Danke in culpa qui officia deserunt zu spät anim id est laborum. Deutsches Ipsum Dolor deserunt dissentias Sauerkraut et. Tollit argumentum ius an. Knappwurst lobortis elaboraret per ne, nam Die Toten Hosen probatus pertinax, impetus eripuit aliquando Handschuh sea. Diam scripserit no vis, Ich bin ein Berliner meis suscipit ea. Eam ea Weltschmerz eleifend, ad blandit voluptatibus sed, Zauberer eius consul sanctus vix. Cu Joachim Löw legimus veritus vim. Deutsches Ipsum Dolor deserunt dissentias Riesling et. Tollit argumentum ius an. Welt lobortis elaboraret per ne, nam Schadenfreude probatus pertinax, impetus eripuit aliquando Lebensabschnittsgefährte sea. Diam scripserit no vis, Grimms Märchen meis suscipit ea.\r\n', 'slika6.JPG', 'financije', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `korisnik` (`korisnicko_ime`);

--
-- Indexes for table `vijesti`
--
ALTER TABLE `vijesti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `vijesti`
--
ALTER TABLE `vijesti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
