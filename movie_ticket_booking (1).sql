-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2024 at 04:55 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movie_ticket_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `cust_id` int(11) DEFAULT NULL,
  `show_id` int(11) DEFAULT NULL,
  `screens` int(11) NOT NULL,
  `no_of_tickets` int(11) DEFAULT NULL,
  `seat_details_id` int(11) DEFAULT NULL,
  `booking_date` date DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `cust_id`, `show_id`, `screens`, `no_of_tickets`, `seat_details_id`, `booking_date`, `total_amount`) VALUES
(39, 1, 1, 0, 2, 50, '0000-00-00', 1200.00),
(40, 1, 1, 0, 1, 51, '0000-00-00', 600.00),
(41, 1, 1, 0, 1, 52, '2024-03-20', 600.00),
(42, 1, 1, 0, 1, 53, '2024-03-07', 600.00),
(43, 1, 1, 0, 3, 54, '2024-03-06', 1800.00),
(44, 1, 1, 0, 3, 55, '2024-03-06', 1800.00),
(45, 1, 1, 0, 2, 58, '2024-03-05', 1200.00),
(46, 2, 1, 0, 2, 59, '2024-03-05', 1200.00),
(47, 2, 1, 0, 1, 60, '2024-03-10', 600.00),
(48, 2, 1, 0, 1, 61, '2024-03-05', 600.00),
(49, 2, 1, 0, 1, 62, '2024-03-05', 600.00),
(50, 2, 1, 0, 1, 63, '2024-03-05', 600.00),
(51, 2, 1, 0, 1, 64, '2024-03-05', 600.00),
(52, 2, 1, 0, 1, 75, '2024-03-03', 600.00),
(53, 1, 1, 0, 2, 76, '2024-03-06', 1200.00),
(54, 1, 1, 0, 2, 77, '2024-03-04', 1200.00),
(55, 1, 1, 0, 1, 78, '2024-03-04', 600.00),
(56, 1, 1, 1, 1, 82, '2024-03-06', 600.00),
(57, 2, 1, 1, 1, 124, '2024-03-03', 600.00),
(58, 1, 1, 2, 1, 129, '2024-03-04', 600.00),
(59, 1, 1, 1, 1, 130, '2024-03-06', 600.00),
(60, 1, 1, 1, 1, 132, '2024-04-03', 600.00),
(61, 1, 1, 5, 1, 139, '2024-04-12', 600.00),
(62, 2, 1, 5, 1, 146, '2024-04-17', 600.00),
(63, 3, 1, 4, 1, 149, '2024-04-12', 600.00);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `food_id`, `quantity`) VALUES
(193, 1, 2),
(194, 2, 0),
(195, 3, 0),
(196, 4, 0),
(221, 1, 2),
(222, 2, 2),
(223, 1, 2),
(224, 1, 2),
(225, 2, 2),
(226, 1, 2),
(227, 3, 2),
(228, 2, 2),
(229, 2, 2),
(230, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categorie_id` int(10) UNSIGNED NOT NULL,
  `categorie_name` varchar(191) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categorie_id`, `categorie_name`) VALUES
(1, 'action'),
(2, 'adventure'),
(3, 'comedy'),
(4, 'drama'),
(5, 'fantasy'),
(6, 'horror'),
(7, 'musicals'),
(8, 'mystery'),
(9, 'romance'),
(10, 'science fiction'),
(11, 'sports'),
(12, 'thriller');

-- --------------------------------------------------------

--
-- Table structure for table `cinema`
--

