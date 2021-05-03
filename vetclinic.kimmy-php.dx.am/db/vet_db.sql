-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2021 at 12:19 PM
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
-- Database: `vet_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(6) UNSIGNED NOT NULL,
  `admin_fname` varchar(255) DEFAULT NULL,
  `admin_sname` varchar(255) DEFAULT NULL,
  `admin_email` varchar(255) DEFAULT NULL,
  `admin_con_num` varchar(100) DEFAULT NULL,
  `admin_password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_fname`, `admin_sname`, `admin_email`, `admin_con_num`, `admin_password`) VALUES
(118, 'Nathaniel', 'Joyce', 'luctus.sit.amet@metusAeneansed.edu', '1398225578', '5442483035574C5435474F'),
(119, 'Kyla', 'Baldwin', 'Curae.Phasellus@accumsanneque.com', '1289778354', '49495030364B4C56354659'),
(120, 'Quamar', 'Rosa', 'tellus.faucibus.leo@ProinvelitSed.net', '1201193161', '4D484F343745585331564F'),
(121, 'Cassady', 'Sanchez', 'amet.dapibus.id@ultriciessemmagna.com', '1087952261', '5447423333424755314F55'),
(122, 'Lars', 'Olsen', 'tellus@cursuset.ca', '1066276591', '424D413534464453324E44'),
(123, 'Anne', 'Lowe', 'nisi@parturientmontes.co.uk', '1923722470', '4D52563338585A52374E46'),
(124, 'Colin', 'Hopkins', 'dignissim.tempor.arcu@nuncsit.edu', '1110125217', '49565130314D4845344252'),
(125, 'Branden', 'Robles', 'ut.mi@semmolestie.co.uk', '1775938803', '524D46393255484D394554'),
(126, 'Yuli', 'Barnes', 'risus.varius.orci@nascetur.co.uk', '1707093316', '4A43583535415A57384F53'),
(127, 'Jolene', 'Dominguez', 'sit@malesuadamalesuada.com', '1186272905', '494A523932454B4A394441'),
(128, 'Kimone', 'Kuppasamy', 'kimone@gmail.com', '125465558', '6861707079');

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `account_id` int(6) UNSIGNED NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `contact_number` int(10) DEFAULT NULL,
  `email_address` varchar(100) DEFAULT NULL,
  `postal_address` varchar(255) DEFAULT NULL,
  `id_number` bigint(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`account_id`, `firstname`, `lastname`, `contact_number`, `email_address`, `postal_address`, `id_number`) VALUES
(1, 'Maggy', 'Morales', 1733117599, 'condimentum.eget@Inscelerisque.com', 'Ap #195-8169 Nonummy Av.', 11715617740643),
(2, 'Delilah', 'Moss', 1688360468, 'adipiscing.lobortis.risus@velitegestaslacinia.net', 'Ap #582-5397 Rutrum, St.', 14587472847474),
(3, 'Amaya', 'Kaufman', 1828367893, 'dictum.Phasellus.in@eratvolutpatNulla.com', '4285 Mus. St.', 18539348084668),
(4, 'Doris', 'Matthews', 1694403788, 'ut.sem@volutpatNullafacilisis.co.uk', 'Ap #782-1258 Sit Street', 18358439781345),
(5, 'Leo', 'Dickson', 1785321773, 'id.ante.dictum@justosit.ca', 'P.O. Box 293, 2282 Justo Road', 16238440458068),
(6, 'Lareina', 'Avila', 1604691533, 'est.mauris@dolor.edu', 'Ap #629-8100 Non Ave', 10048198531176),
(7, 'Mohammad', 'Wade', 1630808808, 'sollicitudin.adipiscing@urnajustofaucibus.org', '580-9492 Posuere Av.', 16948845078196),
(8, 'Serina', 'Brewer', 1769783032, 'bibendum.fermentum@neque.ca', 'Ap #129-2378 Faucibus Ave', 12917664744422),
(9, 'Jasper', 'Heath', 1283676205, 'ad.litora@orci.ca', 'Ap #314-8679 At Av.', 10478087268797),
(10, 'Maya', 'Wagner', 1252202853, 'tellus.non.magna@sociosqu.net', '991-3617 Et Av.', 17715984949902),
(11, 'Jonah', 'Frazier', 1842569993, 'odio.Nam.interdum@eros.org', 'Ap #402-5240 Ligula Road', 16850573167798),
(12, 'Drake', 'Vega', 1395397088, 'vestibulum.lorem@sapienAeneanmassa.com', 'P.O. Box 659, 6155 Tempus Av.', 18062436905657),
(13, 'Calvin', 'Lambert', 1773380662, 'elementum.dui@pharetraut.com', 'P.O. Box 988, 520 Posuere Street', 18730501218300),
(14, 'Ifeoma', 'Sherman', 1175637178, 'sit@at.org', 'P.O. Box 291, 5544 Blandit Street', 16391582704944),
(15, 'Morgan', 'Santana', 1682581554, 'ullamcorper@NulladignissimMaecenas.co.uk', 'P.O. Box 564, 9835 Aenean Road', 16573057128667),
(16, 'Jocelyn', 'Ewing', 1122890442, 'iaculis@molestiedapibus.org', 'Ap #708-6248 Erat Rd.', 15577314742069),
(17, 'Harper', 'Pittman', 1277698049, 'dolor.dapibus.gravida@Etiamligulatortor.org', 'Ap #458-6041 Amet St.', 14555328027228),
(18, 'Aurora', 'Bush', 1620254746, 'risus.Nunc.ac@adipiscing.org', 'P.O. Box 452, 9999 Phasellus St.', 11059894904685),
(19, 'Brock', 'Erickson', 1067432672, 'semper@Curabiturconsequat.net', '640-1513 Ornare Rd.', 16739795248744),
(20, 'Raphael', 'Buckner', 1309638336, 'ac.facilisis@egestas.co.uk', 'P.O. Box 844, 8451 Duis Ave', 11256488981787),
(21, 'Xantha', 'Duffy', 1258658457, 'ipsum@sit.ca', 'P.O. Box 259, 925 Et Road', 12648460763972),
(22, 'Sydnee', 'Hensley', 1502278068, 'dolor@ornareelitelit.net', 'Ap #510-3139 Cras Rd.', 15521158547713),
(23, 'Brett', 'Pate', 1641437071, 'placerat.eget@laoreetlibero.net', '469-6976 Est. Road', 14044805650893),
(24, 'Alisa', 'Vaughan', 1855052196, 'nec.tellus.Nunc@molestie.org', '501 Dictum Rd.', 13839001222861),
(25, 'Ian', 'Cherry', 1929925013, 'mattis.ornare.lectus@Etiam.com', '3593 Eleifend Rd.', 15570171856752),
(26, 'Beatrice', 'York', 1290556701, 'sodales.Mauris.blandit@Proinvelnisl.ca', '4408 Elementum Rd.', 10734588455357),
(27, 'Rae', 'Jensen', 1870975600, 'quis@odioauctorvitae.ca', 'Ap #893-9616 Cursus Avenue', 17339069437436),
(28, 'Danielle', 'Parker', 1788662930, 'at.lacus.Quisque@Quisque.ca', '4807 Arcu. Ave', 18319981002851),
(29, 'Azalia', 'Battle', 1544426344, 'rhoncus.Proin.nisl@enimnisl.co.uk', 'Ap #173-4171 Ut Ave', 19172589351268),
(30, 'Sierra', 'Greene', 1497393295, 'Proin.eget@orciUtsagittis.edu', '5306 Sed St.', 17941895596567),
(31, 'Phelan', 'Freeman', 1926784292, 'Aliquam@euismodindolor.org', '6738 Ipsum. Av.', 11850576423174),
(32, 'Wilma', 'Casey', 1739171550, 'scelerisque.scelerisque@varius.net', 'Ap #691-9157 A, Street', 16300112188204),
(33, 'Raphael', 'Stevenson', 1753708957, 'quis.pede.Praesent@liberonecligula.co.uk', '327-4662 Eu Rd.', 18681487337977),
(34, 'Kiara', 'Jacobs', 1431819782, 'pede.Cras.vulputate@bibendum.net', 'P.O. Box 486, 517 Sed St.', 11496123469027),
(35, 'Timothy', 'Bradley', 1554290287, 'orci.luctus@Fuscealiquetmagna.com', '503-2113 Mauris St.', 11616442076219),
(36, 'Kristen', 'Noble', 1630227692, 'laoreet@atsemmolestie.ca', 'Ap #444-3689 Quam. St.', 11408988790643),
(37, 'Lucy', 'Robinson', 1362773485, 'mi.eleifend@odioPhasellusat.com', '9790 Ac St.', 11960983600985),
(38, 'Jermaine', 'Fleming', 1900832868, 'neque.pellentesque.massa@velitAliquamnisl.net', 'P.O. Box 734, 6118 Dictum. Av.', 18658603917756),
(39, 'Echo', 'Underwood', 1539688004, 'euismod.et.commodo@consectetuermaurisid.org', 'P.O. Box 267, 2055 Lacus. Rd.', 12064180422843),
(40, 'Garrison', 'Mccray', 1880494522, 'Sed.id@dui.co.uk', '646-9182 Phasellus St.', 18867814064255),
(41, 'Lucas', 'Stuart', 1112083854, 'et.magnis@Inmi.ca', '8988 Magnis Av.', 11750791188756),
(42, 'Fredericka', 'Fry', 1204553017, 'dapibus@sagittis.net', '2785 Vivamus Ave', 19614123479791),
(43, 'Stone', 'Brown', 1140345916, 'neque@Namac.edu', '372-4404 Ultrices Rd.', 15966415258885),
(44, 'Zeus', 'Boone', 1785209448, 'tempus@Aenean.ca', '6552 Scelerisque Avenue', 12622549318385),
(45, 'Joel', 'Small', 1139762661, 'quis.turpis@cursusdiam.net', 'Ap #727-8998 Augue St.', 14834657829644),
(46, 'Herman', 'Whitaker', 1922905644, 'magna@lobortis.com', '895-6495 Eu St.', 12251536256636),
(47, 'Sophia', 'Juarez', 1215996030, 'lorem.ac@litoratorquent.ca', '2802 Odio Street', 14383609459646),
(48, 'Fulton', 'Alford', 1812474190, 'Nunc.sed@consectetuer.ca', 'Ap #871-4788 Penatibus Rd.', 16503862696764),
(49, 'Finn', 'Mccullough', 1130678745, 'libero.Proin.sed@ultricesDuisvolutpat.ca', 'Ap #178-4668 Tortor Avenue', 12043840535347),
(50, 'Harper', 'Webb', 1748140444, 'consectetuer.adipiscing@sodales.com', '4847 Rutrum. St.', 17140008764313),
(51, 'Vivien', 'Forbes', 1667826159, 'sagittis@eratin.org', 'P.O. Box 141, 5982 Est Avenue', 19134775504679),
(52, 'Deborah', 'Rios', 1222809146, 'Etiam@ornareFuscemollis.co.uk', 'P.O. Box 978, 5264 Ornare, Road', 13006671602729),
(53, 'Quentin', 'Kim', 1021615315, 'sem.ut@congueInscelerisque.edu', '649-9226 Ante. Rd.', 17738313284512),
(54, 'Yoshio', 'White', 1226815727, 'mollis.nec.cursus@vel.com', '559 In St.', 12407888091165),
(55, 'Alden', 'Roberson', 1275482454, 'a@laciniavitae.ca', '7796 Donec Rd.', 16444624277107),
(56, 'Alyssa', 'Solomon', 1030142707, 'ipsum.dolor@posuere.net', 'Ap #751-9392 Mi. St.', 16119589373101),
(57, 'Celeste', 'Holt', 1441992305, 'pharetra.felis@ac.ca', 'P.O. Box 574, 1119 Id, Road', 10336581271235),
(58, 'Mira', 'Mayo', 1436462734, 'sed.consequat.auctor@mi.com', '1989 Conubia Av.', 12618081470053),
(59, 'Winifred', 'Frederick', 1070849248, 'adipiscing.Mauris.molestie@Crasegetnisi.edu', 'P.O. Box 600, 1972 Phasellus Av.', 15689336242528),
(60, 'Hasad', 'Franks', 1403989240, 'arcu.Sed.eu@sagittissemperNam.edu', '4759 Ligula Avenue', 19812790493172),
(61, 'Ramona', 'Booker', 1321516161, 'Sed@nisi.org', '729-9577 Iaculis Ave', 10989125489155),
(62, 'Arthur', 'Duke', 1036721576, 'Nullam@duiFusce.ca', '3422 Et Ave', 17538455413878),
(63, 'Kibo', 'Byers', 1087472541, 'mus.Proin.vel@sitamet.ca', '9098 Dignissim Av.', 19948921335518),
(64, 'Dora', 'Preston', 1936784533, 'mi.Aliquam@Donecsollicitudinadipiscing.net', '494-9896 Tortor. Road', 12726226910088),
(65, 'Veronica', 'Melendez', 1629083258, 'sit.amet.ornare@ornareInfaucibus.edu', 'Ap #566-7596 Morbi St.', 13492095809135),
(66, 'September', 'Church', 1446436450, 'sit@nibhPhasellusnulla.ca', 'P.O. Box 462, 8007 Aenean St.', 17030825657714),
(67, 'Ora', 'Rasmussen', 1060477510, 'euismod.est@a.edu', 'Ap #136-283 Habitant Ave', 18703694309550),
(68, 'Kato', 'Sykes', 1970061859, 'Sed@gravida.org', 'Ap #112-2261 Sagittis Ave', 18778995077470),
(69, 'Inez', 'Wiley', 1971160838, 'justo@magnisdisparturient.net', '5074 Ut St.', 16933235503511),
(70, 'Derek', 'Greer', 1864675319, 'Sed.et@nullaanteiaculis.org', 'Ap #387-5478 In Avenue', 10519060743613),
(71, 'Maggy', 'Kline', 1743293779, 'justo.nec.ante@turpis.edu', '5888 Montes, St.', 12830173826228),
(72, 'Bertha', 'Levine', 1725847855, 'semper.tellus@aliquam.co.uk', 'Ap #704-6359 Vel, Rd.', 15497945420666),
(73, 'Melinda', 'Houston', 1729366315, 'imperdiet.ullamcorper.Duis@ettristique.org', 'P.O. Box 707, 8970 Orci. Rd.', 16888563045349),
(74, 'Echo', 'Gallegos', 1831375067, 'vitae@adipiscingfringilla.co.uk', '2510 Maecenas Ave', 14304326804651),
(75, 'Caryn', 'Dillard', 1768003022, 'facilisis@tristique.org', '394-6445 Velit Rd.', 15247320513734),
(76, 'Rudyard', 'Roberts', 1004203213, 'mus@cubiliaCuraeDonec.edu', '403-2178 Vestibulum Av.', 12914468855580),
(77, 'Taylor', 'Morrison', 1160611744, 'bibendum.ullamcorper.Duis@arcu.net', '1785 Magna Road', 10410866677973),
(78, 'Judah', 'Craig', 1075197414, 'vel.mauris@Suspendisse.net', 'P.O. Box 697, 8007 Non, St.', 10059615631183),
(79, 'Risa', 'Ayala', 1858864549, 'enim@lectusconvallis.co.uk', '928-5455 Sed Rd.', 19088696600173),
(80, 'Nicholas', 'Mccarty', 1142773748, 'Proin@sitametconsectetuer.net', '8165 Cursus St.', 16670705408565),
(81, 'Naida', 'Cortez', 1012851753, 'dolor.Nulla@Vestibulumuteros.ca', 'P.O. Box 181, 2539 Pede, Rd.', 11322652427762),
(82, 'Elizabeth', 'Good', 1671249200, 'dui.augue@malesuadaiderat.edu', 'Ap #849-2175 Arcu St.', 10661104143438),
(83, 'Thaddeus', 'Pearson', 1767106873, 'pellentesque@nectempus.edu', '2366 Vitae Road', 15771308336268),
(84, 'Stacy', 'Dorsey', 1961919632, 'vitae.odio@Maurisnon.com', 'Ap #319-5266 Ante Rd.', 15448242525799),
(85, 'Glenna', 'Shaw', 1728996478, 'dui@gravidanon.net', 'Ap #309-9758 Adipiscing, St.', 17897281726783),
(86, 'Reese', 'Nieves', 1733518338, 'ante@Duiselementumdui.edu', 'P.O. Box 717, 633 Dui, St.', 17188427318534),
(87, 'Paul', 'Davenport', 1260757910, 'felis@posuereenim.org', 'Ap #640-5636 Penatibus Av.', 18119795671100),
(88, 'Holmes', 'Horn', 1927130655, 'et.ultrices@varius.org', '7305 Euismod Rd.', 18287818387866),
(89, 'Carly', 'Sims', 1966160150, 'Proin@aptenttacitisociosqu.net', 'Ap #744-4791 Purus Avenue', 16649976703276),
(90, 'Pandora', 'Meyers', 1656832114, 'nisi.magna.sed@fringilla.org', 'P.O. Box 872, 3723 Odio. St.', 16975433013564),
(91, 'Richard', 'Rosa', 1580135796, 'Nam@arcueuodio.co.uk', 'P.O. Box 528, 3465 Mauris Avenue', 12223635757212),
(92, 'Mona', 'Puckett', 1333259989, 'Curabitur@tellusjustosit.ca', 'P.O. Box 348, 8579 Sed Av.', 18772417557797),
(93, 'Kane', 'Espinoza', 1481564542, 'nisi.dictum@rutrumFusce.net', '403-2917 Mauris St.', 17144555283027),
(94, 'Vanna', 'Roach', 1409657969, 'lacinia@luctusutpellentesque.net', 'P.O. Box 469, 6636 Ornare, Street', 17013575775357),
(95, 'Drake', 'Gross', 1259760426, 'Etiam@Vestibulumante.com', '4239 Urna. St.', 11738296290431),
(96, 'Brennan', 'Farley', 1782911905, 'quis@sem.co.uk', 'P.O. Box 622, 9492 Commodo Street', 10586217199849),
(97, 'Aphrodite', 'Stuart', 1436017796, 'ipsum@sodalesMauris.edu', 'Ap #534-2591 Montes, Street', 11976248099384),
(98, 'Yolanda', 'Walter', 1891396678, 'dui@vitaenibh.org', 'Ap #166-8507 Eros Road', 13741936405649),
(99, 'Winter', 'Perkins', 1275888747, 'eu.enim.Etiam@velitdui.net', 'Ap #612-5599 Dui Street', 16226290500199),
(100, 'Solomon', 'Booth', 1306351892, 'mi.tempor.lorem@convallisest.com', 'Ap #715-4345 Lorem Rd.', 13004146404893);

-- --------------------------------------------------------

--
-- Table structure for table `pet`
--

CREATE TABLE `pet` (
  `pet_id` int(6) UNSIGNED NOT NULL,
  `account_id` int(6) UNSIGNED NOT NULL,
  `pet_name` varchar(255) DEFAULT NULL,
  `animal_type` varchar(255) DEFAULT NULL,
  `breed` varchar(100) DEFAULT NULL,
  `birthdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pet`
--

INSERT INTO `pet` (`pet_id`, `account_id`, `pet_name`, `animal_type`, `breed`, `birthdate`) VALUES
(1, 55, 'Dylan', 'dog', 'bulldog', '2024-04-18'),
(2, 13, 'Orlando', 'dog', 'bulldog', '2023-06-20'),
(3, 40, 'Lillith', 'dog', 'bulldog', '0000-00-00'),
(4, 25, 'Naomi', 'dog', 'bulldog', '2011-06-20'),
(5, 73, 'Justin', 'dog', 'bulldog', '2015-12-20'),
(6, 28, 'Olympia', 'dog', 'bulldog', '2014-08-18'),
(7, 41, 'Rhona', 'dog', 'bulldog', '2013-05-20'),
(8, 7, 'Akeem', 'dog', 'bulldog', '2026-03-18'),
(9, 12, 'Ima', 'dog', 'bulldog', '2026-09-18'),
(10, 61, 'Samuel', 'dog', 'bulldog', '2017-08-16'),
(11, 46, 'Jolene', 'cat', 'bunny', '2008-08-16'),
(12, 82, 'Josiah', 'cat', 'bunny', '2014-03-19'),
(13, 2, 'Adara', 'cat', 'bunny', '2009-01-16'),
(14, 9, 'Sopoline', 'cat', 'bunny', '2031-03-18'),
(15, 29, 'Upton', 'cat', 'bunny', '2025-09-16'),
(16, 98, 'Bruce', 'cat', 'bunny', '2011-02-16'),
(17, 63, 'Mohammad', 'cat', 'bunny', '0000-00-00'),
(18, 35, 'Noelle', 'cat', 'bunny', '2004-04-19'),
(19, 32, 'Rajah', 'cat', 'bunny', '2024-04-18'),
(20, 59, 'Vielka', 'cat', 'bunny', '2009-05-17'),
(21, 45, 'Kylynn', 'rabbit', 'pug', '2030-03-18'),
(22, 83, 'Damian', 'rabbit', 'pug', '2002-04-20'),
(23, 62, 'Lynn', 'rabbit', 'pug', '2021-09-20'),
(24, 9, 'Cullen', 'rabbit', 'pug', '2009-05-17'),
(25, 72, 'Bert', 'rabbit', 'pug', '2005-06-17'),
(26, 27, 'Lana', 'rabbit', 'pug', '2006-08-17'),
(27, 87, 'Sierra', 'rabbit', 'pug', '2007-03-18'),
(28, 12, 'Fredericka', 'rabbit', 'pug', '0000-00-00'),
(29, 32, 'Unity', 'rabbit', 'pug', '2007-06-20'),
(30, 91, 'Nora', 'rabbit', 'pug', '2029-11-17');

-- --------------------------------------------------------

--
-- Table structure for table `visits`
--

CREATE TABLE `visits` (
  `visit_id` int(6) UNSIGNED NOT NULL,
  `pet_id` int(6) UNSIGNED NOT NULL,
  `visit_date` date DEFAULT NULL,
  `visit_type` varchar(255) DEFAULT NULL,
  `follow_up_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visits`
--

INSERT INTO `visits` (`visit_id`, `pet_id`, `visit_date`, `visit_type`, `follow_up_date`) VALUES
(11, 17, '2004-06-20', 'vaccine', '2031-07-21'),
(12, 3, '2030-08-20', 'vaccine', '2016-09-21'),
(13, 55, '2029-04-21', 'vaccine', '2026-09-21'),
(14, 26, '2017-07-20', 'vaccine', '2021-05-21'),
(15, 95, '2020-02-21', 'vaccine', '2015-09-21'),
(16, 18, '2023-12-20', 'vaccine', '2003-03-22'),
(17, 59, '2023-02-21', 'vaccine', '2004-02-21'),
(18, 51, '2010-11-20', 'vaccine', '2008-02-22'),
(19, 92, '2010-06-20', 'vaccine', '2029-01-22'),
(20, 83, '2015-07-20', 'vaccine', '2019-07-21'),
(21, 53, '2026-12-20', 'consult', '2006-11-21'),
(22, 52, '2018-05-20', 'consult', '2005-02-22'),
(23, 42, '2019-12-20', 'consult', '2017-03-21'),
(24, 1, '2007-04-21', 'consult', '2008-08-20'),
(25, 67, '2022-12-20', 'consult', '2019-09-20'),
(26, 9, '2002-07-20', 'consult', '2021-07-20'),
(27, 36, '2005-03-21', 'consult', '2018-02-21'),
(28, 54, '2009-08-20', 'consult', '2030-05-21'),
(29, 97, '2023-09-20', 'consult', '2024-03-21'),
(30, 72, '2004-04-21', 'consult', '2015-02-21'),
(31, 34, '2022-08-20', 'procedure', '2018-11-21'),
(32, 43, '2024-01-21', 'procedure', '2026-10-20'),
(33, 58, '2002-03-21', 'procedure', '2022-05-20'),
(34, 31, '2010-02-21', 'procedure', '2026-06-21'),
(35, 80, '2020-08-20', 'procedure', '2020-04-21'),
(36, 20, '2004-09-20', 'procedure', '2005-02-21'),
(37, 14, '2026-01-21', 'procedure', '2029-12-21'),
(38, 84, '2020-06-20', 'procedure', '2028-11-21'),
(39, 95, '2028-05-20', 'procedure', '2027-05-21'),
(40, 27, '2003-09-20', 'procedure', '2007-03-21'),
(41, 54, '2015-08-20', 'vaccine', '2018-04-22'),
(42, 47, '2008-01-21', 'vaccine', '2013-09-20'),
(43, 80, '2013-08-20', 'vaccine', '2027-09-20'),
(44, 71, '2006-04-21', 'vaccine', '2020-12-21'),
(45, 7, '2009-06-20', 'vaccine', '2001-11-21'),
(46, 55, '2001-04-21', 'vaccine', '2026-01-21'),
(47, 35, '2018-06-20', 'vaccine', '2018-01-22'),
(48, 100, '2012-08-20', 'vaccine', '2028-03-21'),
(49, 19, '2022-06-20', 'vaccine', '2004-03-22'),
(50, 21, '2002-10-20', 'vaccine', '2031-08-21'),
(51, 38, '2028-12-20', 'consult', '2027-04-22'),
(52, 48, '2004-12-20', 'consult', '2007-04-21'),
(53, 20, '2009-03-21', 'consult', '2026-08-21'),
(54, 41, '2021-07-20', 'consult', '2001-07-21'),
(55, 49, '2011-07-20', 'consult', '2022-09-20'),
(56, 11, '2005-09-20', 'consult', '2023-08-21'),
(57, 62, '2008-04-21', 'consult', '2005-08-21'),
(58, 30, '2005-10-20', 'consult', '2029-11-21'),
(59, 1, '2025-07-20', 'consult', '2011-08-21'),
(60, 89, '2026-12-20', 'consult', '2014-09-21'),
(61, 100, '2029-06-20', 'procedure', '2005-11-20'),
(62, 11, '2004-12-20', 'procedure', '2012-08-20'),
(63, 89, '2008-04-21', 'procedure', '2027-03-22'),
(64, 95, '2005-03-21', 'procedure', '2028-06-21'),
(65, 52, '2016-05-20', 'procedure', '2022-06-21'),
(66, 8, '2021-02-21', 'procedure', '2010-03-22'),
(67, 23, '2009-10-20', 'procedure', '2007-11-21'),
(68, 67, '2011-05-20', 'procedure', '2020-03-22'),
(69, 23, '2025-03-21', 'procedure', '2030-01-21'),
(70, 59, '2031-05-20', 'procedure', '2017-03-22'),
(71, 49, '2025-10-20', 'vaccine', '2005-09-21'),
(72, 54, '2015-04-21', 'vaccine', '2012-07-21'),
(73, 40, '2008-03-21', 'vaccine', '2023-04-22'),
(74, 44, '2014-04-21', 'vaccine', '2006-04-22'),
(75, 88, '2020-09-20', 'vaccine', '2021-11-21'),
(76, 42, '2003-01-21', 'vaccine', '2018-09-21'),
(77, 99, '2005-02-21', 'vaccine', '2012-08-21'),
(78, 46, '2005-11-20', 'vaccine', '2019-03-21'),
(79, 44, '2029-08-20', 'vaccine', '2030-08-21'),
(80, 35, '2003-03-21', 'vaccine', '2023-05-20'),
(81, 51, '2008-06-20', 'consult', '2001-09-20'),
(82, 12, '2031-03-21', 'consult', '2025-12-20'),
(83, 34, '2021-04-21', 'consult', '2024-11-21'),
(84, 13, '2010-01-21', 'consult', '2026-01-22'),
(85, 5, '2016-09-20', 'consult', '2015-08-20'),
(86, 20, '2004-06-20', 'consult', '2027-05-21'),
(87, 41, '2012-04-21', 'consult', '2027-09-20'),
(88, 63, '2014-08-20', 'consult', '2024-05-20'),
(89, 90, '2019-10-20', 'consult', '2015-12-21'),
(90, 34, '2020-08-20', 'consult', '2008-07-20'),
(91, 57, '2020-12-20', 'procedure', '2008-10-20'),
(92, 100, '2028-03-21', 'procedure', '2029-08-20'),
(93, 98, '2028-05-20', 'procedure', '2008-12-21'),
(94, 89, '2005-06-20', 'procedure', '2014-01-21'),
(95, 30, '2021-12-20', 'procedure', '2009-07-20'),
(96, 13, '2026-06-20', 'procedure', '2005-02-21'),
(97, 4, '2023-11-20', 'procedure', '2016-10-21'),
(98, 47, '2025-12-20', 'procedure', '2030-10-20'),
(99, 19, '2003-10-20', 'procedure', '2025-02-22'),
(100, 94, '2013-12-20', 'procedure', '2009-06-20'),
(101, 24, '2011-02-21', 'vaccine', '2025-02-21'),
(102, 96, '2016-12-20', 'vaccine', '2021-06-21'),
(103, 45, '2028-02-21', 'vaccine', '2005-11-21'),
(104, 30, '2002-04-21', 'vaccine', '2019-09-20'),
(105, 54, '2016-12-20', 'vaccine', '2011-07-21'),
(106, 67, '2028-05-20', 'vaccine', '2028-12-21'),
(107, 45, '2024-07-20', 'vaccine', '2015-10-21'),
(108, 9, '2002-06-20', 'vaccine', '2031-10-21'),
(109, 88, '2023-12-20', 'vaccine', '2006-06-21'),
(110, 98, '2024-01-21', 'vaccine', '2029-04-22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`pet_id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `visits`
--
ALTER TABLE `visits`
  ADD PRIMARY KEY (`visit_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `account_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `pet`
--
ALTER TABLE `pet`
  MODIFY `pet_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `visits`
--
ALTER TABLE `visits`
  MODIFY `visit_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pet`
--
ALTER TABLE `pet`
  ADD CONSTRAINT `pet_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `owner` (`account_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
