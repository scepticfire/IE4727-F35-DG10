-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2025 at 02:01 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `opentome`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `author` varchar(255) DEFAULT NULL,
  `language` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `name`, `author`, `language`, `description`, `price`, `image_path`) VALUES
(3, 'One Piece Vol 1 ROMANCE DAWN - The Dawn of the Adventure', 'Echiro Oda', 'English', '001. ROMANCE DAWN —The Dawn of the Adventure— (ROMANCE DAWN—冒険の夜明け—, Romansu Dōn -Bōken no Yoake-?): A young boy named Monkey D. Luffy swears to become the Pirate King, accidentally eats the Gomu Gomu no Mi, and is given a straw hat by his idol, Shanks. Ten years later, Luffy sets out on the high seas.\r\n    002. That Guy, \"Straw Hat Luffy\" (その男\"麦わらのルフィ\", Sono Otoko \"Mugiwara no Rufi\"?): Luffy meets cabin boy Koby and defeats his abusive captain, Alvida.\r\n    003. Introducing \"Pirate Hunter Zoro\" (\"海賊狩りのゾロ\"登場, \"Kaizoku-gari no Zoro\" Tōjō?): Luffy and Koby arrive at an island where Roronoa Zoro is imprisoned. Intent on having him in his crew, Luffy meets him and a girl who reveals why he was captured.\r\n    004. Marine Captain \"Axe-Hand Morgan\" (海軍大佐\"斧手のモーガン\", Kaigun Taisa \"Onote no Mōgan?): Luffy goes to retrieve Zoro\'s swords, but enrages the captain of the Marine Base, Morgan.\r\n    005. The Pirate King and The Great Swordsman (海賊王と大剣豪, Kaizoku-Ō to Daikengō?): Morgan and the Marines go to kill Zoro and Koby, and Zoro remembers the promise he made to his deceased friend Kuina. However, Luffy saves them and Zoro tells him he will join his crew.\r\n    006. The First (一人目, Hitorime?): Luffy and Zoro battle against Morgan, Helmeppo, and the Marines.\r\n    007. Friends (友達, Tomodachi?): Luffy and Zoro leave peacefully, and Koby joins the Marines. He and the Marines thank the two for stopping Morgan.\r\n    008. Introducing Nami (ナミ登場, Nami Tōjō?): Luffy is captured by a bird and Zoro meets some of the Buggy Pirates. On an island, Luffy meets Nami, who is running away from some pirates.', 10.00, '../cover-page-img/cover_690618ee59a1f2.34802220.jpg'),
(4, 'Fifty Shades Of Grey', 'E. L. James', 'English', 'When literature student Anastasia Steele goes to interview young entrepreneur Christian Grey, she encounters a man who is beautiful, brilliant, and intimidating. The unworldly, innocent Ana is startled to realize she wants this man and, despite his enigmatic reserve, finds she is desperate to get close to him.', 15.00, '../cover-page-img/cover_690a0fbc3a0c46.28527159.jpg'),
(5, '50 laws of power book', 'Book by 50 Cent and Robert Greene', 'English', 'The 50th Law is a book by rapper 50 Cent and author Robert Greene that promotes fearlessness as the key to success and power. It argues that fear prevents people from seizing opportunities and taking bold actions, and uses 50 Cent\'s life story and historical examples to illustrate how overcoming fear leads to empowerment. The book\'s central message is to confront your fears head-on to unlock your true potential and achieve success in life and business', 8.00, '../cover-page-img/cover_690a1242593826.60915678.jpg'),
(6, 'Moby-Dick', 'Herman Melville', 'English', 'Moby Dick is a novel by Herman Melville about Captain Ahab\'s obsessive quest for revenge against the giant white sperm whale, Moby Dick, which previously bit off his leg. Narrated by the sailor Ishmael, the story intertwines the epic sea adventure with detailed descriptions of whaling, social commentary, and philosophical themes like good and evil, fate, and human determination.', 8.00, '../cover-page-img/cover_690a130d969548.99814764.jpg'),
(7, 'The Second World War', 'Antony Beevor', 'English', 'World War II was\r\na global conflict from 1939 to 1945, pitting the Axis powers (Germany, Italy, and Japan) against the Allied powers (including Great Britain, the United States, and the Soviet Union). Sparked by the Nazi invasion of Poland, it was the deadliest and most destructive war in history, involving over 50 nations and causing 70 to 85 million deaths. Key events included the attack on Pearl Harbor, which drew the US into the war, and the use of nuclear weapons by the United States against Japan, which led to the war\'s end', 15.00, '../cover-page-img/cover_690a13d80deec7.13755299.jpg'),
(8, 'IT', 'Stephen King', 'English', 'Stephen King\'s novel\r\nIt is a 1986 horror story about seven adult friends who reunite in their hometown of Derry, Maine, to battle a shape-shifting evil entity that awakens roughly every 27 years to prey on children. The novel alternates between two timelines: 1957-1958, where they first confront the creature as children known as \"The Losers Club,\" and 1984-1985, when they return as adults. The creature primarily appears as the clown Pennywise, but it can transform into its victims\' worst fears', 12.00, '../cover-page-img/cover_690a14f3922204.09586107.jpg'),
(9, 'Dr. Stone Vol 2', 'Riichiro Inagaki', 'Japanese', 'IMAGINE WAKING TO A WORLD WHERE EVERY LAST HUMAN HAS BEEN MYSTERIOUSLY TURNED TO STONE...\r\n\r\nSenku, Taiju and Yuzuriha are well on their way to crafting gunpowder when they spot smoke far off in the distance. Convinced that it\'s a sign of other humans, Senku takes a huge risk by sending up a smoke signal of his own. Meanwhile, Tsukasa is determined to stop Senku from making gunpowder, and his arrival on the scene could spell the end for our heroes!', 13.00, '../cover-page-img/cover_690a159a9533b5.42438185.jpg'),
(10, 'The Voyage of the Dawn Treader', 'C. S. Lewis', 'English', 'The Voyage of the Dawn Treader is a book in C.S. Lewis\'s The Chronicles of Narnia series about Edmund and Lucy Pevensie, who are transported to Narnia with their cousin Eustace Scrubb. They join King Caspian on his ship, the Dawn Treader, to sail east in search of seven lost lords and the end of the world. Their journey is filled with adventures, including encounters with mythical creatures, islands, and challenges that test their courage and faith.', 18.00, '../cover-page-img/cover_690a165633e184.57504379.jpg'),
(11, 'Case Closed Vol 1', 'Gosho Aoyama', 'Japanese', 'Detective Conan Vol. 1 introduces the series\' premise: high school detective Shinichi Kudo is shrunk into a child\'s body after an encounter with a mysterious criminal organization. He takes on the alias Conan Edogawa to hide his true identity and lives with his childhood friend Ran Mouri and her father, a private detective. The volume follows Conan as he solves various cases while trying to find a cure for his condition.', 9.00, '../cover-page-img/cover_690a17d2678457.90946541.jpg'),
(12, 'Bridge to Terabithia', 'Katherine Paterson', 'English', 'Bridge to Terabithia is a children\'s novel by Katherine Paterson about the friendship between two fifth-graders, Jess Aarons and Leslie Burke. They create a magical kingdom called Terabithia in the woods, but their story takes a tragic turn when Leslie dies, forcing Jess to confront his grief and discover his own inner strength. The book won the Newbery Medal for its poignant exploration of friendship, imagination, and loss.', 11.00, '../cover-page-img/cover_69103cc1922412.75035078.jpg'),
(13, 'Rome', 'Rick Steves', 'English', 'Explore ancient ruins and view Renaissance masterpieces in this truly modern Eternal City. Inside Rick Steves Rome you\'ll find:\r\n\r\n  -  Fully updated, comprehensive coverage for spending a week or more exploring Rome\r\n  -  Rick\'s strategic advice on how to get the most out of your time and money, with rankings of his must-see favorites\r\n  - Top sights and hidden gems, from the Colosseum and the Sistine Chapel to corner trattorias, cozy wine bars, and the perfect scoop of gelato\r\n  -  How to connect with local culture: Indulge in the Italian happy hour tradition of aperitivo, savor a plate of cacio e pepe, or chat with fans about the latest soccer match\r\n  -  Beat the crowds, skip the lines, and avoid tourist traps with Rick\'s candid, humorous insight\r\n  -  The best places to eat, sleep, and experience la dolce far niente\r\n    Self-guided walking tours of lively neighborhoods and sights like the Roman Forum, St. Peter\'s Basilica, and the Vatican Museums\r\n  -  Detailed neighborhood maps and a fold-out city map for exploring on the go\r\n  -  Useful resources including a packing list, Italian phrase book, a historical overview, and recommended reading\r\n  -  Coverage of Central Rome, Vatican City, Trastevere, and more, plus day trips to Ostia Antica, Tivoli, Naples, and Pompeii \r\n\r\nMake the most of every day and every dollar with Rick Steves Rome.', 23.00, '../cover-page-img/cover_6910416a01e860.68486633.jpg'),
(14, 'Steve Jobs (10TH ANNIV) /P: The Exclusive Biography', 'Walter Isaacson', 'English', '\"STEVE JOBS (10TH ANNIV) /P: The Exclusive Biography\" is\r\nWalter Isaacson\'s authorized biography of Apple co-founder Steve Jobs, based on over 40 interviews with Jobs and more than 100 of his associates, friends, and rivals. This edition is a comprehensive look at his life, focusing on his intense personality, his role in revolutionizing multiple industries, and the creation of iconic products like the Mac, iPod, and iPhone. The book was written with Jobs\'s cooperation but without his control over the content, providing an unvarnished and candid look at his life and professional conduct.', 30.00, '../cover-page-img/cover_6910b95751c346.87726090.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `book_genres`
--

CREATE TABLE `book_genres` (
  `book_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book_genres`
--

INSERT INTO `book_genres` (`book_id`, `genre_id`) VALUES
(3, 7),
(3, 8),
(3, 9),
(4, 10),
(4, 11),
(5, 12),
(6, 8),
(6, 9),
(7, 15),
(7, 16),
(8, 9),
(8, 18),
(9, 8),
(9, 9),
(9, 21),
(9, 22),
(10, 7),
(10, 8),
(10, 25),
(10, 26),
(11, 27),
(11, 28),
(12, 9),
(12, 25),
(13, 31),
(14, 15),
(14, 32);

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `genre_id` int(11) NOT NULL,
  `genre_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`genre_id`, `genre_name`) VALUES
(7, 'action'),
(8, 'adventure'),
(32, 'biography'),
(25, 'children'),
(27, 'crime'),
(10, 'erotica'),
(26, 'fantasy'),
(9, 'fiction'),
(15, 'history'),
(18, 'horror'),
(28, 'mystery'),
(16, 'nonfiction'),
(11, 'romance'),
(21, 'science'),
(22, 'sciencefiction'),
(12, 'selfhelp'),
(31, 'travel');

-- --------------------------------------------------------

--
-- Table structure for table `registered_users`
--

CREATE TABLE `registered_users` (
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registered_users`
--

INSERT INTO `registered_users` (`username`, `password`, `email`) VALUES
('allstars', '$2y$10$nwb0YdN3NEM7KerCYDjsneKZClQ6ktyNY', 'w@yahoo.com'),
('alltester', '$2y$10$zJpijfcOHFKrkreRuOdGdu1aFc.LVkrtM', 'w@yahoo.com'),
('charizard', '$2y$10$dUz1UX3p6tjM2ITxOBFr9OpR/iP8MilWZ', 'w@yahoo.com'),
('charizardmega', '$2y$10$VNtDZpmi2/IXV6UgXwqGGe8wPZDIHywss9H5cfaQqwEQzo3mXGEVe', 'pokmon2@gmail.com'),
('charizardx', '$2y$10$QEGb.gN1zp5eLRGP6JZd2eyKxhgKvY9UzuhRWzRdvkhnxru437dOS', 'poke@yahoo.com'),
('charizardz', '$2y$10$VgxxOGyrc1PDSFQ.i96/IOMMoeV9.h935on.sK9eKC3s1QYtdDIf.', 'w@yahoo.com'),
('greninja', '$2y$10$2JJpsVfY7j00rfYMBWKgNOff47MPwq1ac.cnYqluHTDbPPRi5ReXC', 'w@yahoo.com'),
('tester1', '$2y$10$Aqj3ejb9AE4J2TBWFaZ3B.PxFv1Z1A8Cj', 'w@yahoo.com'),
('tester2', '$2y$10$ARLC6v7cj7yDedWyf023SeSaJzXDhqbRj', 'w@yahoo.com'),
('tester3', '$2y$10$hGPtcZVIG.1l12tk9GkUd.Bbcdg/kpvAT', 'w@yahoo.com'),
('tester4', '$2y$10$syG/Z7gTe1ixc5.8yYZ/DOhhyweqbZPnE', 'w@yahoo.com'),
('tester5', '$2y$10$C0dkhOZcGfdb7wjnSA1I/eLLO6AGrgPwt', 'w@yahoo.com'),
('tester6', '$2y$10$l7LLFA8TVKMEDVLAbT92R.aYt3cD9f3f6', 'w@yahoo.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `book_genres`
--
ALTER TABLE `book_genres`
  ADD PRIMARY KEY (`book_id`,`genre_id`),
  ADD KEY `genre_id` (`genre_id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`genre_id`),
  ADD UNIQUE KEY `genre_name` (`genre_name`);

--
-- Indexes for table `registered_users`
--
ALTER TABLE `registered_users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `genre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book_genres`
--
ALTER TABLE `book_genres`
  ADD CONSTRAINT `book_genres_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `book_genres_ibfk_2` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`genre_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