CREATE TABLE `cinema` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cinema`
--

INSERT INTO `cinema` (`id`, `name`, `location`, `city`) VALUES
(1, 'inox', 'nashik road', 'nashik'),
(2, 'cineplex', 'bytco', 'nashik'),
(3, 'moviemax', 'cidco', 'Nashik');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `number` int(11) NOT NULL,
  `message` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `number`, `message`) VALUES
(1, 'Shruti Kamble', 'kambleshruti098@gmail.com', 988765433, 'werghjkl'),
(2, 'Shruti Kamble', 'kambleshruti098@gmail.com', 988765433, 'werghjkl'),
(3, 'chaitali', 'chaitalikhade2020@gmail.com', 2147483647, 'bvcashcgfI Ebw7\r\n'),
(4, 'praju', 'abc123@gmail.com', 123456789, 'sertyuiknbvfghj');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cellno` varchar(15) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cnfrm_paswrd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `fullname`, `email`, `cellno`, `gender`, `password`, `cnfrm_paswrd`) VALUES
(1, 'prajakta', 'abc123@gmail.com', '1234567890', 'female', '1212', '1212'),
(2, 'shruti', 'kambleshruti098@gmail.com', '1234567890', 'female', '1234', '1234'),
(3, 'abc', 'abc123@gmail.com', '1234567890', 'female', '1212', '1212');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` int(11) NOT NULL,
  `img_path` varchar(100) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `img_path`, `name`, `price`) VALUES
(1, 'images/popcorn.jpg', 'Popcorn', 200.00),
(2, 'images/coffee.jpg', 'Coffee', 150.00),
(3, 'images/cocacola.jpg', 'Coka-cola', 90.00),
(4, 'images/puff-pastry.jpg', 'Puff-Pastries', 300.00);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `movie_id` int(30) NOT NULL,
  `movie_title` varchar(255) NOT NULL,
  `durations` varchar(30) DEFAULT NULL,
  `movie_image` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `rating` decimal(3,1) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `movie_status` varchar(20) DEFAULT NULL,
  `release_date` date DEFAULT NULL,
  `url_trailer` varchar(255) DEFAULT NULL,
  `url_poster` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movie_id`, `movie_title`, `durations`, `movie_image`, `category_id`, `rating`, `description`, `movie_status`, `release_date`, `url_trailer`, `url_poster`) VALUES
