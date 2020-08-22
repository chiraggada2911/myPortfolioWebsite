-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 22, 2020 at 10:43 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chiragga_chirag`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_bg_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `title_bg_name`, `title`, `created_at`, `updated_at`) VALUES
(1, 'About Me', 'About Me', '2020-07-20 04:47:25', '2020-07-20 04:47:25');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_desc` text COLLATE utf8mb4_unicode_ci,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `blog_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tag` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_infos`
--

CREATE TABLE `blog_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_bg_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `color_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_bg_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `custom_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `email_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `title_bg_name`, `title`, `custom_title`, `desc`, `email_title`, `email`, `phone_title`, `phone`, `address_title`, `address`, `created_at`, `updated_at`) VALUES
(1, 'CONTACT', 'Get in touch', '', '', 'Email', 'chiraggada67@gmail.com', 'Phone', '9920817447', 'Address', 'Mumbai, India', '2020-07-20 05:34:06', '2020-07-20 05:34:33');

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `small_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_title` text COLLATE utf8mb4_unicode_ci,
  `short_desc` text COLLATE utf8mb4_unicode_ci,
  `btn_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btn_link` text COLLATE utf8mb4_unicode_ci,
  `btn_link_status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `small_title`, `main_title`, `short_desc`, `btn_name`, `btn_link`, `btn_link_status`, `created_at`, `updated_at`) VALUES
(1, 'Hi There', 'I\'M CHIRAG GADA', 'I am Android and Web developer form India. My Enthusiasm regarding Android and Web development has led me to develop a certain intermediary applications and I thrive to keep the drive within for the hunger to learn and exploit newer technologies.', 'More about me', '/about', 1, '2020-07-20 04:38:16', '2020-07-20 04:43:56');

-- --------------------------------------------------------

--
-- Table structure for table `counters`
--

CREATE TABLE `counters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `timer` int(11) NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `counters`
--

INSERT INTO `counters` (`id`, `timer`, `desc`, `order`, `created_at`, `updated_at`) VALUES
(1, 3, 'Clients', 0, '2020-07-20 05:05:41', '2020-07-20 05:06:22'),
(2, 3, 'Hackathons', 0, '2020-07-20 05:06:33', '2020-07-20 05:06:33'),
(3, 12, 'Projects', 0, '2020-07-20 05:06:45', '2020-07-20 05:06:45'),
(4, 1, 'Years of Experience', 0, '2020-07-20 05:07:02', '2020-07-20 05:07:02');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `education_lists`
--

CREATE TABLE `education_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `year_range` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `degree` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `order` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `education_lists`
--

INSERT INTO `education_lists` (`id`, `year_range`, `degree`, `school`, `desc`, `order`, `created_at`, `updated_at`) VALUES
(1, '2016', 'HSC', 'Mithibai College', '', 1, '2020-07-20 05:10:21', '2020-07-20 05:11:33'),
(2, '2016-2020', 'Bachelor of Engineering', 'Dwarkadas J. Sanghvi College Of Engineering', '', 0, '2020-07-20 05:11:18', '2020-07-20 05:11:38');

-- --------------------------------------------------------

--
-- Table structure for table `experience_lists`
--

CREATE TABLE `experience_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `year_range` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `order` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `experience_lists`
--

INSERT INTO `experience_lists` (`id`, `year_range`, `job`, `company`, `desc`, `order`, `created_at`, `updated_at`) VALUES
(1, '2020', 'Freelancer', '', '', 0, '2020-07-20 05:22:29', '2020-07-20 05:22:29'),
(2, '03/2019 – 09/2019', 'Web developer Intern', 'Trudawn Solution', '⚫Developed Websites and WebApps for the clients\r\n⚫Maintained the current website and added more\r\nappealing features\r\n⚫Demonstrated the ability to work diligently under\r\npressure to meet deadlines', 1, '2020-07-20 05:23:26', '2020-07-20 05:24:04'),
(3, '09/2018 – 06/2019', 'Info-Tech Head', 'Institute of Electrical & Electronics Engineering(IEEE)', 'Created and hosted IEEE Studentchapter website\r\nUpdated website content on a regular basis', 0, '2020-07-20 05:25:08', '2020-07-20 05:25:08');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `google_analytics`
--

CREATE TABLE `google_analytics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `google_analytic` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `google_analytics`
--

