-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2023 at 10:04 AM
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
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `adminname` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `adminname`, `password`, `created_at`) VALUES
(1, 'admin@gmail.com', 'admin', '$2y$10$C5tgi9j.Oj/awAYUbXmAl.2dvHSjFQjUvmzdlDFqMb3JoXLI5v.vy', '2023-11-16 12:51:41'),
(2, 'admin_clone@gmail.com', 'admin', '$2y$10$C5tgi9j.Oj/awAYUbXmAl.2dvHSjFQjUvmzdlDFqMb3JoXLI5v.vy', '2023-11-16 12:51:41'),
(3, 'new.admin@gmail.com', 'admin user', '$2y$10$IVw/QnrqRw6QYRYJYHtNMe6BwgKtEtOqCk04IysdUg3zmpodAB48u', '2023-11-17 05:46:03');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `show_id` int(11) NOT NULL,
  `ep_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `show_id`, `ep_id`, `user_id`, `username`, `comment`, `created_at`) VALUES
(1, 1, 1, 1, 'user', 'Comment inserted...', '2023-11-14 09:05:08'),
(2, 1, 1, 1, 'user', 'Second comment...', '2023-11-14 09:05:08'),
(6, 1, 2, 1, 'username', 'comments', '2023-11-14 09:30:54'),
(7, 1, 1, 1, 'username', 'new', '2023-11-14 09:31:06'),
(8, 1, 3, 1, 'username', 'comment', '2023-11-16 08:07:30'),
(9, 1, 3, 1, 'username', 'new coomet add', '2023-11-16 08:07:43');

-- --------------------------------------------------------

--
-- Table structure for table `episodes`
--

CREATE TABLE `episodes` (
  `id` int(11) NOT NULL,
  `show_id` int(11) NOT NULL,
  `video` varchar(255) NOT NULL,
  `video_thumbnail` varchar(255) NOT NULL,
  `title` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `episodes`
--

INSERT INTO `episodes` (`id`, `show_id`, `video`, `video_thumbnail`, `title`, `created_at`) VALUES
(7, 1, '/assets/showsEpisodes/The_iDOLM@STER_Million_Live!/episodes/1.mp4', '/assets/showsEpisodes/The_iDOLM@STER_Million_Live!/thumbnails/anime-watch.jpg', 'Ep 01', '2023-11-18 08:49:33'),
(8, 1, '/assets/showsEpisodes/The_iDOLM@STER_Million_Live!/episodes/2.mp4', '/assets/showsEpisodes/The_iDOLM@STER_Million_Live!/thumbnails/anime-watch.jpg', 'Ep 02', '2023-11-18 08:49:56'),
(10, 6, '/assets/showsEpisodes/Better_Call_Saul/episodes/2.mp4', '/assets/showsEpisodes/Better_Call_Saul/thumbnails/anime-watch.jpg', 'Ep 00', '2023-11-18 08:59:22');

-- --------------------------------------------------------

--
-- Table structure for table `followings`
--

CREATE TABLE `followings` (
  `id` int(11) NOT NULL,
  `show_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `followings`
--

INSERT INTO `followings` (`id`, `show_id`, `user_id`, `created_at`) VALUES
(28, 5, 1, '2023-11-16 07:31:51');

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
(12, 'Horrer', '2023-11-12 04:13:05');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `show_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `username` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `show_id`, `user_id`, `comment`, `username`, `created_at`) VALUES
(1, 1, 1, 'Move over, reality TV! The iDOLM@STER Million Live! is the ultimate fantasy escape, where dreams come to life on the stage. It\'s not just an anime; it\'s a front-row ticket to the most dazzling dreamscape ever!', 'user', '2023-11-13 13:43:30'),
(2, 1, 1, 'Who needs a magic carpet when you can ride the wave of dreams with Mirai Kasuga, Shizuka Mogami, and Tsubasa Ibuki? The iDOLM@STER Million Live! is the Aladdin\'s cave of idol anime, where every wish is a step closer to stardom!', 'user', '2023-11-13 13:43:30'),
(3, 1, 1, 'Forget reality checks; The iDOLM@STER Million Live! is here to cash in your wildest dreams and hand you a VIP pass to the most spectacular idol extravaganza. Get ready to trade your everyday routine for a front-row seat in the theater of dreams!', 'user', '2023-11-13 13:43:30'),
(4, 1, 1, 'If you thought daydreaming was just a pastime, think again! The iDOLM@STER Million Live! is the masterclass in turning dreams into reality, where every note sung and every step danced is a step closer to the ethereal realm of idol stardom!', 'user', '2023-11-13 13:43:30'),
(5, 2, 1, 'make comment', 'username', '2023-11-14 04:08:18'),
(6, 2, 1, 'Place another', 'username', '2023-11-14 04:08:32'),
(7, 2, 1, 'comment...\r\n', 'username', '2023-11-14 04:12:21'),
(8, 1, 1, 'Comment made', 'username', '2023-11-15 08:59:57'),
(9, 5, 1, 'Test', 'username', '2023-11-15 10:00:11');

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
  `type` varchar(200) NOT NULL,
  `genres` varchar(200) NOT NULL,
  `studios` varchar(200) NOT NULL,
  `date_aired` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `duration` varchar(200) NOT NULL,
  `quality` varchar(200) NOT NULL,
  `num_of_episodes_avail` int(11) NOT NULL DEFAULT 0,
  `total_num_of_episodes` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shows`
--