(1, 'Doctor Strange in the Multiverse of Madness', '2 hrs 15 mins', 'images/Doctor Strange.jpg', 1, 9.2, 'Doctor Strange teams up with a mysterious teenage girl from his dreams who can travel across multiverses, to battle multiple threats, including other-universe versions of himself, which threaten to wipe out millions across the multiverse.', 'now showing', '2024-03-12', '\"https://www.youtube.com/embed/aWzlQ2N6qqg\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></ifr', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSJ5IuxfEt-WmUIrpJldszdRJFfTubSEeQVMVNuv63Z0PNfvbWV'),
(10, 'Jumanji: Welcome to the Jungle', '3 hrs', 'images/jumanji_v8_aa.jpg', 1, 0.0, 'When four students play with a magical video game, they are drawn to the jungle world of Jumanji, where they are trapped as their avatars. To return to the real world, they must finish the game.', 'Up Coming', '2024-03-20', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/2QKg5SZ_35I\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></ifr', 'https://contentserver.com.au/assets/637737_jumanji_v8_aa.jpg'),
(14, 'Black Panther: Wakanda Forever', '3 hrs 10mins', 'images/BlackPanther.jpg', 2, 7.8, 'Queen Ramonda, Shuri, M\'Baku, Okoye and the Dora Milaje fight to protect their nation from intervening world powers in the wake of King T\'Challa\'s death. As the Wakandans strive to embrace their next chapter, the heroes must band together with Nakia and Everett Ross to forge a new path for their beloved kingdom.', 'Up Coming', '2024-03-27', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/RlOB3UALvrQ\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></ifr', 'https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcSzNzI5w3iKM-KdasCDvlOEUgD2ojlf7IW5b-e3tqFmhW2JRSCz'),
(15, 'Free Guy', '2 hrs 50 mins', 'images/freeguy.jpg', 1, 7.1, 'When Guy, a bank teller, learns that he is a non-player character in a bloodthirsty, open-world video game, he goes on to become the hero of the story and takes the responsibility of saving the world.', 'now showing', '2024-03-20', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/X2m-08cOAbc\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></ifr', 'https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcQEUMqXik1Ntuc2NTpCgbX2JENwlZD3kwDZa4nDm6TCkXVX9FvU'),
(16, 'Extraction', '3 hrs 5 mins', 'images/Extraction.jpg', 3, 6.1, 'A black-market mercenary who has nothing to lose is hired to rescue the kidnapped son of an imprisoned international crime lord. But in the murky underworld of weapons dealers and drug traffickers, an already deadly mission approaches the impossible.', 'now showing', '2024-04-20', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/L6P3nI6VnlY\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></ifr', 'https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcRELEr5bWH1Z9ZlYjofDbRoW0ToFJop6YlcJuVU8lAYt2peph_n'),
(17, 'Puss in Boots: The Last Wish', '2 hrs', 'images/puss-in-boots.jpg', 2, 7.9, 'Puss in Boots discovers that his passion for adventure has taken its toll when he learns that he has burnt through eight of his nine lives. Puss sets out on an epic journey to find the mythical Last Wish and restore his nine lives.', 'now showing', '2024-03-29', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/RqrXhwS33yc\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></ifr', 'https://www.dreamworks.com/storage/cms-uploads/puss-in-boots-the-last-wish-poster-thumbnail2.jpg'),
(18, 'Dune', '3 hrs 35 mins', 'images/dune.jpg', 3, 8.0, 'Paul Atreides arrives on Arrakis after his father accepts the stewardship of the dangerous planet. However, chaos ensues after a betrayal as forces clash to control melange, a precious resource.', 'Up Coming', '2024-03-31', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/n9xhJrPXop4\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></ifr', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSvJznVehDbSUPihJbSTNwH8Tgnvh4ZDxs0J4hV06wOvHHidHul'),
(19, 'Black Adam', '3 hrs 46 mins', 'images/Black_Adam.jpg', 1, 6.4, 'After being bestowed with godly powers and imprisoned for it, Black Adam is liberated from his earthly binds to unleash his fury on the modern world.', 'Up Coming', '2024-05-09', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/mkomfZHG5q4\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></ifr', 'https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcTNSOjcSmrXYIZ517jTKmCDxBwIJU4_ojFweUDLI1Dssn2UfTsx'),
(22, 'Spider-Man: No Way Home', '2 hrs 30 mins', 'images/nwhspider.jpg', 3, 9.5, 'Spider-Man seeks the help of Doctor Strange to forget his exposed secret identity as Peter Parker. However, Stranges spell goes horribly wrong, leading to unwanted guests entering their universe.', 'now showing', '2024-06-21', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/JfVOs4VSpmA\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></ifr', 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcQtU4DiRFRr0155DjcHlSsgJy9opzt_MPMJmHfG4MEa31-A82Xb'),
(24, 'Ant-Man and the Wasp: Quantumania', '2 hrs 15 mins', 'images/antman.jpg', 1, 9.0, 'Ant-Man and the Wasp find themselves exploring the Quantum Realm, interacting with strange new creatures and embarking on an adventure that pushes them beyond the limits of what they thought was possible.', 'now showing', '2024-11-09', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/ZlNFpri-Y40\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></ifr', 'https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcTYyaCMGIDqOrnfFiXD5Wj3--gOX6aYjvtE-DKc3ym6Wyr_UQqH'),
(25, 'Shazam! Fury of the Gods', '2 hrs', 'images/shazam-fury-of-the-gods-final-button-1674672663658.jpg', 2, 7.0, 'Bestowed with the powers of the gods, Billy Batson and his fellow foster kids are still learning how to juggle teenage life with their adult superhero alter egos. When a vengeful trio of ancient gods arrive on Earth in search of the magic stolen from them long ago, Shazam and his allies get thrust into a battle for their superpowers, their lives, and the fate of the world.', 'up coming', '2024-09-18', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/AIc671o9yCI\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></ifr', 'https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcQkt0sbPyrPtNbq10WtcGNEaiumgCpY-niW9AuxIcADocZzoGzj'),
(26, 'John Wick: Chapter 4', '2 hrs 30 mins', 'images/johnwick.jpg', 1, 8.0, 'With the price on his head ever increasing, legendary hit man John Wick takes his fight against the High Table global as he seeks out the most powerful players in the underworld, from New York to Paris to Japan to Berlin.', 'up coming', '2024-11-22', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/yjRHZEUamCc\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></ifr', 'https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcTGpBp6P5LIfO7IiA_RBY9IZiCxgyJRkEDr-KwvwPOmoyQx8TnM'),
(27, 'Guardians of the Galaxy Vol. 3', '3 hrs 5 mins', 'images/guardians_3.jpg', 1, 8.0, 'The Guardians of the Galaxy are adjusting to life on Knowhere, but when parts of Rocket\'s past resurface, Peter Quill must lead the Guardians on a dangerous mission to protect him that could lead to the team dissolving.', 'up coming', '2024-03-22', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/JqcncLPi9zw\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></ifr', 'https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcQ11X-P72Q-chS3EQwfY9cPO6dciecM5tX-xH3x2gLKJ1ZQYMx7'),
(29, 'The Flash', '2 hrs 30 mins', 'images/TheFlash.jpg', 2, 9.0, ' travel back in time to change the events of the past. However, when his attempt to save his family inadvertently alters the future, he becomes trapped in a reality in which General Zod has returned, threatening annihilation. With no other superheroes to turn to, the Flash looks to coax a very different Batman out of retirement and rescue an imprisoned Kryptonian -- albeit not the one he\'s looking for.', 'now showing', '2024-09-19', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/hebWYacbdvc\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></ifr', 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcSk9Avvld19ygwPbQBPFeTXvhKi44oq8SEtb5semfoHApQxrlSW'),
(30, 'The Marvels', '2 hrs 30 mins', 'images/TheMarvels.jpg', 1, 8.0, 'The Marvels is an upcoming American superhero film based on Marvel Comics featuring the characters Carol Danvers / Captain Marvel, Kamala Khan / Ms. Marvel, and Monica Rambeau.', 'up coming', '2024-03-29', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/Wh1h73V8Pc4\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></ifr', 'https://tvline.com/wp-content/uploads/2023/02/the-marvels-poster.png'),
(31, 'Aquaman and the Lost Kingdom', '3 hrs 35 mins', 'images/aquaman-2-scaled.jpg', 1, 8.0, 'Aquaman forges an uneasy alliance with an unlikely ally in a bid to save Atlantis and the rest of the planet.', 'now showing', '2024-03-14', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/zL2BtTdIuLI\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></ifr', 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcRIonZj4Gw1S4lBY8qoeZFx8hE4ppspNhQLIn7XiWKuVgopfFsI');

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE `payment_details` (
  `payment_id` int(11) NOT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `card_number` varchar(16) DEFAULT NULL,
  `expiry_date` varchar(7) DEFAULT NULL,
  `cvv` varchar(4) DEFAULT NULL,
  `upi_id` varchar(50) DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_details`
--

INSERT INTO `payment_details` (`payment_id`, `payment_method`, `card_number`, `expiry_date`, `cvv`, `upi_id`, `total_amount`) VALUES
(1, '', '', '', '', '', 0.00),
(2, '', '', '', '', '', 0.00),
(3, '', '', '', '', '', 0.00),
(4, '', '', '', '', '', 0.00),
(5, '', '', '', '', '', 0.00),
(6, '', '', '', '', '', 0.00),
(7, '', '', '', '', '', 0.00),
(8, '', '', '', '', '', 0.00),
(9, '', '', '', '', '', 0.00),
(10, '', '', '', '', '', 0.00),
(11, '', '', '', '', '', 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `screens`
--

CREATE TABLE `screens` (
  `screen_id` int(11) NOT NULL,
  `screen_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seat_details`
--

CREATE TABLE `seat_details` (
  `id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `show_id` int(11) NOT NULL,
  `seat_number` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seat_details`
--

INSERT INTO `seat_details` (`id`, `cust_id`, `show_id`, `seat_number`) VALUES
(19, 1, 1, '1'),
(20, 2, 2, '1'),
(21, 1, 1, '1'),
(22, 1, 1, '1'),
(23, 1, 1, '1'),
(24, 1, 1, '1'),
(25, 1, 1, '1'),
(26, 1, 1, '1'),
(27, 1, 1, '1'),
(28, 1, 1, '1'),
(29, 1, 1, '1'),
(30, 1, 1, '1'),
(31, 1, 1, '1'),
(32, 1, 1, '1'),
(33, 1, 1, '1'),
(34, 1, 1, '1'),
(35, 1, 1, '1'),
(36, 1, 1, '1'),
(37, 1, 1, '1'),
(38, 1, 1, '1'),
(39, 1, 1, '1'),
(40, 1, 1, '1'),
(41, 1, 1, '1'),
(42, 1, 1, '1'),
(43, 1, 1, '4'),
(44, 1, 1, '4'),
(45, 1, 1, '4'),
(46, 1, 1, '4'),
(47, 1, 1, '4'),
(48, 1, 1, '2'),
(49, 1, 1, '2'),
(50, 1, 1, '2'),
(51, 1, 1, '1'),
(52, 1, 1, '1'),
(53, 1, 1, '1'),
(54, 1, 1, '3'),
(55, 1, 1, '3'),
(58, 1, 1, '2'),
(59, 2, 1, '2'),
(60, 2, 1, '1'),
(61, 2, 1, '1'),
(62, 2, 1, '1'),
(63, 2, 1, '1'),
(64, 2, 1, '1'),
(65, 1, 1, '1'),
(66, 1, 1, '1'),
(67, 1, 1, '1'),
(68, 2, 1, '1'),
(69, 1, 1, '1'),
(70, 1, 1, '1'),
(71, 1, 1, '1'),
(72, 1, 1, '1'),
(73, 1, 1, '1'),
(74, 2, 1, '1'),
(75, 2, 1, '1'),
(76, 1, 1, '2'),
(77, 1, 1, '2'),
(78, 1, 1, '1'),
(82, 1, 1, '1'),
(89, 1, 1, '1'),
(90, 1, 1, '1'),
(91, 1, 1, '1'),
(93, 2, 1, '2'),
(94, 2, 1, '2'),
(95, 2, 1, '2'),
(124, 2, 1, '1'),
(129, 1, 1, '1'),
(130, 1, 1, '1'),
(132, 1, 1, '1'),
(139, 1, 1, '1'),
(146, 2, 1, '1'),
(149, 3, 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `seat_reserved`
--

CREATE TABLE `seat_reserved` (
  `id` int(11) NOT NULL,
  `show_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `seat_number` varchar(10) DEFAULT NULL,
  `is_reserved` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seat_reserved`
--

INSERT INTO `seat_reserved` (`id`, `show_id`, `cust_id`, `seat_number`, `is_reserved`) VALUES
(37, 1, 1, 'R3S10', 0),
(38, 1, 1, 'R2S5', 0),
(39, 1, 1, 'R2S10', 0),
(40, 1, 1, 'R4S10', 0),
(41, 1, 1, 'R4S10', 0),
(42, 1, 1, 'R4S4', 1),
(43, 1, 1, 'R2S10', 1),
(44, 1, 1, ' R3S5', 1),
(45, 1, 1, 'R3S10', 1),
(46, 1, 1, 'R3S10', 1),
(47, 1, 1, 'R3S10', 1),
(48, 1, 1, 'R4S10', 1),
(49, 1, 1, 'R4S10', 1),
(50, 1, 1, 'R4S10', 1),
(51, 1, 1, 'R4S5', 1),
(52, 1, 1, 'R4S5', 1),
(53, 1, 1, 'R4S5', 1),
(54, 1, 1, 'R3S5', 1),
(55, 1, 1, 'R3S5', 1),
(56, 1, 1, 'R3S5', 1),
(57, 1, 1, 'R3S5', 1),
(58, 1, 1, 'R3S5', 1),
(59, 1, 1, 'R4S5', 1),
(60, 1, 1, 'R4S5', 1),
(61, 1, 1, 'R4S5', 1),
(62, 1, 1, 'R4S5', 1),
(63, 1, 1, 'R4S5', 1),
(64, 1, 1, 'R4S5', 1),
(65, 1, 1, 'R4S5', 1),
(66, 1, 1, 'R4S5', 1),
(67, 1, 1, 'R2S1', 1),
(68, 1, 1, ' R2S5', 1),
(69, 1, 1, ' R2S10', 1),
(70, 1, 1, ' R3S3', 1),
(71, 1, 1, 'R2S1', 1),
(72, 1, 1, ' R2S5', 1),
(73, 1, 1, ' R2S10', 1),
(74, 1, 1, ' R3S3', 1),
(75, 1, 1, 'R2S1', 1),
(76, 1, 1, ' R2S5', 1),
(77, 1, 1, ' R2S10', 1),
(78, 1, 1, ' R3S3', 1),
(79, 1, 1, 'R2S1', 1),
(80, 1, 1, ' R2S5', 1),
(81, 1, 1, ' R2S10', 1),
(82, 1, 1, ' R3S3', 1),
(83, 1, 1, 'R2S1', 1),
(84, 1, 1, ' R2S5', 1),
(85, 1, 1, ' R2S10', 1),
(86, 1, 1, ' R3S3', 1),
(87, 1, 1, 'R1S5', 1),
(88, 1, 1, ' R1S10', 1),
(89, 1, 1, 'R1S5', 1),
(90, 1, 1, ' R1S10', 1),
(91, 1, 1, 'R1S5', 1),
(92, 1, 1, ' R1S10', 1),
(93, 1, 1, 'R3S10', 1),
(94, 1, 1, 'R4S5', 1),
(95, 1, 1, 'R4S10', 1),
(96, 1, 1, 'R3S6', 1),
(97, 1, 1, ' R4S1', 1),
(98, 1, 1, ' R4S6', 1),
(99, 1, 1, 'R3S8', 1),
(100, 1, 1, ' R3S9', 1),
(101, 1, 1, ' R3S10', 1),
(102, 1, 2, 'R3S5', 1),
(103, 1, 2, ' R3S10', 1),
(104, 1, 2, 'R3S5', 1),
(105, 1, 2, ' R3S10', 1),
(106, 1, 1, 'R3S5', 1),
(107, 1, 1, ' R3S10', 1),
(108, 1, 2, 'R3S10', 1),
(109, 1, 2, ' R4S5', 1),
(110, 1, 2, 'R4S5', 1),
(111, 1, 2, 'R3S10', 1),
(112, 1, 2, 'R3S10', 1),
(113, 1, 2, 'R3S10', 1),
(114, 1, 2, 'R3S10', 1),
(115, 1, 1, 'R4S5', 1),
(116, 1, 1, 'R4S5', 1),
(117, 1, 1, 'R4S5', 1),
(118, 1, 2, 'R4S5', 1),
(119, 1, 1, 'R4S5', 1),
(120, 1, 1, 'R4S5', 1),
(121, 1, 1, 'R4S5', 1),
(122, 1, 1, 'R4S5', 1),
(123, 1, 1, 'R4S5', 1),
(124, 1, 2, 'R4S5', 1),
(125, 1, 2, 'R4S5', 1),
(126, 1, 1, 'R3S5', 1),
(127, 1, 1, ' R3S10', 1),
(128, 1, 1, 'R3S10', 1),
(129, 1, 1, ' R4S5', 1),
(130, 1, 1, 'R2S10', 1),
(131, 14, 1, 'R4S10', 1),
(132, 14, 1, 'R4S10', 1),
(133, 14, 1, 'R4S10', 1),
(134, 1, 1, 'R4S10', 1),
(135, 15, 1, 'R4S10', 1),
(136, 15, 3, 'R4S10', 1),
(137, 10, 1, 'R4S10', 1),
(138, 14, 1, 'R4S10', 1),
(139, 10, 2, 'R4S10', 1),
(140, 10, 2, 'R4S10', 1),
(141, 1, 1, 'R4S10', 1),
(142, 1, 1, 'R4S10', 1),
(143, 1, 1, 'R4S10', 1),
(144, 10, 2, 'R4S5', 1),
(145, 10, 2, ' R4S10', 1),
(146, 1, 2, 'R4S5', 1),
(147, 1, 2, ' R4S10', 1),
(148, 1, 2, 'R4S5', 1),
(149, 1, 2, ' R4S10', 1),
(150, 1, 2, 'R4S5', 1),
(151, 1, 2, ' R4S10', 1),
(152, 14, 2, 'R3S5', 1),
(153, 14, 2, ' R3S10', 1),
(154, 14, 3, 'R3S5', 1),
(155, 14, 3, ' R3S10', 1),
(156, 14, 3, 'R3S5', 1),
(157, 14, 3, ' R3S10', 1),
(158, 10, 2, 'R1S5', 1),
(159, 10, 2, ' R1S10', 1),
(160, 14, 2, 'R1S5', 1),
(161, 14, 2, ' R1S10', 1),
(162, 15, 2, 'R2S10', 1),
(163, 10, 1, 'R3S5', 1),
(164, 10, 1, ' R3S10', 1),
(165, 10, 1, 'R3S10', 1),
(166, 10, 1, 'R3S10', 1),
(167, 10, 2, 'R3S10', 1),
(168, 10, 2, 'R3S10', 1),
(169, 15, 1, 'R3S5', 1),
(170, 15, 1, ' R3S10', 1),
(171, 10, 2, 'R4S5', 1),
(172, 10, 2, ' R4S10', 1),
(173, 10, 2, 'R4S5', 1),
(174, 10, 2, ' R4S10', 1),
(175, 10, 2, 'R4S5', 1),
(176, 10, 2, ' R4S10', 1),
(177, 10, 2, 'R4S5', 1),
(178, 10, 2, ' R4S10', 1),
(179, 10, 2, 'R4S5', 1),
(180, 10, 2, ' R4S10', 1),
(181, 10, 2, 'R4S5', 1),
(182, 10, 2, ' R4S10', 1),
(183, 10, 2, 'R4S5', 1),
(184, 10, 2, ' R4S10', 1),
(185, 15, 2, 'R4S5', 1),
(186, 15, 2, 'R4S5', 1),
(187, 15, 2, 'R4S5', 1),
(188, 15, 2, 'R4S5', 1),
(189, 15, 2, 'R4S5', 1),
(190, 15, 2, 'R4S5', 1),
(191, 15, 2, 'R4S5', 1),
(192, 15, 2, 'R4S5', 1),
(193, 15, 2, ' R4S10', 1),
(194, 15, 2, 'R4S5', 1),
(195, 15, 2, ' R4S10', 1),
(196, 1, 2, 'R3S5', 1),
(197, 10, 2, 'R3S10', 1),
(198, 10, 2, ' R4S5', 1),
(199, 10, 1, 'R3S10', 1),
(200, 10, 1, ' R4S5', 1),
(201, 10, 2, 'R4S5', 1),
(202, 10, 1, 'R4S10', 1),
(203, 1, 1, 'R4S10', 1),
(204, 1, 1, 'R4S5', 1),
(205, 10, 1, 'R4S5', 1),
(206, 1, 1, 'R4S5', 1),
(207, 16, 1, 'R3S10', 1),
(208, 16, 1, 'R4S4', 1),
(209, 16, 1, 'R4S10', 1),
(210, 18, 1, 'R4S10', 1),
(211, 16, 1, 'R4S10', 1),
(212, 14, 1, 'R3S9', 1),
(213, 1, 1, 'R4S5', 1),
(214, 14, 1, '2', 1),
(215, 16, 2, '4', 1),
(216, 14, 2, '4', 1),
(217, 14, 2, '3', 1),
(218, 10, 2, 'R4S10', 1),
(219, 16, 2, 'R4S10', 1),
(220, 1, 2, 'R4S10', 1),
(221, 14, 2, 'R4S10', 1),
(222, 14, 2, 'R4S10', 1),
(223, 1, 3, 'R4S5', 1),
(224, 10, 2, 'R4S10', 1),
(225, 10, 2, 'R4S10', 1),
(226, 10, 2, 'R4S10', 1),
(227, 10, 2, 'R4S10', 1),
(228, 10, 2, 'R4S10', 1),
(229, 10, 1, 'R3S9', 1),
(230, 10, 2, 'R3S9', 1),
(231, 10, 2, ' R4S5', 1);

-- --------------------------------------------------------

--
-- Table structure for table `shows`
--

CREATE TABLE `shows` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `show_date` date DEFAULT NULL,
  `ticket_price` float NOT NULL,
  `show_time_id` int(11) NOT NULL,
  `no_seat` int(11) DEFAULT NULL,
  `cinema_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shows`
--

INSERT INTO `shows` (`id`, `movie_id`, `show_date`, `ticket_price`, `show_time_id`, `no_seat`, `cinema_id`) VALUES
(1, 1, '2024-02-17', 600, 3, 2, 3),
(2, 10, NULL, 0, 1, NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `show_time`
--

CREATE TABLE `show_time` (
  `id` int(11) NOT NULL,
  `time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `show_time`
--

INSERT INTO `show_time` (`id`, `time`) VALUES
(1, '1.00 PM - 3.00 PM'),
(2, '3.00 PM - 6.00PM'),
(3, '10.30 AM - 12.00PM');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `img_path` varchar(255) NOT NULL,
  `alt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `img_path`, `alt`) VALUES
(1, 'images/img1.jpg', 'First slide'),
(2, 'images/img2.jpg', 'Second slide'),
(3, 'images/img3.jpg', 'Third slide'),
(4, 'images/img4.jpg', 'Fourth slide');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cust_id` (`cust_id`),
  ADD KEY `seat_details_id` (`seat_details_id`),
  ADD KEY `show_id` (`show_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `food_id` (`food_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categorie_id`);

--
-- Indexes for table `cinema`
--
ALTER TABLE `cinema`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movie_id`);

--
-- Indexes for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `screens`
--
ALTER TABLE `screens`
  ADD PRIMARY KEY (`screen_id`),
  ADD KEY `screen_id` (`screen_id`);

--
-- Indexes for table `seat_details`
--
ALTER TABLE `seat_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seat_details_ibfk_1` (`cust_id`),
  ADD KEY `seat_details_ibfk_2` (`show_id`);

--
-- Indexes for table `seat_reserved`
--
ALTER TABLE `seat_reserved`
  ADD PRIMARY KEY (`id`),
  ADD KEY `show_id` (`show_id`),
  ADD KEY `cust_id` (`cust_id`);

--
-- Indexes for table `shows`
--
ALTER TABLE `shows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_id` (`movie_id`),
  ADD KEY `cinema_id` (`cinema_id`),
  ADD KEY `show_time_id` (`show_time_id`);

--
-- Indexes for table `show_time`
--
ALTER TABLE `show_time`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=231;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categorie_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cinema`
--
ALTER TABLE `cinema`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `movie_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `payment_details`
--
ALTER TABLE `payment_details`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `screens`
--
ALTER TABLE `screens`
  MODIFY `screen_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seat_details`
--
ALTER TABLE `seat_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `seat_reserved`
--
ALTER TABLE `seat_reserved`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=232;

--
-- AUTO_INCREMENT for table `shows`
--
ALTER TABLE `shows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `show_time`
--
ALTER TABLE `show_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`seat_details_id`) REFERENCES `seat_details` (`id`),
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`show_id`) REFERENCES `shows` (`id`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`food_id`) REFERENCES `food` (`id`);

--
-- Constraints for table `seat_details`
--
ALTER TABLE `seat_details`
  ADD CONSTRAINT `foreign key` FOREIGN KEY (`show_id`) REFERENCES `shows` (`id`),
  ADD CONSTRAINT `seat_details_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `seat_details_ibfk_2` FOREIGN KEY (`show_id`) REFERENCES `shows` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shows`
--
ALTER TABLE `shows`
  ADD CONSTRAINT `shows_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`movie_id`),
  ADD CONSTRAINT `shows_ibfk_2` FOREIGN KEY (`cinema_id`) REFERENCES `cinema` (`id`),
  ADD CONSTRAINT `shows_ibfk_3` FOREIGN KEY (`show_time_id`) REFERENCES `show_time` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
