-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2023 at 05:39 AM
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
-- Database: `anime_streaming`
--

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `name`, `created_at`) VALUES
(1, 'Music', '2023-11-12 04:13:05'),
(2, 'Live', '2023-11-12 04:13:05'),
(3, 'Crime', '2023-11-12 04:13:05'),
(4, 'Reincarnation', '2023-11-12 04:13:05'),
(5, 'Adventure', '2023-11-12 04:13:05'),
(6, 'Sci-Fi', '2023-11-12 04:13:05'),
(7, 'Drama', '2023-11-12 04:13:05'),
(8, 'Martial Arts', '2023-11-12 04:13:05'),
(9, 'Shounen', '2023-11-12 04:13:05'),
(10, 'Childcare', '2023-11-12 04:13:05'),
(11, 'Comedy', '2023-11-12 04:13:05'),
(12, 'Horrer', '2023-11-12 04:13:05'),
(13, 'Fantasy', '2023-11-12 04:13:05');

-- --------------------------------------------------------

--
-- Table structure for table `shows`
--

CREATE TABLE `shows` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `thumbnail_image` varchar(255) NOT NULL,
  `poster_image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `genres` varchar(200) NOT NULL,
  `studios` varchar(200) NOT NULL,
  `date_aired` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `duration` varchar(200) NOT NULL,
  `quaity` varchar(200) NOT NULL,
  `num_of_episodes_avail` int(11) NOT NULL,
  `total_num_of_episodes` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shows`
--

INSERT INTO `shows` (`id`, `title`, `thumbnail_image`, `poster_image`, `description`, `genres`, `studios`, `date_aired`, `status`, `duration`, `quaity`, `num_of_episodes_avail`, `total_num_of_episodes`, `created_at`) VALUES
(1, 'The iDOLM@STER Million Live!', 'https://tokyobuzzclips.com/wp-content/uploads/2017/03/maxresdefault-3.jpg', 'https://gogoanime.dev/images/65180424fea36700151260c7.png', 'Mirai Kasuga, who wants to carry on a dream she has yet to see. Shizuka Mogami, who yearns to be an idol and is shaken. Tsubasa Ibuki, who does not know what she can be serious about. At 765 Production new idols gather and everyone\'s \"dreams\" will brought into brilliance at the theater! The long-awaited anime of \"The IDOLM@STER Million Live!!', 'Music', 'THE iDOLM@STER MILLION LIVE!', 'Fall 2023 Anime', 'Airing', '24 min/ep', 'FHD', 8, 12, '2023-11-12 03:39:56'),
(2, 'Buta no Liver wa Kanetsu Shiro', 'https://www.animeunited.com.br/oomtumtu/2022/12/portada_buta-no-liver-wa-kanetsushiro-4-1536x864.jpg', 'https://gogoanime.dev/images/651783cdfea3670015121177.png', 'An unappealing otaku awakens in the body of a pig after he passes out while eating raw pig liver. The pig finds himself in the company of Jess, an innocent girl who can read people\'s minds, and she accepts him despite his boorish thoughts... although she does plan to eat him. When Jess is in danger of succumbing to a dark destiny, can Pig save her using only his quick wits, wisdom, and refined sense of smell?', 'Comedy, Fantasy', 'Mapa', '2023', 'Ongoing', '24 min/ep', 'FHD', 24, 4, '2023-11-12 03:39:56'),
(3, 'Kage no Jitsuryokusha ni Naritakute! 2nd Season', 'https://i0.wp.com/www.animegeek.com/wp-content/uploads/2022/12/The-Eminence-in-Shadow-Season-2-release-date-Kage-no-Jitsuryokusha-ni-Naritakute-Season-2-Anime.jpg?fit=1200%2C675&ssl=1', 'https://gogoanime.dev/images/6539edc7a5477e0015365e3c.png', 'Everything has been going according to plan, but the hour of awakening draws near. Cid Kageno and Shadow Garden investigate the Lawless City, a cesspool where the red moon hangs low in the sky and three powerful monarchs rule the streets. The true draw for Cid, however, is one who can draw blood–the Blood Queen, a vampire who has slumbered in her coffin for eons. Her awakening approaches, and Cid could finally face a day of reckoning.', 'Action, Comedy, Fantasy, Isekai, Reincarnation', 'Mapa', '2023', 'completed', '24 min/ep', 'FHD', 12, 12, '2023-11-12 03:39:56'),
(4, 'Spy x Family Season 2', 'https://www.nme.com/wp-content/uploads/2022/08/spyxfamily-part-2@2000x1270.jpg', 'https://gogoanime.dev/images/6517fb17fea3670015125b4c.png', 'Second season of Spy x Family.', 'Action, Childcare, Comedy, Shounen', 'Mapa', '2023', 'Ongoing', '24 ep/min', 'FHD', 12, 4, '2023-11-12 03:45:00'),
(5, 'Dr. Stone: New World Part 2', 'https://mangathrill.com/wp-content/uploads/2020/09/pjimage-87.jpg', 'https://gogoanime.dev/images/65179208fea3670015121a3d.png', 'Dr.STONE NEW WORLD , Dr. Stone 3rd Season Part 2', 'Adventure, Comedy, Sci-Fi, Shounen, Time Travel', 'Mapa', '2023', 'Ongoing', '13 min/ep', 'HD', 12, 5, '2023-11-12 03:45:00'),
(6, 'Better Call Saul', 'https://themoviesbio.com/wp-content/uploads/2019/12/Better-Call-Saul-Season-4-Release-Date-And-Cast.png', 'https://image.tmdb.org/t/p/original/n6orZzLiG2aj4xz7kSISZHO7Flf.jpg', 'The trials and tribulations of criminal lawyer Jimmy McGill in the years leading up to his fateful run-in with Walter White and Jesse Pinkman.', 'Live, Drama, Crime', 'Netflix', '2006 - 2007', 'Completed', '56 min/ep', 'FHD', 12, 12, '2023-11-12 04:09:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'username', 'email@gmail.com', '$2y$10$C5tgi9j.Oj/awAYUbXmAl.2dvHSjFQjUvmzdlDFqMb3JoXLI5v.vy', '2023-11-12 04:14:02');

-- --------------------------------------------------------

--
-- Table structure for table `views`
--

CREATE TABLE `views` (
  `id` int(11) NOT NULL,
  `show_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shows`
--
ALTER TABLE `shows`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `shows` ADD FULLTEXT KEY `genres` (`genres`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `shows`
--
ALTER TABLE `shows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `views`
--
ALTER TABLE `views`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