INSERT INTO `shows` (`id`, `title`, `thumbnail_image`, `poster_image`, `description`, `type`, `genres`, `studios`, `date_aired`, `status`, `duration`, `quality`, `num_of_episodes_avail`, `total_num_of_episodes`, `created_at`) VALUES
(1, 'The iDOLM@STER Million Live!', 'https://tokyobuzzclips.com/wp-content/uploads/2017/03/maxresdefault-3.jpg', 'https://gogoanime.dev/images/65180424fea36700151260c7.png', 'Mirai Kasuga, who wants to carry on a dream she has yet to see. Shizuka Mogami, who yearns to be an idol and is shaken. Tsubasa Ibuki, who does not know what she can be serious about. At 765 Production new idols gather and everyone\'s \"dreams\" will brought into brilliance at the theater! The long-awaited anime of \"The IDOLM@STER Million Live!!', 'TV', 'Music', 'THE iDOLM@STER MILLION LIVE!', 'Fall 2023 Anime', 'Airing', '24 min/ep', 'FHD', 8, 12, '2023-11-12 03:39:56'),
(2, 'Buta no Liver wa Kanetsu Shiro', 'https://www.animeunited.com.br/oomtumtu/2022/12/portada_buta-no-liver-wa-kanetsushiro-4-1536x864.jpg', 'https://gogoanime.dev/images/651783cdfea3670015121177.png', 'An unappealing otaku awakens in the body of a pig after he passes out while eating raw pig liver. The pig finds himself in the company of Jess, an innocent girl who can read people\'s minds, and she accepts him despite his boorish thoughts... although she does plan to eat him. When Jess is in danger of succumbing to a dark destiny, can Pig save her using only his quick wits, wisdom, and refined sense of smell?', 'TV', 'Comedy, Fantasy', 'Mapa', '2023', 'Ongoing', '24 min/ep', 'FHD', 24, 4, '2023-11-12 03:39:56'),
(3, 'Kage no Jitsuryokusha ni Naritakute! 2nd Season', 'https://i0.wp.com/www.animegeek.com/wp-content/uploads/2022/12/The-Eminence-in-Shadow-Season-2-release-date-Kage-no-Jitsuryokusha-ni-Naritakute-Season-2-Anime.jpg?fit=1200%2C675&ssl=1', 'https://gogoanime.dev/images/6539edc7a5477e0015365e3c.png', 'Everything has been going according to plan, but the hour of awakening draws near. Cid Kageno and Shadow Garden investigate the Lawless City, a cesspool where the red moon hangs low in the sky and three powerful monarchs rule the streets. The true draw for Cid, however, is one who can draw blood–the Blood Queen, a vampire who has slumbered in her coffin for eons. Her awakening approaches, and Cid could finally face a day of reckoning.', 'TV', 'Action, Comedy, Fantasy, Isekai, Reincarnation', 'Mapa', '2023', 'completed', '24 min/ep', 'FHD', 12, 12, '2023-11-12 03:39:56'),
(4, 'Spy x Family Season 2', 'https://www.nme.com/wp-content/uploads/2022/08/spyxfamily-part-2@2000x1270.jpg', 'https://gogoanime.dev/images/6517fb17fea3670015125b4c.png', 'Second season of Spy x Family.', 'TV', 'Action, Childcare, Comedy, Shounen', 'Mapa', '2023', 'Ongoing', '24 ep/min', 'FHD', 12, 4, '2023-11-12 03:45:00'),
(5, 'Dr. Stone: New World Part 2', 'https://mangathrill.com/wp-content/uploads/2020/09/pjimage-87.jpg', 'https://gogoanime.dev/images/65179208fea3670015121a3d.png', 'Dr.STONE NEW WORLD , Dr. Stone 3rd Season Part 2', 'TV', 'Adventure, Comedy, Sci-Fi, Shounen, Time Travel', 'Mapa', '2023', 'Ongoing', '13 min/ep', 'HD', 12, 5, '2023-11-12 03:45:00'),
(6, 'Better Call Saul', 'https://themoviesbio.com/wp-content/uploads/2019/12/Better-Call-Saul-Season-4-Release-Date-And-Cast.png', 'https://image.tmdb.org/t/p/original/n6orZzLiG2aj4xz7kSISZHO7Flf.jpg', 'The trials and tribulations of criminal lawyer Jimmy McGill in the years leading up to his fateful run-in with Walter White and Jesse Pinkman.', 'TV', 'Live, Drama, Crime', 'Netflix', '2006 - 2007', 'Completed', '56 min/ep', 'FHD', 12, 12, '2023-11-12 04:09:46'),
(10, 'JJK', '/assets/showsImages/thumbnails/JJK_thumb.avif', '/assets/showsImages/posters/JJK_poster.jpg', 'The story of Jujutsu Kaisen is set in a world where Cursed Spirits feed on unsuspecting humans and fragments of the legendary and feared demon Ryomen Sukuna have been lost and scattered about.\r\n\r\nShould any curse consume Sukuna\'s body parts, the power they gain could destroy the world as we know it. Fortunately, there exists a mysterious school of Jujutsu Sorcerers who exist to protect the precarious existence of the living from the supernatural!', 'Tv Series', 'Crime, Adventure, Sci-Fi, Martial Arts, Shounen, Horrer', 'JJK', 'Now', 'Ongoing', '24 min/ep', 'Blue Ray', 21, 24, '2023-11-17 17:02:00');

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `views`
--

INSERT INTO `views` (`id`, `show_id`, `user_id`, `created_at`) VALUES
(54, 1, 1, '2023-11-15 08:41:27'),
(55, 5, 1, '2023-11-15 08:41:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `episodes`
--
ALTER TABLE `episodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `followings`
--
ALTER TABLE `followings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shows`
--
ALTER TABLE `shows`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `episodes`
--
ALTER TABLE `episodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `followings`
--
ALTER TABLE `followings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `shows`
--
ALTER TABLE `shows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `views`
--
ALTER TABLE `views`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