INSERT INTO `google_analytics` (`id`, `google_analytic`, `created_at`, `updated_at`) VALUES
(1, 'code', '2020-08-11 02:16:38', '2020-08-11 02:16:38');

-- --------------------------------------------------------

--
-- Table structure for table `homepage_versions`
--

CREATE TABLE `homepage_versions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `choose_version` int(11) NOT NULL DEFAULT '0',
  `color` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `homepage_versions`
--

INSERT INTO `homepage_versions` (`id`, `choose_version`, `color`, `created_at`, `updated_at`) VALUES
(1, 0, 3, '2020-07-15 09:46:30', '2020-08-11 02:24:11');

-- --------------------------------------------------------

--
-- Table structure for table `info_lists`
--

CREATE TABLE `info_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `info_lists`
--

INSERT INTO `info_lists` (`id`, `name`, `desc`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Name', 'Chirag Gada', 0, '2020-07-20 04:54:57', '2020-07-20 05:05:07'),
(2, 'Email', 'chiraggada67@gmail.com', 0, '2020-07-20 05:03:00', '2020-07-20 05:03:00'),
(3, 'linkedIn', 'chirag-gada2911', 0, '2020-07-20 05:03:33', '2020-07-20 05:03:33'),
(4, 'Freelance', 'Available', 0, '2020-07-20 05:03:50', '2020-07-20 05:03:50'),
(5, 'Languages', 'English, Hindi, Gujarati, Marathi', 0, '2020-07-20 05:04:29', '2020-07-20 05:04:29');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_06_13_170648_create_profile_photos_table', 1),
(5, '2020_06_16_180237_create_contents_table', 1),
(6, '2020_06_17_081528_create_abouts_table', 1),
(7, '2020_06_17_090837_create_personel_infos_table', 1),
(8, '2020_06_17_114405_create_info_lists_table', 1),
(9, '2020_06_17_122027_create_counters_table', 1),
(10, '2020_06_17_132406_create_skills_table', 1),
(11, '2020_06_17_134122_create_skill_lists_table', 1),
(12, '2020_06_17_180629_create_education_table', 1),
(13, '2020_06_17_180654_create_education_lists_table', 1),
(14, '2020_06_17_180711_create_experience_lists_table', 1),
(15, '2020_06_17_215731_create_portfolios_table', 1),
(16, '2020_06_18_064959_create_projects_table', 1),
(17, '2020_06_18_141120_create_project_images_table', 1),
(18, '2020_06_19_083101_create_project_videos_table', 1),
(19, '2020_06_19_085222_create_project_sliders_table', 1),
(20, '2020_06_19_101746_create_project_items_table', 1),
(21, '2020_06_19_110051_create_contacts_table', 1),
(22, '2020_06_19_113405_create_socials_table', 1),
(23, '2020_06_19_132130_create_blog_infos_table', 1),
(24, '2020_06_19_133043_create_blogs_table', 1),
(25, '2020_06_19_211529_create_site_infos_table', 1),
(26, '2020_06_19_223622_create_homepage_versions_table', 1),
(27, '2020_06_20_090636_create_google_analytics_table', 1),
(28, '2020_06_20_093652_create_seos_table', 1),
(29, '2020_06_20_100350_create_sections_table', 1),
(30, '2020_06_20_111249_create_colors_table', 1),
(31, '2020_06_26_114628_create_messages_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personel_infos`
--

CREATE TABLE `personel_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `btn_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cv_file` text COLLATE utf8mb4_unicode_ci,
  `btn_link_status` int(11) NOT NULL DEFAULT '1',
  `profile_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personel_infos`
--

INSERT INTO `personel_infos` (`id`, `title`, `desc`, `btn_name`, `cv_file`, `btn_link_status`, `profile_image`, `created_at`, `updated_at`) VALUES
(1, 'Personal Info', 'I am Chirag Gada. Web Developer, Android Developer and Programmer.\r\n\r\nLeaving aside the scholastic aptitude I follow a rigorous coding routine which I feel is absolutely essential for being at the top of the game staying in this cut throat situation that arrives in the conventional engineering context.\r\nMy Enthusiasm regarding Android and Web development has led me to develop a certain intermediary applications(Github link below) and I thrive to keep the drive within for the hunger to learn and exploit newer technologies.', 'Résumé', 'Chirag\'s Resume.pdf', 1, NULL, '2020-07-20 04:57:58', '2020-07-20 04:57:58');

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

CREATE TABLE `portfolios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_bg_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portfolios`
--

INSERT INTO `portfolios` (`id`, `title_bg_name`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Works', 'My Portfolio', '2020-07-20 05:26:02', '2020-08-11 02:16:10');

-- --------------------------------------------------------

--
-- Table structure for table `profile_photos`
--

CREATE TABLE `profile_photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `profile_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profile_photos`
--

INSERT INTO `profile_photos` (`id`, `profile_image`, `status`, `created_at`, `updated_at`) VALUES
(4, '1595480371-0cb7f61f-95bc-4f66-9910-9685875cc1a2.jpg', 1, '2020-07-22 23:29:31', '2020-08-09 11:49:42'),
(5, '1595652100-8227ac4a-c72f-4dc3-ae75-3e68c5f3c2c3.jpg', 0, '2020-07-24 23:11:40', '2020-07-29 05:49:21');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_view_option` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `image_status` int(11) NOT NULL DEFAULT '0',
  `video_status` int(11) NOT NULL DEFAULT '0',
  `slider_status` int(11) NOT NULL DEFAULT '0',
  `item_status` int(11) NOT NULL DEFAULT '1',
  `order` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_name`, `project_view_option`, `status`, `image_status`, `video_status`, `slider_status`, `item_status`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Credit Society -Django project', 3, 1, 0, 0, 1, 1, 0, '2020-07-20 05:26:28', '2020-08-11 01:57:47'),
(2, 'PUBG tournament App', 3, 1, 0, 0, 1, 1, 0, '2020-07-20 05:27:06', '2020-08-11 02:03:26'),
(3, 'Kisan Stores E-comm App', 3, 1, 0, 0, 1, 1, 0, '2020-07-20 05:27:30', '2020-08-11 02:07:51'),
(4, 'Covid Tracker', 1, 1, 1, 0, 0, 1, 3, '2020-07-20 05:27:52', '2020-08-11 02:08:29'),
(5, 'NeoPerk Website', 3, 1, 0, 0, 1, 1, 0, '2020-08-11 01:34:26', '2020-08-11 02:03:40'),
(6, 'Kisan Stores E-comm website', 3, 1, 0, 0, 1, 1, 0, '2020-08-11 02:08:10', '2020-08-11 02:08:10');

-- --------------------------------------------------------

--
-- Table structure for table `project_images`
--

CREATE TABLE `project_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `project_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_images`
--

INSERT INTO `project_images` (`id`, `project_id`, `project_image`, `created_at`, `updated_at`) VALUES
(1, 1, '1597130081-Kisan Stores.png', '2020-07-24 23:14:46', '2020-08-11 01:44:41'),
(2, 3, '1597129680-Screenshot from 2020-08-11 12-35-36.png', '2020-08-11 01:38:00', '2020-08-11 01:38:00'),
(3, 4, '1597131075-Screenshot from 2020-08-11 12-59-52.png', '2020-08-11 02:01:15', '2020-08-11 02:01:15');

-- --------------------------------------------------------

--
-- Table structure for table `project_items`
--

CREATE TABLE `project_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `order` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_items`
--

INSERT INTO `project_items` (`id`, `project_id`, `name`, `desc`, `order`, `created_at`, `updated_at`) VALUES
(3, 2, 'About', 'An andorid app and php admin panel to manage and organize PUBG tournament for a client', 0, '2020-07-20 05:29:44', '2020-07-20 05:29:44'),
(4, 2, 'Link', 'http://riderbattle.go-wish.co/', 0, '2020-07-20 05:30:16', '2020-07-20 05:30:16'),
(5, 3, 'Playstore link', 'https://play.google.com/store/apps/details?id=co.in.kisanstores', 0, '2020-07-20 05:31:08', '2020-08-11 02:07:33'),
(8, 4, 'About', 'Track Covid19 app is made to track the records of Patients confirmed,recovered and dead due to the Novel Corona Virus.', 0, '2020-07-20 05:32:22', '2020-08-11 02:03:03'),
(9, 4, 'github', 'https://github.com/chiraggada2911/COVID-19-Tracking', 0, '2020-07-20 05:32:38', '2020-07-20 05:32:38'),
(10, 5, 'Website', 'http://neoperk.co/', 0, '2020-08-11 01:43:15', '2020-08-11 01:43:15'),
(11, 1, 'About', 'A Django based webapp for college\'s credit society', 0, '2020-08-11 02:05:30', '2020-08-11 02:05:30'),
(12, 1, 'Link', 'http://credsoc.herokuapp.com', 0, '2020-08-11 02:05:40', '2020-08-11 02:05:40'),
(13, 1, 'github', 'https://github.com/chiraggada2911/Credit-Society-Django', 0, '2020-08-11 02:05:54', '2020-08-11 02:05:54'),
(14, 6, 'Link', 'http://kisanstores.co.in/', 0, '2020-08-11 02:09:15', '2020-08-11 02:09:15');

-- --------------------------------------------------------

--
-- Table structure for table `project_sliders`
--

CREATE TABLE `project_sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `project_slider` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_sliders`
--

INSERT INTO `project_sliders` (`id`, `project_id`, `project_slider`, `order`, `created_at`, `updated_at`) VALUES
(1, 1, '1597130683-credsoc1.png', 0, '2020-08-11 01:34:58', '2020-08-11 01:54:43'),
(6, 1, '1597130696-credsoc2.png', 1, '2020-08-11 01:46:26', '2020-08-11 01:54:56'),
(10, 1, '1597130712-credsoc3.png', 3, '2020-08-11 01:55:12', '2020-08-11 01:55:12'),
(11, 1, '1597130723-credsoc4.png', 2, '2020-08-11 01:55:23', '2020-08-11 01:55:23'),
(12, 1, '1597130731-credsoc5.png', 4, '2020-08-11 01:55:31', '2020-08-11 01:55:31'),
(13, 1, '1597130742-credsoc6.png', 5, '2020-08-11 01:55:42', '2020-08-11 01:55:42'),
(14, 5, '1597130797-neoperk2.png', 2, '2020-08-11 01:56:37', '2020-08-11 01:56:37'),
(15, 5, '1597130804-neoperk1.png', 1, '2020-08-11 01:56:44', '2020-08-11 01:56:44'),
(16, 5, '1597130814-neoperk3.png', 3, '2020-08-11 01:56:54', '2020-08-11 01:56:54'),
(17, 5, '1597130821-neoperk4.png', 4, '2020-08-11 01:57:01', '2020-08-11 01:57:01'),
(18, 5, '1597130827-neoperk5.png', 5, '2020-08-11 01:57:07', '2020-08-11 01:57:07'),
(19, 5, '1597130836-neoperk6.png', 6, '2020-08-11 01:57:16', '2020-08-11 01:57:16'),
(20, 5, '1597130851-neoperk-co-1024x768desktop-74d102.jpg', 0, '2020-08-11 01:57:31', '2020-08-11 01:57:31'),
(21, 3, '1597130945-Kisan Stores.png', 0, '2020-08-11 01:59:05', '2020-08-11 01:59:05'),
(22, 6, '1597131865-ks1.png', 0, '2020-08-11 02:14:25', '2020-08-11 02:14:25'),
(23, 6, '1597131874-ks2.png', 1, '2020-08-11 02:14:34', '2020-08-11 02:14:34'),
(24, 6, '1597131881-ks3.png', 2, '2020-08-11 02:14:41', '2020-08-11 02:14:41'),
(25, 6, '1597131888-ks4.png', 3, '2020-08-11 02:14:48', '2020-08-11 02:14:48'),
(26, 6, '1597131894-ks5.png', 4, '2020-08-11 02:14:54', '2020-08-11 02:14:54');

-- --------------------------------------------------------

--
-- Table structure for table `project_videos`
--

CREATE TABLE `project_videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `video_link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `title`, `section`, `status`, `created_at`, `updated_at`) VALUES
(1, 'About Page', 'about_page', 1, '2020-07-15 09:46:30', '2020-07-15 09:46:30'),
(2, 'Portfolio Page', 'portfolio_page', 1, '2020-07-15 09:46:30', '2020-07-15 09:46:30'),
(3, 'Contact Page', 'contact_page', 1, '2020-07-15 09:46:30', '2020-07-15 09:46:30'),
(4, 'Blog Page', 'blog_page', 0, '2020-07-15 09:46:30', '2020-07-20 05:40:53'),
(5, 'Personel Info Section', 'personel_info_section', 1, '2020-07-15 09:46:30', '2020-07-15 09:46:30'),
(6, 'Counter Section', 'counter_section', 1, '2020-07-15 09:46:30', '2020-07-15 09:46:30'),
(7, 'Skill Section', 'skill_section', 1, '2020-07-15 09:46:30', '2020-07-15 09:46:30'),
(8, 'Experience Section', 'experience_section', 1, '2020-07-15 09:46:30', '2020-07-15 09:46:30'),
(9, 'Education Section', 'education_section', 1, '2020-07-15 09:46:30', '2020-07-15 09:46:30'),
(10, 'Preloader', 'preloader', 1, '2020-07-15 09:46:30', '2020-07-15 09:46:30'),
(11, 'Maintenance Mode', 'maintenance_mode', 0, '2020-07-15 09:46:30', '2020-07-20 04:35:46');

-- --------------------------------------------------------

--
-- Table structure for table `seos`
--

CREATE TABLE `seos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_keywords` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fb_app_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seos`
--

INSERT INTO `seos` (`id`, `site_name`, `site_desc`, `site_keywords`, `fb_app_id`, `created_at`, `updated_at`) VALUES
(1, 'Chirag Gada', 'I am Android and Web developer form India.', 'Chirag, Gada, Chirag Gada, cgada, chiraggada, Chirag Shantilal Gada, chiraggada.co, HTML, css, Python, Django, Freelancer, Freelancing, Engineering, Engineer, D. J. Sanghvi College of Engineering, App development, Web development, Android, Website, iOS, E commerce, cgada.me', '', '2020-08-11 02:22:08', '2020-08-11 02:22:34');

-- --------------------------------------------------------

--
-- Table structure for table `site_infos`
--

CREATE TABLE `site_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `panel_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copyright` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` text COLLATE utf8mb4_unicode_ci,
  `login_image` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_infos`
--

INSERT INTO `site_infos` (`id`, `panel_name`, `copyright`, `favicon`, `login_image`, `created_at`, `updated_at`) VALUES
(1, 'Chirag', 'copy', '1595240623-favicon.ico', NULL, '2020-07-20 04:53:43', '2020-07-20 04:53:43');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `skill_lists`
--

CREATE TABLE `skill_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `percent` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skill_lists`
--

INSERT INTO `skill_lists` (`id`, `percent`, `title`, `order`, `created_at`, `updated_at`) VALUES
(1, 80, 'HTML', 0, '2020-07-20 05:07:34', '2020-07-20 05:07:34'),
(2, 50, 'Java', 0, '2020-07-20 05:08:07', '2020-07-20 05:08:07'),
(3, 60, 'Python', 0, '2020-07-20 05:08:20', '2020-07-20 05:08:20'),
(4, 70, 'Android Development', 0, '2020-07-20 05:08:38', '2020-07-20 05:08:38'),
(5, 40, 'PHP', 0, '2020-07-20 05:08:55', '2020-07-20 05:08:55'),
(6, 50, 'MySQL', 0, '2020-07-20 05:09:04', '2020-07-20 05:09:04'),
(7, 30, 'Java script', 0, '2020-07-20 05:09:22', '2020-07-20 05:09:22'),
(8, 60, 'Django', 0, '2020-07-20 05:09:40', '2020-07-20 05:09:40');

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `social_media` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `social_media`, `link`, `status`, `created_at`, `updated_at`) VALUES
(1, 'fab fa-github', 'https://github.com/chiraggada2911/', 1, '2020-07-20 05:35:10', '2020-07-20 05:35:10'),
(2, 'fab fa-instagram', 'https://www.instagram.com/chiraggada_/', 1, '2020-07-20 05:35:45', '2020-07-20 05:35:45'),
(3, 'fab fa-linkedin-in', 'https://www.linkedin.com/in/chirag-gada2911/', 1, '2020-07-20 05:36:13', '2020-07-20 05:36:13'),
(4, 'fab fa-android', '9920817447', 0, '2020-07-20 05:36:27', '2020-07-20 05:40:16'),
(5, 'fab fa-twitter', 'https://twitter.com/chiraggada29', 1, '2020-07-20 05:40:12', '2020-07-20 05:40:12'),
(6, 'fab fa-whatsapp', '9920817447', 0, '2020-07-29 05:50:44', '2020-07-29 06:08:55'),
(7, 'fab fa-stack-overflow', 'https://stackoverflow.com/users/9915736/chirag-gada', 1, '2020-07-29 05:51:33', '2020-07-29 05:51:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `job`, `profile_image`, `created_at`, `updated_at`) VALUES
(1, 'Chirag Gada', 'chiraggada67@gmail.com', NULL, '$2y$10$h5KEjvp7z6oHOSX.nH4cwe9mmHuJ.5GemQQ6nN3ZXRkmXwuzqJ16C', '7L5XTDmHGhcWh6qd5BsVGhlLRA0vPeD83FjDjRXy0ZT8Kv49bfizfJOmbv0L', 'Freelancer', '1595652876-2ba12475-6b5e-49ba-baea-7fd0c1c0914c.jpg', '2020-07-15 09:46:30', '2020-07-24 23:24:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_infos`
--
ALTER TABLE `blog_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counters`
--
ALTER TABLE `counters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education_lists`
--
ALTER TABLE `education_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experience_lists`
--
ALTER TABLE `experience_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `google_analytics`
--
ALTER TABLE `google_analytics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homepage_versions`
--
ALTER TABLE `homepage_versions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `info_lists`
--
ALTER TABLE `info_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personel_infos`
--
ALTER TABLE `personel_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_photos`
--
ALTER TABLE `profile_photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_images`
--
ALTER TABLE `project_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_images_project_id_foreign` (`project_id`);

--
-- Indexes for table `project_items`
--
ALTER TABLE `project_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_items_project_id_foreign` (`project_id`);

--
-- Indexes for table `project_sliders`
--
ALTER TABLE `project_sliders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_sliders_project_id_foreign` (`project_id`);

--
-- Indexes for table `project_videos`
--
ALTER TABLE `project_videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_videos_project_id_foreign` (`project_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seos`
--
ALTER TABLE `seos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_infos`
--
ALTER TABLE `site_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skill_lists`
--
ALTER TABLE `skill_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_infos`
--
ALTER TABLE `blog_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `counters`
--
ALTER TABLE `counters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `education_lists`
--
ALTER TABLE `education_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `experience_lists`
--
ALTER TABLE `experience_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `google_analytics`
--
ALTER TABLE `google_analytics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `homepage_versions`
--
ALTER TABLE `homepage_versions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `info_lists`
--
ALTER TABLE `info_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `personel_infos`
--
ALTER TABLE `personel_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `profile_photos`
--
ALTER TABLE `profile_photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `project_images`
--
ALTER TABLE `project_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `project_items`
--
ALTER TABLE `project_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `project_sliders`
--
ALTER TABLE `project_sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `project_videos`
--
ALTER TABLE `project_videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `seos`
--
ALTER TABLE `seos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `site_infos`
--
ALTER TABLE `site_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skill_lists`
--
ALTER TABLE `skill_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `project_images`
--
ALTER TABLE `project_images`
  ADD CONSTRAINT `project_images_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_items`
--
ALTER TABLE `project_items`
  ADD CONSTRAINT `project_items_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_sliders`
--
ALTER TABLE `project_sliders`
  ADD CONSTRAINT `project_sliders_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_videos`
--
ALTER TABLE `project_videos`
  ADD CONSTRAINT `project_videos_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
